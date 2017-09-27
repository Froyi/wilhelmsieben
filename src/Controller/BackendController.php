<?php

namespace Project\Controller;

use Project\Module\User\User;
use Project\Utilities\Tools;

class BackendController extends DefaultController
{
    /** @var  User */
    protected $loggedInUser;

    public function __construct()
    {
        parent::__construct();

        if ($this->loggedInUser === null) {
            $this->showStandardPage('notfound');
        }
    }

    public function loggedinAction(): void
    {
        $this->showStandardPage('loggedin');
    }

    public function logoutAction(): void
    {
        if ($this->userService->logoutUser($this->loggedInUser)) {
            $this->viewRenderer->removeViewConfig('loggedInUser');
        };

        /** redirect because of logout action */
        header('Location: ' . Tools::getRouteUrl('index'));
    }
}