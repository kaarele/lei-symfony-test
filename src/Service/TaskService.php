<?php
// src/Service/TaskService.php

namespace App\Service;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class TaskService {
  private $em;

  public function __construct(EntityManagerInterface $em) {
    $this->em = $em;
  }

  public function createTask($title, $description, $status = 'new') {
    $task = new Task();
    $task->setTitle($title);
    $task->setDescription($description);
    $task->setStatus($status);

    $this->em->persist($task);
    $this->em->flush();

    return $task;
  }
}
