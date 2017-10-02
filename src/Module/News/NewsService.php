<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\Database\Database;
use Project\Module\Event\EventService;
use Project\Module\GenericValueObject\Id;

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
            $news[] = $this->getNewsWithAllAttributes($singleNews);
        }

        return $news;
    }

    public function getNewsByNewsId(Id $newsId): ?News
    {
        $newsResult = $this->newsRepository->getNewsByNewsId($newsId);

        return $this->getNewsWithAllAttributes($newsResult);
    }

    public function getNewsWithMinNewsShownAndMaxAgeOfNews(int $minNewsShown, int $maxAgeOfNews): array
    {
        $newsArray = [];

        $newsResult = $this->getAllNewsOrderByDate();

        foreach ($newsResult as $singleNews) {
            if ($singleNews->getDate()->isOlderThanDays($maxAgeOfNews) === false || count($newsArray) < $minNewsShown) {
                $newsArray[] = $singleNews;
            } else {
                break;
            }
        }

        return $newsArray;
    }

    public function getArchivedNews(int $minNewsShown, int $maxAgeOfNews): array
    {
        $newsArray = [];
        $newsCount = 0;

        $newsResult = $this->getAllNewsOrderByDate();

        foreach ($newsResult as $singleNews) {
            if ($singleNews->getDate()->isOlderThanDays($maxAgeOfNews) === false || $newsCount < $minNewsShown) {
                $newsCount++;
            } else {
                $newsArray[] = $singleNews;;
            }
        }

        return $newsArray;
    }

    public function isArchiveLinkNeeded(int $minNewsShown, int $maxAgeOfNews): bool
    {
        return (count($this->getNewsWithMinNewsShownAndMaxAgeOfNews($minNewsShown, $maxAgeOfNews)) < count($this->getAllNewsOrderByDate()));
    }

    public function getNewsByParams(array $parameter): ?News
    {
        $objectParameter = (object) $parameter;

        return $this->getNewsWithAllAttributes($objectParameter);
    }

    protected function getNewsWithAllAttributes($newsResult): News
    {
        if (isset($newsResult->eventId) && !empty($newsResult->eventId)) {
            $event = $this->eventService->getEventByEventId($newsResult->eventId);

            return $this->newsFactory->getNewsWithEventFromObject($newsResult, $event);
        }

        return $this->newsFactory->getNewsFromObject($newsResult);
    }
}