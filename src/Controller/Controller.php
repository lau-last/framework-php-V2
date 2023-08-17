<?php

namespace App\Controller;

use App\Attribute\Route;

final class Controller
{
    #[Route(path: '/')]
    public function index(): string
    {
        echo 'df /';
        return 'blabla';
    }


    #[Route(path: '/un')]
    public function un(): void
    {
        echo 'echo un';
    }


    #[Route(path: '/deux')]
    public function deux(): void
    {
        echo 'echo deux';
    }


}