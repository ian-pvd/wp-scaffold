<?php
/**
 * Page Post Type
 *
 * @package TenUpPlugin
 */

namespace TenUpPlugin\PostTypes;

use TenUpPlugin\Module;

/**
 * Page Post Type
 */
class Page extends Module {

	/**
	 * Can the class be registered?
	 *
	 * @return bool
	 */
	public function can_register() {
		return true;
	}

	/**
	 * Register hooks and filters.
	 *
	 * @return void
	 */
	public function register() {
		// Register any hooks/filters you need.
	}
}
