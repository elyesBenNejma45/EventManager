<?php


namespace App\Tests;


use App\Entity\OutlookEvent;
use App\Model\EventsGroup;
use PHPUnit\Framework\TestCase;

class EventsGroupTest extends TestCase
{
    function testEmptyGroup(){
        /** @var EventsGroup $eventGroup */
        $eventGroup = new EventsGroup([]);
        foreach ($eventGroup as $event){
            $this->assertTrue(false);
        }
        $this->assertTrue(true);
    }

    function testGroupWithOneEvent(){
        $eve = new OutlookEvent();
        /** @var EventsGroup $eventGroup */
        $eventGroup = new EventsGroup([$eve]);
        $counter = 0;
        foreach ($eventGroup as $event){
            $counter ++;
            $this->assertNotEmpty($event);
        }
        $this->assertEquals(1,$counter);
    }

//    function testWhile() {
//        $eventGroup = new EventsGroup([]);
//        while($eventGroup->valid()){
//            $event = $eventGroup->current();
//            $eventGroup->next();
//        }
//    }
}