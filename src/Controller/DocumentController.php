<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\ControllerTrait;
use Swagger\Annotations as SWG;

class DocumentController extends AbstractController
{

    use ControllerTrait;

    private $repository;

    function __construct()
    {

        
    };



    /**
     * @return FOS\RestBundle\View\View
     * @Rest\Get("/document", name="get_document")
     * @SWG\Get(
     *      tags={"Document"},
     *      summary="Gets the all documents",
     *      consumes={"application/json"},
     *      produces={"application/json"}
     *      @SWG\Response(response=200, description="Return when succcessful"),
     *      @SWG\Response(response=404, description="Returned when document is not found").
     * )
     */
    public function getDocument()
    {
        $data = ["message" => "Welcome"];
        $view = $this->view($data, Response::HTTP_OK);

        return $view;
    }
}
