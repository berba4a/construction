<?php
if (!defined("CONSTANTS"))
{
    if ( !defined('PATH_SEPARATOR') ) define('PATH_SEPARATOR', ( substr(PHP_OS, 0, 3) == 'WIN' ) ? ';' : ':');
     
    define('DB_HOST', '127.0.0.1'); 
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'construction');
    define('DB_PORT', '3306');
    define('DB_TYPE', 'MySQLiO');
    $site_path = realpath(dirname(__FILE__)) . '/..';
	define('HTDOCS', $site_path);
    $docroot="D:/SERVER/htdocs/construction/";//"C:/xampp/htdocs/construction/";
	//dev  - will be removed after going live
 
    define("DIR_SEP","/" ); 
    define("SEP", ( substr(PHP_OS, 0, 3) == 'WIN' ) ? "\\" : "/");
    
    define ("SITE_URL","http://localhost"); //www.sete.gr // url
    define ("COOKIE_DOMAIN", ".localhost"); // domain name here with dot before it
  
	 //define ("SITE_ROOT","/web/construction/");
	define ("SITE_ROOT","/construction/");
    //define ("SITE_ROOT","/");      // site folder if site is in the root leave it /
    define ("DOC_ROOT",$docroot);  // feiNew
    
    // remove this below and uncomment 4 lines above if you move to live
    
    /*start dev - will be removed after going live*/
    /*
     define ("SITE_URL","http://ixpander.com"); // url
    define ("COOKIE_DOMAIN", ".ixpander.com"); // domain name here with dot before it
    define ("SITE_ROOT","/sete.gr/");      //  site folder if site is in the root leave it /
    define ("DOC_ROOT",$docroot);  // feiNew
    */
    /*end dev*/
   // define ("SITE","/"); // needed for proper admin modules include,  added for SETE because of Win server' setting 
    define ("SITE_CSS", SITE_ROOT."css/"); 
 define ("SITE_JS", SITE_ROOT."js/");    	
    
    define ("SITE_IMG", SITE_ROOT."images/");
    define ("DEFAULT_EMAIL_ADDRESS", "info@sete.gr");    
}
?>