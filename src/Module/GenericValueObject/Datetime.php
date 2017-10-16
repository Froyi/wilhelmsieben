<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;


class Datetime extends AbstractDatetime implements DatetimeInterface
{
    const DATETIME_FORMAT = 'Y-m-d H:i';

    const FORM_FORMAT = 'Y-m-d\TH:i:s';

    const DATE_FORMAT = 'Y-m-d';

    const DATETIME_OUTPUT_FORMAT = 'd.m.Y H:i';

    const DATE_OUTPUT_FORMAT = 'd.m.Y';

    const TIME_FORMAT = 'H:i';

    const WEEKDAY_FORMAT = 'w';

    /**
     * @param $datetime
     * @return AbstractDatetime|DatetimeInterface
     */
    public static function fromValue($datetime)
    {
        return parent::fromValue($datetime);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)date(self::DATETIME_OUTPUT_FORMAT, $this->datetime);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)date(self::DATETIME_FORMAT, $this->datetime);
    }

    /**
     * @return string
     */
    public function getFormFormat(): string
    {
        return (string)date(self::FORM_FORMAT, $this->datetime);
    }

    /**
     * @return int
     */
    public function getWeekday(): int
    {
        return (int)date(self::WEEKDAY_FORMAT, $this->datetime);
    }

    public function getDate(): string
    {
        return (string)date(self::DATE_FORMAT, $this->datetime);
    }

    public function getDateString(): string
    {
        return (string)date(self::DATE_OUTPUT_FORMAT, $this->datetime);
    }

    public function getTimeString(): string
    {
        return (string)date(self::TIME_FORMAT, $this->datetime);
    }

    public function isOlderThanDays(int $days): bool
    {
        if ($this->datetime < strtotime('-' . $days . ' days')) {
            return true;
        }

        return false;
    }
}