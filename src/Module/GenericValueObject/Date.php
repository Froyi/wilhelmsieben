<?php
declare(strict_types = 1);

namespace Project\Module\GenericValueObject;


class Date extends Datetime
{
    const DATE_FORMAT = 'Y-m-d';

    const DATE_OUTPUT_FORMAT = 'd.m.Y';

    const WEEKDAY_FORMAT = 'w';

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) date(self::DATE_OUTPUT_FORMAT, $this->datetime);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string) date(self::DATE_FORMAT, $this->datetime);
    }

    public function getWeekday(): int
    {
        return (int) date(self::WEEKDAY_FORMAT, $this->datetime);
    }
}