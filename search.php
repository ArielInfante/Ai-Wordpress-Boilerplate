<?php get_header(); ?>

<!--BEGIN: Content-->
<section id="content" class="group" role="main">

	<h1>Search Results</h1>

	<?php

	// Query Posts

	//BEGIN: The Loop
	if (have_posts()) : while (have_posts()) : the_post();?>

		<div class="search-result-item">
		<!--BEGIN: List Item-->
			<a <?php post_class('group') ?> id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" title="Click to read more...">

				<strong><?php the_title(); ?></strong>

				<!--BEGIN: Large Thumbnail-->
				<?php $thumbLg = get_post_meta($post->ID, 'thumb_lg', $single = true); // if theres a thumbnail get it ?>

				<?php if ($thumbLg !== '') : ?>

					<img class="fl" alt="<?php echo the_title(); ?>" src="<?php echo '/wp-content' . "$thumbLg" ?>" />

				<?php endif; ?>
				<!--END: Large Thumbnail-->

				<!--BEGIN: Excerpt-->
				<span class="entry">
					<?php the_excerpt("Continue reading &rarr;"); ?>
				</span>
				<!--END: Excerpt-->

			</a>
		<!--END: List Item-->
		</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Previous Page</div>','<div class="alignright">Next Page &raquo;</div>') ?>
		</div>

		<?php else : // if no posts were found give the warning below ?>

		<div class="post search-error">
			<p>Nothing Found, there seems to be something wrong... Try searching instead:</p>
			<?php get_search_form(); ?>

			<h2>Topics of Interest</h2>
			<p><?php wp_tag_cloud(''); ?></p>
		</div>

	<?php endif; //END: The Loop ?>

</section>
<!--END: Content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>