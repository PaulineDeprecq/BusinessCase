<?php

namespace App\Controller\Api\V1\Compose;

use App\Entity\Compose\CritAir;
use App\Form\Compose\CritAirType;
use App\Repository\Compose\CritAirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/critairs", name="api_v1_critair_")
 */
class CritAirController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(CritAirRepository $critairRepository): Response
    {
        $critairs = $critairRepository->findAll();
        return $this->json($critairs, 200, [], [
            'groups' => 'critair',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(CritAir $critair): Response
    {
        return $this->json($critair, 200, [], [
            'groups' => 'critair',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedCritAir = json_decode($request->getContent(), true);

        $critair = new CritAir();
        $form = $this->createForm(CritAirType::class, $critair, ['csrf_protection' => false]);

        $form->submit($postedCritAir);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($critair);
            $em->flush();

            return $this->json($critair, 201, [], [
                'groups' => 'critair',
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
    public function edit(CritAir $critair, Request $request)
    {
        $postedCritAir = json_decode($request->getContent(), true);

        $form = $this->createForm(CritAirType::class, $critair, ['csrf_protection' => false]);
        $form->submit($postedCritAir);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->json($critair, 200, [], [
                'groups' => 'critair',
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
    public function delete(CritAir $critair)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($critair);
        $em->flush();

        return $this->json(null, 204);
    }
}
