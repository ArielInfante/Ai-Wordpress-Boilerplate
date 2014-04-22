<?php get_header(); ?>

<!--BEGIN: content -->
<section id="content" class="group" role="main">

	<h1>Latest Posts</h1>

	<?php if (have_posts()) : // BEGIN THE LOOP ?>

		<?php while (have_posts()) : the_post(); //LOOPING through all the posts, we split onto two lines for clean indentation ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<header>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></h1>
					<time datetime="<?php the_time('r'); ?>" pubdate="pubdate"><?php the_time('M d, Y'); ?></time>
					<p>by <?php the_author_link() ?></p>
				</header>

				<div class="entry">
					<?php the_content(); ?>
				</div>

				<footer id="post-meta-data">
					<div class="add-comment"><?php comments_popup_link('Share your comments', '1 Comment', '% Comments'); ?></div>
					<?php if(has_category()) { ?>
						<p class="meta-category">Category: <?php the_category(', ') ?></p>
					<?php } ?>
					<?php if(has_tags()) { ?>
						<p class="meta-tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></p>
					<?php } ?>
				</footer>

			</article>

		<?php wp_link_pages(); //this allows for multi-page posts ?>

		<?php endwhile; //END: looping through all the posts ?>

			<!--BEGIN: Page Nav-->
			<?php if ( $wp_query->max_num_pages > 1 ) : // if there's more than one page turn on pagination ?>
				<nav id="page-nav" class="group">
		        	<h1>Page Navigation</h1>
			        <div class="next-link"><?php next_posts_link('Next Page') ?></div>
			        <div class="prev-link"><?php previous_posts_link('Previous Page') ?></div>
		        </nav>
			<?php endif; ?>
			<!--END: Page Nav-->

	<?php else : ?>

		<h2>No posts were found</h2>

	<?php endif; //END: The Loop ?>

</section>
<!--END: content div-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>