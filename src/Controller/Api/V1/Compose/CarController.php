<?php

namespace App\Controller\Api\V1\Compose;

use App\Entity\Compose\Car;
use App\Form\Compose\CarType;
use App\Repository\Compose\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/cars", name="api_v1_car_")
 */
class CarController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();
        return $this->json($cars, 200, [], [
            'groups' => 'car',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Car $car): Response
    {
        return $this->json($car, 200, [], [
            'groups' => 'car',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedCar = json_decode($request->getContent(), true);

        $car = new Car();
        $form = $this->createForm(CarType::class, $car, ['csrf_protection' => false]);

        $form->submit($postedCar);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();

            return $this->json($car, 201, [], [
                'groups' => 'car',
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
    public function edit(Car $car, Request $request)
    {
        $postedCar = json_decode($request->getContent(), true);

        $form = $this->createForm(CarType::class, $car, ['csrf_protection' => false]);
        $form->submit($postedCar);

        if ($form->isValid()) {
            $car->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($car, 200, [], [
                'groups' => 'car',
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
    public function delete(Car $car)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($car);
        $em->flush();

        return $this->json(null, 204);
    }
}
