<?php

namespace App\Controller;

use Avana\System\Libraries\Input;
use Avana\System\View;

class SystemController extends AbstractController
{

    public function about()
    {
        $data = [
            [
                'id'    => 1,
                'name'  => 'XY 苹果助手',
                'desc'  => '海量正版应用，免费下载',
                'image' => AVANA_STATIC.'images/about-images/about-image-4.png'
            ],
            [
                'id'    => 2,
                'name'  => 'E起玩',
                'desc'  => 'E起玩，才够嗨',
                'image' => AVANA_STATIC.'images/about-images/about-image-7.jpg'
            ],
            [
                'id'    => 3,
                'name'  => '五条',
                'desc'  => '每日五条 看尽世界',
                'image' => AVANA_STATIC.'images/about-images/about-image-5.png'
            ],

        ];
        View::show('avana/about',['list'=>$data]);
    }

    public function blog()
    {
        View::show('avana/blog');
    }

    public function contact()
    {
        View::show('avana/contact');
    }
}
