/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockCollection } from '@wordpress/blocks';

/**
 * Register block collection.
 * See https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/#registerblockcollection
 */
registerBlockCollection('roundhouse', {
	title: __('Custom Blocks', 'roundhouse-theme'),
});
