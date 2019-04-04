<?php

namespace App\Model;

use Avana\System\Libraries\Database\DB;
use Avana\System\Libraries\Strings;
use Avana\System\Model\AbstractModel;

class AccountsModel extends AbstractModel
{
    protected static $table = 'accounts';

    public function newAccount($phone, $password)
    {
        $data['token']       = 981523;
        $data['phone']       = $phone;
        $data['password']    = md5($data['token'] . "|" . $password);
        $data['register_ip'] = Strings::getClientIp();
        $data['create_dt']   = NOW_DATE_TIME;
        $uid                 = DB::table(self::$table)->insertGetId($data);
        return $uid;
    }

    public function getAccountByMobile($mobile)
    {
        return DB::table(self::$table)->where(['phone'=>$mobile])->first();
    }

    //更新用户密码,每次登陆也重置下token
    public function updatePassword($uid,$password)
    {
        if (!$uid || !$password) {
            return false;
        }
        $hashKey = Strings::randString(6);
        $data = [
            'token'           => $hashKey,
            'password'        => md5($hashKey . '|' . $password),
            'last_login_time' => NOW_DATE_TIME,
            'last_login_ip'   => Strings::getClientIp(),
        ];
        return DB::table(self::$table)->where('uid', '=', $uid)
            ->limit(1)
            ->update($data);
    }
}