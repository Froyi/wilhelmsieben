<?php
declare (strict_types = 1);

namespace Project\Module\GenericValueObject;

class Datetime
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /** @var  \DateTime $datetime */
    protected $datetime;

    /**
     * @return mixed
     */
    public function __toString(): string
    {
        return (string) date(self::DATE_FORMAT, $this->datetime);
    }


    public function toString(): string
    {
        return (string) date(self::DATE_FORMAT, $this->datetime);
    }

    protected function __construct($datetime)
    {
        $this->datetime = $datetime;
    }

    protected function isPastDatetime(): bool
    {
        return !($this->datetime > time());
    }

    public function toDateFormat(string $format) {
        return date($format, $this->datetime);
    }

    public function equals(Datetime $datetimeInput): bool
    {
        return ($datetimeInput->toString() === $this->toString());
    }

    public static function fromValue($datetime): self
    {
        self::ensureDatetimeIsValid($datetime);

        $datetime = self::convertDatetime($datetime);

        return new static($datetime);
    }

    protected static function ensureDatetimeIsValid($datetime): void
    {
        $datetime = strtotime($datetime);

        if ($datetime === false) {
            throw new \InvalidArgumentException('Datetime konnte nicht umgewandelt werden');
        }
    }

    protected static function convertDatetime($datetime): int
    {
        return strtotime($datetime);
    }
}
