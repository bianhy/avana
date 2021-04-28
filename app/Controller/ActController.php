<?php

namespace App\Controller;

use Avana\System\Libraries\Input;
use Avana\System\Libraries\Strings;
use Avana\System\Libraries\TcpLog;
use Avana\System\Libraries\User\UserCounter;
use Avana\System\Libraries\User\UserPostTime;
use Avana\System\Libraries\User\UserVerifyCode;
use Avana\System\View;

class ActController extends AbstractController
{

    public function open()
    {

        $con = [
            [
                'pos' => 1,
                'probability' => 9000
            ],
            [
                'pos' => 2,
                'probability' => 800
            ],
            [
                'pos' => 3,
                'probability' => 120
            ],
            [
                'pos' => 4,
                'probability' => 80
            ],
        ];

        var_dump($this->getPrizeRand($con));
        /*$res = array_fill(1, 4, 0);
        for ($i=0;$i<100000;$i++){
            $ret = $this->getPrizeRand($con);
            $res[$ret]++;
            var_dump($res);
        }*/

        $this->outResult(1);
    }

    public function getPrizeRand($config)
    {
        $result      = '';
        $pro_val_arr = array_column($config, 'probability');
        //概率数组的总概率精度
        $proSum = array_sum($pro_val_arr);

        //概率和必须是1w,相当于保留两位小数
/*        if ($proSum !== 10000) {
            throw new \Exception(11);
        }*/
        //打乱数组顺序
        shuffle($config);
        //概率数组循环
        foreach ($config as $key => $proCur) {
            $randNum = mt_rand(1, $proSum);
            //如果随机数，小于等于当前奖品概率，就中奖，否则减去当前概率
            if ($randNum <= $proCur['probability']) {
                $result = $proCur['pos'];
                break;
            } else {
                //减去当概率
                $proSum -= $proCur['probability'];
            }
        }
        unset($config);
        return $result;
    }
}
