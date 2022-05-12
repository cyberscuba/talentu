<?php

namespace App\Controller;

use App\Entity\Offer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferController extends ApiController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createOffer(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        try{

            $offer = new Offer();
            $offer->setName($data['name']);
            $offer->setDescription($data['description']);
            $offer->setEnabled($data['enabled']);

            $this->entityManager->persist($offer);
            $this->entityManager->flush();

            return $this->successResponse([
                "id"      => $offer->getId(),
                "message" => "Created new offer successfully",
                "code"    => Response::HTTP_OK
            ],Response::HTTP_OK);

        } catch(\Exception $exception){

            return $this->errorResponse("An error occurred while saving the offer, please try again later", Response::HTTP_BAD_REQUEST);
        }
    }


    public function createUsersOffer() {

        // Debe relacionar los usuarios con una oferta

    }
}
