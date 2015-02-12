<?php

namespace PROFHUN\css_optimizer;

/**
 *
 */
class app{

	//syslog instance
	private static $_syslog			= null;

	//
	private static $_config			= array();

	//opened css files
	private static $_css_files		= array();

	//helper pointers
	private static $_style_map		= array();

	//structure array
	private static $_style_schema	= array();


	public static function init(){
		//create log instance
		self::$_syslog = new syslog();

		//include config
		self::load_configs();

		//include vendor
		self::load_vendor();
	}

	/**
	 *
	 */
	public static function load_configs(){
		//TODO
	}

	/**
	 *
	 */
	public static function load_vendor(){
		//TODO
	}

	/**
	 * add css file to parser
	 *
	 * @param String $css_path
	 *
	 * @return boolean treu if success, false if failed
	 */
	public static function add_css($css_path = ''){
		$css_path = strval($css_path);
		if(file_exists($css_path) && !in_array($css_path, self::$_css_files)){
			self::$_css_files[] = $css_path;

			self::$_syslog->log('css added: '.$css_path);

			return true;
		}

		self::$_syslog->log('!css added: '.$css_path);

		return false;
	}


	/**
	 *
	 */
	public static function get_instance(){
		//TODO
	}

	/**
	 *
	 */
	public static function parse(){
		self::$_syslog->log('css parseing started');
		while($css = self::_read_next_css()){
			self::_parse_css($css);
		}
		self::$_syslog->log('css parseing ended');
	}

	/**
	 *
	 */
	public static function create_less(){
		//TODO
	}

	/**
	 *
	 */
	public static function add_element($node_name, $properties){

	}

	/**
	 *
	 *
	 *
	 */
	private static function _read_next_css(){
		if($css_file = array_shift(self::$_css_files)){
			return file_get_contents($css_file);
		}

		return false;
	}

	/**
	 *
	 */
	private static function _parse_css($css){

		//remove comments
		$css = parser::remove_comments($css);

		var_dump(parser::parse_css($css));
	}

	/**
	 *
	 */
	private static function _parse_less(){
		//TODO
	}



}