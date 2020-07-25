<?php

namespace trees;

class TreeApi {
	public function __construct() {
		ini_set ( 'display_errors', 1 );
		error_reporting ( E_ALL & ~ E_DEPRECATED & ~ E_STRICT );
		// @formatter:off
        require_once sprintf(
            '%1$s/settings/%2$s/Configuration.php',
            dirname(__FILE__), // 1
            $_SERVER['SERVER_NAME'] // 2
        );
        // @formatter:on
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		require_once Configuration::CORE_FOLDER . 'DbEngine.php';
		require_once Configuration::CORE_FOLDER . 'Response.php';
		if (isset ( $_GET ['target'] ) && '' != $_GET ['target']) {
			require_once dirname ( __FILE__ ) . '/TreeController.php';
			new TreeController ( array () );
		} else {
			new \o\Response ( array (
					'message' => 'package is missing',
					'status' => 400
			) );
		}
	}
}
new TreeApi ();
