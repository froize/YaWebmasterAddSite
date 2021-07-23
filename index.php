<?php
/**
 * Created by PhpStorm.
 * User: Али
 * Date: 04.04.2017
 * Time: 13:17
 */
use yandex\webmaster\api\webmasterApi;
ini_set('display_errors',1);
error_reporting(E_ALL);
//echo file_get_contents('https://api.webmaster.yandex.net/v3/user/');
require_once('webmaster-api-master/webmaster_api.class.php');
//require_once ('webmaster-api-master/example/.auth.php');
$client_id = '96ded2c4cbaf4e3aabacc75e1478d194';
$client_secret = 'db981eab31b64c4c98d652450c856d62';
$url = 'https://ali-sharipov.ru/';
include_once('webmaster-api-master/example/new.php');
echo 'index';
?>