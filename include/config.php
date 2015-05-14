<?php
require_once("MysqliDb.php");
require_once("local_settings.php");

$db = new MysqliDb ($CONFIG['hostname'], $CONFIG['username'], $CONFIG['password'], $CONFIG['database']);
