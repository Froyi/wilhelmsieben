<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;

class PasswordHash
{
    const CRYPTER = PASSWORD_BCRYPT;

    protected $passwordHash;

    protected function __construct(string $passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    public static function fromPassword(Password $clearPassword): self
    {
        return new self(self::generatePasswordHash($clearPassword));
    }

    public static function fromString(string $passwordHash): self
    {
        self::ensurePasswordHashIsValid($passwordHash);

        return new self($passwordHash);
    }

    protected static function generatePasswordHash(Password $clearPassword): string
    {
        return password_hash($clearPassword->getPassword(), self::CRYPTER);
    }

    protected static function ensurePasswordHashIsValid(string $passwordHash): void
    {
        if (strlen($passwordHash) !== 60) {
            throw new \InvalidArgumentException('Dieser PasswordHash ist nicht valide!', 1);
        }
    }

    public function verifyPassword(Password $toVerifyPassword): bool
    {
        return password_verify($toVerifyPassword->getPassword(), $this->passwordHash);
    }

    public function getPassword(): string
    {
        return $this->passwordHash;
    }

    public function __toString(): string
    {
        return $this->passwordHash;
    }
}

