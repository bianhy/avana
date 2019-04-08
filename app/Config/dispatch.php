<?php

//路由规则
return [
    ['ANY', '/start',  ['StartController', 'banner']],
    ['ANY', '/login',  ['ActionController', 'login']],
    ['ANY', '/about',  ['SystemController', 'about']],
    ['ANY', '/blog',  ['SystemController', 'blog']],
    ['ANY', '/contact',  ['SystemController', 'contact']],

    ['ANY', '/article',  ['ArticleController', 'detail']],
    ['ANY', '/blog/{id:\d+}',  ['ArticleController', 'blog']],

    ['ANY', '/s',      ['Script\TestController', 'index']],
    ['ANY', '/time',   ['TestController', 'time']],
    ['GET', '/home/{id:\d+}', ['HomeController', 'index']],
];
