<?php

namespace App\Controller\Api\V1\Compose;

use App\Entity\Compose\Opzione;
use App\Form\Compose\OpzioneType;
use App\Repository\Compose\OpzioneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/options", name="api_v1_option_")
 */
class OpzioneController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(OpzioneRepository $optionRepository): Response
    {
        $options = $optionRepository->findAll();
        return $this->json($options, 200, [], [
            'groups' => 'option',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Opzione $option): Response
    {
        return $this->json($option, 200, [], [
            'groups' => 'option',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedOption = json_decode($request->getContent(), true);

        $option = new Opzione();
        $form = $this->createForm(OpzioneType::class, $option, ['csrf_protection' => false]);

        $form->submit($postedOption);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($option);
            $em->flush();

            return $this->json($option, 201, [], [
                'groups' => 'option',
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
    public function edit(Opzione $option, Request $request)
    {
        $postedOption = json_decode($request->getContent(), true);

        $form = $this->createForm(OpzioneType::class, $option, ['csrf_protection' => false]);
        $form->submit($postedOption);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->json($option, 200, [], [
                'groups' => 'option',
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
    public function delete(Opzione $option)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($option);
        $em->flush();

        return $this->json(null, 204);
    }
}
