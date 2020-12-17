<?php

namespace App\Controller\Api\V1\Basis;

use App\Entity\Basis\Version;
use App\Form\Basis\VersionType;
use App\Repository\Basis\VersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/versions", name="api_v1_version_")
 */
class VersionController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(VersionRepository $versionRepository): Response
    {
        $versions = $versionRepository->findAll();
        return $this->json($versions, 200, [], [
            'groups' => 'version',
        ]);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Version $version): Response
    {
        return $this->json($version, 200, [], [
            'groups' => 'version',
        ]);
    }

    /**
     * @Route("", name="add", methods={"POST"})
     */
    public function add(Request $request)
    {
        $postedVersion = json_decode($request->getContent(), true);

        $version = new Version();
        $form = $this->createForm(VersionType::class, $version, ['csrf_protection' => false]);

        $form->submit($postedVersion);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($version);
            $em->flush();

            return $this->json($version, 201, [], [
                'groups' => 'version',
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
    public function edit(Version $version, Request $request)
    {
        $postedVersion = json_decode($request->getContent(), true);

        $form = $this->createForm(VersionType::class, $version, ['csrf_protection' => false]);
        $form->submit($postedVersion);

        if ($form->isValid()) {
            $version->setUpdatedAt(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->json($version, 200, [], [
                'groups' => 'version',
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
    public function delete(Version $version)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($version);
        $em->flush();

        return $this->json(null, 204);
    }
}
