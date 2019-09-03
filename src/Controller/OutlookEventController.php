<?php

namespace App\Controller;

use App\Entity\OutlookEvent;
use App\Model\EventsGroup;
use Doctrine\ORM\EntityRepository;
use phpDocumentor\Reflection\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OutlookEventController extends AbstractController
{
    /**
     * @Route("/outlook/event", name="outlook_event")
     */
    public function index()
    {

        /** @var EntityRepository $repository */
        $repository = $this->container->get('doctrine')->getRepository(OutlookEvent::class);
        $outlookEvent = $repository->findAll();
//        $loc = [];
//        foreach ($outlookEvent as $eve)
//        {
//            /** @var OutlookEvent $eve */
//            $location = $eve->getLocation();
//            $loc = $this->container->get('doctrine')->getRepository(\App\Entity\Location::class)->findBy(array('id'=>$location));
//
//        }
        return $this->render('outlook_event/index.html.twig', [
            'outlookEvents' => $outlookEvent,
        ]);
    }
}
