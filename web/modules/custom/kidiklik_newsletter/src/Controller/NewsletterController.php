<?php

namespace Drupal\kidiklik_newsletter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\views\Views;

/**
 * Class NewsletterController.
 */
class NewsletterController extends ControllerBase {

  /**
   * Newsletterformailjet.
   *
   * @return string
   *   Return Hello string.
   */
  public function newsletterForMailjet($nid,$titre) {

		$dep_id=get_term_departement();
		//$dep=get_departement();
		$view_entete=Views::getView("liste_bloc_donnees_newsletter");
		$view_entete->setDisplay("rest_export_2");
		$view_entete->setArguments([$nid]);
		$view_entete->execute();
		$json_entete = current(json_decode(\Drupal::service('renderer')->render($view_entete->render())));
		
		$view_pub=Views::getView("liste_bloc_donnees_newsletter");
		$view_pub->setDisplay("newsletter_json_pub");
		$view_pub->setArguments([$dep_id]);
		
		$view_pub->execute();
		$view_pub->query->where[1]["conditions"][2]["field"]="DATE_FORMAT(paragraphs_item_field_data_node__field_date__paragraph__field_date_de_debut.field_date_de_debut_value, '%Y-%m-%d') <= '".$json_entete->field_date_envoi."'";
		$view_pub->query->where[1]["conditions"][3]["field"]="DATE_FORMAT(paragraphs_item_field_data_node__field_date__paragraph__field_date_de_fin.field_date_de_fin_value, '%Y-%m-%d') >= '".$json_entete->field_date_envoi."'";
		//$view_pub->query->where[0]["conditions"][1]["field"]="node__field_partage_departements.field_partage_departements_target_id = :node__field_partage_departements_field_partage_departements_target_id";
		//$view_pub->query->where[0]["conditions"][1]["value"]=[':node__field_partage_departements_field_partage_departements_target_id'=>(int)$dep_id];
		
		//kint($view_pub->query->where[0]["conditions"]);
		
		$json_pub = current(json_decode(\Drupal::service('renderer')->render($view_pub->render())));
		//kint($json_pub);
		//$db=\Drupal::database();
		//$query=$db->query()
		
		$dep=\Drupal::entityTypeManager()->getStorage("taxonomy_term")->load($dep_id);
		$blocs=\Drupal::entityTypeManager()->getStorage("node")->loadByProperties(["type"=>"bloc_de_mise_en_avant","field_newsletter"=>$nid,"status"=>1]);
		
	
		$entete=[
			"sujet"=>$json_entete->field_sujet, //$newsletter->get("field_sujet")->value,
			"texte"=>$json_entete->field_entete, //$newsletter->get("field_entete")->value,
			"bandeau_rose" => ($json_entete->field_bandeau_rose?1:0),
			"pub"=>"http://".\Drupal::request()->server->get("HTTP_HOST").$json_pub->field_image,
			"dep"=>$dep,
		];
		$liste=[];
		foreach($blocs as $bloc) {
			
			
			if(is_object($bloc->get("field_image")->first())) {
				//kint($bloc->get("field_image")->first()->get("target_id")->getValue());
				$file=\Drupal::entityTypeManager()->getStorage("file")->load($bloc->get("field_image")->first()->get("target_id")->getValue());
				
				$url_image=file_create_url($file->getFileUri());
				
			} else $url_image="";
			$liste[]=[
				"titre"=>$bloc->getTitle(),
				"image"=>$url_image,
				"texte"=>$bloc->get("field_resume")->value,
				"lien"=>"http://".\Drupal::request()->server->get("HTTP_HOST").$bloc->get("field_lien")->value,
			];
			
		}
		//kint(\Drupal::request()->server->get("HTTP_HOST"));
		//kint($liste);
		//kint($newsletter->get("field_bandeau_rose")->value);
        $build= [
			'#type'=>"page",
			'#theme' => 'kidiklik_newsletter',
			'#entete' => $entete,
			"#blocs" => $liste,
			"#cache"=>[
				"max-age" => 0,
			],
			
		];        
        
		//kint($output);
		return $build;
		/*$output=\Drupal::service('renderer')->render($build);
		
		
		

		$response = new Response();
		$response->setContent($output);

		return $response;*/	
  }

}
