<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Generation;
use App\Form\Basis\GenerationType;
use App\Repository\Basis\GenerationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/generations", name="api_v1_generation_")
 */
class GenerationController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(GenerationRepository $generationRepository): Response
    {
        $generations = $generationRepository->findAll();
        return $this->json($generations, 200, [], [
            'groups' => 'generation',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Generation $generation): Response
    {
        return $this->json($generation, 200, [], [
            'groups' => 'generation',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedGeneration = json_decode($request->getContent(), true);

        $generation = new Generation();
        $form = $this->createForm(GenerationType::class, $generation, ['csrf_protection' => false]);

        $form->submit($postedGeneration);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($generation);
            $em->flush();

            return $this->json($generation, 201, [], [
                'groups' => 'generation',
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
    public function edit(Generation $generation, Request $request)
    {
        $postedGeneration = json_decode($request->getContent(), true);

        $form = $this->createForm(GenerationType::class, $generation, ['csrf_protection' => false]);
        $form->submit($postedGeneration);

        if ($form->isValid()) {
            $generation->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($generation, 200, [], [
                'groups' => 'generation',
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
    public function delete(Generation $generation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($generation);
        $em->flush();

        return $this->json(null, 204);
    }
}
