<?php

enum Category: string
{
    case FRENCH = 'french';
    case SPANISH = 'spanish';

    public function id(): int
    {
        return match($this) {
            self::FRENCH => 1,
            self::SPANISH => 2,
        };
    }

    public function name(): string
    {
        return match ($this) {
            self::FRENCH => 'French',
            self::SPANISH => 'Spanish',
        };
    }

    public function slug(): string
    {
        return match ($this) {
            self::FRENCH => 'french',
            self::SPANISH => 'spanish',
        };
    }

    public static function fromId(int $id): ?self
    {
        return match ($id) {
            1 => self::FRENCH,
            2 => self::SPANISH,
            default => null,
        };
    }
}
