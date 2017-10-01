<?php

namespace Project\Controller;

use Project\Module\Galerie\GalerieService;
use Project\Module\GenericValueObject\Id;
use Project\Module\News\NewsService;
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
        /**
         * News holen
         */
        $newsService = new NewsService($this->database, $this->eventService);
        $allNews = $newsService->getAllNewsOrderByDate();

        $this->viewRenderer->addViewConfig('news', $allNews);

        /**
         * Galerie holen
         */
        $galerieService = new GalerieService($this->database);
        $galleries = $galerieService->getAllGaleriesWithImags();

        $this->viewRenderer->addViewConfig('galleries', $galleries);

        $this->viewRenderer->addViewConfig('page', 'loggedin');

        $this->viewRenderer->renderTemplate();
    }

    public function logoutAction(): void
    {
        if ($this->userService->logoutUser($this->loggedInUser)) {
            $this->viewRenderer->removeViewConfig('loggedInUser');
        };

        /** redirect because of logout action */
        header('Location: ' . Tools::getRouteUrl('index'));
    }

    public function newsEditAction(): void
    {
        if (Tools::getValue('newsId') !== false) {
            $newsService = new NewsService($this->database, $this->eventService);

            $newsId = Id::fromString(Tools::getValue('newsId'));

            $news = $newsService->getNewsByNewsId($newsId);
            if ($news !== null) {
                $this->viewRenderer->addViewConfig('news', $news);
            }
        }

        $this->viewRenderer->addViewConfig('page', 'newsedit');
        $this->viewRenderer->renderTemplate();
    }

    public function newsEditSaveAction(): void
    {
    }
}