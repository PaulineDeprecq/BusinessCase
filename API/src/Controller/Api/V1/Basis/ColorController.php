<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Color;
use App\Form\Basis\ColorType;
use App\Repository\Basis\ColorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/colors", name="api_v1_color_")
 */
class ColorController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(ColorRepository $colorRepository): Response
    {
        $colors = $colorRepository->findAll();
        return $this->json($colors, 200, [], [
            'groups' => 'color',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Color $color): Response
    {
        return $this->json($color, 200, [], [
            'groups' => 'color',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedColor = json_decode($request->getContent(), true);

        $color = new Color();
        $form = $this->createForm(ColorType::class, $color, ['csrf_protection' => false]);

        $form->submit($postedColor);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($color);
            $em->flush();

            return $this->json($color, 201, [], [
                'groups' => 'color',
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
    public function edit(Color $color, Request $request)
    {
        $postedColor = json_decode($request->getContent(), true);

        $form = $this->createForm(ColorType::class, $color, ['csrf_protection' => false]);
        $form->submit($postedColor);

        if ($form->isValid()) {
            $color->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($color, 200, [], [
                'groups' => 'color',
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
    public function delete(Color $color)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($color);
        $em->flush();

        return $this->json(null, 204);
    }
}
