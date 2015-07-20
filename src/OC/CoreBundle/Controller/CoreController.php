<?php

namespace OC\CoreBundle\Controller;

use OC\PlatformBundle\DataFixtures\ORM\LoadAdvert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CoreController extends Controller
{
  // La page d'accueil
  public function indexAction()
  {
    // On retourne simplement la vue de la page d'accueil
    // L'affichage des 3 dernières annonces utilisera le contrôleur déjà existant dans PlatformBundle
    return $this->get('templating')->renderResponse('OCCoreBundle:Core:index.html.twig');

    // La méthode raccourcie $this->render('...') est parfaitement valable
  }


  /**
   * Purge Page
   * @param $days
   * @return Response
   */
  public function purgeAction($days, $readonly = true)
  {

    $adverts = $this->get('oc_platform.repository.advert')->getAdvertByDay($days);

    dump('Before...');
    dump($adverts);

    if(!$readonly){
      $this->get('oc_platform.advert_purger')->purge($days);
      dump('After...');

      $adverts = $this->get('oc_platform.repository.advert')->getAdvertByDay($days);

      dump($adverts);
    }


    return new Response("<p>End<p/>");
  }

  // La page de contact
  public function contactAction(Request $request)
  {
    // On récupère la session depuis la requête, en argument du contrôleur
    $session = $request->getSession();
    // Et on définit notre message
    $session->getFlashBag()->add('info', 'La page de contact n’est pas encore disponible, merci de revenir plus tard.');

    // Enfin, on redirige simplement vers la page d'accueil
    return new RedirectResponse($this->get('router')->generate('oc_core_home'));

    // Les méthodes raccourcies $this->redirect($this->generateUrl('oc_core_home')); sont parfaitement valables
  }
}
