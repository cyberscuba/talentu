<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends ApiController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        try{

            $user = new User();
            $user->setName($data['name']);
            $user->setEmailAddress($data['document_type']);
            $user->setDocumentNumber($data['email']);
            $user->setEnabled($data['enabled']);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->successResponse([
                "id"      => $user->getId(),
                "message" => "Created new user successfully",
                "code"    => Response::HTTP_OK
            ],Response::HTTP_OK);
        
        } catch(\Exception $exception){

            return $this->errorResponse("An error occurred while saving the user, please try again later", Response::HTTP_BAD_REQUEST);
        }
    }
}
