<?php

namespace App\Repository;

use App\Entity\OutlookEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OutlookEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method OutlookEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method OutlookEvent[]    findAll()
 * @method OutlookEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutlookEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OutlookEvent::class);
    }

    // /**
    //  * @return Quote[] Returns an array of Quote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quote
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function filterSafe($filter) {
        $parameters = [];
        $i = 1;
        $condition = [];
        foreach ($filter as $key => $values) {
            $vals = [];
            foreach ($values as $value) {
                $vals[] = "$key = ?$i";
                $parameters[$i] = $value;
                $i++;
            }
            $condition[] = "(". implode(' or ', $vals) .")";
        }

        // Separate by AND delimiter if there are more than 1 pair
        $condition = implode(' AND ', $condition);
        // Return prepared string:
        $dql = "SELECT * FROM outlookEvent WHERE {$condition}";
        $query = $this->getEntityManager()->createQuery($dql);

        foreach ($parameters as $position => $value) {
            $query->setParameter($position, $value);
        }
        return $query->execute();
    }
}
