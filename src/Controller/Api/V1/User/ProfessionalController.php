<?php

namespace App\Controller\Api\V1\User;

use App\Entity\User\Professional;
use App\Form\User\ProfessionalType;
use App\Repository\User\ProfessionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/professionals", name="api_v1_professional_")
 */
class ProfessionalController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(ProfessionalRepository $professionalRepository): Response
    {
        $professionals = $professionalRepository->findAll();
        return $this->json($professionals, 200, [], [
            'groups' => 'professional',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Professional $professional): Response
    {
        return $this->json($professional, 200, [], [
            'groups' => ['professional', 'professional_extended']
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedProfessional = json_decode($request->getContent(), true);

        $professional = new Professional();
        $form = $this->createForm(ProfessionalType::class, $professional, ['csrf_protection' => false]);

        $form->submit($postedProfessional);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($professional);
            $em->flush();

            return $this->json($professional, 201, [], [
                'groups' => ['professional', 'professional_extended']
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
    public function edit(Professional $professional, Request $request)
    {
        $postedProfessional = json_decode($request->getContent(), true);

        $form = $this->createForm(ProfessionalType::class, $professional, ['csrf_protection' => false]);
        $form->submit($postedProfessional);

        if ($form->isValid()) {
            $professional->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($professional, 200, [], [
                'groups' => ['professional', 'professional_extended']
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
    public function delete(Professional $professional)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($professional);
        $em->flush();

        return $this->json(null, 204);
    }
}
