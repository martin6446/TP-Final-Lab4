<?php 
namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/TP-Final-Lab4/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "layout/js/");
define("JQUERY_PATH", FRONT_ROOT.VIEWS_PATH . "layout/jquery/");
define("IMG_PATH", VIEWS_PATH . "images/");

<<<<<<< HEAD
// BD
/* define("DB_HOST", "bynkngfdva4yi0d8omqu-mysql.services.clever-cloud.com");
define("DB_NAME", "bynkngfdva4yi0d8omqu");
define("DB_USER", "u5eapqauuxrbcc3k");
define("DB_PASS", "roXo55XtOO3qz1rRy9u7"); */

=======
// BD local
/* define("DB_HOST", "localhost");
define("DB_NAME", "TP_nro_1");
define("DB_USER", "root");
define("DB_PASS", ""); */


// BD remota -> MUY LENTA
/* define("DB_HOST", "bynkngfdva4yi0d8omqu-mysql.services.clever-cloud.com");
define("DB_NAME", "bynkngfdva4yi0d8omqu");
define("DB_USER", "u5eapqauuxrbcc3k");
define("DB_PASS", "roXo55XtOO3qz1rRy9u7");
 */

// AMAZON -> SE LA BANCA UN POQUITO MAS
>>>>>>> b62da620ad621fc6ad7c018853ff7d9621f69185
define("DB_HOST", "ec2-3-17-153-199.us-east-2.compute.amazonaws.com");
define("DB_NAME", "utn_moviedb");
define("DB_USER", "utn-user");
define("DB_PASS", "password");

?>