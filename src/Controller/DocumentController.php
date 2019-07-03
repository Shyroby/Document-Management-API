<?php

namespace App\Controller;

use App\Entity\Document;
use FOS\RestBundle\View\View;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class DocumentController extends AbstractFOSRestController
{  

    /**
     * 
     * @Rest\Get("/document", name="get_document")
     * @SWG\Get(
     *      tags={"Document"},
     *      summary="Gets the all documents",
     *      consumes={"application/json"},
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Return when succcessful"),
     *      @SWG\Response(response=404, description="Returned when document is not found")
     * )
     */
    public function getDocument()
    {
        $documents = $this->getDoctrine()
            ->getRepository(Document::class)
            ->findAll();
        
            return View::create($documents, Response::HTTP_ACCEPTED);
    }
}
