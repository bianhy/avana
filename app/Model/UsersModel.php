<?php

namespace App\Model;

use Avana\System\Libraries\Database\DB;
use Avana\System\Libraries\Strings;
use Avana\System\Model\AbstractModel;
use Avana\System\Libraries\Cache;

class UsersModel extends AbstractModel
{
    const  USER_INFO = 'user:info:';
    protected static $table = 'users';


    public function newUser($user)
    {
        return DB::table(self::$table)->insert($user);
    }

    public function getUserInfoByUid($uid)
    {
        return $this->getUser($uid,false);
    }

    //根据uid获取用户信息，支持批量获取
    public function getUser($uid,$with_key = true)
    {
        $multi = true;
        if (!is_array($uid)) {
            $multi = false;
            $uid  = [$uid];
        }

        foreach ($uid as $id) {
            $key[] = self::USER_INFO . $id;
        }

        $callback = function ($_uid){
            return DB::table(self::$table)->where('uid', $_uid)->first();
        };

        $ret = $this->getMultipleByKeys($uid, self::USER_INFO, $callback, Cache::redis('user'),$with_key);

        if ($multi === false) {
            $ret = array_shift($ret);
        }
        if (!$ret) return $ret;
        $ret = $this->format(array_filter($ret));

        return $ret;
    }

    protected function format($user)
    {
        return $user;
    }
    
    public function getUserList($where,$size)
    {
        return DB::table(self::$table)->select(['uid','nickname'])->where($where)->paginate($size);
    }

    public function getUserByMobile($mobile)
    {
        return DB::table(self::$table)->where(['phone'=>$mobile])->first();
    }

    public function getNickname($name)
    {
        if (!$this->checkExistNickName($name)) {
            return $name;
        }
        $nicknameArr = explode('_', $name);
        $prefix      = $nicknameArr[0];
        $suffix      = isset($nicknameArr[1]) ? $nicknameArr[1] + 1 : 1;

        return $this->getNickname("{$prefix}_{$suffix}");
    }

    /**
     * 验证昵称是否存在
     * @param $nickname
     * @return bool
     */
    protected function checkExistNickName($nickname)
    {
        return DB::table('users')->where(['nickname' => $nickname])->exists();
    }
}