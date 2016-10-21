<?php

if ( !defined('NIU_PATH') ) {
	if ( is_dir( 'lib/Niu' ) ) {
		define('NIU_PATH', 'lib/Niu');
	} elseif ( getenv('NIU_PATH') ) {
		define('NIU_PATH', getenv('NIU_PATH'));
	} elseif ( get_cfg_var('niu_path') ) {
		define('NIU_PATH', get_cfg_var('niu_path'));
	}
}

if ( defined('NIU_PATH') ) {
	include NIU_PATH . '/Loader/AutoloaderFactory.php';
}

if (!class_exists('Niu\Loader\AutoloaderFactory')) {
    throw new RuntimeException('NIU Autoloader não encontrado');
}


Niu\Loader\AutoloaderFactory::factory(); # Inicia o Autoloader da aplicação