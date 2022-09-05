<?php

namespace App\Repository;

use App\Entity\Consulta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Consulta>
 *
 * @method Consulta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consulta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consulta[]    findAll()
 * @method Consulta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consulta::class);
    }

    public function add(Consulta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Consulta $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /*public function cuentaVotos($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.voto = :val')
            ->setParameter('val', $value)
            ->select('COUNT(c.voto) as votos')
            ->getQuery()
            ->getSingleScalarResult();
    }*/

    public function cuentaVotos()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id) AS CountByType', 'p.type AS type') // each row will contain the count and the type
            ->groupBy('p.type')
            ->getQuery()
            ->getArrayResult(); // get the result as array
    }
//    /**
//     * @return Consulta[] Returns an array of Consulta objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Consulta
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
