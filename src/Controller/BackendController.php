<?php

namespace Project\Controller;

use Project\Module\Galerie\GalerieService;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Image;
use Project\Module\News\News;
use Project\Module\News\NewsService;
use Project\Module\User\User;
use Project\Routing;
use Project\Utilities\Tools;

class BackendController extends DefaultController
{
    /** @var  User */
    protected $loggedInUser;

    public function __construct()
    {
        parent::__construct();

        if ($this->loggedInUser === null) {
            $this->showStandardPage(Routing::ERROR_ROUTE);
        }
    }

    /**
     * backend main site action
     */
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

        /**
         * Events holen
         */
        $allEvents = $this->eventService->getAllEvents();

        $this->viewRenderer->addViewConfig('allEvents', $allEvents);

        $this->viewRenderer->addViewConfig('page', 'loggedin');

        if ($this->notification->getNotificationMessage() !== null) {
            $this->viewRenderer->addViewConfig('notificationStatus', $this->notification->getNotificationStatus());
            $this->viewRenderer->addViewConfig('notificationMessage', $this->notification->getNotificationMessage());
        }

        $this->viewRenderer->renderTemplate();
    }

    /**
     * logout user
     */
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
        /** add news to template if one should be edit */
        if (Tools::getValue('newsId') !== false) {
            $newsService = new NewsService($this->database, $this->eventService);

            $newsId = Id::fromString(Tools::getValue('newsId'));

            $news = $newsService->getNewsByNewsId($newsId);
            if ($news !== null) {
                $this->viewRenderer->addViewConfig('news', $news);
            }
        }

        /** @var array $allEvents */
        $allEvents = $this->eventService->getAllEvents();
        $this->viewRenderer->addViewConfig('allEvents', $allEvents);

        $this->viewRenderer->addViewConfig('page', 'newsedit');
        $this->viewRenderer->renderTemplate();
    }

    /**
     * news save action
     */
    public function newsEditSaveAction(): void
    {
        /** @var null|Image $image */
        $image = null;
        if (Tools::getFile('image') !== false) {
            $image = Image::fromUploadWithSave(Tools::getFile('image'), Image::PATH_NEWS);
        } else if (Tools::getValue('imagePath') !== false && Tools::getValue('deleteImage') === false) {
            $image = Image::fromFile(Tools::getValue('imagePath'));
        }

        /** @var NewsService $newsService */
        $newsService = new NewsService($this->database, $this->eventService);

        /** @var News $news */
        $news = $newsService->getNewsByParams($_POST, $image);

        /** @var array $parameter */
        $parameter = ['notificationCode' => 'newsEditError', 'notificationStatus' => 'error'];
        if ($newsService->saveNews($news) === true) {
            $parameter = ['notificationCode' => 'newsEditSuccess', 'notificationStatus' => 'success'];
        }

        header('Location: ' . Tools::getRouteUrl('loggedin', $parameter));
    }

    /**
     * news delete action
     */
    public function newsDeleteAction(): void
    {
        $parameter = ['notificationCode' => 'newsDeleteError', 'notificationStatus' => 'error'];
        if (Tools::getValue('newsId') !== false) {
            $newsService = new NewsService($this->database, $this->eventService);

            $newsId = Id::fromString(Tools::getValue('newsId'));

            $news = $newsService->getNewsByNewsId($newsId);
            if ($news !== null) {

                if ($newsService->deleteNews($news) === true) {
                    $parameter = ['notificationCode' => 'newsDeleteSuccess', 'notificationStatus' => 'success'];
                }
            }
        }

        header('Location: ' . Tools::getRouteUrl('loggedin', $parameter));
    }

    /**
     * event edit action
     */
    public function eventEditAction(): void
    {
        if (Tools::getValue('eventId') !== false) {
            $eventId = Id::fromString(Tools::getValue('eventId'));

            $event = $this->eventService->getEventByEventId($eventId);

            if ($event !== null) {
                $this->viewRenderer->addViewConfig('event', $event);
            }
        }

        $this->viewRenderer->addViewConfig('page', 'eventedit');
        $this->viewRenderer->renderTemplate();
    }

    /**
     * event save action
     */
    public function eventEditSaveAction(): void
    {
        $event = $this->eventService->getEventByParams($_POST);

        $parameter = ['notificationCode' => 'eventEditError', 'notificationStatus' => 'error'];

        if ($this->eventService->saveEvent($event) === true) {
            $parameter = ['notificationCode' => 'eventEditSuccess', 'notificationStatus' => 'success'];
        }

        header('Location: ' . Tools::getRouteUrl('loggedin', $parameter));
    }

    /**
     * event delete action
     */
    public function eventDeleteAction(): void
    {
        $parameter = ['notificationCode' => 'eventDeleteError', 'notificationStatus' => 'error'];

        if (Tools::getValue('eventId') !== false) {
            $eventId = Id::fromString(Tools::getValue('eventId'));

            $event = $this->eventService->getEventByEventId($eventId);

            if ($event !== null) {
                if ($this->eventService->deleteEvent($event) === true) {
                    $newsService = new NewsService($this->database, $this->eventService);

                    if ($newsService->deleteDeletedEventInNews($event) === true) {
                        $parameter = ['notificationCode' => 'eventDeleteSuccess', 'notificationStatus' => 'success'];
                    }
                }
            }
        }

        header('Location: ' . Tools::getRouteUrl('loggedin', $parameter));
    }
}