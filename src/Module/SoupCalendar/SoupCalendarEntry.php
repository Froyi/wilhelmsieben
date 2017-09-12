<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;

use Project\Module\GenericValueObject\DateInterface;

class SoupCalendarEntry
{
    /** @var  Soup $soup */
    protected $soup;

    /** @var  DateInterface $date */
    protected $date;

    /**
     * SoupCalendarEntry constructor.
     * @param Soup $soup
     * @param DateInterface $date
     */
    protected function __construct(Soup $soup, DateInterface $date)
    {
      $this->soup = $soup;
      $this->date = $date;
    }

    /**
     * @param Soup $soup
     * @param DateInterface $date
     * @return SoupCalendarEntry
     */
    public static function generateSoupCalendarEntry(Soup $soup, DateInterface $date): self
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
     * @return DateInterface
     */
    public function getDate(): DateInterface
    {
        return $this->date;
    }


}