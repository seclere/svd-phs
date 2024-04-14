<?php

//echo " REQUEST_URI: ".$_SERVER['REQUEST_URI'];
//echo " REDIRECT_URL: ".$_SERVER['REDIRECT_URL'];
//echo " QUERY_STRING: ".$_SERVER['QUERY_STRING'];

$request_name = $_SERVER['REDIRECT_URL'];

 require "program/main_program_functions.php";
// require "data/custom_functions.php";
 require "program/document.php";
 require "program/menu.php";

 $document = New Document;
 $menu = New Menu();

 $document->defaultHead();
 //$document->BodyAdd(facebook_head());

 $document->BodyAdd($menu->navigation_menu());
 $document->mainBanner();

 $document->defaultLeftPanel();
 $document->LeftPanelAdd($menu->leftMenu());
 $document->defaultRightPanel();

 //$document->RightPanelAdd(facebook_code());


 if ($_SERVER['REDIRECT_URL'] == '/'){
   require "data/default.php";
 }
 else{
   $filename = "data".$_SERVER['REDIRECT_URL'].".php";

   //echo $filename;

   if (file_exists($filename)) {
     require $filename;
   }
   else {
     header('HTTP/1.0 404 Not Found', true, 404);
     require "data/404.php";
   }
 }

 //if ($request_name == "/") main_banner_default_page();
 $document->BodyAdd($document->mainBanner);

 $document->gen_main_content();

 $document->BodyAdd($document->secondContent);

 $document->defaultFooter();

 $document->PrintDocument();





?>
