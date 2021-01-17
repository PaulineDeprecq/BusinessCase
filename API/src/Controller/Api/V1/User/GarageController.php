<?php

namespace App\Controller\Api\V1\User;

use App\Entity\User\Garage;
use App\Form\User\GarageType;
use App\Repository\User\GarageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/garages", name="api_v1_garage_")
 */
class GarageController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(GarageRepository $garageRepository): Response
    {
        $garages = $garageRepository->findAll();
        return $this->json($garages, 200, [], [
            'groups' => 'garage',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Garage $garage): Response
    {
        return $this->json($garage, 200, [], [
            'groups' => ['garage', 'garage_extended']
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedGarage = json_decode($request->getContent(), true);

        $garage = new Garage();
        $form = $this->createForm(GarageType::class, $garage, ['csrf_protection' => false]);

        $form->submit($postedGarage);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($garage);
            $em->flush();

            return $this->json($garage, 201, [], [
                'groups' => ['garage', 'garage_extended']
            ]);
        }

        return $this->json([
            'code' => 400,
            'message' => (string) $form->getErrors(true, true),
            ],
            400
        );
    }

    /**
     * @Route("/{id}", name="edit", requirements={"id": "\d+"}, methods={"PUT", "PATCH"})
     */
    public function edit(Garage $garage, Request $request)
    {
        $postedGarage = json_decode($request->getContent(), true);

        $form = $this->createForm(GarageType::class, $garage, ['csrf_protection' => false]);
        $form->submit($postedGarage);

        if ($form->isValid()) {
            $garage->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($garage, 200, [], [
                'groups' => ['garage', 'garage_extended']
            ]);
        }

        return $this->json([
            'code' => 400,
            'message' => (string) $form->getErrors(true, true),
            ],
            400
        );
    }

    /**
     * @Route("/{id}", name="delete", requirements={"id": "\d+"}, methods={"DELETE"})
     */
    public function delete(Garage $garage)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($garage);
        $em->flush();

        return $this->json(null, 204);
    }
}
