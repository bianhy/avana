<?php

namespace App\Controller;

use Avana\System\Libraries\Strings;
use Avana\System\View;

class IndexController extends AbstractController
{
    public function index()
    {
        $home_top  = $this->ArticleModel->getHomeTopArticle();
        $home_left = $this->ArticleModel->getHomeLeftArticle();
        $home_right = $this->ArticleModel->getHomeRightArticle();
        $data = [
            'list' => [$home_left,$home_right],
            'top'  => $home_top,
        ];
        View::show('avana/index',$data);
    }
}
