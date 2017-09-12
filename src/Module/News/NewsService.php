<?php
declare(strict_types = 1);

namespace Project\Module\News;

use Project\Module\Database\Database;
use Project\Module\Event\EventService;

class NewsService
{
    /** @var  NewsFactory $newsFactory */
    protected $newsFactory;

    /** @var  NewsRepository $newsRepository */
    protected $newsRepository;

    /** @var EventService $eventService */
    protected $eventService;

    public function __construct(Database $database, EventService $eventService)
    {
        $this->newsFactory = new NewsFactory();
        $this->newsRepository = new NewsRepository($database);
        $this->eventService = new EventService($database);
    }

    public function getAllNewsOrderByDate(): array
    {
        $news = [];

        $newsResult = $this->newsRepository->getAllNews();

        if (count($newsResult) === 0) {
            return $news;
        }

        foreach ($newsResult as $singleNews) {
            if (isset($singleNews->eventId) && !empty($singleNews->eventId)) {
                $event = $this->eventService->getEventByEventId($singleNews->eventId);

                $news[] = $this->newsFactory->getNewsWithEventFromObject($singleNews, $event);
            } else {
                $news[] = $this->newsFactory->getNewsFromObject($singleNews);
            }
        }

        return $news;
    }

}