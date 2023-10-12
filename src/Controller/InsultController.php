<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/insult')]
class InsultController extends AbstractController
{
    #[Route('/list', name: 'insult_list', methods: ['GET'])]
    #[Cache(smaxage: 10)]
    public function list(): Response
    {
        $result = [
            'insult' => [
                'Ruffian!',
            ],
        ];

        return new Response(json_encode($result));
    }
}
