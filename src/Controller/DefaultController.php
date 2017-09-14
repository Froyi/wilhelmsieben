<?php

namespace Project\Controller;

use Project\Configuration;
use Project\Module\Database\Database;
use Project\Module\Event\EventService;
use Project\Module\GenericValueObject\Date;
use Project\Module\SoupCalendar\SoupCalendarService;
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

    protected $valueObjectService;

    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        $this->configuration = new Configuration();
        $this->viewRenderer = new ViewRenderer($this->configuration);
        $this->database = Database::getInstance();

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
        $eventService = new EventService($this->database);
        $events = $eventService->getUpcommingEvents();
        $events = $eventService->sortEventByDateArray($events);

        $this->viewRenderer->addViewConfig('events', $events);

        /**
         * Soup Data
         */
        $soupCalendarService = new SoupCalendarService($this->database);
        $dailySoups = $soupCalendarService->getDailySoup();

        $soupData = [
            'soups' => $dailySoups,
            'date' => Date::fromValue('now')
        ];

        $this->viewRenderer->addViewConfig('dailySoup', $soupData);
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