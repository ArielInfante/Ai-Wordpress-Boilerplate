<?php get_header(); ?>

<!--BEGIN: Content-->
<section id="content" class="group <?php check_sidebar(); // Adds full width to the body-wrapper when there are is no sidebar ?>" role="main">

	<?php if (have_posts()) :
		while (have_posts()) : the_post(); //BEGIN: The Loop ?>

			<!--BEGIN: Post-->
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<header>
					<h1><?php the_title(); ?></h1>
					<time datetime="<?php the_time('r'); ?>"><?php the_time('M d, Y'); ?></time>
					<p>by <?php the_author_link() ?></p>
				</header>

				<div class="entry">
					<?php the_content("Continue reading " . the_title('', '', false)); ?>
				</div>

			</article>
			<!--END: Post-->

			<?php wp_link_pages(); //this allows for multi-page posts ?>

		<?php endwhile; ?>

			<!--BEGIN: Page Nav-->
			<?php if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
				<nav id="pagination" class="group">
		        	<h1>Page Navigation</h1>
			        <div class="next-link"><?php next_posts_link('Next Page'); ?></div>
			        <div class="prev-link"><?php previous_posts_link('Previous Page'); ?></div>
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