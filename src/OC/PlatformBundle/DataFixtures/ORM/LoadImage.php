<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace OC\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OC\PlatformBundle\Entity\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class LoadImage
 * @package OC\PlatformBundle\DataFixtures\ORM
 */
class LoadImage implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {

    $names = array(
      'http://www.google.com',
      'http://www.free.fr',
      'http://www.yahoo.fr',
      'http://www.youporn.com',
      'http://jacquieetmicheltv.net',
    );

    foreach ($names as $name) {
      $image = new Image();
      $image->setUrl($name);
      $image->setAlt("My Best Description...");
      $manager->persist($image);
    }

    $manager->flush();
  }

  /**
   * {@inheritDoc}
   */
  public function getOrder()
  {
    return 1;
  }
}