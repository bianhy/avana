<?php
namespace Avana\System\Event;

interface ListenerInterface
{
    public function handle($params);
}