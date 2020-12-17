<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Finish;
use App\Form\Basis\FinishType;
use App\Repository\Basis\FinishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/finishs", name="api_v1_finish_")
 */
class FinishController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(FinishRepository $finishRepository): Response
    {
        $finishs = $finishRepository->findAll();
        return $this->json($finishs, 200, [], [
            'groups' => 'finish',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Finish $finish): Response
    {
        return $this->json($finish, 200, [], [
            'groups' => ['finish', 'finish_extended'],
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedFinish = json_decode($request->getContent(), true);

        $finish = new Finish();
        $form = $this->createForm(FinishType::class, $finish, ['csrf_protection' => false]);

        $form->submit($postedFinish);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($finish);
            $em->flush();

            return $this->json($finish, 201, [], [
                'groups' => ['finish'],
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
    public function edit(Finish $finish, Request $request)
    {
        $postedFinish = json_decode($request->getContent(), true);

        $form = $this->createForm(FinishType::class, $finish, ['csrf_protection' => false]);
        $form->submit($postedFinish);

        if ($form->isValid()) {
            $finish->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($finish, 200, [], [
                'groups' => ['finish'],
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
    public function delete(Finish $finish)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($finish);
        $em->flush();

        return $this->json(null, 204);
    }
}
