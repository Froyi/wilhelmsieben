<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;


use Project\Module\GenericValueObject\Date;

class SoupCalendarEntry
{
    /** @var  Soup $soup */
    protected $soup;

    /** @var  Date $date */
    protected $date;

    /**
     * SoupCalendarEntry constructor.
     * @param Soup $soup
     * @param Date $date
     */
    protected function __construct(Soup $soup, Date $date)
    {
      $this->soup = $soup;
      $this->date = $date;
    }

    /**
     * @param Soup $soup
     * @param Date $date
     * @return SoupCalendarEntry
     */
    public static function generateSoupCalendarEntry(Soup $soup, Date $date): self
    {
        return new self($soup, $date);
    }

    /**
     * @return Soup
     */
    public function getSoup(): Soup
    {
        return $this->soup;
    }

    /**
     * @return Date
     */
    public function getDate(): Date
    {
        return $this->date;
    }


}