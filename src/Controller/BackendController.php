<?php

namespace Project\Controller;

use Project\Module\GenericValueObject\Email;
use Project\Module\GenericValueObject\Password;
use Project\Module\GenericValueObject\PasswordHash;
use Project\Module\User\UserService;
use Project\Utilities\Tools;

class BackendController extends DefaultController
{
    public function reservierungAddAction(): void
    {
        var_dump($_POST);
    }

    public function loginRedirectAction(): void
    {
        $userService = new UserService($this->database);

        $password = Password::fromString(Tools::getValue('password'));
        $email = Email::fromString(Tools::getValue('email'));
        $user = $userService->getLogedInUserByEmailAndPassword($email, $password);

        if ($user !== null) {
            $this->showStandardPage('loggedin');
        }
    }

    public function loginAction(): void
    {
        $this->showStandardPage('login');
    }
}