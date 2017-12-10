        <?php
            if(get_option('tmq_theme_setting')){
                $theme_setting_footer = get_option('tmq_theme_setting')['footer'];
                $theme_setting_phone = get_option('tmq_theme_setting')['phone'];
            }
            else{
                $theme_setting_footer = null;
                $theme_setting_phone = null;
            } 
        ?>
		<footer id="footer">
            <div class="container">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="text-center wow fadeInUp" style="font-size: 14px;"> <?php echo (!is_null($theme_setting_footer))?$theme_setting_footer:''; ?> </div>	
                    <div class="text-center wow fadeInUp" style="font-size: 14px;">&#9400; TMQ - 2017 </div>
                    <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
                    <a href="tel:<?php echo (!is_null($theme_setting_phone))?$theme_setting_phone:''; ?>" class="btn-call"><img src="<?php echo get_template_directory_uri().'/imgs/phone.png'; ?>"></a>
                </div>	
            </div>	
        </footer>
		<?php wp_footer(); //Đã bao gồm cả nhúng JS (khai báo trong functions.js) ?>
		<script>new WOW().init();</script>
	</body>
</html>