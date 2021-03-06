<?php

namespace App\Controller;

use App\Model\ArticleModel;
use Avana\System\Controller;
use Avana\System\Libraries\Input;
use Avana\System\Libraries\Openssl;
use Avana\System\Libraries\User\UserToken;
use App\Model\AccountsModel;
use App\Model\StartModel;
use App\Model\UsersModel;

class AbstractController extends Controller
{

    /**
     * 使用token作为唯一令牌
     * @var mixed|string $token
     */
    protected $token = '';


    /**
     * 账号平台类型，默认为self
     * @var null|string $platform
     */
    protected $platform = 'self';

    /**
     * 客户端类型，默认为h5
     * @var null|string $clientType
     */
    protected $clientType = 'h5';

    /**
     * 用户id，未登录状态下为0
     * @var int $uid
     */
    protected $uid = 0;

    /**
     * 保存用户基本信息的属性
     * @var array $login_user
     */
    protected $login_user = [];

    /**
     * @var StartModel
     */
    protected $StartModel;

    /**
     * @var UsersModel
     */
    protected $UsersModel;

    /**
     * @var AccountsModel
     */
    protected $AccountsModel;

    /**
     * @var ArticleModel
     */
    protected $ArticleModel;


    public function __construct()
    {
        parent::__construct();
        $this->token    = str_replace(' ', '+', $this->getToken('token'));
        $this->platform = Input::string('platform', ['self', 'qq', 'wx']);
        $this->clientType = Input::string('clientType','h5');
        $this->setContainerModel();
        $this->setLoginUser($this->token);

    }

    //初始化容器
    private function setContainerModel()
    {
        $this->setProperty('StartModel', function () {
            return new StartModel();
        });

        $this->setProperty('UsersModel', function () {
            return new UsersModel();
        });

        $this->setProperty('AccountsModel', function () {
            return new AccountsModel();
        });

        $this->setProperty('ArticleModel', function () {
            return new ArticleModel();
        });
    }

    public function setLoginUser($token)
    {
        if (!$token) {
            return false;
        }

        $content = Openssl::decrypt($token);
        if (!$content) {
            return false;
        }
        $info = json_decode($content, true);
        if (!isset($info['uid']) || !isset($info['client_type'])) {
            return false;
        } elseif ($token != UserToken::get($info['uid'], $info['client_type'])) {
            $this->setToken('token', '', -1);//清掉客户端的token
            return false;
        }
        $this->login_user = $this->UsersModel->getUserInfoByUid($info['uid']);
        $this->uid = $info['uid'];

    }

    /**
     * 生成token方法
     * @param $uid
     * @param $client_type
     * @param $update_dt
     * @return string
     */
    protected function genToken($uid, $client_type='mp',$update_dt = '')
    {
        $update_dt || $update_dt = NOW_DATE_TIME;
        //生成token
        $content = json_encode(['uid' => $uid, 'client_type'=>$client_type, 'update_dt' => $update_dt]);
        $token   = Openssl::encrypt($content);
        //保存token 到redis
        UserToken::set($uid, [$client_type => $token]);
        //设置 cookie
        $this->setToken('token', $token,time()+315360000);
        return $token;
    }

    protected function getToken($key, $default = null)
    {
        if (!isset($_REQUEST[$key])) {
            $val = $default;
            if (isset($_COOKIE[$key])) {
                $val = $_COOKIE[$key];
            }
        } else {
            $val = urldecode($_REQUEST[$key]);
            $this->setToken($key, $val);
        }
        return $val;
    }

    protected function setToken($key, $value, $expire = null)
    {
        header('P3P: CP="NOI DEV PSA PSD IVA PVD OTP OUR OTR IND OTC"');
        setcookie($key, $value, $expire, '/');
    }
}
