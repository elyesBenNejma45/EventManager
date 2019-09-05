<?php

namespace App\Controller;

use App\Entity\OutlookEvent;
use App\Model\EventsGroup;
use App\Repository\OutlookEventRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;

class OutlookEventController extends AbstractController
{
    /**
     * @Route("/outlook/event", name="outlook_event")
     */
    public function showHolidays()
    {
        $strJsonFileContents = file_get_contents("https://feiertage-api.de/api/?jahr=2019");
        $holidays = json_decode($strJsonFileContents,true);
        /** @var EntityRepository $repository */
        $repository = $this->container->get('doctrine')->getRepository(OutlookEvent::class);
        $outlookEvents = $repository->findAll();
        /** @var OutlookEvent $outlookEvent */
        $isHoliday = false;
        foreach ($outlookEvents as $outlookEvent ) {
            $origDate = $outlookEvent->getStart();
            $newDate = $origDate->format('Y-m-d');
            $state = $outlookEvent->getLocation()->getState();
            if(!is_null($state)){
                foreach ($holidays as $key => $value) {
                    if ($key == $state->getShortcut()) {
                        foreach ($value as $k => $v) {
                            if ($newDate == $v['datum']) {
                                $isHoliday = true;
                            }
                        }
                    }
                }
            }
        }
        return $this->render('outlook_event/index.html.twig', [
            'outlookEvents' => $outlookEvents,
            'holiday'=> $isHoliday]);
    }
    /**
     * @Route("/outlook/event", name="filterEvents")
     */
    public function filterEvents(RequestStack $requestStack)
    {
        /** @var  OutlookEventRepository $outlookEventRepository */
        $outlookEventRepository = new OutlookEventRepository($this->getDoctrine());
        $request = $requestStack->getCurrentRequest();

        /** @var  EventsGroup $evetsGroup */
        $eventsGroup = new EventsGroup($request);
        if ($request->get('location')) {
            $eventsGroup->addFilter('location', $request->get('location'));
            $eventsGroup->load($outlookEventRepository);
        }
        if ($request->get('start')) {
            $eventsGroup->addFilter('start', $request->get('start'));
            $eventsGroup->load($outlookEventRepository);
        }
        if ($request->get('end')) {
            $eventsGroup->addFilter('end', $request->get('end'));
            $eventsGroup->load($outlookEventRepository);
        }
        if ($request->get('type')) {
            $eventsGroup->addFilter('type', $request->get('type'));
            $eventsGroup->load($outlookEventRepository);
        } else {
            /** @var EntityRepository $repository */
            $repository = $this->container->get('doctrine')->getRepository(OutlookEvent::class);
            $eventsGroup = $repository->findAll();
        }
        return $this->render('outlook_event/index.html.twig', [
            'outlookEvents' => $eventsGroup
        ]);
    }

}
