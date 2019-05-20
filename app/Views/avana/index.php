<!DOCTYPE HTML>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bianhy's Blog</title>
    <link rel="shortcut icon" href="<?=AVANA_STATIC;?>images/favicon.ico" type="image/x-icon">

    <!-- style -->

    <link href="<?=AVANA_STATIC;?>css/style.css" rel="stylesheet" type="text/css">

    <!-- style -->

    <!-- bootstrap -->

    <link href="<?=AVANA_STATIC;?>css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->

    <link href="<?=AVANA_STATIC;?>css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="<?= AVANA_STATIC; ?>css/font-awesome.4.6.0.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="<?=AVANA_STATIC;?>css/effects/set2.css" rel="stylesheet" type="text/css">
    <link href="<?=AVANA_STATIC;?>css/effects/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?=AVANA_STATIC;?>css/effects/component.css"  rel="stylesheet" type="text/css" >
</head>

<body>

<!-- header -->
<?php require_once dirname(__FILE__) . '/public/header.php'; ?>
<!-- header -->

<!-- main -->

<main role="main-home-wrapper" class="container">
  <div class="row">
    <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
      <article role="pge-title-content">
        <header>
          <h2><span>Avana</span> 记录生活的点点滴滴</h2>
        </header>
        <p>他们就像一张张散落在风中的扑克牌，消失在人们的青春回忆里，想抓也抓不住了。</p>
      </article>
    </section>
    <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
      <figure class="effect-oscar"> <img src="<?= $top['cover'];?>" alt="" class="img-responsive"/>
        <figcaption>
          <h2><?= $top['title'];?><span><?= $top['span'];?></span></h2>
          <p><?= $top['desc'];?></p>
          <a href="article?id="<?=$top['id'];?>>View more</a> </figcaption>
      </figure>
    </section>
    <div class="clearfix"></div>
      <?php foreach ($list as $value){
          echo '<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
      <ul class="grid-lod effect-2" id="grid">';
          foreach ($value as $item){
              echo '<li>
          <figure class="effect-oscar"> <img src="'.$item['cover'].'" alt="" class="img-responsive"/>
            <figcaption>
              <h2>'.$item['title'].'<span>'.$item['span'].'</span></h2>
              <p>'.$item['desc'].'</p>
              <a href="article?id='.$item['id'].'">'.'View more</a>
            </figcaption>
          </figure>
        </li>';
          }
          echo '</ul>
    </section>';
      }?>
    <div class="clearfix"></div>
  </div>
</main>
<!-- main -->

<!-- footer -->
<?php require_once dirname(__FILE__) . '/public/footer.php' ?>
<!-- footer -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="<?=AVANA_STATIC;?>js/jquery.min.js" type="text/javascript"></script>

<!-- custom -->

<script src="<?=AVANA_STATIC;?>js/nav.js" type="text/javascript"></script>
<script src="<?=AVANA_STATIC;?>js/custom.js" type="text/javascript"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?=AVANA_STATIC;?>js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?=AVANA_STATIC;?>js/effects/masonry.pkgd.min.js"  type="text/javascript"></script>
<script src="<?=AVANA_STATIC;?>js/effects/imagesloaded.js"  type="text/javascript"></script>
<script src="<?=AVANA_STATIC;?>js/effects/classie.js"  type="text/javascript"></script>
<script src="<?=AVANA_STATIC;?>js/effects/AnimOnScroll.js"  type="text/javascript"></script>
<script src="<?=AVANA_STATIC;?>js/effects/modernizr.custom.js"></script>

<!-- jquery.countdown -->

<script src="<?=AVANA_STATIC;?>js/html5shiv.js" type="text/javascript"></script>
</body>
</html>