<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Builder;
use App\Form\Basis\BuilderType;
use App\Repository\Basis\BuilderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/builders", name="api_v1_builder_")
 */
class BuilderController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(BuilderRepository $builderRepository): Response
    {
        $builders = $builderRepository->findAll();
        return $this->json($builders, 200, [], [
            'groups' => 'builder',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Builder $builder): Response
    {
        return $this->json($builder, 200, [], [
            'groups' => ['builder', 'builder_extended'],
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedBuilder = json_decode($request->getContent(), true);

        $builder = new Builder();
        $form = $this->createForm(BuilderType::class, $builder, ['csrf_protection' => false]);

        $form->submit($postedBuilder);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($builder);
            $em->flush();

            return $this->json($builder, 201, [], [
                'groups' => ['builder', 'builder_extended'],
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
    public function edit(Builder $builder, Request $request)
    {
        $postedBuilder = json_decode($request->getContent(), true);

        $form = $this->createForm(BuilderType::class, $builder, ['csrf_protection' => false]);
        $form->submit($postedBuilder);

        if ($form->isValid()) {
            $builder->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($builder, 200, [], [
                'groups' => ['builder', 'builder_extended'],
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
    public function delete(Builder $builder)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($builder);
        $em->flush();

        return $this->json(null, 204);
    }
}
