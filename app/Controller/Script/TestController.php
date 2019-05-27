<?php

namespace App\Controller\Script;

use App\Controller\AbstractController;
use Avana\System\Libraries\Database\DB;
use Avana\System\Libraries\Strings;

define('ONLY_CLI', true);//脚本文件定义只能在命令行模式下执行

class TestController extends AbstractController
{
    /**
     * 测试脚本
     * /opt/app/php-5.6.20/bin/php /data/wwwroot/avana/app/www/index.php -c='App\Controller\Script\TestController' -a=fork
     */
    public function fork()
    {
        $max   = 5;//最大的子进程数量
        $child = 0;//当前的子进程数量
        //file_put_contents('/tmp/test_fork.pid', posix_getpid());//getmypid()

        while (true) {
            $child++;
            $pid = pcntl_fork();
            if ($pid) {
                if ($child >= $max) {
                    pcntl_wait($status);
                    $child--;
                }
            } else {
                while (true) {
                    echo '当前时间戳：'.time().' 进程id:'.getmypid().PHP_EOL;
                    sleep(1);
                }
            }
        }
    }
}
