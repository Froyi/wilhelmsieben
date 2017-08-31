<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;


use Project\Module\Soup\Soup;

class SoupCalendar
{
    /** @var  array $soupCalendar */
    protected $soupCalendar;

    public static function generateSoupCalendar(array $soups, array $dates): self
    {
        self::ensureSoupCalendarValuesAreValid($soups, $dates);

        return new self($soups, $dates);
    }

    private static function ensureSoupCalendarValuesAreValid(array $soups, array $dates): void
    {
        if (count($soups) !== count($dates)) {
            throw new \InvalidArgumentException('Arrays are different long!');
        }

        foreach ($soups as $soup) {
            if ($soup instanceof Soup === false) {
                throw new \InvalidArgumentException('Not all soups are real soups');
            }
        }

        foreach ($dates as $date) {
            if ($date instanceof \DateTime) {
                throw new \InvalidArgumentException('Not all Dates are valid');
            }
        }
    }

    protected function __construct(array $soups, array $dates)
    {
        foreach ($soups as $key => $soup) {
            $this->addSoupToCalendar($soup, $dates[$key]);
        }
    }

    public function isSoupInCalendar(Soup $soup, \DateTime $date): bool
    {
        if (isset($this->soupCalendar[$date]) && $this->soupCalendar[$date] === $soup) {
            return true;
        }

        return false;
    }

    /**
     * @todo proof how you can output datetime to valid format
     * @param Soup $soup
     * @param \DateTime $date
     */
    public function addSoupToCalendar(Soup $soup, \DateTime $date): void
    {
        if ($this->isSoupInCalendar($soup, $date) === false) {
            $this->soupCalendar[$date] = $soup;
        }
    }

    public function getSoupCalendar(): array
    {
        return $this->soupCalendar;
    }
}