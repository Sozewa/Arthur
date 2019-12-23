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
		
		$d = new \DateTime();
		$version = file_get_contents(__DIR__. "/../version");
		file_put_contents(BASEURI . '/log/' . $d->format('d-m-Y\TH.i.s.u') . '.log', "File Version: " . $version . implode("\r\n", MyLog::Instance()->log));
		echo implode("\r\n", MyLog::Instance()->log);
	}
}
