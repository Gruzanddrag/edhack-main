<?php


namespace App\Entity;


class JobResponseStatus
{
    /**
     * @var string
     */
    private $statusName;

    /**
     * JobResponseStatus constructor.
     * @param $status
     */
    public function __construct($status)
    {
        switch ($status) {
            case (InternshipResponse::STATUS_ACTIVE):
                $this->statusName = 'Активный';
                break;
            case (InternshipResponse::STATUS_ACCEPTED):
                $this->statusName = 'Принято';
                break;
            case (InternshipResponse::STATUS_DENY):
                $this->statusName = 'Отклонено';
                break;
        }
    }

    public function __toString()
    {
        return $this->statusName;
    }
}