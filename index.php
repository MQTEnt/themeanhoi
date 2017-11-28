<?php get_header(); ?>
<?php get_sidebar('center'); ?>


<!-- /.contact section -->
<div id="contact">
    <div class="contact fullscreen parallax" style="background-image:url('wp-content/themes/mytheme/imgs/bg.jpg');" data-img-width="2000" data-img-height="1334" data-diff="100">
        <div class="overlay">
            <div class="container">
                <div class="row contact-row">

                    <!-- /.address and contact -->
                    <div class="col-sm-5 contact-left wow fadeInUp">
                        <h2><span class="highlight">Get</span> in touch</h2>
                        <ul class="ul-address">
                            <li><i class="pe-7s-map-marker"></i>1600 Amphitheatre Parkway, Mountain View</br>
                                California 55000
                            </li>
                            <li><i class="pe-7s-phone"></i>+1 (123) 456-7890</br>
                                +2 (123) 456-7890
                            </li>
                            <li><i class="pe-7s-mail"></i><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                            <li><i class="pe-7s-look"></i><a href="#">www.yoursite.com</a></li>
                        </ul>	

                    </div>

                    <!-- /.contact form -->
                    <div class="col-sm-7 contact-right">
                        <form method="POST" id="contact-form" class="form-horizontal" action="contactengine.php" onSubmit="alert( 'Thank you for your feedback!' );">
                            <div class="form-group">
                                <input type="text" name="Name" id="Name" class="form-control wow fadeInUp" placeholder="Name" required/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Email" id="Email" class="form-control wow fadeInUp" placeholder="Email" required/>
                            </div>					
                            <div class="form-group">
                                <textarea name="Message" rows="20" cols="20" id="Message" class="form-control input-message wow fadeInUp"  placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success wow fadeInUp" />
                            </div>
                        </form>		
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
