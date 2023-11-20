<?php
/**
 * The template for displaying the search form.
 *
 * @package RoundhouseTheme
 */

?>

<div itemscope itemtype="http://schema.org/WebSite">
	<form role="search" id="searchform" class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<meta itemprop="target" content="<?php echo esc_url( home_url() ); ?>/?s={s}" />
		<label for="search-field">
			<?php echo esc_html_x( 'Search for:', 'label', 'pvd-theme' ); ?>
		</label>
		<input itemprop="query-input" type="search" id="search-field" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'pvd-theme' ); ?>" name="s" />
		<input type="submit" value="<?php echo esc_attr_x( 'Submit', 'submit button', 'pvd-theme' ); ?>">
	</form>
</div>
