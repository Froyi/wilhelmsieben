<?php

namespace Project\Controller;


use Project\Module\Database\Database;
use Project\Module\Event\EventService;
use Project\Module\GenericValueObject\Date;
use Project\Module\News\NewsService;
use Project\Module\SoupCalendar\SoupCalendarService;

class IndexController extends DefaultController
{
    public function indexAction(): void
    {
        /** @var Database $database */
        $database = Database::getInstance();

        /**
         * Services
         */
        $eventService = new EventService($database);
        $newsService = new NewsService($database, $eventService);

        /**
         * News Data
         */
        $allNews = $newsService->getAllNewsOrderByDate();

        /**
         * Slider images
         */
        $slider = $this->configuration->getEntryByName('slider');
        shuffle($slider);

        /**
         * Soup Data
         */
        $soupCalendarService = new SoupCalendarService($database);
        $dailySoups = $soupCalendarService->getDailySoup();

        /**
         * Events
         */
        $events = $eventService->getUpcommingEvents();
        $events = $eventService->sortEventByDateArray($events);

        /**
         * Template & Config
         */
        $pageTemplate = 'index.twig';
        $config = [
            'page' => 'home',
            'news' => $allNews,
            'slider' => $slider,
            'dailySoup' => [
                'soups' => $dailySoups,
                'date' => Date::fromValue('now')
            ],
            'events' => $events
        ];

        $this->viewRenderer->renderTemplate($pageTemplate, $config);
    }
}