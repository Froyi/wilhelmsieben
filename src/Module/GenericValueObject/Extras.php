<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;

/**
 * Class Extras
 *
 * optional parameter for textareas (here booking extras)
 *
 * @package Project\Module\GenericValueObject
 */
class Extras
{
    /** @var string $extras */
    protected $extras;

    /**
     * Extras constructor.
     * @param string $extras
     */
    protected function __construct(string $extras)
    {
        $this->extras = $extras;
    }

    /**
     * @param string $extras
     * @return Extras
     */
    public static function fromString(string $extras): self
    {
        $extras = self::convertExtras($extras);

        return new self($extras);
    }

    /**
     * @param string $extras
     * @return string
     */
    protected static function convertExtras(string $extras): string
    {
        return trim($extras);
    }

    /**
     * @return string
     */
    public function getExtras(): string
    {
        return $this->extras;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->extras;
    }
}

