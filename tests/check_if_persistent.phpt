--TEST--
Check if persistent object is new or an old persistent one
--SKIPIF--
<?php if (!extension_loaded("memcached")) print "skip"; ?>
--FILE--
<?php 
$m1 = new Memcached('id1');

var_dump($m1->getOption(Memcached::OPT_IS_PRISTINE));

$m1 = new Memcached('id1');
var_dump($m1->getOption(Memcached::OPT_IS_PRISTINE));

$m2 = new Memcached('id1');
var_dump($m2->getOption(Memcached::OPT_IS_PRISTINE));

$m3 = new Memcached('id2');
var_dump($m3->getOption(Memcached::OPT_IS_PRISTINE));

$m3 = new Memcached();
var_dump($m3->getOption(Memcached::OPT_IS_PRISTINE));
?>
--EXPECT--
bool(true)
bool(false)
bool(false)
bool(true)
bool(true)

