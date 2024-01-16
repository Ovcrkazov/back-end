<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }
    
    #[Route('/authentication', name: 'authentication')]
    public function authentication(Request $request): JsonResponse
    {
        $result = array();
        $username = $request->get('username');
        $password = $request->get('password');
        if ($username && $password) {
            $result['username'] = $username;
            $result['password'] = $password;
          }
        return $this->json($result);
    }

    #[Route('/scan', name: 'scan')]
    public function scan(Request $request): JsonResponse
    {
        $result = array();
        $requestData = json_decode($request->getContent(), true);
        if (isset($requestData['data'])) {
            $result['data'] = $requestData['data'];
        }
        return $this->json($result);
    }
}
