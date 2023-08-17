<?php

use App\Kernel;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../vendor/autoload.php";

Kernel::load();