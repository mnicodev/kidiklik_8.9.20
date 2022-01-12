<?php

namespace Drupal\kidiklik_migrate\Commands;

use Drupal\Core\Database\Database;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\User;
use Drush\Commands\DrushCommands;
use Drupal\Core\Database\Connection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\kidiklik_base\KidiklikEntity;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 */
class KidiklikCommands extends DrushCommands
{
  /**
   * @var \Drupal\Core\Database\Connection
   */
  private $connection;

  /**
   * Constructs a DefaultController object.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection.
   */
  public function __construct(Connection $connection)
  {
    $this->connection = $connection;

  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('database')
    );
  }

  /**
   * Echos back hello with the argument provided.
   *
   * @param string $name
   *   Argument provided to the drush command.
   *
   * @command kidiklik_migrate:cmd
   * @aliases kdk
   * @options arr An option that takes multiple values.
   * @options msg Whether or not an extra message should be displayed to the user.
   * @usage drush9_example:hello akanksha --msg
   *   Display 'Hello Akanksha!' and a message.
   */
  public function commande($name = NULL, $options = [
    'dept' => FALSE,
    'contact' => FALSE,
    "adherent" => FALSE,
    "delcontact" => FALSE,
    'ville' => FALSE,
    'activites' => FALSE,
    'images' => FALSE,
    'repasse' => FALSE,
    'parent' => FALSE,
    'rubriques' => FALSE,
    'date' => FALSE,
    'activite' => FALSE,
    'unpublished' => FALSE,
    'geo' => FALSE,
    'import' => FALSE,
    'content' => FALSE,
    'url'=>FALSE,
    'geolocation'=>FALSE,
    'client' => FALSE,
    'filtres' => FALSE])
  {
    if ($name == "help") {
      echo "Migration de la base kidiklik : \n";
      echo "1er paramétre prend les valeurs client, adherent, contact, article, reportage, activite, agenda; jeu_concours\n";
      echo "les options possibles :\n";
      echo "- pour tous: --dept\n";
      echo "- pour client : --contact, --adherent, --delcontact\n";
      echo "- pour adherent : --contact, --delcontact\n";


    } else if ($name == "repasse") {

    } else if ($name == "dept") {
      $rs = \Drupal::entityTypeManager()
        ->getStorage("taxonomy_term")
        ->loadByProperties(["vid" => "departement"]);
      foreach ($rs as &$item) {
        //kint($item);
        if ($item->get("field_code")->value) {
          $item->set("field_ref_dept", $item->getName());
          $item->setName($item->get("field_code")->value);
          //
          $item->save();
        }

      }


    }/* elseif ($name === 'drupal_rubrique') {
      $terms = \Drupal::entityTypeManager()->getStorage("taxonomy_term")->loadByProperties([
        'vid' => 'rubriques_activite',
      ]);
      foreach ($terms as $term) {
        var_dump($term->getParent());
      }

    } elseif ($name === 'kidi_activites_galeries') {
      Database::setActiveConnection('kidiklik');
      $connection = \Drupal\Core\Database\Database::getConnection();
      $query = $connection->query("select * from activites_galeries");

    } elseif ($name === 'kidi_activites_rubriques') {
      Database::setActiveConnection('kidiklik');
      $connection = \Drupal\Core\Database\Database::getConnection();
      $query = $connection->query("SELECT ra.ref_activite, r.nom, r.dept FROM `asso_rubriques_activites` ra join rubriques r on r.id_rubrique = ra.ref_rubrique ");
      while ($item = $query->fetch()) {
        $nom = html_entity_decode($item->nom);
        $nom = trim(str_replace("&#039;", "'", $nom));

       // $term = Term::create([
       //   'name' => 'test',
        //  'vid' => 'client',
        //])->save();

        $dept = current(\Drupal::entityTypeManager()->getStorage("taxonomy_term")->loadByProperties([
          'vid' => 'departement',
          'field_ref_dept' => $item->dept
        ]));
        if (!empty($dept)) {
          $rub = current(\Drupal::entityTypeManager()->getStorage("taxonomy_term")->loadByProperties([
            'vid' => 'rubriques_activite',
            'field_departement' => $dept->id(),
            'name' => $nom
          ]));
          echo $item->ref_activite;
          var_dump($nom);
        }

      }
    } */
    elseif($name === 'kidi_agendas') {

      $connection = \Drupal::database();
      $query= $connection->select('node__field_ref_agenda','n')
            ->fields('n', ['entity_id', 'field_ref_agenda_value'])
            ->condition('entity_id','154588','>=')
            ->condition('bundle','agenda','=')
            ->execute()->fetchAll();

      Database::setActiveConnection('kidiklik');
      $connection = \Drupal\Core\Database\Database::getConnection();
      foreach($query as $item) {

        $n = Node::load((int)$item->entity_id);
       // var_dump($n->get('field_ref_agenda')->value);
        $query2 = $connection->query("select * from agendas_dates where ref_agenda = '" . $item->field_ref_agenda_value . "'");
        while($rs = $query2->fetch()) {
          $date = \Drupal\paragraphs\Entity\Paragraph::create([
            'type' => 'date',
            'field_date_de_debut' => [
              'value' => $rs->date_debut
            ],
            'field_date_de_fin' => [
              'value' => $rs->date_fin
            ]

          ]);
          var_dump("add date : ");
          var_dump($rs);
          $date->save();
          $n->get('field_date')->appendItem($date);
        }
        $n->validate();
        $n->save();

      }

    } elseif ($name === 'kidi_activites' || $name === 'kidi_agendas') {
      /**
       * TRAITEMENT ACTIVITES : images, dates
       */
      Database::setActiveConnection('kidiklik');
      $connection = \Drupal\Core\Database\Database::getConnection();
      if($name === 'kidi_activites') {
        $query = $connection->query("select * from activites");
      } else {
        $query = $connection->query("select * from agendas");
      }

     /* $result = \Drupal::entityQuery('node')
        ->condition('field_ref_parent', '670', '=')
        ->condition('vid', 'rubriques_activite')
        ->execute();*/

      while ($content = $query->fetch()) {
        if($name === 'kidi_activites') {
          $params=[
            'type' => 'activite',
            'field_ref_activite' => $content->id_activite
          ];
        } else {
          $params=[
            'type' => 'agenda',
            'field_ref_agenda' => $content->id_agenda
          ];
        }
        $node = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties($params));

        //if($node->id() > 45710)
        var_dump('NODE : ' . $node->id() );

       // var_dump(current($node->get('field_departement')->getValue())['target_id']);
          if ($options['images'] === true) {
            if ($name === 'kidi_activites') {
              $query2 = $connection->query("select * from activites_galeries where ref_activite = '" . $content->id_activite . "'");
            } else {
              $query2 = $connection->query("select * from agendas_galeries where ref_agenda = '" . $content->id_agenda . "'");
            }

            while ($image = $query2->fetch()) {

              if ($node->get('field_image_save')->isEmpty()) {
                var_dump('insert image : ' . $image->image);
                try {
                  $node->get('field_image_save')->appendItem($image->image);
                  $node->validate();
                  $node->save();
                } catch (\Exception $e) {
                  var_dump($e->getMessage());
                }

              }

            }
          }elseif ($options['rubrique'] === true) {
              //SELECT r.nom, r.dept FROM `asso_rubriques_activites` ra join rubriques r on r.id_rubrique = ra.ref_rubrique
              $query_rub = $connection->query("select * from asso_rubriques_activites where ref_activite='" . $content->id_activite . "'");

          }elseif ($options['date'] === true) {
            /* traitement dates des activités */

              echo "Node : " . $node->id() . "\n";
              if($name === 'kidi_activites') {
                $date = \Drupal\paragraphs\Entity\Paragraph::create([
                  'type' => 'date',
                  'field_date_de_debut' => [
                    'value' => $content->date_debut
                  ],
                  'field_date_de_fin' => [
                    'value' => $content->date_fin
                  ]

                ]);
                $date->save();
                $node->__set('field_date', $date);
              } else {
                $query_date = $connection->query("select * from agendas_dates where ref_agenda='" . $content->id_agenda . "'");
                if(empty($node->get('field_date')->getValue())) {
                  while ($agenda_date = $query_date->fetch()) {
                    $date = \Drupal\paragraphs\Entity\Paragraph::create([
                      'type' => 'date',
                      'field_date_de_debut' => [
                        'value' => $agenda_date->date_debut
                      ],
                      'field_date_de_fin' => [
                        'value' => $agenda_date->date_fin
                      ]

                    ]);
                    var_dump("add date : ");
                    var_dump($agenda_date);
                    $date->save();
                    $node->get('field_date')->appendItem($date);

                  }
                  $node->save();
                }

              }



          }elseif ($options['geo'] === true) {
            /* traitement localise activite */
              var_dump('insert lat/lng : ' . $content->lat . "/" . $content->lng . "...");

              $node->__set('field_geolocation_demo_single', ['lat' => $content->lat, 'lng' => $content->lng]);
              $node->__set('field_geolocalisation', ['lat' => $content->lat, 'lng' => $content->lng]);
              $node->__set('field_latitude', $content->lat);
              $node->__set('field_longitude', $content->lng);
              $node->save();
              echo "OK\n";

          }
      }

    } else if ($name === 'rubriques_activites') {
      /**
       * TRAITEMENT RUBRIQUES DES ACTIVITES
       */
      echo "Traitement rubrique ... ";

      if((bool)$options['dept'] === true) {
        $rubriques = \Drupal::entityTypeManager()
          ->getStorage('taxonomy_term')
          ->loadByProperties(
            [
              "vid" => "rubriques_activite",
            ]
          );
        foreach ($rubriques as $rubrique) {

          if (!empty((int)$rubrique->get('field_ref_dept')->value)) {
            $dept = current(\Drupal::entityTypeManager()
              ->getStorage('taxonomy_term')
              ->loadByProperties(
                [
                  "field_ref_dept" => (int)$rubrique->get('field_ref_dept')->value,
                  "vid" => "departement",

                ]
              ));
            var_dump($rubrique->id());
            if(!empty($dept)) {
              var_dump($dept->id());
              $rubrique->set('field_departement', $dept);
              $rubrique->validate();
              $rubrique->save();
            }
;
          }

        }
      } elseif((bool)$options['unpublished'] === true) {
        $result = \Drupal::entityQuery('taxonomy_term')
          ->condition('field_ref_parent', '670', '=')
          ->condition('vid', 'rubriques_activite')
          ->execute();
        $rubriques = \Drupal::entityTypeManager()
          ->getStorage('taxonomy_term')
          ->loadMultiple($result);
        foreach ($rubriques as $rubrique) {
          var_dump($rubrique->getName());
          if ((int)$rubrique->get('field_ref_parent')->value === 670) {
            $rubrique->setUnpublished();
            $rubrique->save();
          }
        }
      }elseif((bool)$options['parent'] === true) {

        $result = \Drupal::entityQuery('taxonomy_term')
          ->condition('field_ref_parent', '0', '>')
          //->condition('tid', '1564', '=')
          ->condition('vid', 'rubriques_activite')
          ->execute();
        $rubriques = \Drupal::entityTypeManager()
          ->getStorage('taxonomy_term')
          ->loadMultiple($result);

        foreach ($rubriques as $rubrique) {
          var_dump($rubrique->get('field_ref_parent')->value);
          if((int)$rubrique->get('field_ref_parent')->value === 670) {
            $rubrique->setUnpublished();
            $rubrique->save();
          }
          $parent = current(\Drupal::entityTypeManager()
            ->getStorage('taxonomy_term')
            ->loadByProperties(
              [
                "vid" => "rubriques_activite",
                "field_ref_rubrique" => $rubrique->get('field_ref_parent')->value
              ]
            ));

          if(!empty($parent)) {
            var_dump('save');
            $rubrique->set('parent', $parent->id());
            $rubrique->save();
            //var_dump($parent->id());
          } else {
            var_dump('error');
            var_dump($rubrique->get('field_ref_parent')->value);
          }



        }
      } elseif((bool)$options['repasse'] === true) {
        $rubriques = \Drupal::entityTypeManager()
          ->getStorage('taxonomy_term')
          ->loadByProperties(
            [
              "vid" => "rubriques_activite",
          ]);
        foreach ($rubriques as $rubrique) {
          $rubrique->setName(str_replace(['&#39;','&#38;'],["'","&"],$rubrique->getName()));
          $rubrique->save();
          var_dump($rubrique->getName());
          /*var_dump($rubrique->id());
          var_dump($rubrique->get('field_ref_parent')->value);
          var_dump($rubrique->get('field_ref_rubrique')->value);*/
        }

      }



    } else if ($name === 'ville') {

      $query = $this->connection->query("select * from villes");
      while ($ville = $query->fetch()) {
        //var_dump(html_entity_decode($ville->commune));
        $this->connection->query("update villes set commune = \"" . str_replace("&#39;", "'", $ville->commune) . "\" where id_ville=" . $ville->id_ville);
      }

      /**
       * node content
       */
    } elseif($name === 'user') {
      if($options['content'] === true) {

        $database = \Drupal::database();
        $user_query = $database->select('user__field_departement','u');
        $user_query->join("user__roles","ur","ur.entity_id=u.entity_id");
        $user_query->fields('u', ['entity_id','field_departement_target_id']);
        $user_query->condition('u.entity_id',107,'>=');
        $user_query->condition('ur.roles_target_id','editeur','=');
        $users=$user_query->execute();
        
        while($user=$users->fetch()) {
          $term_dept = $user->field_departement_target_id;
          var_dump('DEP : '.$term_dept);

          $query=$database->select("node__field_departement","n");
          $query->fields("n",["entity_id","field_departement_target_id"]);
          $query->condition("n.field_departement_target_id",$term_dept,"=");
          $rs=$query->execute();
          while($item = $rs->fetch()) {
            var_dump('USER : '.$user->entity_id.' ADD NODE : '.$item->entity_id);
            $n=Node::load($item->entity_id);
            $n->setOwnerId($user->entity_id);
            $n->save();
          }
        }
      } elseif($options['repasse'] === true) {

          //$tmp=\Drupal::entityQuery('user')->execute();
          $list = [];
          Database::setActiveConnection('kidiklik');
          $connection = \Drupal\Core\Database\Database::getConnection();
          $query = $connection->query('select * from utilisateurs where ref_profil=5');
          foreach($query as $item) {
            try {
              $user=current(\Drupal::entityTypeManager()->getStorage("user")->loadByProperties([
                'mail' => $item->email
              ]));//
              //var_dump($user->mail);
             // $mail = current($user->get('mail')->getValue())['value'];
             // $query = $connection->query('select * from utilisateurs where email = "'.$mail.'"')->fetch();
              if(!empty($user)) {
                var_dump($item->email);
                var_dump('add role :'.$item->ref_profil);
                switch($item->ref_profil) {
                  case 2: // admin
                    $user->addRole('administrateur_de_departement');
                    break;
                  case 3: // redactediteureur
                    $user->addRole('editeur');
                    break;
                  case 4: // redacteur
                    $user->addRole('redacteur');
                    break;
                  case 5: // redacteur
                    $user->set('roles',array_unique(['authenticated']));
                    break;
                }
                $user->activate();
                $user->save();
              }
            }catch(Exception $e) {
              var_dump($e->getMessage());

            }

            //

          }




      }else if($options['import'] === true) {
        $language='fr';
        Database::setActiveConnection('kidiklik');
        $connection = \Drupal\Core\Database\Database::getConnection();
        $query = $connection->query('select u.*, d.code from utilisateurs u join departements d on d.id_departement=u.dept');
        while($ku=$query->fetch()) {

          try {
            if(!empty($ku->dept) && $ku->dept!==NULL) {
              $dept = (int)$ku->code;//($ku->dept<22?$ku->dept:$ku->dept-1);
              $term_dept = get_term_departement($dept);
            } else {
              $term_dept = get_term_departement(0);
            }


            $test=\Drupal::entityTypeManager()->getStorage("user")->loadByProperties(
              [
                'name' => $ku->login
              ]
             );

            if(!count($test)) {
              var_dump('add user :'.$ku->login);
              $user = \Drupal\user\Entity\User::create();
              $user->setPassword(strtolower($ku->prenom.$ku->nom));
              $user->setEmail($ku->email);
              $user->setUserName($ku->login);
              $user->set('field_nom',$ku->nom);
              $user->set('field_prenom',$ku->prenom);
              $user->set('field_departement',$term_dept);
              $user->set('field_administrateur_dep',$dept);
              $user->set("init", 'mail');
              $user->set("langcode", 'fr');
              $user->set("preferred_langcode", $language);
              $user->set("preferred_admin_langcode", $language);

              switch($ku->ref_profil) {
                case 2: // admin
                  $user->addRole('administrateur_de_departement');
                  break;
                case 3: // redactediteureur
                  $user->addRole('editeur');
                  break;
                case 4: // redacteur
                  $user->addRole('redacteur');
                  break;
                case 5: // redacteur
                  $user->set('roles',array_unique(['authenticated']));
                  break;
              }
              $user->activate();
              $user->save();
            }
          } catch(Exception $e) {
            var_dump($e->getMessage());

          }



        }
      }


      //

    }  else if ($name) {

      /**
       * TRAITEMENT PAR TYPE DE CONTENU
       */

      $rs = db_query('select * from node where nid>=42413 and type="' . $name . '"', [], ['fetch' => 'node']);
      if($options['filtres'] === true) {
        $filtres = [];
        Database::setActiveConnection('kidiklik');
        $connection = \Drupal\Core\Database\Database::getConnection();
        $query = $connection->query("select * from filtres");

        while($item = $query->fetch()) {

          $filtres[]=$item;
        }
      }

      while ($result = $rs->fetchObject()) {

        $nid = $result->nid;

        var_dump("Chargement  '$name : $result->nid' ...");

        $item = Node::Load($nid);
        /*Database::setActiveConnection('kidiklik');
        $connection = \Drupal\Core\Database\Database::getConnection();
        $query = $connection->select('agendas','a')
        ->fields('a',['resume', 'description'])
        ->condition('a.id_agenda',$item->get('field_ref_agenda')->value, '=')
        ->execute()
        ->fetch();*/
        $item->__set('title', str_replace("&#39;", "'", $item->getTitle()));
        $item->__set('title', str_replace("&#34;", '"', $item->getTitle()));
        $item->__set('body', html_entity_decode($query->description));
        //$item->validate();
        //$item->save();
        //var_dump($query);

        // var_dump($item);
        foreach ($options as $key => $option) {

          if ($option) {

            switch ($key) {
              case 'filtres':
                Database::setActiveConnection('kidiklik');
                $connection = \Drupal\Core\Database\Database::getConnection();
               var_dump($item->get('field_ref_'.$name)->value);
                if(!empty($item->get('field_ref_'.$name)->value)) {
                  $item->__unset('field_filtres');
                  $item->save();
                  $content_filtres= [];
                  foreach($filtres as $filtre) {
                    var_dump("select * from entite_filtre_".$filtre->identifiant."_valeur where entite='".$name."' and ref_entite=".$item->get('field_ref_'.$name)->value);
                    $query = $connection->query("select * from entite_filtre_".$filtre->identifiant."_valeur where entite='".$name."' and ref_entite=".$item->get('field_ref_'.$name)->value);
                    while($content = $query->fetch()) {
                      $content_filtres[$filtre->identifiant][] = $content->valeur;

                    }

                    /**/
                  }
                  if(!empty($content_filtres)) {

                    $filtre = \Drupal\paragraphs\Entity\Paragraph::create([
                      'type' => 'filtres',
                      'field_envies' => [
                        'value' => (isset($content_filtres['envie'])?($content_filtres['envie'][0]):null)
                      ],
                      'field_thematiques' => [
                        'value' => (isset($content_filtres['thematique'])?($content_filtres['thematique'][0]):null)
                      ],
                    ]);
                    $filtre->save();
                    foreach($content_filtres['vacances'] as $val) {
                      $filtre->get('field_vacances')->appendItem($val);
                    }
                    foreach($content_filtres['tranches_age'] as $val) {
                     // var_dump($val);
                      preg_match("/([0-9]*)-([0-9]*)ans/",$val,$match);
                      if(!empty($match)) {
                     //   $val=$match[1]."-".$match[2]."ans";
                        //$filtre->get('field_tranches_d_ages')->appendItem($val);
                      }
                      $filtre->get('field_tranches_d_ages')->appendItem($val);

                    }
                    $filtre->save();
                    $filtre->validate();
                    $item->get('field_filtres')->appendItem($filtre);
                      $item->validate();
                      $item->save();
                   // var_dump($content_filtres);
                  // exit;
                  }
                }

                break;
              case 'geolocation':


                //if(empty($item->get("field_geolocation_demo_single")->value) || $item->get("field_geolocation_demo_single")->value==='NULL') {
                  $ville=KidiklikEntity::getGPS($item->get('field_ville_save')->value);
                  var_dump($item->get("field_geolocation_demo_single")->value);
                  //var_dump($ville);
                  /*Database::setActiveConnection('kidiklik');
                  $connection = \Drupal\Core\Database\Database::getConnection();
                  $query=$connection->query()*/

                  if($ville['lat'] !== '0' && $ville['lng'] !=='0') {
                    $item->set("field_geolocation_demo_single",[
                      "lat"=>$ville["lat"],
                      "lng"=>$ville["lng"]
                    ]);
                    $item->validate();
                    $item->save();
                  }
               // }
                break;

              case 'url':
                $lien = current($item->get('field_lien')->getValue())['value'];

                if(!empty($lien)) {
                  preg_match('/([https:\/\/])([0-9]{2}).kidiklik.fr\/(.*)\/([0-9]*)-(.*).html/',$lien,$match);
                  var_dump($match);
                  if(count($match)) {
                    $connection = \Drupal\Core\Database\Database::getConnection();
                    //var_dump($match);
                    switch($match[3]) {
                      /*case 'articles':
                        $node=\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                          'type' => 'article',
                          'field_ref_activite' => $item->get("field_ref_activite")->value
                        ]));
                        break;*/
                      case 'sorties-moment':
                        if(!empty($match[4])) {
                          var_dump($match[4]);
                          $node=current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                            'type' => 'agenda',
                            'field_ref_agenda' => $match[4]
                          ]));
                          if(!empty($node)) {
                            var_dump($node->Id());
                            $new_link=\Drupal::service('path.alias_manager')->getAliasByPath('/node/'.$node->Id());
                            var_dump($new_link);
                            $item->__set('field_lien',$new_link);
                             $item->validate();
                            $item->save();
                          }

                         // $query=$connection->query('update node__field_lien set field_lien_value="'.$new_link.'" where entity='.$item->id());

                        }

                        break;
                      /*case 'reportages':
                        break;*/
                      default:
                        break;

                    }
                  }

                }

                break;
              case 'date':
                $item->__unset('field_date');
                if($name === 'bloc_de_mise_en_avant') {
                  $accueil_id = current($item->get('field_ref_accueil')->getValue())['value'];

                  if(!empty($accueil_id)) {
                    Database::setActiveConnection('kidiklik');
                    $connection = \Drupal\Core\Database\Database::getConnection();
                    $query = $connection->query("select * from accueils_dates where ref_accueil='".$accueil_id."'");
                    while($bloc = $query->fetch()) {
                      $date = \Drupal\paragraphs\Entity\Paragraph::create([
                        'type' => 'date',
                        'field_date_de_debut' => [
                          'value' => $bloc->date_debut
                        ],
                        'field_date_de_fin' => [
                          'value' => $bloc->date_fin
                        ]

                      ]);
                      $date->save();
                      var_dump('Enregistrement de la date');
                      var_dump($bloc);

                      $item->get('field_date')->appendItem($date);
                      $item->validate();
                      $item->save();
                    }
                  }
                }
                break;

              case "images": /* bloc_de_mise_en_avant*/
                if($name === 'bloc_de_mise_en_avant') {
                  $accueil_id = current($item->get('field_ref_accueil')->getValue())['value'];

                  if(!empty($accueil_id)) {
                    Database::setActiveConnection('kidiklik');
                    $connection = \Drupal\Core\Database\Database::getConnection();
                    $query = $connection->query("select * from accueils where id_accueil='".$accueil_id."'");
                    while($bloc = $query->fetch()) {
                      var_dump($bloc->image);
                      $item->__set('field_image_save', $bloc->image);
                      $item->validate();
                      $item->save();
                    }
                  }
                }




                break;
              case "activite":
                $item->__unset('field_activite');
                $item->save();
                $activite = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                  'type' => 'activite',
                  'field_ref_activite' => $item->get("field_ref_activite")->value
                ]));
                if($name === 'agenda') {
                  $item->__set('field_activite', $activite);
                  $item->validate();
                  $item->save();
                }
                break;
              /**
               * récupération des rubriques liées aux activités
               */
              case "rubriques":
                if($name === 'activite') {
                  $item->__unset("field_rubriques_activite");
                  $item->save();
                  $ref_act = current($item->get('field_ref_activite')->getValue())['value'];
                  if(!empty($ref_act)) {
                    var_dump($ref_act);
                    Database::setActiveConnection('kidiklik');
                    $connection = \Drupal\Core\Database\Database::getConnection();
                    $query = $connection->query("select * from asso_rubriques_activites where ref_activite = '".$ref_act."'");
                    while($asso=$query->fetch()) {
                      $rub=current(\Drupal::entityTypeManager()
                        ->getStorage('taxonomy_term')
                        ->loadByProperties(
                          [
                            "vid" => "rubriques_activite",
                            "field_ref_rubrique" => $asso->ref_rubrique
                          ]
                        ));
                      if(!empty($rub)) {
                        $item->__set('field_rubriques_activite', $rub);
                        $item->validate();
                        $item->save();
                        var_dump($rub->id());
                      }

                    }
                  }
                }


                break;
              case 'repasse':
                //var_dump($item->get('field_adresse')->value);
                /**
                 * TRAITEMENT SUR DIFFERENTS CHAMPS A COMMENTER EN FOCNTION DE LA PRESENCE
                 */
                if($item->__isset('field_telephone')) {
                  if($item->get('field_telephone')->value === 'NULL') {
                    $item->set('field_telephone', null);
                  }
                }

                if($item->__isset('field_email')) {
                  if($item->get('field_email')->value === 'NULL') {
                    $item->set('field_email', null);
                  }
                }
                /*
                if($item->get('field_horaires')->value === 'NULL') {
                  $item->set('field_horaires', null);
                }*/
                if($item->__isset('field_lien')) {
                  if($item->get('field_lien')->value === 'NULL') {
                    $item->set('field_lien', null);
                  }
                }

                $allowed_tags = ['a', 'br'];
                if($item->__isset('body')) {
                  $item->__set('body', str_replace("&#39;", "'", current($item->get('body')->getValue())['value']));
                  $item->__set('body', html_entity_decode(current($item->get('body')->getValue())['value']));
                }
                if($item->__isset('field_resume')) {
                  $item->__set('field_resume', str_replace("&#39;", "'", $item->get('field_resume')->value));
                }
                if($item->__isset('field_coordonnees')) {
                  $item->__set('field_coordonnees', html_entity_decode($item->get('field_coordonnees')->value));
                  $item->__set('field_coordonnees', str_replace("&#39;", "'", $item->get('field_coordonnees')->value));
                }
                if($item->__isset('field_info_complementaires')) {
                  $item->__set('field_info_complementaires', html_entity_decode($item->get('field_info_complementaires')->value));
                }
                if($item->__isset('field_adresse')) {
                  if($item->get('field_adresse')->value === 'NULL') {
                    $item->set('field_adresse', null);
                  }
                  $item->__set('field_adresse', str_replace("&#39;", "'", $item->get('field_adresse')->value));
                  $item->__set('field_adresse', html_entity_decode($item->get('field_adresse')->value));
                }
                //

                //$item->__set('field_lieu', html_entity_decode(current($item->get('field_lieu')->getValue())['value']));
                //$item->__set('field_horaires', html_entity_decode(current($item->get('field_horaires')->getValue())['value']));
                //

                var_dump('REPASSE .. OK');

                $item->validate();
                $item->save();

                break;
              case 'migrate':
                echo "ok";
                break;
              case 'adherent':

               /* $item->__unset("field_adherent");
                $item->save();*/
                if($name === 'client') {
                  if($item->get("field_ref_client")->value !== NULL && !empty($item->get("field_ref_client")->value)) {
                    var_dump("ref_client : ".$item->get("field_ref_client")->value);
                    $adherent = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                      'type' => 'adherent',
                      'field_ref_client' => $item->get("field_ref_client")->value
                    ]));
                    if (!empty($adherent)) {
                      $adherent->__set('title', str_replace("&#39;", "'", $adherent->getTitle()));
                      $adherent->save();
                      $item->__set('field_adherent', $adherent);
                      $item->validate();
                      $item->save();
                    }


                  }


                } else {

                  if (!empty($item->get("field_ref_adherent")->value)) {

                    $adherent = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                      'type' => 'adherent',
                      'field_ref_adherent' => (int)$item->get("field_ref_adherent")->value
                    ]));
                    if (!empty($adherent)) {
                      var_dump($adherent->id());
                      $adherent->__set('title', str_replace("&#39;", "'", $adherent->getTitle()));
                      $adherent->save();
                      $item->__set('field_adherent', $adherent);
                      $item->validate();
                      $item->save();
                    }

                  }
                }


                break;
              case 'ville':
                //$db= \Drupal::database();

                if (!empty($item) && $item->get("field_ref_ville")->value) {
                  // print($item->get("field_ref_ville")->value."-");

                  echo $item->get("field_ref_ville")->value . " ---- enregistrement";

                  $query = $this->connection->query("select * from villes where id_ville=\"" . (int)$item->get("field_ref_ville")->value . "\"");
                  $ville = current($query->fetchAll());

                  if ($ville) {
                    echo $ville->commune;
                    $item->__set("field_ville_save", $ville->commune);
                    $item->__set("field_code_postal", $ville->code_postal);
                    $item->validate();
                    $item->save();
                  }
                  echo "OK\n";
                  // print_r("select * from villes where id_ville='".$item->get("field_ref_ville")->value."'\n");


                }

                break;
              case "delcontact":
                echo "Suppression des contacts ... " . $item->id();
                $item->__unset("field_contact");
                $item->save();
                echo " ... OK\n";
                break;
              case "dept":
                if($name === 'bloc_de_mise_en_avant') {
                  $accueil_id = current($item->get('field_ref_accueil')->getValue())['value'];

                  if(!empty($accueil_id)) {
                    Database::setActiveConnection('kidiklik');
                    $connection = \Drupal\Core\Database\Database::getConnection();
                    $query = $connection->query("select * from accueils where id_accueil='".$accueil_id."'");
                    while($bloc = $query->fetch()) {
                      $term = \Drupal::entityTypeManager()->getStorage("taxonomy_term")->loadByProperties(
                        [
                          "field_ref_dept" => $bloc->dept,
                          "vid" => "departement",
                        ]
                      );
                      if ($term) {
                        var_dump(current($term)->id());
                        $item->__set("field_departement", current($term));
                        $item->validate();
                        $item->save();
                        echo ".";
                      }
                    }
                  }
                } else {
                  $dept = (int)$item->get("field_ref_dept")->value;

                  if ($dept) {
                    echo "Traitement dept " . $dept . " ... ";

                    $term = \Drupal::entityTypeManager()->getStorage("taxonomy_term")->loadByProperties(
                      [
                        "field_ref_dept" => $dept,
                        "vid" => "departement",
                        //"field_type_contact"=>"client"
                      ]
                    );

                    if ($term) {
                      $item->__set("field_departement", current($term)->id());
                      $item->validate();
                      $item->save();
                      echo ".";
                    }
                    echo "OK\n";
                  }
                }



                break;
              case "contact":
                if (!empty($item->get("field_ref_".$name)->value)) {
                  $item->__unset("field_contact");
                  $item->save();
                  echo "Traitement contacts du $name " . $item->id() . " ... ".$item->get("field_ref_" . $name)->value;
                  //echo "Chargement de la base contact clients ... ".$item->get("field_ref_" . $name)->value;
                  //echo $item->get("field_ref_client")->value;echo " \n";
                  $contacts = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties(
                    [
                      "type" => "contact",
                      "field_type_contact" => $name,
                      "field_ref_" . $name => $item->get("field_ref_" . $name)->value,
                    ]
                  ));
                  //var_dump($contacts->id());
                  if (!empty($contacts)) {
                    var_dump($contacts->id());
                    echo "Enregistrement des contacts ... ";
                    $item->get("field_contact")->appendItem($contacts);
                    $item->validate();
                    $item->save();
                    echo " OK\n";
                  }


                }


                break;
              case 'client':
                if (!empty($item->get("field_ref_client")->value)) {
                  var_dump($item->get("field_ref_client")->value);
                  $item->__unset('field_client');
                  $item->save();
                  //var_dump($item->get("field_ref_client")->value);
                  $client = current(\Drupal::entityTypeManager()->getStorage("node")->loadByProperties([
                    'type' => 'client',
                    'field_ref_client' => $item->get("field_ref_client")->value
                  ]));

                  $item->__set('field_client', $client->id());
                  $item->validate();
                  $item->save();
                  var_dump($client->id());
                }
                break;

            } // fin switch
          } // fin if option

        } // fin foreach options


      } // fin foreach rs
    }
  }

  /**
   * Echos back hello with the argument provided.
   *
   * @param string $name
   *   Argument provided to the drush command.
   *
   * @command kidiklik_migrate:adherent
   * @aliases kma
   * @options arr An option that takes multiple values.
   * @options msg Whether or not an extra message should be displayed to the user.
   * @usage drush9_example:hello akanksha --msg
   *   Display 'Hello Akanksha!' and a message.
   */
  public function adherent($name, $options = ['msg' => FALSE])
  {
    $rs = \Drupal::entityTypeManager()->getStorage("node")->loadByProperties(
      [
        "type" => "contact",
        "field_type_contact" => "adherent"
      ]
    );
    kint(count($rs));
    if ($options['msg']) {
      $this->output()->writeln('Hello ' . $name . '! This is your first Drush 9 command.');
    } else {
      $this->output()->writeln('Hello ' . $name . '!');
    }
  }

  /**
   * Echos back hello with the argument provided.
   *
   * @param string $name
   *   Argument provided to the drush command.
   *
   * @command kidiklik_migrate:InscritsToMailjet
   * @aliases knl
   * @options arr An option that takes multiple values.
   * @options msg Whether or not an extra message should be displayed to the user.
   * @usage drush9_example:hello akanksha --msg
   *   Display 'Hello Akanksha!' and a message.
   */
  public function InscritsToMailjet($name, $options = ['msg' => FALSE])
  {
    echo \Drupal::request()->getBasePath();
    $url = 'http://' . \Drupal::request()->getHost() . \Drupal::request()->getBasePath() . '/' . drupal_get_path('module', 'kidiklik_front_newsletter') . '/email_to_newsletter.php';
    exec('wget ' . $url . '?email=test@freee.fr&dept=45');

    //echo file_get_contents($url.'?email=test@freee.fr&dept=45');
    echo $name;
  }
}
