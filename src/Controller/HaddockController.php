<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/haddock')]
class HaddockController extends AbstractController
{
    #[Route('/list', name: 'insult_list', methods: ['GET'])]
    #[Cache(smaxage: 10)]
    public function list(): Response
    {
        $result = [
            'haddock' => [
                'Ruffian!',
            ],
        ];

        return new Response(json_encode($result));
    }
}
