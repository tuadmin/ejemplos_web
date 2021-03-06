<?php
/**
 * @version 1.0
 * @author tuadmin 
 */
class benchmark
{
	private static $_instances = array();
	private $id = 0;
	private $startTime = 0;
	private $title = null;
	static public function start($id,$title = null)
	{
		if(!isset(self::$_instances[$id]))
		{
			self::$_instances[$id] = new self($id,$title);
		}
	}
	static public function get($id)
	{
		if(isset(self::$_instances[$id]))
		{
			return self::$_instances[$id];
		}
		return false;
	}
	static public function end($id)
	{
		$a = self::get($id);
		if($a)
		{
			return $a->getTime();
		}
		return -1;
	}
	public function __construct($id,$title = null)
	{
		$this->id = $id;
		$this->title = $title;
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		$this->startTime = $mtime;
	}
	public function getTime()
	{
		$mtime = microtime();
		$mtime = explode(" ",$mtime);
		$mtime = $mtime[1] + $mtime[0];
		return ($mtime - $this->startTime); 
	}
	public function getTitle()
	{
		return $this->title;
	}
}
