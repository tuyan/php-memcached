--TEST--
Check if persistent object is new or an old persistent one
--SKIPIF--
<?php if (!extension_loaded("memcached")) print "skip"; ?>
--FILE--
<?php 
$m1 = new Memcached('id1');

var_dump($m1->isPristine());
var_dump($m1->isPersistent());

$m1 = new Memcached('id1');
var_dump($m1->isPristine());
var_dump($m1->isPersistent());

$m2 = new Memcached('id1');
var_dump($m2->isPristine());
var_dump($m2->isPersistent());

$m3 = new Memcached('id2');
var_dump($m3->isPristine());
var_dump($m3->isPersistent());

$m3 = new Memcached();
var_dump($m3->isPristine());
var_dump($m3->isPersistent());
--EXPECT--
bool(true)
bool(true)
bool(false)
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
