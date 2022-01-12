<?php


namespace Drupal\kidiklik_event\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\HttpResponse;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InitSubscriber implements EventSubscriberInterface {

  public function checkRedirect(GetResponseEvent $event) {
  		$request = $event->getRequest();
      
      $node=\Drupal::routeMatch()->getParameters()->get("node");
      if(!empty($node)) {
        if(in_array($node->getType() , ['client','adherent']) && strstr($request->getPathInfo(),'edit') === false) {
          $redirect = new RedirectResponse('/');
          $redirect->send();
        }
      }


    $url = str_replace('/','',$request->getRequestUri());
    if($url === 'admin') {
      $user_roles = \Drupal::currentUser()->getAccount()->getRoles();
      
      if(in_array('administrateur_de_departement', $user_roles)) {
        $redirect = new RedirectResponse('/admin/dashboard');
        $redirect->send();
        //kint($user_roles);exit;
      }


    }

	  	$dep_status=current(current(\Drupal::entityTypeManager()
			->getStorage("taxonomy_term")
			->loadByProperties(['name'=>get_departement()]))
			->get("status")
			->getValue());

//    $event->setResponse();
		if(!(int)$dep_status["value"] && get_departement()!==0) {

      $tab=explode(".",\Drupal::request()->getHost());
      array_shift($tab);
      $url="http://www.".implode(".",$tab)."/";

      $redirect = new TrustedRedirectResponse($url, 302);
      $redirect->send();
      //ksm($url);
		  //preg_match('/([0-9]{2}).(.*)/',$request->getHost(),$rs);
//ksm($url);
			//header("Location: ".$url);
			//$event->setResponse(new TrustedRedirectResponse($url, 302));
		}

		//if($request->attributes->get("node_type")->get("originalId")=="message_contact") {
			//$event->setResponse(new RedirectResponse("/contact.html",301));
			//	kint($request->attributes->get("node_type")->get("originalId"));
		//}
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('checkRedirect');
    return $events;
  }

}
