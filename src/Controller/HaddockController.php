<?php

namespace App\Controller;

use App\Entity\Haddock;
use App\Repository\HaddockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/haddock')]
class HaddockController extends AbstractController
{
    #[Route('/list/{count}', name: 'insult_list', methods: ['GET'])]
    #[Cache(smaxage: 10)]
    public function list(EntityManagerInterface $entityManager, int $count): Response
    {
        $repository = $entityManager->getRepository(Haddock::class);
        $haddock = $repository->findRandomEntries($count);

        $result = [
            'haddock' => [
                $haddock->toArray()
            ],
        ];

        return new Response(json_encode($result));
    }
}
