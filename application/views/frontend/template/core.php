<!DOCTYPE html>
	<?php echo $this->load->view('frontend/template/header');?>
    <body>
        <!-- Page Container -- >
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!-- 'boxed' class for a boxed layout -->
        <div id="page-container">
            <!-- Site Header -->
            <?php echo $this->load->view('frontend/template/menu');?>
            
            <section class="site-section site-section-light site-section-top parallax-image" style="background-image: url('<?php echo base_url();?>files/rsu2.jpg');">
                <div class="container">
                    <center><img src="http://apps.appdev.id/partograf/assets/images/logo_rsu.png"></center>
                    <h1 class="text-center animation-slideDown hidden-xs"><strong>SIPIA</strong></h1>
                    <h2 class="text-center animation-slideUp push hidden-xs">Ruamah Sakit Umum Kota Tangerang Selatan</h2>
                </div>
            </section>
            
            <?php echo $this->load->view('frontend/'.$contents.'');?>
            <!-- Content -->
            
            <!-- END Testimonials -->
            
            <!-- Footer -->
            <?php echo $this->load->view('frontend/template/footer');?>
            <!-- END Footer -->
        
        </div>
        <!-- END Page Container -->
        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>
        
        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="<?php echo base_url('assets/front/');?>js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>
        
        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="<?php echo base_url('assets/front/');?>js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/front/');?>js/plugins.js"></script>
        <script src="<?php echo base_url('assets/front/');?>js/app.js"></script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5b6c88d6afc2c34e96e76c9a/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
    <!--End of Tawk.to Script-->
    </body>
    
</html>