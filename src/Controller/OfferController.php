<?php

namespace App\Controller;

use App\Entity\User;
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


    public function createUsersOffer(Request $request) 
    {
        $data = json_decode($request->getContent(), true);
        $validateExistOffer = $this->entityManager->getRepository(Offer::class)->find($data['offer']);
        
        if ($validateExistOffer){
            foreach ($data['users'] as $key => $value) {
            
                if ($validateExistUser = $this->entityManager->getRepository(User::class)->find($value)){
                    $validateExistOffer->addUser($validateExistUser);
                }
            }
            $this->entityManager->flush();
            return $this->successResponse([
                "message" => "Created new user offer successfully",
                "code"    => Response::HTTP_OK
            ],Response::HTTP_OK);
        }else{
            return $this->errorResponse("An error occurred while saving the user offer relation (Offer NOT exists)", Response::HTTP_BAD_REQUEST);

        }            
    }

    public function offerList(Request $request){
        $offerUserList = $this->showAll($this->entityManager->getRepository(Offer::class)->getUserOfferRelation());
        $data = [];

        $offers = $this->entityManager->getRepository(Offer::class)->findAll();

        foreach($offers as $offer){
            $data[] =[
                "offer" => $offer->getName(),
                "users" => $this->entityManager->getRepository(User::class)->getUserByOfferId($offer->getId())
            ];
            
        }
        return $this->showAll($data);
        var_dump($data);

        die('COMMENT BY CAMS...');
        
    }
}
