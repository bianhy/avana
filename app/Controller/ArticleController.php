<?php

namespace App\Controller;

use Avana\System\Libraries\Input;
use Avana\System\View;

class ArticleController extends AbstractController
{

    public function detail()
    {
        $id = Input::int('id',0);
        if (!$id){
            $this->outError('操作失败！');
        }
        $article = $this->ArticleModel->getArticleInfoByAid($id);
        View::show('avana/works-details');
    }

    public function blog($id)
    {
        $article = $this->ArticleModel->getArticleInfoByAid($id);
        View::show('avana/blog-details');
    }

}
