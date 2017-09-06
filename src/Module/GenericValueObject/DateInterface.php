<?php
declare(strict_types = 1);

namespace Project\Module\GenericValueObject;

interface DateInterface
{
    public function getWeekday(): int;
}