<?php
declare(strict_types=1);

namespace Project\Module\User;

use Project\Module\GenericValueObject\Email;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Password;
use Project\Module\GenericValueObject\PasswordHash;

class User
{
    /** @var  Id $userId */
    protected $userId;

    /** @var  Email */
    protected $email;

    /** @var  PasswordHash $passwordHash */
    protected $passwordHash;

    /** @var  bool $isLoggedIn */
    protected $isLoggedIn = false;

    public function __construct(Id $userId, Email $email, PasswordHash $passwordHash)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->isLoggedIn = false;
    }

    /**
     * @return Id
     */
    public function getUserId(): Id
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    public function loginUser(Password $password): bool
    {
        if ($this->passwordHash->verifyPassword($password) === true) {
            $this->loginSuccessUser();

            return true;
        }

        $this->logoutUser();

        return false;
    }

    public function loginUserBySession(): bool
    {
        if (isset($_SESSION['user'][$this->userId->getId()]['loggedIn']) && $_SESSION['user'][$this->userId->getId()]['loggedIn'] === true) {
            $this->loginSuccessUser();

            return true;
        }

        $this->logoutUser();

        return false;
    }

    protected function loginSuccessUser(): void
    {
        $this->isLoggedIn = true;
        $_SESSION['user'][$this->userId->getId()]['loggedIn'] = true;
    }

    protected function logoutUser(): void
    {
        $this->isLoggedIn = false;
        unset($_SESSION['user'][$this->userId->getId()]['loggedIn']);
    }
}