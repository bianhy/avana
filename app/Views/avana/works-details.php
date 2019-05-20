<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

        <meta name="author" content="">

        <title>:: avana LLC ::</title>
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

        <main role="main-inner-wrapper" class="container">

                <!-- work details -->

                	<div class="work-details">

                        <div class="row">

                        	<div class="col-xs-12 col-sm-12 col-md-4">

                            	<header role="work-title">

                                	<h2><?=$article['title'];?></h2>

                                    <a href="#">Visit online <i class="fa fa-external-link" aria-hidden="true"></i></a>

                                </header>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-8">
                                <?=$article['content'];?>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="work-images grid">
                        <?php if ($article['images']){
                            echo '<ul class="grid-lod effect-2" id="grid">';
                            foreach ($article['images'] as $image){
                                echo '<li><img src="'.$image.'" alt="" class="img-responsive"/></li>';
                            }
                            echo '</ul>';
                        }?>
                        </div>
                    </div>

                <!-- work details -->

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