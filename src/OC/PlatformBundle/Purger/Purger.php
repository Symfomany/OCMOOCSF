<?php
namespace OC\PlatformBundle\Purger;
use Doctrine\ORM\EntityManager;
use OC\PlatformBundle\Entity\AdvertRepository;

/**
 * Class Purger
 * Service to purge adverts
 */
class Purger{


    /**
     * @var AdvertRepository
     */
    protected $repository;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(AdvertRepository $repository, EntityManager $em){
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * Purge adverts in X days
     * @param $days
     */
    public function purge($days = 0){

        $adverts = $this->repository->getAdvertByDay($days);

        // If there is adverts
        if(!empty($adverts)){
            foreach($adverts as $advert){
                $this->em->remove($advert);
            }
            $this->em->flush();
        }


    }












}