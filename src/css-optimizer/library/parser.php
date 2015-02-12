<?php

namespace PROFHUN\css_optimizer;

/**
 *
 */
class parser{

	/**
	 * Remove comments from css content
	 *
	 * @param String $css
	 *
	 * @return String
	 */
	public static function remove_comments($css){
		//remove comment blocks
		$css = preg_replace('/\/\*(.*?)\*\//ims', '', $css);

		//remove comment lines
		$css = preg_replace('/\/\/(.*?)\\n/is', '', $css);

		return $css;
	}

	/**
	 * parse css content into name => properties array
	 *
	 * @param String
	 *
	 * @return Array
	 */
	public static function parse_css($css){
		preg_match_all('/(.*?)\{(.*?)\}/ims', $css, $matches);

		$css_parts = array();
		if(!empty($matches)){
			$element_names 		= array_map('trim', $matches[1]);
			//parse properties
			$element_properties = array_map(array('self','parse_properties'),$matches[2]);

			foreach($element_names as $index => $name){
				if(!isset($css_parts[$name])){
					$css_parts[$name] = $element_properties[$index];
				} else {
					$css_parts[$name] = array_merge($css_parts[$name], $element_properties[$index]);
				}
			}

		}

		return $css_parts;
	}

	/**
	 *
	 */
	public static function parse_less(){
		//TODO
	}

	/**
	 * Parse properties into property_name => property_value array
	 */
	public static function parse_properties($properties){
		preg_match_all('/(.*?):(.*?);/ims', $properties, $matches);

		$properties = array();
		if(!empty($matches)){
			//trim values
			$properties = array_combine(array_map('trim', $matches[1]), array_map('trim', $matches[2]));
		}

		return $properties;
	}

}