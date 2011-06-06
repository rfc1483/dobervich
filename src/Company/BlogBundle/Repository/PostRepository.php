<?php

namespace Company\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository {

    public function getLatestPosts($limit = 5) {
        $dql = 'SELECT p, u, c, t FROM Company\BlogBundle\Entity\Post p ' .
                'INNER JOIN p.user u INNER JOIN p.category c INNER JOIN ' .
                'p.tags t ORDER BY p.createdAt DESC';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($limit);

        return $query->getResult();
    }

}
