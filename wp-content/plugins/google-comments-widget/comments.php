<?php
/**
 * Comments Template
 *
 * @file           comments.php
 * @package        Google+ Comments
 * @author         Arun SK <arun@skipser.com)
 * @copyright      2013 Arun SK
 * @license        GPLv3+
 * @license_file   LICENSE
 */

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Please do not modify this file directly, make a copy in your template directory
 * and name it gplus-comments.php and it will have priority over the default one
 */
?>

<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.'); ?></p>
<?php return; } ?>

<div id="gpluscommentCredit" style="height: 20px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;font-size:10px;line-height:20px;margin:0;padding:0;"><i><a style="text-decoration:none;" href="http://wordpress.org/extend/plugins/google-comments-widget/">Google+ comment widget</a> by <a style="text-decoration:none;" href="http://www.skipser.com">skipser</a></i></div>
<?php if(get_option('GOOGLEPLUSCOMMENTS-CREDITS')==0) { ?>
	<script type="text/javascript">var credit=document.getElementById("gpluscommentCredit");if(credit){credit.style.display="none";}</script>
<?php } ?>

<?php if(get_option('GOOGLEPLUSCOMMENTS-HIDECOMMENTS') == 1) { ?>
	<span id="showcommentlink"><a onclick="document.getElementById('googlepluscommentsarea').style.display='inline'; document.getElementById('showcommentlink').style.display='none';return false;" href="#"><i>Show Comments&raquo;</i></a></span>
<?php } ?>

<div id="googlepluscommentsarea" style="<?php if(get_option('GOOGLEPLUSCOMMENTS-HIDECOMMENTS') == 1) {echo "display:none;";} ?>">
	<script type="text/javascript">	window.___gcfg = {lang: 'en'};(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
	
	<?php if(get_option('GOOGLEPLUSCOMMENTS-DYNAMICWIDTH')==1) { ?>
		<script type="text/javascript">
		var w=document.getElementById('googlepluscommentsarea').offsetWidth;
		document.write('<g:comments href="<?php echo the_permalink(); ?>" width="'+w+'" height="50" first_party_property="BLOGGER" view_type="FILTERED_POSTMOD"></g:comments>');
		</script>
	<?php } else { ?>
		<g:comments href="<?php echo the_permalink(); ?>" width="<?php echo get_option('GOOGLEPLUSCOMMENTS-WIDTH'); ?>" first_party_property="BLOGGER" view_type="FILTERED_POSTMOD"></g:comments>
	<?php } ?>
</div>
 <?php 
	if(get_option('GOOGLEPLUSCOMMENTS-RETAINOLDCOMMENTS') == 1) {
		wp_list_comments(); 
	}
?> 


<!-- Google+ comments show up in their initial size even if the display area is smaller -->
<!--script type="text/javascript">window.onload=function() {document.getElementById('googlepluscommentsarea').style.width="90%";document.getElementById('googlepluscommentsarea').style.width="80%";}</script-->

