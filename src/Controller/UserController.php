<?php


namespace App\Controller;


use App\Services\UserServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    public function __construct(private UserServiceInterface $userService)
    {}

    public function create(Request $request)
    {
        // TODO: add form logic
        $data = null;

        $user = $this->userService->create($data);
    }
}
