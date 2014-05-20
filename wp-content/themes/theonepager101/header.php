<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;

 $settings = array(
	'header_content' => ''
 );
	
 $settings = woo_get_dynamic_values( $settings );
?><!DOCTYPE html>
<html lang="es">
<head>


<script type="text/javascript">
  window.___gcfg = {lang: 'es-419'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script src="//use.edgefonts.net/ubuntu.js"></script> 



<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>
<div id="wrapper">
    
    <?php woo_header_before(); ?>

	<header id="header">
		<div class="col-full">
		
			<?php woo_header_inside(); ?>
	    	
	    	<hgroup>
				<h1 class="site-title"><a alt="Clases De Guitarra" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				


<aside id="social-botons">
	<span><img src="http://clasesdeguitarra.co/wp-content/uploads/2013/10/punta.png" alt="puntos">

	<ul>
		<li>
			<div class="fb-like" data-href="http://facebook.com/clasesdeguitarra.co" data-width="100" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false"></div>
		</li>

		<li>
			<div class="g-plusone" data-size="medium" data-href="http://clasesdeguitarra.co"></div>
		</li>
		
	</ul>
</aside>


				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>



			<?php if ( $settings['header_content'] != '' ) { ?>
				<p><?php echo $settings['header_content']; ?></p>
			<?php } ?>
			
			 <?php if ( is_woocommerce_activated() && isset( $woo_options['woocommerce_header_cart_link'] ) && 'true' == $woo_options['woocommerce_header_cart_link'] ) { ?>
	    	    	<ul class="nav cart fr">
	    	    		<li><a class="cart-contents" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'woothemes' ); ?>"><?php echo sprintf( _n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count );?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a></li>
	    	   		</ul>
	    	    <?php } ?>
	        
		</div>

	<section id="call-to-action">
		<img src="http://clasesdeguitarra.co/wp-content/uploads/2013/10/play.png" class="play">
		<!-- Formulario -->
		<div id="nuevo_formulario"><form class="validate" id="mc-embedded-subscribe-form" action="http://andresospina.us2.list-manage1.com/subscribe/post?u=e78c569d92057db8ce6063fdf&amp;id=d00f2d5ef7" method="post" name="mc-embedded-subscribe-form" target="_blank">

		<div class="nf-calltoaction"><label for="mce-FNAME"></label> <input id="mce-FNAME" type="text" name="FNAME" placeholder="Nombre" required="required" value="" /></div>

		<div class="nf-calltoaction"><label for="mce-EMAIL"></label> <input class="required email" id="mce-EMAIL" type="email" name="EMAIL" placeholder="Email" required="required" value="" /></div>
		<div class="clear" id="mce-responses"></div>

		<div class="nf-calltoaction"><label for="mce-PHONE"></label> <input id="mce-PHONE" type="text" name="PHONE" placeholder="Teléfono ó móvil" required="required" value="" /></div>

		<div class="clear"><input class="botonzote" id="mc-embedded-subscribe" type="submit" name="subscribe" value="Empezar Ahora" /></div>
		</form></div>
		<!--Formulario-->

	</section>

	</header><!-- /#header -->

<!-- ClickTale Top part -->
<script type="text/javascript">
var WRInitTime=(new Date()).getTime();
</script>
<!-- ClickTale end of Top part -->


	<?php woo_content_before(); ?>