<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
        <?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>
        <!-- /.preloader -->
        <div id="preloader"></div>
        <div id="top"></div>

        <!-- /.parallax full screen background image -->
        <div class="fullscreen landing parallax" style="background-image:url('<?php header_image(); ?>');" data-img-width="2000" data-img-height="1333" data-diff="100">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">

                            <!-- /.logo -->
                            <div class="logo wow fadeInDown"> <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_site_icon_url(); ?>" alt="logo"></a></div>

                            <!-- /.main title -->
                            <h1 id='main-title' class="wow fadeInLeft">
                                <?php echo get_bloginfo( 'name' ); ?>
                            </h1>

                            <!-- /.header paragraph -->
                            <div class="landing-text wow fadeInUp">
                                <p><?php echo get_bloginfo( 'description' ); ?></p>
                            </div>				  

                            <!-- /.header button -->
                            <div class="head-btn wow fadeInLeft">
                                <!-- <a href="#" class="btn-primary">Button</a>
                                <a href="#" class="btn-default">Button</a> -->
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>
        <!-- Navigator -->
        <div id="menu">
            <nav class="navbar navbar-default" data-spy="affix" data-offset-top="500">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#btn-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand site-name" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_site_icon_url(); ?>" alt="logo"></a>
                    </div>
                    <!-- Navigator item -->
                    <?php display_menu('navbar'); ?>
                </div><!-- /.container-fluid -->
            </nav>
        </div>