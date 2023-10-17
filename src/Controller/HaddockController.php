<?php

namespace App\Controller;

use App\Repository\HaddockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/haddock')]
class HaddockController extends AbstractController
{
    #[Route('/list/{count}', name: 'insult_list', requirements: ['count' => '\d+'], methods: ['GET'])]
    public function list(HaddockRepository $repository, int $count): Response
    {
        $haddock = $repository->findRandomEntries($count);

        $result = [
            'haddock' => [
                $haddock,
            ],
        ];

        return new Response(json_encode($result));
    }
}
