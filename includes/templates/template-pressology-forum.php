<?php
/**
 * The template for displaying Pressology Forums
 *
 * @link http://www.pressology.io/
 *
 * @package Pressology Forums
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<div class="pressology-forum-view">

			<?php if ( have_posts() ) : ?>
			
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Forum: %s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
				<div class="pressology-forum-quickbar"><a id="quick-thread" href="">Post New Thread</a><a href="">Follow Forum</a></div>
				<div class="pressology-forum-quick-thread small">
					<h3>Title</h3>
					<form id="submit-quick-thread" action="">
					<input type="text" size="30" spellcheck="true">
					<?php
						wp_editor('', 'pressology-forum-quick-editor');
					?>
					<input type="submit" id="submit" class="submit">
					</form>
				</div><!-- quick thread -->
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					//get_template_part( 'content', get_post_format() );
					$displaytime = " on " . get_the_date() . " at " . get_the_time();

					?>
					<div class="pressology-forum-post-listing">
						<h1 class='pressology-title'><a href=<?php echo "'" . get_post_permalink( get_the_ID() ) . "'"; ?>''><?php the_title(); ?></a></h1>
						<span class='pressology-post-author'>Posted by <?php the_author(); ?></span><span class="pressology-post-date"><?php echo $displaytime; ?></span>
						<?php
						the_excerpt();?>
						<div class="pressology-forum-quickbar"><!-- <a id="quick-reply" href="">Reply</a> --><a href=<?php echo "'" . get_post_permalink( get_the_ID() ) . "'"; ?>>View Thread</a><a href="">Follow Thread</a><a href="">Upvote</a></div>
						<!-- <div class="pressology-forum-quick-reply small"></div> -->
					</div><?php

					endwhile;
					// Previous/next page navigation.
					// twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- .pressology-forum-view -->
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();