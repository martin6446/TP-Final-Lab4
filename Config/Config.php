<?php 
namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/TP-Final-Lab4/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/js/");
define("JQUERY_PATH", FRONT_ROOT.VIEWS_PATH . "layout/jquery/");
define("IMG_PATH", VIEWS_PATH . "img/");

// BD
/* define("DB_HOST", "bynkngfdva4yi0d8omqu-mysql.services.clever-cloud.com");
define("DB_NAME", "bynkngfdva4yi0d8omqu");
define("DB_USER", "u5eapqauuxrbcc3k");
define("DB_PASS", "roXo55XtOO3qz1rRy9u7"); */

define("DB_HOST", "ec2-3-17-153-199.us-east-2.compute.amazonaws.com");
define("DB_NAME", "utn_moviedb");
define("DB_USER", "utn-user");
define("DB_PASS", "password");

?>