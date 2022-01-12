<?php

namespace Drupal\kidiklik_newsletter\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class BlocsDatasController.
 */
class BlocsDatasController extends ControllerBase {

  /**
   * Get.
   *
   * @return string
   *   Return Hello string.
   */
  public function get($nid) {
  	$node=\Drupal::entityTypeManager()->getStorage("node")->load($nid);
  	
  	$liste_blocs=$node->get("field_blocs_de_donnees")->getValue();
  	$json=[];
  	foreach($liste_blocs as $item) {
  		$paragraph=\Drupal\paragraphs\Entity\Paragraph::load($item["target_id"]);
  		if($paragraph) {
  			$fid=current($paragraph->get("field_image")->getValue())["target_id"];
	  		
	  		$image=current(\Drupal::entityTypeManager()->getStorage("file")->load($fid));
	    	$url_image=file_create_url($image["uri"]["x-default"]); 
	  		$json[]=[
	  			"titre"=>current($paragraph->get("field_titre")->getValue())["value"],
	  			"resume"=>current($paragraph->get("field_resume")->getValue())["value"],
	  			"image"=>$url_image,
	  			"pid"=>$paragraph->id(),
	  			"fid"=>$fid,
	  		];
  		}
  		
  		
  	}
  	

    return new JsonResponse(json_encode($json));
  }

}
