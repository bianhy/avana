<?php

namespace App\Model;

use Avana\System\Libraries\Database\DB;
use Avana\System\Model\AbstractModel;
use Avana\System\Libraries\Cache;

class ArticleModel extends AbstractModel
{
    const  ARTICLE_INFO = 'article:info:';
    protected static $table = 'articles';


    public function newArticle($article)
    {
        return DB::table(self::$table)->insert($article);
    }

    public function getArticleInfoByAid($aid)
    {
        return $this->getArticles($aid,false);
    }

    //根据aid获取文章信息，支持批量获取
    public function getArticles($aid,$with_key = true)
    {
        $multi = true;
        if (!is_array($aid)) {
            $multi = false;
            $aid  = [$aid];
        }

        foreach ($aid as $id) {
            $key[] = self::ARTICLE_INFO . $id;
        }

        $callback = function ($_aid){
            return DB::table(self::$table)->where('aid', $_aid)->first();
        };

        $ret = $this->getMultipleByKeys($aid, self::ARTICLE_INFO, $callback, Cache::redis('default'),$with_key);

        if ($multi === false) {
            $ret = array_shift($ret);
        }
        if (!$ret) return $ret;
        $ret = $this->format(array_filter($ret));

        return $ret;
    }

    protected function format($article)
    {
        return $article;
    }
    
    public function getArticleList($where,$size)
    {
        return DB::table(self::$table)->select('*')->where($where)->paginate($size);
    }
}