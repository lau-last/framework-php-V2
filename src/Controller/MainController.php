<?php

namespace App\Controller;

use App\Attribute\Route;

class MainController
{
    #[Route(path: '/main')]
    public function mainIndex(): string
    {
        echo 'df /';
        return 'blabla';
    }


    #[Route(path: '/main/un')]
    public function mainUn(): void
    {
        echo 'echo un';
    }


    #[Route(path: '/main/deux')]
    public function mainDeux(): void
    {
        echo 'echo deux';
    }
}