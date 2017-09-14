<?php

namespace Project\Controller;

use Project\Module\Event\EventService;
use Project\Module\GenericValueObject\Id;
use Project\Module\News\NewsService;
use Project\Utilities\Tools;

class IndexController extends DefaultController
{
    /**
     * Index Action for landing page
     */
    public function indexAction(): void
    {
        try {
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
        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }

    public function newsPageAction(): void
    {
        try {
            $eventService = new EventService($this->database);
            $newsService = new NewsService($this->database, $eventService);

            $newsId = Id::fromString(Tools::getValue('newsId'));

            $news = $newsService->getNewsByNewsId($newsId);

            $this->viewRenderer->addViewConfig('news', array($news));

            $this->viewRenderer->addViewConfig('page', 'news');

            $this->viewRenderer->renderTemplate();
        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }

    public function anfahrtAction(): void
    {
        $this->showStandardPage('anfahrt');
    }

    public function impressumAction(): void
    {
        $this->showStandardPage('impressum');
    }

    public function philosophieAction(): void
    {
        $this->showStandardPage('philosophie');
    }
}