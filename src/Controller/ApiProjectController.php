<?php
namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiProjectController extends AbstractController
{
    #[Route('/projects', name: 'api_projects', methods: ['GET'])]
    public function getProjects(ProjectRepository $projectRepository): JsonResponse
    {
        $projects = $projectRepository->findAll();

        return $this->json($projects, 200, [], [
            'groups' => 'project:read',
        ]);
    }
}
