<?php

use App\CID\Container;
use App\Http\Request;

return [
    Request::class => function (Container $container) {
        return new Request();
    }
];