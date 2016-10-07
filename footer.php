</div><!-- end of content div -->
<div class="bot-ads-area">
<?php if ( ! dynamic_sidebar( 'Bottom Advertisement Area' )) : endif; ?>
</div>
<!-- CONTENT ENDS HERE -->
<!-- ============= BOTTOM AREA STARTS HERE ============== -->
<div class="row">
<div id="bottom-wrap">
<div class="w-pet-border"></div>
    <ul id="bottom" class="clearfix">
        <li class="col-lg-4 col-md-6 col-xs-12">
            <ul>
                <?php dynamic_sidebar('Footer Column 1'); ?>
            </ul>
        </li>
        <li class="col-lg-4 col-md-6 col-xs-12">
            <ul>
                <?php dynamic_sidebar('Footer Column 2'); ?>
            </ul>
        </li>
        <li class="col-lg-4 col-md-6 col-xs-12">
            <ul>
                <?php dynamic_sidebar('Footer Column 3'); ?>
            </ul>
        </li>
    </ul><!-- end of bottom div -->
</div><!-- end of bottom-wrap div -->
</div>
<!-- ============= BOTTOM AREA ENDS HERE ============== -->


<!-- ============= CONTAINER AREA ENDS HERE ============== -->
<!-- ============= FOOTER STARTS HERE ============== -->
<div class="row">
    <div  id="footer-wrap">
    <div id="footer">
        <?php if ( function_exists( 'ot_get_option' ) ) { ?>
            <p class="copyright"><?php echo wp_kses_post(ot_get_option( 'copyright_statement' )); ?></p>
            <p class="dnd"><?php echo wp_kses_post(ot_get_option( 'footer_dev_statement' )); ?></p>
        <?php } ?>
    </div><!-- end of footer div -->
    </div>
</div><!-- end of footer-wrapper div -->
</div><!-- end of container div -->
</div>
<!-- ============= FOOTER STARTS HERE ============== -->
<!-- Twittern Button -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- GooglePlus +1 Button -->
<script type="text/javascript">
  window.___gcfg = {lang: 'de'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!-- Facebook Like-Button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=529013080455948";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
// for google map 0-0-0-0-0-0
if(is_page_template('template-contact.php')){
    get_template_part('inc/gmap');
}
//0-0-0-0-0-0-0-0-0-0-0-0-0-0
wp_footer();
if ( is_singular('recipe') )
{
    ?>
    <script type="text/javascript">
        (function() {
            window.PinIt = window.PinIt || { loaded:false };
            if (window.PinIt.loaded) return;
            window.PinIt.loaded = true;
            function async_load(){
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = "http://assets.pinterest.com/js/pinit.js";
                var x = document.getElementsByTagName("script")[0];
                x.parentNode.insertBefore(s, x);
            }
            if (window.attachEvent)
                window.attachEvent("onload", async_load);
            else
                window.addEventListener("load", async_load, false);
        })();
    </script>
<?php
}
?>
<script type="text/javascript">
    //=============================
    //this function attached focus and blur events with input elements
    var addFocusAndBlur = function($input, $val){
        $input.focus(function(){
            if (this.value == $val) {this.value = '';}
        });
        $input.blur(function(){
            if (this.value == '') {this.value = $val;}
        });
    }
    // example code to attach the events
    addFocusAndBlur(jQuery('#s'),'<?php _e('Search for', 'FoodRecipe'); ?>');
    addFocusAndBlur(jQuery('#cname'),'<?php _e('Name here', 'FoodRecipe'); ?>');
    addFocusAndBlur(jQuery('#cemail'),'<?php _e('Email here', 'FoodRecipe'); ?>');
    addFocusAndBlur(jQuery('#cmessage'),'<?php _e('Message', 'FoodRecipe'); ?>');
    addFocusAndBlur(jQuery('#message'), '<?php _e('Type your comments here', 'FoodRecipe'); ?>');
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36526197-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
