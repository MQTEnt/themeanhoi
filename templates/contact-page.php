<?php
/*
Template Name: Contact page
*/
get_header(); ?>
<div id="main-content" role="main">
	<?php if(have_posts()): while(have_posts()): the_post(); //Loop ?>
	<?php
		get_template_part('content', get_post_format());
	?>
	<?php endwhile ?>
	<?php else: ?>
		<?php get_template_part('content', 'none'); //Nhúng trang content-none.php nếu không có post ?>
	<?php endif ?>
</div><!-- End #main-content -->
<!-- /.contact section -->
<div id="contact">
    <div class="contact" data-img-width="2000" data-img-height="1334" data-diff="100">
        <div class="container">
            <div class="row contact-row">
                <!-- /.contact form -->
                <div class="col-sm-6 col-sm-offset-3">
                	<p style='text-align: center; font-weight: bold'>Điền vào mẫu sau để liên hệ nhanh với chúng tôi!</p>
                    <form id="contact-form" class="form-horizontal">
                        <div class="form-group">
                            <input type="text" id="message_name" class="form-control wow fadeInUp" placeholder="Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" id="message_email" class="form-control wow fadeInUp" placeholder="Email" required/>
                        </div>					
                        <div class="form-group">
                            <textarea rows="20" cols="20" id="message_content" class="form-control input-message wow fadeInUp"  placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" id="btn-submit" name="btn-submit" value="Gửi yêu cầu" class="btn btn-success wow fadeInUp" />
                        	<div id="container-send-loading" style="text-align: center; margin: 10px 0">
                      		</div>
                        </div>
                    </form>
                    <script>
                        (function($){
                            $(document).ready(function(){
                                $('#btn-submit').click(function(){
                                    var message_name= $('#message_name').val();
                                    var message_email= $('#message_email').val();
                                    var message_content= $('#message_content').val();
                                    //console.log(message_content);
                                    if(message_content === '' || message_email === '' || message_name === '')
                                        alert('Nhập thiếu nội dung, mời nhập lại!');
                                    else{
                                        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                        if(!regex_email.test(message_email)){
                                            alert('Email không hợp lệ, mời nhập lại!');
                                        }
                                        else{
                                            //Send request
                                            $.ajax({
                                                type : "post",
                                                dataType : "json", 
                                                url : '<?php echo admin_url('admin-ajax.php');?>', //Defalt
                                                data : {
                                                    action: "mail_handle", //action name in function.php
                                                    message_name: message_name,
                                                    message_email: message_email,
                                                    message_content: message_content
                                                },
                                                context: this,
                                                beforeSend: function(){
                                                    //Do something...
                                                    $('#container-send-loading').append("<img id='send-loading' style='width: 50px; height: 50px; text-align: center' src='<?php echo get_template_directory_uri().'/imgs/sending.gif' ?>'/>");
                                                },
                                                success: function(response) {
                                                	$('#send-loading').remove();
                                                    if(response.success) {
                                                        alert(response.data);
                                                        //Clean form
                                                        $('#message_name').val('');
                                                        $('#message_email').val('');
                                                        $('#message_content').val('');
                                                    }
                                                    else {
                                                        alert('Đã có lỗi xảy ra');
                                                    }
                                                },
                                                error: function( jqXHR, textStatus, errorThrown ){
                                                    //Do something
                                                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                                                }
                                            })
                                            return false;
                                        }
                                    }
                                })
                            })
                        })(jQuery)
                    </script>		
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
