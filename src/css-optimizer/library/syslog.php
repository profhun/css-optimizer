<?php

namespace PROFHUN\css_optimizer;

/**
 * css optimizer syslog class
 */
class syslog{

	//temp file handler
	private $_tmp_file_handler = null;

	/**
	 *
	 */
	public function __construct(){
		$this->_tmp_file_handler	= tmpfile();
		$this->log('Process loaded');
	}

	/**
	 * write out logs into log dir
	 */
	public function __destruct(){

		$logfile = date("Ymd") . ".log";

		$this->log('Process ended, log appeneded to: ' . $logfile);

		if(!file_exists(LOG_PATH . $logfile)){
			touch(LOG_PATH . $logfile);
		}

		rewind($this->_tmp_file_handler);

		while($log_parts = fread($this->_tmp_file_handler, 4096)){
			file_put_contents(LOG_PATH . $logfile, $log_parts, FILE_APPEND);
		}

		file_put_contents(LOG_PATH . $logfile, "\n\n", FILE_APPEND);
	}

	/**
	 * log system message
	 */
	public function log($message, $params = array()){
		fwrite($this->_tmp_file_handler, date("H:i:s - ") . $message . (!empty($params) ? "\n\t" . print_r($params) : '') . "\n" );
	}


}