<?php

namespace Drupal\kidiklik_newsletter\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\NodeInterface;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\InvokeCommand;



/**
 * Class DefaultForm.
 */
class DefaultForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'newsletter_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state,NodeInterface $node=NULL) {
  		/* on récupére les blocs de mise en avant de type newsletter lié à la newsletter */
  		//kint(current($node->get("field_entete")->getValue())["value"]);

  		$mise_en_avant=\Drupal::entityTypeManager()->getStorage("node")->loadByProperties(["type"=>"bloc_de_mise_en_avant","field_newsletter"=>$node->id()]);
  		$tab_mae=[];
  		$tab_mae[]="Choisissez un contenu ...";
  		foreach($mise_en_avant as $key=>$item) {
  			$tab_mae[$key]=$item->getTitle();
  		}
  		//kint($mise_en_avant);
  		
  		$form["h2"]=[
				"#type"=>"html_tag",
				"#tag" => "H3",
				"#value" => $node->getTitle(),
				"#weight" => 0,
			];
			
  		$form["container"]=[
  			"#prefix"=>"<div class='row' id='newsletter'>",
  			"#suffix"=>"</div>",
  		];
  		
  		
  		$form["container"]["group1"]=[
  			"#prefix"=>"<div class='col-md-8' id='content_datas'>",
  			"#suffix"=>"</div>",
  		];
  		$form["container"]["group2"]=[
  			"#prefix"=>"<div class='col-md-4'>",
  			"#suffix"=>"</div>",
  		];
  		$form["container"]["group1"]["sujet"]= [
  			"#title" => "Sujet",
  			"#type"=>"textfield",
  			"#size"=>60,
  			'#required' => TRUE,
  			'#value'=>current($node->get("field_sujet")->getValue())["value"],
  			
  			
  		];
  		
  		$form["container"]["group1"]["entete"]= [
  			"#title" => "Bloc d'entête",
  			"#type"=>"textarea",
  			'#value'=>current($node->get("field_entete")->getValue())["value"],
  			
  		];
  		
		$form["container"]["group1"]["bloc"]=[
  			"#prefix"=>"<div id='blocs_datas'>",
  			"#suffix"=>"</div>",
  		];
  		
  		if(count($node->get('field_blocs_de_donnees'))) {
  			//kint($node->get('field_blocs_de_donnees')->getValue());
  			
  			$form["container"]["group1"]["bloc_donnees"]= [
	  			"#title" => "contenu",
	  			"#type"=>"hidden",
	  			"#attributes"=>["id"=>"bloc-donnees"],
	
	  			
	  		];
			
  			
  		}

  		

  		$form["container"]["group2"]["bandeau_rose"]=[
  			"#type"=>"checkbox",
  			"#title"=>"Ajouter le bandeau rose",
  			"#attributes"=>(current($node->get("field_bandeau_rose")->getValue())["value"]?["checked"=>["checked"]]:[]),
  			"#weight"=>-10,
  		];
  		
  		$form["container"]["group2"]["mev"]=[
  			"#type"=>"select",
  			
  			"#title" => "Ajouter du contenu dans ma newsletter",
  			
  			"#attributes"=>["class"=>["select-bloc"]],
  			"#options"=>$tab_mae,
  			
  			"#ajax"=>[
				"callback"=>"::putBlocContent",
				"disable-refocus" => FALSE,
				"event" => "change",
				"wrapper" =>"blocs_datas",
				"progress"=>[
					"type"=>"throbber",
					"message"=>"Ajout",
				],
			]

		];
  			
  		$form["container"]["nid"]= [
	  			"#title" => "nid",
	  			"#type"=>"hidden",
	  			"#attributes"=>["id"=>"nid"],
	  			"#value"=>$node->id(),
	
	  			
	  		];
	  	
	  	 $form["container"]["bouton"]=[
	  	 	"#prefix"=>"<div class='col-md-12'>",
  			"#suffix"=>"</div>",
	  	 ];
	    $form["container"]["bouton"]['submit'] = [
	      '#type' => 'submit',
	      '#value' => $this->t('Save'),
	      
	      "#prefix"=>"<div class='col-md-1'>",
  			"#suffix"=>"</div>",
	     
	    ];
	    $form["container"]["bouton"]['voir'] = [
	      '#type' => 'link',
	      '#title' => $this->t('Voir en ligne'),
	      "#attributes"=>["class"=>"btn btn-primary"],
	      "#url"=>"test",
	      "#prefix"=>"<div class='col-md-11'>",
  			"#suffix"=>"</div>",
	     
	    ];
	    //$form["#redirect"]='?destination=/admin/newsletters';
	    $form["#attached"]["library"][]="kidiklik_newsletter/kidiklik_newsletter.jscss";
	    

    return $form;
  }
  
  public function putBlocContent(&$form, FormStateInterface $form_state) {
  	
  		$fid="";
  		$url_image="";
		$response = new AjaxResponse();
		if($form_state->getValue("mev")) {
			
			/* on charge le bloc de mise en avant */
  			$mise_en_avant=current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties(["type"=>"bloc_de_mise_en_avant","nid"=>$form_state->getValue("mev")]));
    		$fid=current($mise_en_avant->get("field_image")->getValue())["target_id"];
    		$image=current(\Drupal::entityTypeManager()->getStorage("file")->load($fid));
    		$url_image=file_create_url($image["uri"]["x-default"]); // je récupére l'url de l'image
    		
    		$mea=[
    			"titre"=>$mise_en_avant->getTitle(),
    			"resume"=>current($mise_en_avant->get("field_resume")->getValue())["value"],
    			"nid"=>$mise_en_avant->id(),
    			"image"=>$url_image,
    			"fid"=>$fid,
    		];
    	
  			
			/*$renderer= \Drupal::service("renderer");
			$renderedField=$renderer->render($form["bloc"]);*/
			
			$response->addCommand(new InvokeCommand(NULL, 'putBlocContent',[["bloc"=>$mea]] ));  // 
		//$response->addCommand(new ReplaceCommand('#blocs_datas', $renderedField));
  		}
  		
  		return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    /*foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }*/
    //kint(\Drupal::request()->request->get("titre_bloc"));exit;
    
    if(\Drupal::request()->request->get("titre_bloc")) {
    	$node=\Drupal::entityTypeManager()->getStorage("node")->load(\Drupal::routeMatch()->getParameters()->get("node")->id());
    	
    	$tb=$node->get("field_blocs_de_donnees")->getValue();
    	//kint($tb);
    	//kint(\Drupal::request()->request->get("pid"));
    	//$tb=\Drupal::request()->request->get("pid");
    	foreach($tb as $item) {
    		$paragraph=\Drupal\paragraphs\Entity\Paragraph::load($item["target_id"]);
    		//kint($paragraph);
    		if($paragraph) $paragraph->delete();
    	
    	}

    	if($node->get("field_blocs_de_donnees")) $save_paragraph= ($node->get("field_blocs_de_donnees")->getValue());
    	foreach(\Drupal::request()->request->get("titre_bloc") as $key=>$item) {
    		$paragraph=\Drupal\paragraphs\Entity\Paragraph::create(["type"=>"bloc_donnees_titre_desc_img",]);
    		$fid=\Drupal::request()->request->get("fid")[$key];
    		$image=(\Drupal::entityTypeManager()->getStorage("file")->load($fid));
    		$paragraph->set("field_image",$image);
    		$paragraph->set("field_titre",$item);
    		$paragraph->set("field_resume",\Drupal::request()->request->get("resume_bloc")[$key]);
    		$paragraph->save();
    		$save_paragraph[]=$paragraph;
    	}
    	/* on charge le node  */
    	if(\Drupal::request()->request->get("bandeau_rose")) $rose=true;else $rose=false;	
    	$node->set("field_bandeau_rose",$rose);
    	$node->set("field_blocs_de_donnees",$save_paragraph);
    	$node->set("field_sujet",\Drupal::request()->request->get("sujet"));
    	$node->set("field_entete",\Drupal::request()->request->get("entete"));//
    	$node->validate();
    	$node->save();
    } 
    
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  	//kint($form);exit;
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
