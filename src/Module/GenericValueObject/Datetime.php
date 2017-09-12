<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;


class Datetime extends AbstractDatetime implements DatetimeInterface
{
    const DATE_FORMAT = 'Y-m-d H:s';

    const DATE_OUTPUT_FORMAT = 'd.m.Y H:s';

    const WEEKDAY_FORMAT = 'w';

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)date(self::DATE_OUTPUT_FORMAT, $this->datetime);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)date(self::DATE_FORMAT, $this->datetime);
    }

    /**
     * @return int
     */
    public function getWeekday(): int
    {
        return (int)date(self::WEEKDAY_FORMAT, $this->datetime);
    }

    /**
     * @param $datetime
     * @return AbstractDatetime|DatetimeInterface
     */
    public static function fromValue($datetime)
    {
        return parent::fromValue($datetime);
    }
}