<?php

namespace App\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\ControllerTrait;

class DocumentController extends AbstractController
{

    use ControllerTrait;
    /**
     * @return FOS\RestBundle\View\View
     * @Rest\Get("/document")
     */
    public function getDocument()
    {
        $data = ["message" => "Welcome"];
        $view = $this->view($data, Response::HTTP_OK);

        return $view;
    }
}
