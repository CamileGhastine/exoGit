<?php

namespace App\Repository;

use App\Entity\DiceRoll;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiceRoll|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiceRoll|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiceRoll[]    findAll()
 * @method DiceRoll[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiceRollRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiceRoll::class);
    }

    // /**
    //  * @return DiceRoll[] Returns an array of DiceRoll objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiceRoll
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
