<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Model;
use App\Form\Basis\ModelType;
use App\Repository\Basis\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/models", name="api_v1_model_")
 */
class ModelController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(ModelRepository $modelRepository): Response
    {
        $models = $modelRepository->findAll();
        return $this->json($models, 200, [], [
            'groups' => 'model',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Model $model): Response
    {
        return $this->json($model, 200, [], [
            'groups' => ['model', 'model_extended'],
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedmodel = json_decode($request->getContent(), true);

        $model = new Model();
        $form = $this->createForm(ModelType::class, $model, ['csrf_protection' => false]);

        $form->submit($postedmodel);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->json($model, 201, [], [
                'groups' => ['model', 'model_extended'],
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
    public function edit(Model $model, Request $request)
    {
        $postedModel = json_decode($request->getContent(), true);

        $form = $this->createForm(ModelType::class, $model, ['csrf_protection' => false]);
        $form->submit($postedModel);

        if ($form->isValid()) {
            $model->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($model, 200, [], [
                'groups' => ['model', 'model_extended'],
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
    public function delete(Model $model)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($model);
        $em->flush();

        return $this->json(null, 204);
    }
}
