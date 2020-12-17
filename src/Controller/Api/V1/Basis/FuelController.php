<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Fuel;
use App\Form\Basis\FuelType;
use App\Repository\Basis\FuelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/fuels", name="api_v1_fuel_")
 */
class FuelController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(FuelRepository $fuelRepository): Response
    {
        $fuels = $fuelRepository->findAll();
        return $this->json($fuels, 200, [], [
            'groups' => 'fuel',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Fuel $fuel): Response
    {
        return $this->json($fuel, 200, [], [
            'groups' => 'fuel',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedFuel = json_decode($request->getContent(), true);

        $fuel = new Fuel();
        $form = $this->createForm(FuelType::class, $fuel, ['csrf_protection' => false]);

        $form->submit($postedFuel);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fuel);
            $em->flush();

            return $this->json($fuel, 201, [], [
                'groups' => 'fuel',
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
    public function edit(Fuel $fuel, Request $request)
    {
        $postedFuel = json_decode($request->getContent(), true);

        $form = $this->createForm(FuelType::class, $fuel, ['csrf_protection' => false]);
        $form->submit($postedFuel);

        if ($form->isValid()) {
            $fuel->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($fuel, 200, [], [
                'groups' => 'fuel',
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
    public function delete(Fuel $fuel)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($fuel);
        $em->flush();

        return $this->json(null, 204);
    }
}
