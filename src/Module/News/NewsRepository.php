<?php
declare(strict_types=1);

namespace Project\Module\News;

use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Id;

class NewsRepository
{
    const TABLE = 'news';

    const ORDERBY = 'newsDate';

    const ORDERKIND = 'DESC';

    const IDENTIFIER = 'newsId';

    /** @var  Database $database */
    protected $database;

    /**
     * NewsRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    /**
     * @return array
     */
    public function getAllNews(): array
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->orderBy(self::ORDERBY, self::ORDERKIND);

        return $this->database->fetchAll($query);
    }

    /**
     * @param Id $newsId
     * @return mixed
     */
    public function getNewsByNewsId(Id $newsId)
    {
        $query = $this->database->getNewSelectQuery(self::TABLE);
        $query->where('newsId', '=', $newsId->toString());

        return $this->database->fetch($query);
    }

    /**
     * @param News $news
     * @return bool
     */
    public function saveNews(News $news): bool
    {
        if (!empty($this->getNewsByNewsId($news->getNewsId()))) {
            $query = $this->database->getNewUpdateQuery(self::TABLE);
            $query->set('newsId', $news->getNewsId()->toString());
            $query->set('title', $news->getTitle()->getTitle());
            $query->set('text', $news->getText()->getText());
            $query->set('newsDate', $news->getDate()->toString());

            if ($news->hasEvent() === true) {
                $query->set('eventId', $news->getEvent()->getEventId()->toString());
            } else {
                $query->set('eventId', '');
            }

            if ($news->getImage() !== null) {
                $query->set('image', $news->getImage()->toString());
            } else {
                $query->set('image', '');
            }

            if ($news->getFacebookLink() !== null) {
                $query->set('facebookLink', $news->getFacebookLink()->toString());
            } else {
                $query->set('facebookLink', '');
            }

            $query->where('newsId', '=', $news->getNewsId()->toString());

            return $this->database->execute($query);
        }

        $query = $this->database->getNewInsertQuery(self::TABLE);
        $query->insert('newsId', $news->getNewsId()->toString());
        $query->insert('title', $news->getTitle()->getTitle());
        $query->insert('text', $news->getText()->getText());
        $query->insert('newsDate', $news->getDate()->toString());

        if ($news->hasEvent() === true) {
            $query->insert('eventId', $news->getEvent()->getEventId()->toString());
        } else {
            $query->insert('eventId', '');
        }

        if ($news->getImage() !== null) {
            $query->insert('image', $news->getImage()->toString());
        } else {
            $query->insert('image', '');
        }

        if ($news->getFacebookLink() !== null) {
            $query->insert('facebookLink', $news->getFacebookLink()->toString());
        } else {
            $query->insert('facebookLink', '');
        }

        return $this->database->execute($query);
    }
}