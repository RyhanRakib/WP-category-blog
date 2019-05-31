<?php 
/*
Plugin Name:  Load More Anything
Plugin URI:   http://asrcoder.com
Author:       Akhtarujjaman Shuvo
Author URI:   https://www.facebook.com/akhterjshuvo
Version: 	  2.2.0
Description:  A simple plugin that help you to Load more any item with Jquery. You can use Ajaxify Load More button for your blog post, Comments, page, Category, Recent Posts, Sidebar widget Data, Woocommerce Product, Images, Photos, Videos, custom Div or whatever you want.
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  asr_td
Domain Path:  /languages

Load More Anything is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Load More Anything is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Load More Anything. If not, see https://www.gnu.org/licenses/gpl-2.0.html.

*/


/**
* Get Scripts files 
**/
require_once('inc/ald-scripts.php');

/**
* Add Setting Page Submenu
*/
function ald_add_submenu_page() {
	add_submenu_page( 
		'options-general.php', 
		'Load More Anything Settings page by ThemeVanilla', 
		'Load More Anything', 
		'manage_options', 
		'ald_setting', 
		'ald_settings_callback' 
	);
}
add_action( 'admin_menu', 'ald_add_submenu_page' );


/**
* Design Setting Page
**/

function ald_settings_callback(){ ?>
<div class="wrap">
<h1>Load More Anyting</h1>

<form method="post" action="options.php" id="ald_option_form">
    <?php settings_fields( 'ald-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ald-plugin-settings-group' ); ?>

	<table class="form-table">
		<tr>
			<td class="left-col">
			<!-- Wrapper One Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divone">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 1</h2>
						</span>
					</a>
					<div id="divone" class="collapse show">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_class" value="<?php echo esc_attr( get_option('ald_wrapper_class') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_class" value="<?php echo esc_attr( get_option('ald_load_class') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_show" value="<?php echo esc_attr( get_option('ald_item_show') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_load" value="<?php echo esc_attr( get_option('ald_item_load') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_label" value="<?php echo esc_attr( get_option('ald_load_label') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper One end -->
				
				<!-- Wrapper Two Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divtwo">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 2</h2>
						</span>
					</a>
					<div id="divtwo" class="collapse">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_classa" value="<?php echo esc_attr( get_option('ald_wrapper_classa') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_classa" value="<?php echo esc_attr( get_option('ald_load_classa') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_showa" value="<?php echo esc_attr( get_option('ald_item_showa') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_loada" value="<?php echo esc_attr( get_option('ald_item_loada') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_labela" value="<?php echo esc_attr( get_option('ald_load_labela') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper Two end -->
				
				<!-- Wrapper Three Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divthree">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 3</h2>
						</span>
					</a>
					<div id="divthree" class="collapse">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_classb" value="<?php echo esc_attr( get_option('ald_wrapper_classb') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_classb" value="<?php echo esc_attr( get_option('ald_load_classb') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_showb" value="<?php echo esc_attr( get_option('ald_item_showb') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_loadb" value="<?php echo esc_attr( get_option('ald_item_loadb') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_labelb" value="<?php echo esc_attr( get_option('ald_load_labelb') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper Three end -->
				
				<!-- Wrapper Four Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divfour">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 4</h2>
						</span>
					</a>
					<div id="divfour" class="collapse">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_classc" value="<?php echo esc_attr( get_option('ald_wrapper_classc') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_classc" value="<?php echo esc_attr( get_option('ald_load_classc') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_showc" value="<?php echo esc_attr( get_option('ald_item_showc') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_loadc" value="<?php echo esc_attr( get_option('ald_item_loadc') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_labelc" value="<?php echo esc_attr( get_option('ald_load_labelc') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper Four end -->
				
				<!-- Wrapper Five Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divfive">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 5</h2>
						</span>
					</a>
					<div id="divfive" class="collapse">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_classd" value="<?php echo esc_attr( get_option('ald_wrapper_classd') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_classd" value="<?php echo esc_attr( get_option('ald_load_classd') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_showd" value="<?php echo esc_attr( get_option('ald_item_showd') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_loadd" value="<?php echo esc_attr( get_option('ald_item_loadd') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_labeld" value="<?php echo esc_attr( get_option('ald_load_labeld') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper Five end -->
				
				<!-- Wrapper Five Start -->
				<div id="postimagediv" class="postbox">    
					<a class="header" data-toggle="collapse" href="#divsix">
						<span id="poststuff"> 
							<h2 class="hndle">Wrapper - 6 ( For Flex Display )</h2>
						</span>
					</a>
					<div id="divsix" class="collapse">
						<div class="inside">
							<table class="form-table">
								<tr valign="top">
									<th scope="row">Load More Button Wrapper</th>
									<td>
										<input class="regular-text" type="text" name="ald_wrapper_classe" value="<?php echo esc_attr( get_option('ald_wrapper_classe') ); ?>" />
										<p>Load More Button will show inside End of this Div</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Div</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_classe" value="<?php echo esc_attr( get_option('ald_load_classe') ); ?>" />
										<p>Which Div,class,ID you want to Ajaxing?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Visiable Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_showe" value="<?php echo esc_attr( get_option('ald_item_showe') ); ?>" />
										<p>How Many Item Will Show Before Load Items?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load Items</th>
									<td>
										<input class="regular-text" type="number" name="ald_item_loade" value="<?php echo esc_attr( get_option('ald_item_loade') ); ?>" />
										<p>How Many Item Will Load When Click Load More Button?</p>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">Load More Button Label</th>
									<td>
										<input class="regular-text" type="text" name="ald_load_labele" value="<?php echo esc_attr( get_option('ald_load_labele') ); ?>" />
										<p>Enter The Name of Load More Button</p>
									</td>
								</tr>
							</table>
						</div>
					</div> 
				</div>
				<!-- Wrapper Five end -->

			</td>
			<td class="right-col">
				<h2>Custom CSS</h2>
				<pre><textarea style="width:100%" name="asr_ald_css_class" id="" rows="10"><?php if(empty(get_option('asr_ald_css_class'))){echo ".btn.loadMoreBtn {
    color: #333333;
    text-align: center;
}

.btn.loadMoreBtn:hover {
    text-decoration: none;
}";}else {echo esc_attr( get_option('asr_ald_css_class') ); } ?></textarea></pre>

			<table>
				<tr><td><strong><h3 style=" margin: 0 0 2px 0; ">Do you have any work need to be done ?</h3>We do WordPress Theme & Plugin development or Customization  and Website Maintainance <a class="button" title="Get me in touch if you have any custom request" href="mailto:aktarujjman@gmail.com" style="vertical-align: middle; margin-left: 4px;">Email Us</a></strong><hr></td></tr>

				<tr><td><strong>If you like my plugin please leave a review for inspire me <a class="button" target="_blank" href="https://wordpress.org/support/plugin/ajax-load-more-anything/reviews/#new-post" style=" vertical-align: middle; margin-left: 4px; ">Review Now</a></strong><hr></td></tr>

				<tr><td><a class="button" target="_blank" href="https://www.youtube.com/watch?v=km6V2bcfc6o" style="margin-left: 4px; ">Video Tutorial</a><a class="button" target="_blank" href="https://wordpress.org/support/plugin/ajax-load-more-anything" style="margin-left: 4px; ">View Support Forum</a><a class="button" title="Get me in touch if you have any custom request" href="mailto:aktarujjman@gmail.com" style="margin-left: 4px; ">Contact Developer</a></td></tr>

			</table>
			</td>
		</tr>
	</table>
	
    <?php ald_ajax_save_btn(); ?>
	
</form>
</div>



<?php }

/*
* Register settings fields to database
*/
function register_ald_plugin_settings() {
	
	// wrapper one option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_class' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_class' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_show' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_load' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_label' );
	register_setting( 'ald-plugin-settings-group', 'asr_ald_css_class' );
	
	// wrapper two option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_classa' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_classa' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_showa' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_loada' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_labela' );
	
	// wrapper three option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_classb' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_classb' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_showb' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_loadb' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_labelb' );
	
	// wrapper four option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_classc' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_classc' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_showc' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_loadc' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_labelc' );
	
	// wrapper five option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_classd' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_classd' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_showd' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_loadd' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_labeld' );

	// wrapper five option data 
	register_setting( 'ald-plugin-settings-group', 'ald_wrapper_classe' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_classe' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_showe' );
	register_setting( 'ald-plugin-settings-group', 'ald_item_loade' );
	register_setting( 'ald-plugin-settings-group', 'ald_load_labele' );
}
add_action( 'admin_init', 'register_ald_plugin_settings' );

/**
 * Adds plugin action links.
 *
 * @since 1.0.0
 * @version 4.0.0
 */
function wi_plugin_action_links( $links ) {
	$plugin_links = array(
		'<a href="options-general.php?page=ald_setting">' . esc_html__( 'Settings', 'ald' ) . '</a>',
	);
	return array_merge( $plugin_links, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wi_plugin_action_links' );