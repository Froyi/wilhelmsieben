<?php

namespace Project\Controller;

use Project\Configuration;
use Project\Module\Database\Database;
use Project\Module\Event\EventService;
use Project\Module\GenericValueObject\Id;
use Project\Module\User\User;
use Project\Module\User\UserService;
use Project\Utilities\Tools;
use Project\View\ViewRenderer;

/**
 * Class DefaultController
 * @package Project\Controller
 */
class DefaultController
{
    /** @var ViewRenderer $viewRenderer */
    protected $viewRenderer;

    /** @var Configuration $configuration */
    protected $configuration;

    /** @var Database $database */
    protected $database;

    /** @var  User $loggedInUser */
    protected $loggedInUser;

    /** @var  UserService $userService */
    protected $userService;

    /** @var  EventService $eventService */
    protected $eventService;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->configuration = new Configuration();
        $this->viewRenderer = new ViewRenderer($this->configuration);
        $this->database = new Database($this->configuration);
        $this->userService = new UserService($this->database);

        if (Tools::getValue('userId') !== false) {
            $userId = Id::fromString(Tools::getValue('userId'));
            $this->loggedInUser = $this->userService->getLogedInUserByUserId($userId);
        }

        $this->setDefaultViewConfig();
    }

    /**
     * Sets default view parameter for sidebar etc.
     */
    protected function setDefaultViewConfig(): void
    {
        $this->viewRenderer->addViewConfig('page', 'notfound');

        /**
         * Events
         */
        $this->eventService = new EventService($this->database);
        $events = $this->eventService->getUpcommingEvents();
        $events = $this->eventService->sortEventByDateArray($events);

        $this->viewRenderer->addViewConfig('events', $events);

        /**
         * Logged In User
         */
        if ($this->loggedInUser !== null) {
            $this->viewRenderer->addViewConfig('loggedInUser', $this->loggedInUser);
        }
    }

    public function notFoundAction(): void
    {
        $this->viewRenderer->addViewConfig('page', 'notfound');

        $this->viewRenderer->renderTemplate();
    }

    public function errorPageAction(): void
    {
        $this->showStandardPage('error');
    }

    protected function showStandardPage(string $name): void
    {
        try {
            $this->viewRenderer->addViewConfig('page', $name);

            $this->viewRenderer->renderTemplate();
        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }
}