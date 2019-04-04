<?php

namespace App\Controller;

use Avana\System\Libraries\Input;
use Avana\System\Libraries\Strings;
use Avana\System\Libraries\TcpLog;
use Avana\System\Libraries\User\UserCounter;
use Avana\System\Libraries\User\UserPostTime;
use Avana\System\Libraries\User\UserVerifyCode;
use Avana\System\View;

class ActionController extends AbstractController
{

    public function login()
    {
        if (!$_POST){
            View::show('action/login');exit;
        }
        $mobile   = Input::string('mobile');
        $password = Input::string('password');

        if (!$mobile) {
            $this->outError('请输入手机号');
        } else if (!$password) {
            $this->outError('请输入密码');
        }

        $account_info = $this->AccountsModel->getAccountByMobile($mobile);

        if (!$account_info){
            $this->outError("账号或密码错误");
        }

        if ($account_info['password'] != md5($account_info['token'] . "|" . $password)){
            $this->outError("账号密码不匹配");
        }
        //登陆成功重置用户token，更新表里密码
        $this->AccountsModel->updatePassword($account_info['uid'], $password);
        $token = $this->genToken($account_info['uid'], $this->clientType);
        $this->outResult(['token' => $token]);
    }

    public function register()
    {
        $mobile      = Input::int('mobile');
        $verify_Code = Input::string('verifyCode');
        $password    = Input::string('password');

        if (!$mobile || !Strings::isMobile($mobile)) {
            $this->outError('请填写正确的手机号码');
        } elseif (!$password) {
            $this->outError('请输入密码');
        } elseif (!$verify_Code) {
            $this->outError('请输入验证码');
        }

        $msg_code = UserVerifyCode::get($mobile);
        //验证验证码
        if (!$msg_code) {
            $this->outError('验证码已过期，请重新获取',406);
        } elseif ($verify_Code != $msg_code) {
            $this->outError('验证码错误',406);
        }

        $user = $this->UsersModel->getUserByMobile($mobile);
        if ($user) {
            $this->outError('手机号已经被注册',405);
        }

        $uid = $this->AccountsModel->newAccount($mobile, $password);

        $nickname = $this->UsersModel->getNickname('Avana' . substr($mobile, 7));

        //生成用户
        $this->UsersModel->newUser(['uid'=>$uid,'phone'=>$mobile,'nickname'=>$nickname]);
        $token = $this->genToken($uid, $this->clientType);

        $this->outResult(['token' => $token]);
    }

    public function genVerifyCode()
    {
        $mobile = Input::string('mobile');
        $type   = Input::string('type', [1, 2, 3, 4]);
        if (!$mobile || !Strings::isMobile($mobile)) {
            $this->outError('请填写正确的手机号码');
        }

        $exists_mobile = $this->AccountsModel->getAccountByMobile($mobile);

        //判断 1-登陆或 3 -找回密码
        if (in_array($type, [1, 3]) && !$exists_mobile) {
            $this->outError('手机号不存在');
        }

        // 2 - 手机号注册, 4 - 第三方登陆绑定手机号
        if (in_array($type, [2, 4]) && $exists_mobile) {
            $this->outError('手机号已经存在');
        }

        UserPostTime::record($mobile, 60, 'sms_code');
        //验证此手机号是否超过当天请求上限
        if (UserCounter::add($mobile, 'sms_code') > 10) {
            $this->outError('已超过当天获取次数上限');
        }

        $verify_code = Strings::randString();
        if (!Sms::send($mobile, $verify_code)) {
            $this->outError('验证码发送失败');
        }
        //把验证码计入到redis
        UserVerifyCode::set($mobile, $verify_code, 1800);
        $this->outResult(true);
    }

    public function resetPassword()
    {
        $mobile      = Input::string('mobile');
        $verify_Code = Input::string('verifyCode');
        $password    = Input::string('password');

        if (!$mobile || !Strings::isMobile($mobile)) {
            $this->outError('请填写正确的手机号码');
        }
        if (!$verify_Code) {
            $this->outError('请输入验证码');
        }
        if (!UserVerifyCode::get($mobile)) {
            $this->outError('验证码已过期，请重新获取');
        }
        if ($verify_Code != UserVerifyCode::get($mobile)) {
            $this->outError('验证码错误');
        }

        if (!$password) {
            $this->outError('请输入新密码');
        }

        //验证是否存在相同手机号码的用户
        $user_info = $this->AccountsModel->getAccountByMobile($mobile);
        if (!$user_info) {
            $this->outError("用户不存在");
        }

        if ($this->AccountsModel->updatePassword($user_info['uid'], ['password' => $password]) === false) {
            $this->outError('操作失败');
        }

        $this->outResult(['msg' => 'true']);
    }
}
