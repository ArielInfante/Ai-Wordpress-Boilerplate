<?php get_header(); ?>

<!--BEGIN: Content-->
<section id="content" class="group" role="main">

	<?php if (have_posts()) : ?>

		<h1>Posts in <?php single_cat_title(); ?></h1>

		<?php while (have_posts()) : the_post(); ?>

			<!--BEGIN: Post-->
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<header>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title='Click to read: "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h1>
					<p class="post-date"><?php the_time('M d, Y') ?> &#8212; <?php the_category(', ') ?></p>
				</header>

				<div class="entry">
					<?php the_excerpt("Continue reading &rarr;"); ?>
				</div>

				<!--BEGIN: Post Meta Data-->
				<footer class="post-meta-data">
					<ul>
						<li><?php the_time('M d, Y') ?> by <?php the_author(); ?></li>
						<li class="add-comment"><?php comments_popup_link('Share Your Comments', '1 Comment', '% Comments'); ?></li>
						<li><?php edit_post_link('[Edit]', '<small>', '</small>'); ?></li>
						<li><?php the_tags('Tags: ', ', ', '<br />'); ?></li>
					</ul>
				</footer>
				<!--END: Post Meta Data-->

			</article>
			<!--END: Post-->

		<?php endwhile; ?>

			<!--BEGIN: Page Nav-->
			<?php if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
		        <nav id="page-nav">
		        	<h1 class="hide">Page Navigation</h1>
			        <div class="next-link"><?php next_posts_link('Next Page') ?></div>
			        <div class="prev-link"><?php previous_posts_link('Previous Page') ?></div>
		        </nav>
			<?php endif; ?>
			<!--END: Page Nav-->

		<?php else : ?>

			<h2>No posts were found</h2>

	<?php endif; //END: The Loop ?>

</section>
<!--END: Content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>