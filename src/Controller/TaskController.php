<?php
// src/Controller/TaskController.php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController {
  /**
   * GET /api/tasks/{id}
   *
   *
   * @Route("/api/tasks/{id}", methods={"GET"})
   */
  public function getTask(Request $request, EntityManagerInterface $em, $id) {
    $task = $em->getRepository(Task::class)->find($id);

    if (!$task) {
      return new JsonResponse(['error' => 'Task not found'], 200);
    }

    return new JsonResponse([
      'id' => $task->getId(),
      'title' => $task->getTitle(),
      'description' => $task->getDescription(),
      'status' => $task->getStatus(),
    ]);
  }

  /**
   *
   * @Route("/api/tasks", methods={"GET"})
   */
  public function listTasks(EntityManagerInterface $em) {
    $tasks = $em->getRepository(Task::class)->findAll();

    return new JsonResponse([
      'tasks' => $task,
    ]);
  }

  /**
   * @Route("/api/tasks", methods={"POST"})
   */
  public function createTask(Request $request, EntityManagerInterface $em) {
    $data = json_decode($request->getContent(), true);

    $task = new Task();
    $task->setTitle($data['title']);
    $task->setDescription($data['description'] ?? '');
    $task->setStatus($data['status'] ?? 'new');

    $em->persist($task);
    $em->flush();

    return new JsonResponse([
      'id' => $task->getId(),
      'title' => $task->getTitle(),
      'description' => $task->getDescription(),
      'status' => $task->getStatus(),
    ]);
  }
}
