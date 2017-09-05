<?php
declare(strict_types = 1);

namespace Project\Utilities;


class Converter
{
    const GERMAN_WEEKDAYS = [
        0 => 'Sonntag',
        1 => 'Montag',
        2 => 'Dienstag',
        3 => 'Mittwoch',
        4 => 'Donnerstag',
        5 => 'Freitag',
        6 => 'Samstag'
    ];

    public static function convertIntToWeekday(int $day): string
    {
        if ($day < 0 && $day > 6) {
            throw new \InvalidArgumentException('Der Wochentag liegt außerhalb des Bereiches.');
        }

        return self::GERMAN_WEEKDAYS[$day];
    }
}