--TEST--
getServerList
--SKIPIF--
<?php if (!extension_loaded("memcached")) print "skip"; ?>
--FILE--
<?php 
$servers = array ( 0 => array ( 'KEYHERE' => 'localhost', 11211, 3 ), );
$m = new memcached();
var_dump($m->getServerList());
$m->addServers($servers);
var_dump($m->getServerList());
$m->addServers($servers);
var_dump($m->getServerList());
$m = new memcached();
$m->addServer('127.0.0.1', 11211);
var_dump($m->getServerList());
?>
--EXPECT--
array(0) {
}
array(1) {
  [0]=>
  array(3) {
    ["host"]=>
    string(9) "localhost"
    ["port"]=>
    int(11211)
    ["weight"]=>
    int(3)
  }
}
array(2) {
  [0]=>
  array(3) {
    ["host"]=>
    string(9) "localhost"
    ["port"]=>
    int(11211)
    ["weight"]=>
    int(3)
  }
  [1]=>
  array(3) {
    ["host"]=>
    string(9) "localhost"
    ["port"]=>
    int(11211)
    ["weight"]=>
    int(3)
  }
}
array(1) {
  [0]=>
  array(3) {
    ["host"]=>
    string(9) "127.0.0.1"
    ["port"]=>
    int(11211)
    ["weight"]=>
    int(0)
  }
}
