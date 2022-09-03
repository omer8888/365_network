<?php
error_reporting(E_ERROR | E_PARSE); //Only report fatal errors and parse errors.
ob_start(); //turn on output buffering
session_start();

$timezone = date_default_timezone_set("Europe/London");

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "365_db");
defined("DOMAIN") ? null : define("DOMAIN", "");


$connection = null;
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_errno()){
     echo "db connction error" . mysqli_connect_errno();
}

require_once("base_helper.php");


