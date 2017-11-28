<?php get_header(); ?>
<?php get_sidebar('center'); ?>
<!-- /.testimonial section -->
<div id="testi">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInLeft">TESTIMONIALS</h2>
            <div class="title-line wow fadeInRight"></div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">	
                <div id="owl-testi" class="owl-carousel owl-theme wow fadeInUp">

                    <!-- /.testimonial 1 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <!-- <img src="images/testi1.png" alt="client"> -->
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">"We are very happy and satisfied with Backyard service. Our account manager is efficient and very knowledgeable. It was able to create a vast fan base within very short period of time. We would highly recommend Backyard App to anyone."</p>
                        </div>
                        <div class="client-info text-center">

                            <!-- /.client name -->
                            Jennifer Lopez, <span class="company">Microsoft</span>	
                        </div>
                    </div>		

                    <!-- /.testimonial 2 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <!-- <img src="images/testi2.png" alt="client"> -->
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">"Everything looks great... Thanks for the quick revision turn around. We were lucky to find you guys and will definitely be using some of your other services in the near future."</p>
                        </div>
                        <div class="client-info text-center">

                            <!-- /.client name -->
                            Mike Portnoy, <span class="company">Dream Theater</span>	
                        </div>
                    </div>				

                    <!-- /.testimonial 3 -->
                    <div class="testi-item">
                        <div class="client-pic text-center">

                            <!-- /.client photo -->
                            <!-- <img src="images/testi3.png" alt="client"> -->
                        </div>
                        <div class="box">

                            <!-- /.testimonial content -->
                            <p class="message text-center">"Overall, the two reports were very clear and helpful so thank you for the suggestion to do the focus group. We are currently working with our developer to implement some of these suggestions."</p>
                        </div>
                        <div class="client-info text-center">

                            <!-- /.client name -->
                            Jennifer Love Hewitt, <span class="company">Lead Vocal</span>	
                        </div>
                    </div>			

                </div>
            </div>	
        </div>	
    </div>
</div>

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
