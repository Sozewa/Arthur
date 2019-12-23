<?php
namespace Kupris;

use core\LogAbstract;
use core\LogInterface;

Class MyLog extends LogAbstract implements LogInterface {

	public static function write(){
		return MyLog::Instance()->_write();
	}

	public static function log($str){
		MyLog::Instance()->log[] = $str;
	}
	
	public function _write() {
		echo implode("\n", MyLog::Instance()->log);
		
		$d = new \DateTime("NOW");
		$version = file_get_contents(__DIR__. "/../version");
		if (!file_exists(__DIR__. "/../log")) { 
			mkdir(__DIR__. "/../log", 0777, true);
		}
		file_put_contents(BASEURI . '/log/' . $d->format('d-m-Y__H__i_s_u') . '.log', "File Version: " . $version . "\r\n" . implode("\r\n", MyLog::Instance()->log));
		echo implode("\r\n", MyLog::Instance()->log);
	}
}
