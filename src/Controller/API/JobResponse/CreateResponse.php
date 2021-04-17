<?php


namespace App\Controller\API\JobResponse;


use App\Entity\JobResponse;

class CreateResponse
{

    public function __construct()
    {
    }

    public function __invoke(JobResponse $data): JobResponse
    {
        // При новой заявке говорим что она активна
        $data->setStatus(JobResponse::STATUS_ACTIVE);
        $data->setCreatedAt(time());
        return $data;
    }
}