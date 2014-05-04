<?php get_header(); ?>

<section id="content" class="group" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!--BEGIN: Single Post-->
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<header>
			<h1><?php the_title(); ?></h1>
			<time datetime="<?php the_time('r'); ?>" pubdate="pubdate"><?php the_time('M d, Y'); ?></time>
			<p>by <?php the_author_link(); ?></p>
		</header>

		<div class="entry">
			<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		</div>

		<!--BEGIN: Post Meta Data-->
		<footer class="post-meta-data">
			<?php if(has_category()) { ?>
				<p class="meta-category">Category: <?php the_category(', '); ?></p>
			<?php } ?>
			<?php if(has_tags()) { ?>
				<p class="meta-tags">Tags: <?php the_tags('<span>#', '</span>, <span>#', '</span>'); ?></p>
			<?php } ?>
		</footer>
		<!--END: Post Meta Data-->

		<!--BEGIN: Comments-->
		<?php comments_template( '', true ); ?>
		<!--END: Comments-->

	</article>
	<!--END: Single Post-->

	<?php wp_link_pages(); //this allows for multi-page posts ?>

<?php endwhile; ?>

<?php else: //ERROR: Nothing Found ?>

	<h2>No posts were found</h2>

<?php endif; //END: The Loop ?>

</section>
<!--END: Content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>