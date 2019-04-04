<?php
/**
 * 用户统计数据
 */

namespace Avana\System\Libraries\User;

use Avana\System\Libraries\Cache;
use Avana\System\Libraries\AbstractStat;

class UserStat extends AbstractStat
{
    const REDIS_PREFIX = 'user:stat';

    const FIELDS = [
        'total_topic',       //总帖子数
        'fans',              //fans数
        'new_fans',          //新粉丝数
    ];

    protected static function getKey($key)
    {
        if (!in_array($key,self::FIELDS)) {
            //throw new \Exception('非法的统计字段');
        }
        return static::REDIS_PREFIX.$key;
    }

    protected static function redis()
    {
        return Cache::redis('user');
    }
}