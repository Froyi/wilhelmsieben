<?php

namespace Project\Controller;


use Project\Module\Event\EventService;
use Project\Module\News\NewsService;

class IndexController extends DefaultController
{
    /**
     * Index Action for landing page
     */
    public function indexAction(): void
    {
        $eventService = new EventService($this->database);
        $newsService = new NewsService($this->database, $eventService);

        /** News */
        $allNews = $newsService->getAllNewsOrderByDate();

        $this->viewRenderer->addViewConfig('news', $allNews);

        /** Slider */
        $slider = $this->configuration->getEntryByName('slider');
        shuffle($slider);

        $this->viewRenderer->addViewConfig('slider', $slider);

        $this->viewRenderer->addViewConfig('page', 'home');

        $this->viewRenderer->renderTemplate();
    }

    public function newsPageAction(): void
    {
        // $eventService = new EventService($this->database);
        // $newsService = new NewsService($this->database, $eventService);

        // $news = $newsService->getNewsByNewsId();
    }
}