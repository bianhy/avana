<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

        <meta name="author" content="">

        

        <title>:: avana LLC | Contact ::</title>

        <link rel="shortcut icon" href="<?= AVANA_STATIC; ?>images/favicon.ico" type="image/x-icon">

        <!-- style -->

        <link href="<?= AVANA_STATIC; ?>css/style.css" rel="stylesheet" type="text/css">

        <!-- style -->

        <!-- bootstrap -->

        <link href="<?= AVANA_STATIC; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- responsive -->

        <link href="<?= AVANA_STATIC; ?>css/responsive.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="<?= AVANA_STATIC; ?>css/fonts.css" rel="stylesheet" type="text/css">

        <link href="<?= AVANA_STATIC; ?>css/font-awesome.4.6.0.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="<?= AVANA_STATIC; ?>css/set2.css" rel="stylesheet" type="text/css">

        <link href="<?= AVANA_STATIC; ?>css/normalize.css" rel="stylesheet" type="text/css">

	</head>

    <body>

    	<!-- header -->
        <?php require_once dirname(__FILE__) . '/public/header.php'; ?>
        <!-- header -->

        <!-- main -->

        <main role="main-inner-wrapper" class="container">

            <div class="row">

            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

                	<article role="pge-title-content" class="contact-header">

                    	<header>

                        	<h2><span>Hey Thr!</span> we love to hear you.</h2>

                        </header>

                        <p><a href="tel:999999999"><i class="fa fa-phone" aria-hidden="true"></i> +999999999</a><a href="BBB@QQ.com"><i class="fa fa-envelope" aria-hidden="true"></i> BBB@QQ.com</a></p>

                    </article>

                </div>

                <!-- map -->

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <div class="demo-wrapper">

                        	<div id="surabaya"></div>

                        </div>

                </div>

                <!-- map -->

                <div class="clearfix"></div>

               <!-- contat-from-wrapper -->

               <div class="contat-from-wrapper">

               		  <div id="message"></div>

                                <form method="post" action="" name="cform" id="cform">

                            <div class="row">

                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                                <input  name="name" id="name" type="text" placeholder="Whats your name">

                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                                <input  name="email" id="email" type="email"  placeholder="Whats your email">

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <textarea name="comments" id="comments" cols="" rows="" placeholder="Whats in your mind"></textarea>

                            <div class="clearfix"></div>

                            <input name="" type="submit" value="Send email">

                            <div id="simple-msg"></div>

                        </form>

               </div>

               <!-- contat-from-wrapper -->

            </div>

        </main>

    	<!-- main -->

        <!-- footer -->
        <?php require_once dirname(__FILE__) . '/public/footer.php' ?>
        <!-- footer -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <script src="<?= AVANA_STATIC; ?>js/jquery.min.js" type="text/javascript"></script>

        <!-- custom -->

		

        <script src="<?= AVANA_STATIC; ?>js/custom.js" type="text/javascript"></script>

		<script src="<?= AVANA_STATIC; ?>js/jquery.contact.js" type="text/javascript"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> 

		<script src="<?= AVANA_STATIC; ?>js/maps.js" type="text/javascript"></script>

        <script src="<?= AVANA_STATIC; ?>js/nav.js" type="text/javascript"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script src="<?= AVANA_STATIC; ?>js/bootstrap.min.js" type="text/javascript"></script>

        <!-- jquery.countdown -->

        <script src="<?= AVANA_STATIC; ?>js/html5shiv.js" type="text/javascript"></script>

    </body>

</html>