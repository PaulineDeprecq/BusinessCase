<?php

namespace App\Controller\Api\V1\Compose;

use App\Entity\Compose\Ad;
use App\Form\Compose\AdType;
use App\Repository\Compose\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/ads", name="api_v1_ad_")
 */
class AdController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(AdRepository $adRepository): Response
    {
        $ads = $adRepository->findAll();
        return $this->json($ads, 200, [], [
            'groups' => 'ad',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Ad $ad): Response
    {
        return $this->json($ad, 200, [], [
            'groups' => ['ad', 'ad_extended']
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedAd = json_decode($request->getContent(), true);

        $ad = new Ad();
        $form = $this->createForm(AdType::class, $ad, ['csrf_protection' => false]);

        $form->submit($postedAd);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ad);
            $em->flush();

            return $this->json($ad, 201, [], [
                'groups' => ['ad', 'ad_extended']
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
    public function edit(Ad $ad, Request $request)
    {
        $postedAd = json_decode($request->getContent(), true);

        $form = $this->createForm(AdType::class, $ad, ['csrf_protection' => false]);
        $form->submit($postedAd);

        if ($form->isValid()) {
            $ad->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($ad, 200, [], [
                'groups' => ['ad', 'ad_extended']
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
    public function delete(Ad $ad)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($ad);
        $em->flush();

        return $this->json(null, 204);
    }
}
