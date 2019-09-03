<?php


namespace App\Model;
use App\Entity\OutlookEvent;
use App\Repository\OutlookEventRepository;
use Doctrine\ORM\EntityRepository;
use Iterator;

class EventsGroup implements Iterator
{
    private $pos = 0;
    private $array = array();

    public function __construct($events) {
        $this->pos = 0;
        $this->array= $events;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
        return $this->array[$this->pos];

    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
        ++$this->pos;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->pos;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        return isset($this->array[$this->pos]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->pos = 0;

    }

    private $filters = array();

    public function addFilter($key,$value)
    {
        $this->filters[$key][] = $value;
    }

    public function load(OutlookEventRepository $repository)
    {
        // $this->filters = array('start' => $now, 'location' => 1)
        $this->array = $repository->filterSafe($this->filters);
    }

}