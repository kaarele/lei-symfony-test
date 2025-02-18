<?php
// src/Repository/TaskRepository.php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TaskRepository extends ServiceEntityRepository {
  public function __construct(ManagerRegistry $registry) {
    parent::__construct($registry, Task::class);
  }

  public function findByStatus($status) {
    return $this->createQueryBuilder('t')
      ->andWhere('t.status = :status')
      ->setParameter('status', $status)
      ->getQuery()
      ->getResult();
  }
}
