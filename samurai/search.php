<?php
/**
 * Search
 *
 * @version      2.1 | June 6th 2013
 * @package      WordPress
 * @subpackage   samurai
 *
 * Search results template.
 */

get_header(); ?>

	<?php if (SAMURAI_ENABLE_SITE_SEARCH) : ?>

		<?php global $wp_query; $total_results = $wp_query->found_posts; ?>

		<h1 class="search__heading content-title">Search Results</h1>

		<p class="search__query"><?php echo $total_results ?> result<?php if ($total_results != 1) echo 's'; ?> found for the search term: <span><?php echo esc_html($s, 1); ?></span></p>

		<?php if (have_posts()) : ?>

			<?php Samurai_View::make('loop-search'); ?>

			<?php Samurai_Pagination::include_archive_pagination(); ?>

			<div class="search__follow-up--wrapper">

				<p class="search__follow-up">Still not what you are looking for?</p>

				<?php get_search_form(); ?>

			</div>

		<?php else : ?>

			<?php Samurai_View::make('message', 'no-results'); ?>

		<?php endif; ?>

	<?php else : ?>

		<?php Samurai_View::make('message', 'not-found'); ?>

	<?php endif; ?>

<?php get_footer(); ?>
