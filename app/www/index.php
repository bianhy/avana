<?php
require dirname(__DIR__) . '/Config/bootstrap.php';
require dirname(__DIR__) . '/Config/constant.php';
\Avana\System\Helper::load('func');
\Avana\System\Helper::load('array');
\Avana\System\Application::setEnvironment([
    'localhost'   => ['frame-local'],
    'development' => ['frame-dev', 'frame.dev'],
    'testing'     => ['frame-testing', 'frame-test'],
]);

$app = new \Avana\System\Application('App');
$app->setErrorReporting(IS_DEBUG || ENVIRONMENT != 'production');
$app->setDispatcher(\Avana\System\Libraries\Config::get('dispatch'));
$app->setExceptionsCapture(function (Exception $e) {
    \Avana\System\Libraries\Exceptions::capture($e);
});

$app->run();
register_shutdown_function(function () {
    //\Avana\System\Libraries\TcpLog::save('avana.frame');
    if (IS_DEBUG && IS_XHPROF_OPEN) {
        $data = xhprof_disable();
        $xhprof_root = dirname(dirname(dirname(dirname(__FILE__)))).'/xhprof-0.9.4';
        include_once $xhprof_root . "/xhprof_lib/utils/xhprof_lib.php";
        include_once $xhprof_root . "/xhprof_lib/utils/xhprof_runs.php";
        $xhprof_runs = new XHprofRuns_Default();
        $run_id = $xhprof_runs->save_run($data, 'avana');
        echo "http://xhprof.avana.com/index.php?run=$run_id&source=avana" . PHP_EOL;
    }
});

