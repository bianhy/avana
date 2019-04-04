<?php

namespace App\Controller;

use Avana\System\Libraries\Strings;
use Avana\System\View;

class IndexController extends AbstractController
{
    public function index()
    {
        $right1 = [
            'span'  => 'Eliana Dedda',
            'title' => ' Identity',
            'desc'  => 'Personal Brand Identity.',
            'image' => AVANA_STATIC.'images/home-images/image-1.jpg',
        ];
        $list1 = [
            [
                'id'    => 1,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-2.jpg',
            ],

            [
                'id'    => 2,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-4.jpg',
            ],
            [
                'id'    => 3,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-2.jpg',
            ],

            [
                'id'    => 4,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-4.jpg',
            ],
            [
                'id'    => 5,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-2.jpg',
            ],

            [
                'id'    => 6,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-4.jpg',
            ],
            [
                'id'    => 7,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-2.jpg',
            ],

            [
                'id'    => 8,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-4.jpg',
            ],
        ];

        $ll = [
            [
                'id'    => 1,
                'span'  => 'Galleria',
                'title' => 'Anatome Milano',
                'desc'  => 'Galerie Anatome based in Paris',
                'image' => AVANA_STATIC.'images/home-images/image-3.jpg',
            ],

            [
                'id'    => 2,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-5.jpg',
            ],
            [
                'id'    => 3,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-3.jpg',
            ],

            [
                'id'    => 4,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-5.jpg',
            ],
            [
                'id'    => 5,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-3.jpg',
            ],

            [
                'id'    => 6,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-5.jpg',
            ],
            [
                'id'    => 7,
                'span'  => 'Exhibition ',
                'title' => 'Studio Thonik ',
                'desc'  => 'Project for Thonik, design studio based in Amsterdam',
                'image' => AVANA_STATIC.'images/home-images/image-3.jpg',
            ],

            [
                'id'    => 8,
                'span'  => 'new Agency',
                'title' => 'A Brand ',
                'desc'  => 'Over 40,000 customers use our themes to power their',
                'image' => AVANA_STATIC.'images/home-images/image-5.jpg',
            ],
        ];


        $data = [
            'list'  => [$list1,$ll],
            'right1' => $right1,
        ];
        View::show('avana/index',$data);
    }
}
