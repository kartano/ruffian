<?php

namespace App\Repository;

use App\Entity\Haddock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Haddock>
 *
 * @method Haddock|null find($id, $lockMode = null, $lockVersion = null)
 * @method Haddock|null findOneBy(array $criteria, array $orderBy = null)
 * @method Haddock[]    findAll()
 * @method Haddock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HaddockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Haddock::class);
    }

//    /**
//     * @return Haddock[] Returns an array of Haddock objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Haddock
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
