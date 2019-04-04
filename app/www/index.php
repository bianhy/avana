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
});

