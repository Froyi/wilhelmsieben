<?php
declare(strict_types=1);

namespace Project\Module\SoupCalendar;

class Soup
{
    /** @var string  */
    protected $soup;

    /**
     * Soup constructor.
     * @param string $soup
     */
    protected function __construct(string $soup)
    {
        $this->soup = $soup;
    }

    /**
     * @param string $soup
     * @return Soup
     */
    public static function fromString(string $soup): self
    {
        self::ensureSoupIsValid($soup);
        $soup = self::convertSoup($soup);

        return new self($soup);
    }

    /**
     * @param string $soup
     */
    protected static function ensureSoupIsValid(string $soup): void
    {
        if (strlen($soup) < 2) {
            throw new \InvalidArgumentException('The soup is not long enough.', 1);
        }
    }

    /**
     * @param string $soup
     * @return string
     */
    protected static function convertSoup(string $soup): string
    {
        return trim($soup);
    }

    /**
     * @return string
     */
    public function getSoup(): string
    {
        return $this->soup;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->soup;
    }
}