<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <meta charset="utf-8">

    <!-- Description, Keywords and Author -->

    <meta name="description" content="">

    <meta name="author" content="">

    <title>:: avana LLC | About ::</title>

    <link rel="shortcut icon" href="<?= AVANA_STATIC; ?>images/favicon.ico" type="image/x-icon">


    <!-- style -->

    <link href="<?= AVANA_STATIC; ?>css/style.css" rel="stylesheet" type="text/css">

    <!-- style -->

    <!-- bootstrap -->

    <link href="<?= AVANA_STATIC; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->

    <link href="<?= AVANA_STATIC; ?>css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

    <link href="<?= AVANA_STATIC; ?>css/font-awesome.4.6.0.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->

</head>

<body>

<!-- header -->
<?php require_once dirname(__FILE__) . '/public/header.php'; ?>
<!-- header -->

<!-- main -->

<main role="main-inner-wrapper" class="container">


    <div class="row">


        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

            <article role="pge-title-content">

                <header>

                    <h2><span>I Do</span> What I love to do.</h2>

                </header>

                <p>Over 60,000,000 customers use our websites and I love them.</p>

            </article>

        </section>


        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

            <article class="about-content">

                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
                    notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas
                    humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc, fiant sollemnes
                    in futurum.</p>

                <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consueum formas humanitatis per
                    seacula quarta deciEodem modo tythepi, qui nunc, fiant sollemnes in futurum.</p>

            </article>

        </section>


        <div class="clearfix"></div>


        <!-- thumbnails -->

        <div class="thumbnails-pan">

        <?php
                foreach ($list as $value) {
                    echo '<section class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                    <figure>
                        <img src="' . $value['image'] . '" class="img-responsive"/>
                        <figcaption>
                          <h3>' . $value['name'] . '</h3>
                            <h5>' . $value['desc'] . '</h5>
                        </figcaption>
                    </figure>
                </section>';
                }
        ?>
        </div>

        <!-- thumbnails -->

    </div>

</main>

<!-- main -->

<!-- footer -->

<?php require_once dirname(__FILE__) . '/public/footer.php' ?>

<!-- footer -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="<?= AVANA_STATIC; ?>js/jquery.min.js" type="text/javascript"></script>

<!-- custom -->

<script src="<?= AVANA_STATIC; ?>js/nav.js" type="text/javascript"></script>

<script src="<?= AVANA_STATIC; ?>js/custom.js" type="text/javascript"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?= AVANA_STATIC; ?>js/bootstrap.min.js" type="text/javascript"></script>

<!-- jquery.countdown -->

<script src="<?= AVANA_STATIC; ?>js/html5shiv.js" type="text/javascript"></script>

</body>

</html>