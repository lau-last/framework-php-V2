<?php

namespace App\Controller;

use App\Attribute\Route;

class HomeController
{
    #[Route(path: '/home')]
    public function homeIndex(): string
    {
        echo 'df /';
        return 'blabla';
    }


    #[Route(path: '/home/un')]
    public function homeUn(): void
    {
        echo 'echo un';
    }


    #[Route(path: '/home/deux')]
    public function homeDeux(): void
    {
        echo 'echo deux';
    }
}