/**
 * @version 1.0
 * @author tuadmin 
 */
 class benchmark { private static $_instances = array(); private $a = 0; private $b = 0; private $c = null; static public function start($a,$c = null) { if(!isset(self::$_instances[$a])) { self::$_instances[$a] = new self($a,$c); } } static public function get($a) { if(isset(self::$_instances[$a])) { return self::$_instances[$a]; } return false; } static public function end($a) { $d = self::get($a); if($d) { return $d->getTime(); } return -1; } public function __construct($a,$c = null) { $this->a = $a; $this->c = $c; $e = microtime(); $e = explode(" ",$e); $e = $e[1] + $e[0]; $this->b = $e; } public function getTime() { $e = microtime(); $e = explode(" ",$e); $e = $e[1] + $e[0]; return ($e - $this->b); } public function getTitle() { return $this->c; } } 
