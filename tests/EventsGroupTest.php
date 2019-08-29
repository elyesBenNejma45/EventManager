<?php


namespace App\Tests;


use App\Model\EventsGroup;
use PHPUnit\Framework\TestCase;

class EventsGroupTest extends TestCase
{
    function testForEach(){
        /** @var EventsGroup $eventGroup */
        $eventGroup = new EventsGroup();
        foreach ($eventGroup as $event){
            $this->assertNotEmpty($event);
        }
    }
}