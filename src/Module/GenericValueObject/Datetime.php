<?php
declare (strict_types = 1);

namespace Project\Module\GenericValueObject;

abstract class Datetime
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /** @var  \DateTime $datetime */
    protected $datetime;

    /**
     * @return string
     */
    abstract public function __toString(): string;

    /**
     * @return string
     */
    abstract public function toString(): string;

    /**
     * Datetime constructor.
     * @param $datetime
     */
    protected function __construct($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return bool
     */
    protected function isPastDatetime(): bool
    {
        return !($this->datetime > time());
    }

    /**
     * @param string $format
     * @return false|string
     */
    public function toDateFormat(string $format) {
        return date($format, $this->datetime);
    }

    /**
     * @param Datetime $datetimeInput
     * @return bool
     */
    public function equals(Datetime $datetimeInput): bool
    {
        return ($datetimeInput->toString() === $this->toString());
    }

    /**
     * @param $datetime
     * @return Datetime
     */
    public static function fromValue($datetime): self
    {
        self::ensureDatetimeIsValid($datetime);

        $datetime = self::convertDatetime($datetime);

        return new static($datetime);
    }

    /**
     * @param $datetime
     */
    protected static function ensureDatetimeIsValid($datetime): void
    {
        $datetime = strtotime($datetime);

        if ($datetime === false) {
            throw new \InvalidArgumentException('Datetime konnte nicht umgewandelt werden');
        }
    }

    /**
     * @param $datetime
     * @return int
     */
    protected static function convertDatetime($datetime): int
    {
        return strtotime($datetime);
    }
}
