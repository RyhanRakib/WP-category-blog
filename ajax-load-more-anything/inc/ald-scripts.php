<?php 
/*
* Scripts
*/
function ald_scripts(){
	//wp_enqueue_style('ald-stylesheet', plugin_dir_url(__FILE__).'inc/css/asr-main.css',array(),'1.0');	
	wp_enqueue_script('jquery');
}

add_action('init','ald_scripts');

/*
* Admin Scripts 
*/
function ald_admin_scripts() {

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery-form' );

}
add_action( 'admin_enqueue_scripts', 'ald_admin_scripts' );

/**
 *	Plugin footer admin script
 *
 */
if( !function_exists('ald_plugin_admin_script') ){
	function ald_plugin_admin_script(){

		ob_start(); ?>
		<style>
			#postimagediv a.header {
			    text-transform: uppercase;
			    text-decoration: none;
			}
		</style>
		<script type="text/javascript">
			jQuery(function($){

				jQuery('#postimagediv .collapse').hide();

				jQuery('#postimagediv').each(function(){

					$('#postimagediv [data-toggle]').on('click',function(e){
						e.preventDefault();

						var getID = $(this).attr('href');

						$( '#postimagediv '+getID ).slideToggle();
					})
				});
			})
		</script> <?php

		echo ob_get_clean();

	}
}
add_action( 'admin_footer', 'ald_plugin_admin_script' );

/*
* Custom CSS script
*/
function ald_custom_style(){?>
	<style type="text/css"> 
		<?php 
		if(!empty(get_option('ald_load_class'))){
			echo esc_attr( get_option('ald_load_class') );
		} 
		if(!empty(get_option('ald_load_classa'))){
			echo ','.esc_attr( get_option('ald_load_classa') );
		} 
		if(!empty(get_option('ald_load_classb'))){
			echo ','.esc_attr( get_option('ald_load_classb') );
		} 
		if(!empty(get_option('ald_load_classc'))){
			echo ','.esc_attr( get_option('ald_load_classc') );
		} 
		if(!empty(get_option('ald_load_classd'))){
			echo ','.esc_attr( get_option('ald_load_classd') );
		} 		
		?>{
			display: none;
		}
		<?php if(empty(get_option('ald_css_class'))){ ?>
		.btn.loadMoreBtn {
			color: #333333;
			text-align: center;
		}

		.btn.loadMoreBtn:hover {
		  text-decoration: none;
		}
		<?php } else{
			echo esc_attr( get_option('ald_css_class') );
		} ?>
	</style>
<?php }

add_action('wp_head','ald_custom_style');

/*
* Admin Scripts for form Design
*/
function ald_admin_style(){?>
	<style type="text/css"> 
		@media(min-width:960px){
			.left-col{			
				width:60%;
			}
			.right-col{			
				width:40%;
			}
			td.right-col{
				vertical-align:top;
			}
		}
		.successModal {
			display: inline-block;
		}
		<?php if(empty(get_option('ald_css_class'))){ ?>
		.btn.loadMoreBtn {
			color: #333333;
			text-align: center;
		}

		.btn.loadMoreBtn:hover {
		  text-decoration: none;
		}
		<?php } else{
			echo esc_attr( get_option('ald_css_class') );
		} ?>
	</style>
<?php }

add_action('admin_head','ald_admin_style');

/*
* Ajax option Saving
*/
function ald_ajax_save_btn(){ ?>
	<?php submit_button(); ?>
	<div id="saveResult"></div>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#ald_option_form').submit(function() {
				jQuery(this).ajaxSubmit({
					success: function() {
						jQuery('#saveResult').html("<div id='saveMessage' class='successModal'></div>");
						jQuery('#saveMessage').append("<p><?php echo htmlentities(__('Settings Saved Successfully','wp'),ENT_QUOTES); ?></p>").show();
					},
					beforeSend: function() {
						jQuery('#saveResult').html("<div id='saveMessage' class='successModal'><span class='is-active spinner'></span></div>");
					},
					timeout: 10000
				});
								

				return false;
			});
		});
	</script>
<?php }

function ald_custom_code(){?>
	<script type="text/javascript"> 
		(function($) {
			'use strict';

			jQuery(document).ready(function() {
				//wrapper zero
				<?php if(!empty(get_option('ald_wrapper_class'))):?>
					$("<?php echo esc_attr( get_option('ald_wrapper_class') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMore"><?php echo esc_attr( get_option('ald_load_label') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_class') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_show') ); ?>).show();
					$("#loadMore").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_class') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_load') ); ?>).slideDown();
						if ($("<?php echo esc_attr( get_option('ald_load_class') ); ?>:hidden").length == 0) {
							$("#loadMore").fadeOut('slow');
						}
					});
				<?php endif;?>
				// end wrapper 1
				
				//wrapper 2
				<?php if(!empty(get_option('ald_wrapper_classa'))):?>
					$("<?php echo esc_attr( get_option('ald_wrapper_classa') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMorea"><?php echo esc_attr( get_option('ald_load_labela') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_classa') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_showa') ); ?>).show();

					$("#loadMorea").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_classa') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_loada') ); ?>).slideDown();
						if ($("<?php echo esc_attr( get_option('ald_load_classa') ); ?>:hidden").length == 0) {
							$("#loadMorea").fadeOut('slow');
						}
					});
				<?php endif;?>
				// end wrapper 2
				
				// wrapper 3 
				<?php if(!empty(get_option('ald_wrapper_classb'))):?>
					$("<?php echo esc_attr( get_option('ald_wrapper_classb') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMoreb"><?php echo esc_attr( get_option('ald_load_labelb') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_classb') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_showb') ); ?>).show();
					$("#loadMoreb").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_classb') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_loadb') ); ?>).slideDown();
						if ($("<?php echo esc_attr( get_option('ald_load_classb') ); ?>:hidden").length == 0) {
							$("#loadMoreb").fadeOut('slow');
						}
					});
				<?php endif;?>
				// end wrapper 3
				
				//wraper 4
				<?php if(!empty(get_option('ald_wrapper_classc'))):?>
					$("<?php echo esc_attr( get_option('ald_wrapper_classc') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMorec"><?php echo esc_attr( get_option('ald_load_labelc') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_classc') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_showc') ); ?>).show();

					$("#loadMorec").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_classc') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_loadc') ); ?>).slideDown();
						if ($("<?php echo esc_attr( get_option('ald_load_classc') ); ?>:hidden").length == 0) {
							$("#loadMorec").fadeOut('slow');
						}
					});
				<?php endif;?>
				// end wrapper 4
				
				//wrapper 5
				<?php if(!empty(get_option('ald_wrapper_classd'))):?>
					$("<?php echo esc_attr( get_option('ald_wrapper_classd') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMored"><?php echo esc_attr( get_option('ald_load_labeld') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_classd') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_showd') ); ?>).show();

					$("#loadMored").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_classd') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_loadd') ); ?>).slideDown();
						if ($("<?php echo esc_attr( get_option('ald_load_classd') ); ?>:hidden").length == 0) {
							$("#loadMored").fadeOut('slow');
						}
					});
				<?php endif;?>
				// end wrapper 5

				//wrapper 5
				<?php if(!empty(get_option('ald_wrapper_classe'))):?>				
					$("<?php echo esc_attr( get_option('ald_wrapper_classe') ); ?>").append('<a href="#" class="btn loadMoreBtn" id="loadMored"><?php echo esc_attr( get_option('ald_load_labele') ); ?></a>');
					
					$("<?php echo esc_attr( get_option('ald_load_classe') ); ?>").hide();

					$("<?php echo esc_attr( get_option('ald_load_classe') ); ?>").slice(0, <?php echo esc_attr( get_option('ald_item_showe') ); ?>).css({ 'display': 'flex' });

					$("#loadMored").on('click', function (e) {
						e.preventDefault();
						$("<?php echo esc_attr( get_option('ald_load_classe') ); ?>:hidden").slice(0, <?php echo esc_attr( get_option('ald_item_loade') ); ?>).css({ 'display': 'flex' });
						if ($("<?php echo esc_attr( get_option('ald_load_classe') ); ?>:hidden").length == 0) {
							$("#loadMored").fadeOut('slow');
						}
					});				
				<?php endif;?>
				// end wrapper 6

			});

		})(jQuery);
	</script>
<?php }

add_action('wp_footer','ald_custom_code');