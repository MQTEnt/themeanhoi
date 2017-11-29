<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="icon" href="wp-content/themes/mytheme/imgs/logo.png" type="image/x-icon" />
        <link rel="shortcut icon" href="wp-content/themes/mytheme/imgs/logo.png" type="image/x-icon" />
        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic" />
        <?php wp_head(); ?>
	</head>
	<body data-spy="scroll" data-target="#navbar-scroll" <?php body_class();?>>
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
                            <div class="logo wow fadeInDown"> <a href=""><img src="<?php echo get_site_icon_url(); ?>" alt="logo"></a></div>

                            <!-- /.main title -->
                            <h1 class="wow fadeInLeft">
                                <?php echo get_bloginfo( 'name' ); ?>
                            </h1>

                            <!-- /.header paragraph -->
                            <div class="landing-text wow fadeInUp">
                                <p><?php echo get_bloginfo( 'description' ); ?></p>
                            </div>				  

                            <!-- /.header button -->
                            <div class="head-btn wow fadeInLeft">
                                <a href="#feature" class="btn-primary">Features</a>
                                <a href="#download" class="btn-default">Download</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </div>

        <!-- NAVIGATION -->
        <div id="menu">
            <nav class="navbar-wrapper navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-backyard">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand site-name" href="#top"><img src="<?php echo get_site_icon_url(); ?>" alt="logo"></a>
                    </div>

                    <!-- Navigator -->
                    <?php display_menu('navbar'); ?>
                </div>
            </nav>
        </div>