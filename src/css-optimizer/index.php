<?php

	//set constants
	define('APP_PATH', __DIR__ . '/');

	define('CFG_PATH', APP_PATH . 'config/');

	define('LIB_PATH', APP_PATH . 'library/');

	define('LOG_PATH', APP_PATH . 'logs/');

	//include libs
	$libs = glob(LIB_PATH . "*.php");
	foreach($libs as $lib){
		require_once $lib;
	}

	//init
	PROFHUN\css_optimizer\app::init();

	//run code
	//TODO

	/*----------------------DEV----------------------*/

	//add css
	//PROFHUN\css_optimizer\app::add_css('../css-sample/sample1.css');
	//PROFHUN\css_optimizer\app::add_css('../css-sample/sample2.css');
	//PROFHUN\css_optimizer\app::add_css('../css-sample/sample3.css');
	//PROFHUN\css_optimizer\app::add_css('../css-sample/sample4.css');
	PROFHUN\css_optimizer\app::add_css('../css-sample/sample5.css');
	//parse
	PROFHUN\css_optimizer\app::parse();


	die();

?>