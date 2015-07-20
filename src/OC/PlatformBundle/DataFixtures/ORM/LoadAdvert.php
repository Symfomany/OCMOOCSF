<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Category;

/**
 * Class LoadAdvert
 * @package OC\PlatformBundle\DataFixtures\ORM
 */
class LoadAdvert implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {
    // Liste des titres de adverts
    $titles = array(
        '5' => 'Développement web',
        '10' =>'Développement mobile',
        '15' =>'Graphisme',
        '20' =>'Intégration',
        '25' => 'Réseau',
        '30' => 'Développement Rasberry',
        '35' => 'Développement BackBone',
        '40' => 'Développement PHP',
        '45' => 'Développement MYSQL',
        '50' => 'Développement Zend',
        '55' => 'Développement CakePHP',
        '60' => 'Développement Laravel',
    );

    $imgs =   $manager->getRepository('OCPlatformBundle:Image')->findAll();

    foreach ($titles as $key => $title){
      shuffle($imgs);
      $ad = new Advert();
      $ad->setTitle($title);
      $ad->setContent("Lorem Ipsum dolor katiulorus");
      $ad->setAuthor("Julien");
      $ad->setImage($imgs[0]);
      $ad->setUpdatedAt(new \DateTime("- {$key} days"));
      $ad->increaseApplication();

      $manager->persist($ad);
    }

    $manager->flush();
  }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}