<?php

namespace App\Controller;

use App\Entity\OutlookEvent;
use Doctrine\ORM\EntityRepository;
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
        /** @var OutlookEvent $outlookEvent */
        $outlookEvent = $repository->findAll();
        return $this->render('outlook_event/index.html.twig', [
            'outlookEvent' => $outlookEvent,
        ]);
    }
}
