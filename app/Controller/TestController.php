<?php

namespace App\Controller;

use Avana\System\Libraries\Cache;

class TestController extends AbstractController
{
    public function time()
    {
        echo time();
    }

    public function hello()
    {
var_dump(phpinfo());exit;
        echo 'hello php';
    }
}
