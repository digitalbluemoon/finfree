<?php


/**


 * The main template file.


 *


 * This is the most generic template file in a WordPress theme


 * and one of the two required files for a theme (the other being style.css).


 * It is used to display a page when nothing more specific matches a query.


 * E.g., it puts together the home page when no home.php file exists.


 * Learn more: http://codex.wordpress.org/Template_Hierarchy


 *


 * @package WordPress


 * @subpackage Twenty_Ten


 * @since Twenty Ten 1.0


 */





get_header(); ?>



   <div id="content" style="margin:0px auto"> <!--content start--><!--content start-->


        <div class="container">
        <div class="content_top2 col-lg-8 col-md-8 col-sm-12 col-xs-12">

        	 <div class="left_content fltleft"><!--left_content start-->

            	<h2>In the news</h2>

                   <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;


				            $args=array(


				               'category_name'=>'News',


				               'posts_per_page'=>3,


				               'paged'=>$paged,


				               );


				            query_posts($args); ?>


							<?php if (have_posts()) : ?>


            


                            <?php while (have_posts()) : the_post(); ?>


                            <div class="post_block"><!--post_block start-->


                                <div class="post_date fltleft"><span class="date2"><?php the_time('j') ?></span><br /><span class="month"><?php the_time('M') ?></span><br /><?php the_time('Y') ?></div>


                                <div class="post_heading">


                                    <h3><?php the_title(); ?></h3>


                                    <h4>administrator Last Updated on <?php the_time('jS F Y') ?></h4>


                                </div>


                                <div class="clrflt"></div>


                              <?php the_excerpt(); ?>


                                


                                <div class="social">


                                  


                                </div>


                            </div><!--post_block start-->


                            <?php endwhile; ?>


            


                            <div class="navigation">


<div class="alignleft"><a href="http://fin-free.com/category/news/">&laquo; Older Entries</a></div>








                                <!--<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>-->


                                <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>


                            </div>


                    


                        <?php else : ?>


                    


                            <h2 class="center">Not Found</h2>


                            <p class="center">Sorry, but you are looking for something that isn't here.</p>


                            <?php get_search_form(); ?>


                    


                        <?php endif; ?>


                


    </div><!--left_content end-->

</div>
     





<?php get_sidebar(); ?>


</div>








			<div id="outer2"><!--outer2 start-->


			<div style="height:280px;" class="container">


				<div style="display:none;" class="banner_area"><!--banner_area start-->


			    	<div style="display:none;" class="banner_left fltleft">


						<?php


						global $post;


						$tmp_post = $post;


						$args = array( 'numberposts' => 5, 'offset'=> 1, 'category' => 1 );


						$myposts = get_posts('numberposts=5&category_name=Video');


						foreach( $myposts as $post ) : setup_postdata($post); ?>


                        


                        <?php $bimage = get_post_meta($post->ID, "image", true);?>


                        <?php $bvideo = get_post_meta($post->ID, "video", true);?>


                        


			        	<div class="banner_slider">


			                <h2><?php the_title(); ?></h2>


			                <div class="banner_img">





                             <a href="<?php echo $bvideo; ?>" rel="shadowbox"><img src="<?php echo $bimage; ?>" width="510" height="287" alt="" /></a>


							


							</div>


			            </div>


			           <?php endforeach; ?>


			           <?php $post = $tmp_post; ?>


			        </div>


			        


			        <div style="display:none;" class="banner_right fltright">


			        	<ul id="nav">


			            <?php


						global $post;


						$tmp_post = $post;


						$args = array( 'numberposts' => 5, 'offset'=> 1, 'category' => 1 );


						$myposts = get_posts('numberposts=5&category_name=Video');


						foreach( $myposts as $post ) : setup_postdata($post); ?>


			            	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span><?php $mykey_values3 = get_post_custom_values('summery_content'); ?><?php echo $mykey_values3[0]; ?></span></a></li>


			                <?php endforeach; ?>


			                <?php $post = $tmp_post; ?>


			            </ul>


			        </div>


			    </div><!--banner_area end-->


			     


			    <div class="facebook_plugins fltleft" style="width:100%;"><?php 	/* Widgetized sidebar, if you have the plugin installed. */


					  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Facebook Widget Area') ) : ?>


				 <?php endif; ?> </div>


			   <!--       <div class="map_area fltright">
			                </div>
                -->

			</div>


			</div><!--outer2 end-->





<?php get_footer(); ?>


