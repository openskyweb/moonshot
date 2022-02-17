<?php

/**
 * Helper class for child theme functions.
 *
 * @class FLChildTheme
 */
final class FLChildTheme {
	
	/**
	 * Enqueues scripts and styles.
	 *
	 * @return void
	 */
	static public function enqueue_scripts()
	{
		$version  = date('ymd-Gis', filemtime( FL_CHILD_THEME_DIR . '/style.css' ));
		wp_enqueue_style( 'fl-child-theme', FL_CHILD_THEME_URL . '/style.css', array(), $version  );

		$version  = date('ymd-Gis', filemtime( FL_CHILD_THEME_DIR . '/print.css' ));
		wp_enqueue_style( 'print', FL_CHILD_THEME_URL . '/print.css', array(), $version );

		$version  = date('ymd-Gis', filemtime( FL_CHILD_THEME_DIR . '/custom.js' ));
		wp_enqueue_script( 'custom', FL_CHILD_THEME_URL . '/custom.js', array(), $version );
	}
}
