<?php
declare (strict_types=1);

namespace Project\Controller;

use Project\Module\Album\AlbumService;
use Project\Module\GenericValueObject\Email;
use Project\Module\GenericValueObject\Id;
use Project\Module\GenericValueObject\Password;
use Project\Module\News\NewsService;
use Project\Utilities\Tools;

/**
 * Class IndexController
 * @package Project\Controller
 */
class IndexController extends DefaultController
{
    /**
     * Index Action for landing page
     */
    public function indexAction(): void
    {
        try {
            $newsService = new NewsService($this->database, $this->eventService);

            /** News */
            $newsConfiguration = $this->configuration->getEntryByName('news');
            $showNews = $newsService->getNewsWithMinNewsShownAndMaxAgeOfNews($newsConfiguration['minNewsShown'],
                $newsConfiguration['maxAgeOfNewsInDays']);

            $this->viewRenderer->addViewConfig('news', $showNews);

            $showArchiveLink = $newsService->isArchiveLinkNeeded($newsConfiguration['minNewsShown'],
                $newsConfiguration['maxAgeOfNewsInDays']);

            $this->viewRenderer->addViewConfig('showArchiveLink', $showArchiveLink);

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

    /**
     *
     */
    public function newsPageAction(): void
    {
        try {
            $newsService = new NewsService($this->database, $this->eventService);

            $newsId = Id::fromString(Tools::getValue('newsId'));

            $news = $newsService->getNewsByNewsId($newsId);

            $this->viewRenderer->addViewConfig('news', [$news]);

            $this->viewRenderer->addViewConfig('page', 'news');

            $this->viewRenderer->renderTemplate();
        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }

    /**
     *
     */
    public function anfahrtAction(): void
    {
        $this->showStandardPage('anfahrt');
    }

    /**
     *
     */
    public function impressumAction(): void
    {
        $this->showStandardPage('impressum');
    }

    /**
     *
     */
    public function philosophieAction(): void
    {
        $this->showStandardPage('philosophie');
    }

    /**
     *
     */
    public function archiveAction(): void
    {
        try {
            $newsService = new NewsService($this->database, $this->eventService);

            /** News */
            $newsConfiguration = $this->configuration->getEntryByName('news');
            $allNews = $newsService->getArchivedNews($newsConfiguration['minNewsShown'],
                $newsConfiguration['maxAgeOfNewsInDays']);

            $this->viewRenderer->addViewConfig('news', $allNews);

            $this->viewRenderer->addViewConfig('page', 'archive');

            $this->viewRenderer->renderTemplate();
        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }

    /**
     *
     */
    public function reservierungAction(): void
    {
        $this->showStandardPage('reservierung');
    }

    /**
     *
     */
    public function albumAction(): void
    {
        try {
            $albumService = new AlbumService($this->database);
            $albums = $albumService->getAllAlbumsWithImages();

            $this->viewRenderer->addViewConfig('albums', $albums);

            $this->viewRenderer->addViewConfig('page', 'album');

            $this->viewRenderer->renderTemplate();

        } catch (\InvalidArgumentException $error) {
            $this->notFoundAction();
        }
    }

    /**
     * @todo insert mail to kontakt@cafewilhelmsieben.de if all dates are valid
     */
    public function reservierungAddAction(): void
    {
        $sentReservierung = false;

        if (empty(Tools::getValue('name')) === false && empty(Tools::getValue('datum')) === false && empty(Tools::getValue('plaetze')) === false) {
            // $to = $this->configuration->getEntryByName('project')['email'];
            /*$to = 'ms2002@onlinehome.de';
            $from = Date::fromValue(Tools::getValue('name'));

            // alfa3205.alfahosting-server.de
            $mailMessage = new Swift_Message();
            $mailMessage->addTo($to);
            $mailMessage->addFrom($from);
            $mailMessage->setBody('Hallo du Maik!');
            $transport = new Swift_SmtpTransport();
            $mailer = new Swift_Mailer($transport);

            $mailer->send($mailMessage);
            $sentReservierung = true;*/
        }


        $this->viewRenderer->addViewConfig('sentReservierung', $sentReservierung);

        $this->viewRenderer->addViewConfig('page', 'reservierung');

        $this->viewRenderer->renderTemplate();
    }

    public function loginRedirectAction(): void
    {
        if ($this->loggedInUser === null) {
            $password = Password::fromString(Tools::getValue('password'));
            $email = Email::fromString(Tools::getValue('email'));
            $this->loggedInUser = $this->userService->getLogedInUserByEmailAndPassword($email, $password);
        }

        if ($this->loggedInUser !== null) {
            $this->redirectToLoggedInPage();
        } else {
            $parameter = ['notificationCode' => 'loginError', 'notificationStatus' => 'error'];
            header('Location: ' . Tools::getRouteUrl('login', $parameter));
        }
    }

    public function loginAction(): void
    {
        if ($this->loggedInUser !== null) {
            $this->redirectToLoggedInPage();
        } else {
            $this->showStandardPage('login');
        }
    }

    protected function redirectToLoggedInPage(): void
    {
        header('Location: ' . Tools::getRouteUrl('loggedin'));
    }
}