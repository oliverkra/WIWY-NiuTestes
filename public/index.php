<?php

// Iniciamos o "contador"
list($usec, $sec) = explode(' ', microtime());
$script_start = (float) $sec + (float) $usec;


function vl($valor) {
	var_dump($valor);echo '<br>';
}

// $url = '/oliver[/asdad[/:qweqe]]';
// $url2= '/oliver/:kraemer';

// $url1 = '/teste/:param1/post/:param2/oi:param3_tchau/ttc';
// $url2 = '/teste/:param1/post[/:param2/oi:param3_tchau/ttc]';
// $url3 = '/teste/:param1/post[/:param2[/oi:param3_tchau/ttc]]';
// $url4 = '/teste/:param1/post/[:param2[oi:param3_tchau/ttc]]';
// $url5 = '/teste/:param1/post[/aa:param2[oi:param3_tchau/ttc]]';
// $url5 = '/t:a';

// vl( preg_split('/[\w]+/', $url) );
// $expressao = '/(:[a-zA-Z0-9]+)/';

// vl( $url1 );
// vl( preg_split($expressao, $url1, -1, PREG_SPLIT_DELIM_CAPTURE) );
// vl( $url2 );
// vl( preg_split($expressao, $url2, -1, PREG_SPLIT_DELIM_CAPTURE) );
// vl( $url3 );
// vl( preg_split($expressao, $url3, -1, PREG_SPLIT_DELIM_CAPTURE) );
// vl( $url4 );
// vl( preg_split($expressao, $url4, -1, PREG_SPLIT_DELIM_CAPTURE) );
// vl( $url5 );
// vl( preg_split($expressao, $url5, -1, PREG_SPLIT_DELIM_CAPTURE) );
// vl( preg_match($expressao, $url5) );
//vl( preg_split('/(:[a-zA-Z0-9]+)/', $url2, -1, PREG_SPLIT_DELIM_CAPTURE) );
//vl( preg_split('/(:[a-zA-Z0-9]+)/', $url, -1, PREG_SPLIT_DELIM_CAPTURE) );


// die();

function tempo() {
	global $script_start;

	// Terminamos o "contador" e exibimos
	list($usec, $sec) = explode(' ', microtime());
	$script_end = (float) $sec + (float) $usec;
	$elapsed_time = round($script_end - $script_start, 5);

	vl('Elapsed time: ' . $elapsed_time . ' secs. Memory usage: ' . round(((memory_get_peak_usage(true) / 1024) / 1024), 2) . 'Mb');
}

# header ('Content-type: text/html; charset=UTF-8');

define('NIU_PATH', '../../Frameworks/Niu');

#http://framework.zend.com/manual/2.2/en/user-guide/routing-and-controllers.html
/**
 * Display all errors when APPLICATION_ENV id development
 */
/*if ( $_SERVER['APPLICATION_ENV'] == 'development' ) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}*/

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

date_default_timezone_set('America/Sao_Paulo');

// Setup autoloading
require 'init_autoloader.php';

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Run the application!
tempo();

try {
	Niu\Loader\ApplicationFactory::init(new NiuConfig\Application())->run();
} catch (Niu\System\Exceptions\DevelopmentException $ex) {
	die('DevelopmentException: ' . $ex->getMessage());
} catch (Niu\System\Exceptions\ConfigurationException $ex) {
	die('ConfigurationException: ' . $ex->getMessage());
} catch (\Exceptions $ex) {
	die('ErroGeral: ' . $ex->getMessage());
}

tempo();