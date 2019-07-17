<?php

namespace App\Model;

use Avana\System\Libraries\Database\DB;
use Avana\System\Model\AbstractModel;
use Avana\System\Libraries\Cache;

class ArticleModel extends AbstractModel
{
    const  ARTICLE_INFO = 'article:info:';
    protected static $table = 'articles';
    protected $base_param = [
        'id',
        'title',
        'span',
        'desc',
        'cover',
    ];


    public function newArticle($article)
    {
        return DB::table(self::$table)->insert($article);
    }

    public function getArticleInfoByAid($aid)
    {
        return $this->getArticles($aid, false);
    }

    //根据aid获取文章信息，支持批量获取
    public function getArticles($aid, $with_key = true)
    {
        $multi = true;
        if (!is_array($aid)) {
            $multi = false;
            $aid = [$aid];
        }

        foreach ($aid as $id) {
            $key[] = self::ARTICLE_INFO . $id;
        }

        $callback = function ($_aid) {
            return DB::table(self::$table)->where('id', $_aid)->first();
        };

        $ret = $this->getMultipleByKeys($aid, self::ARTICLE_INFO, $callback, Cache::redis('default'), $with_key);

        if ($multi === false) {
            $ret = array_shift($ret);
            if ($ret) {
                $ret = $this->format($ret);
            }
        } else {
            $ret = array_filter($ret);
            foreach ($ret as &$value) {
                $value = $this->format($value);
            }
        }
        return $ret;
    }

    protected function format($article)
    {
        $article['images'] = json_decode($article['images'], 1);
        return $article;
    }

    public function getArticleList($where, $size)
    {
        return DB::table(self::$table)->select('*')->where($where)->paginate($size);
    }

    public function getHomeTopArticle()
    {
        $where = [
            'position' => 'home-top',
            'status' => 1,
        ];
        return DB::table(self::$table)->select($this->base_param)->where($where)->first();
    }

    public function getHomeLeftArticle()
    {
        $where = [
            'position' => 'home-left',
            'status' => 1,
        ];
        return DB::table(self::$table)->select($this->base_param)->where($where)->limit(8)->get();
    }

    public function getHomeRightArticle()
    {
        $where = [
            'position' => 'home-right',
            'status' => 1,
        ];
        return DB::table(self::$table)->select($this->base_param)->where($where)->limit(8)->get();
    }
}
