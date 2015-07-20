<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Application;

/**
 * Class LoadApplication
 * @package OC\PlatformBundle\DataFixtures\ORM
 */
class LoadApplication implements FixtureInterface
{

  public function load(ObjectManager $manager)
  {

    $names = array(
      'Candidature PHP',
      'Candidature MYSQL',
      'Candidature CSS',
      'Candidature HTML',
      'Candidature JS',
      'Candidature NODE',
      'Candidature RUBY',
      'Candidature PYTHON',
      'Candidature JAVA',
    );


    $adverts =   $manager->getRepository('OCPlatformBundle:Advert')->findAll();


    foreach ($names as $name) {
      shuffle($adverts);
      $app = new Application();
      $app->setAuthor('Julien');
      $app->setContent($adverts[0]->getTitle());
      $app->setDate(new \DateTime('now'));
      $adverts[0]->addApplication($app);
      $manager->persist($app);

    }

    $manager->flush();
  }

  /**
   * {@inheritDoc}
   */
  public function getOrder()
  {
    return 3;
  }
}