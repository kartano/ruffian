<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InsultController extends AbstractController
{
    #[NoReturn] #[Route('/api/list', methods: ['GET', 'HEAD'])]
    public function list(): Response
    {
        echo "works";
        die();

        /*
        $result = [
            'insult' => [
                'Ruffian!',
            ],
        ];

        return new Response(json_encode($result));
        */
    }
}
