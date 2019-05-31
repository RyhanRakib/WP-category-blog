<?php /* Template Name: Category Page */
  
 get_header();
 ?>
 <style>


 </style>
<?php
$current_cat_id  = get_query_var('Charity');
$args = array(
   'category_name'=>'Charity',
    'posts_per_page'=> -1,
);
$query = new WP_Query( $args );

//$cat_name = $cats[0]->name;
//$cat_name = get_category(get_query_var('cat'))->name;

 ?>
 <div id="main_container">
 <?php   
$counter = 1; //start counter
 
$grids = 2; //Grids per row
 
 while ( $query->have_posts() ) : $query->the_post();
 $cat_name = get_category(get_query_var('cat'))->name;
 	$post_id=get_the_ID();
	//var_dump($post_id);
 ?>
 <div class="custom-containter">

	<div class="innerdiv">
		<article id="<?if($counter==1){echo "odd_article";}else{echo "even_article";}?>" class="">
			<div id="<?if($counter==1){echo "left_div";}else{echo "right_div";}?>" class="post-content" style="">
				<div class="post-categories">
						<?php 
							foreach((get_the_category()) as $category) { 
								$cat_id = $category->cat_ID;
								$cat_name =$category->cat_name;
								$cat_url =get_category_link( $category->cat_ID );
								echo '<a href='.$cat_url.' class="custom_cat">'.$cat_name.'</a>';

							}
					?>
				</div>
				<div class="cstm_meta">
					<?php 
						$cstm_value = get_field( "custom_post_meta", $post_id );
						echo '<div>'.$cstm_value.'</div>';
					?>
				</div>
				<h2 class="entry-title">
					<a class="modal-link" data-div="bodyContent" href="<?php echo get_post_permalink($post_id);?>">
						<?php echo the_title();?>
					</a>
				</h2>
			<p><?php //wp_trim_words( get_the_content(), 80 )?></p>
			<p><?php 
					$excerpt=the_excerpt();
					echo substr($excerpt);
			?>
			</p>
				<a class="modal-link" data-div="bodyContent" href="<?php echo get_permalink($post_id);?>" class="more-link">Read More</a>
				
					<p class="post-meta">
					<span class="published"><?php echo get_the_date();?></span>
					</p>
			</div> 
		 <!-- post-content -->
		 
			<div id="<?if($counter==1){echo "post-media-img_right";}else{echo "post-media-img_left";}?>" class="post-media" style="">
			<a class="modal-link" data-div="bodyContent" href="<?php echo get_post_permalink($post_id);?>" class="img-a">
			<?php
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
				$img_url = $image[0];
			?>
			<img width="1024" height="555" src="<?php echo $img_url?>" class="" alt="" srcset="" sizes="(max-width: 1024px) 100vw, 1024px" />
            <span class="et_overlay"></span>
            </a>
			</div> 
		 <!-- post-media -->
		</article>
	</div>
 </div>
 <?php
 	$counter++;
 if($counter ==3){
	 $counter = 0;$counter++;
 }
?>
<?php endwhile;?>
</div>
<?php  get_footer();?>