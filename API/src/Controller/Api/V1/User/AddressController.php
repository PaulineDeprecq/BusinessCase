<?php

namespace App\Controller\Api\V1\User;

use App\Entity\User\Address;
use App\Form\User\AddressType;
use App\Repository\User\AddressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/addresses", name="api_v1_address_")
 */
class AddressController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(AddressRepository $addressRepository): Response
    {
        $addresss = $addressRepository->findAll();
        return $this->json($addresss, 200, [], [
            'groups' => 'address',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Address $address): Response
    {
        return $this->json($address, 200, [], [
            'groups' => 'address',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedAddress = json_decode($request->getContent(), true);

        $address = new Address();
        $form = $this->createForm(AddressType::class, $address, ['csrf_protection' => false]);

        $form->submit($postedAddress);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->json($address, 201, [], [
                'groups' => 'address',
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
    public function edit(Address $address, Request $request)
    {
        $postedAddress = json_decode($request->getContent(), true);

        $form = $this->createForm(AddressType::class, $address, ['csrf_protection' => false]);
        $form->submit($postedAddress);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->json($address, 200, [], [
                'groups' => 'address',
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
    public function delete(Address $address)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($address);
        $em->flush();

        return $this->json(null, 204);
    }
}
