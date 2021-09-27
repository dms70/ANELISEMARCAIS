<?php

namespace App\Controller;
use App\Repository\MakeupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakeupController extends AbstractController
{
    #[Route('/realisations', name: "realisations")]
    public function realisations(MakeupRepository $MakeupRepository): Response
    {
        return $this->render('makeup/realisations.html.twig', [
            'makeups' => $MakeupRepository->findall(),
        ]);
    }
}
