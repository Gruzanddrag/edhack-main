<?php


namespace App\Controller\API\InternshipResponse;


use App\Entity\Internship;
use App\Entity\InternshipResponse;

class CreateResponse
{

    public function __construct()
    {

    }

    public function __invoke(InternshipResponse $data): InternshipResponse
    {
        // При новой заявке говорим что она активна
        $data->setStatus(InternshipResponse::STATUS_ACTIVE);
        $data->setCreatedAt(time());
        return $data;
    }
}