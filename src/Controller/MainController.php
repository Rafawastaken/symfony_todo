<?php

namespace App\Controller;


use App\Entity\Tasks;
use App\Form\TodoFormType;
use App\Repository\TasksRepository;
use Doctrine\ORM\Cache\EntityCacheEntry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class MainController extends AbstractController
{
    private $taskRepository;


    public function __construct(TasksRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $tasks = $this->taskRepository->findAll();
        return $this->render('main/index.html.twig', [
            'tasks' => $tasks,
            "page_title" => "Todo List"
        ]);
    }


    // **************** Add task ****************
    /**
     * @Route("/add", name="add_task")
     */
    public function add_task(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $tasks = new Tasks();
        $form = $this->createForm(TodoFormType::class, $tasks);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManagerInterface->persist($tasks);
            $entityManagerInterface->flush();

            $this->addFlash('message', "Task added");
            return $this->redirectToRoute('index');
        }

        return $this->render('main/add-task.html.twig', [
            'form' => $form->createView(),
            'page_title' => "Add New Task"
        ]);
    }


    // ****************  Delete task ****************
    /**
     * @Route("/delete/{id}", name='delete')
     */
    public function delete_task(Request $request, EntityManagerInterface $entityManagerInterface, $id): Response
    {
        $task = $this->taskRepository->find($id);
        $entityManagerInterface->persist($task);
        $entityManagerInterface->remove($task);
        $entityManagerInterface->flush();

        $this->addFlash('message', 'Task Deleted');
        return $this->redirectToRoute('index');
    }

    // **************** Edit Task ****************
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit_task(Request $request, EntityManagerInterface $entityManagerInterface, $id): Response
    {
        $task = $this->taskRepository->find($id);
        $form = $this->createForm(TodoFormType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManagerInterface->persist($task);
            $entityManagerInterface->flush();

            $this->addFlash('message', 'Task Updated');

            return $this->redirectToRoute('index');
        }

        return $this->render("main/edit-task.html.twig", [
            'form' => $form->createView(),
            "page_title" => "Edit Task"
        ]);
    }
}
