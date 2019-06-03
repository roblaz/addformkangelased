<?php


require_once 'safemysql.class.php';

$opts = array(
    'charset' => 'utf8',
    'errmode' => ''//
);

global $CFG;
$opts = array_merge($CFG['mysql'], $opts);


$db = new SafeMySQL($opts); // with some of the default settings overwritten

