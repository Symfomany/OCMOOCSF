<?php

namespace spec\OC\PlatformBundle\Purger;

use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use OC\PlatformBundle\Entity\AdvertRepository;

class PurgerSpec extends ObjectBehavior
{

    function let(AdvertRepository $repository, EntityManager $em)
    {
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('OC\PlatformBundle\Purger\Purger');
    }
}
