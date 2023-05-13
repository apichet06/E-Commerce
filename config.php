<?php

// ++++++++++++++++++++++++++++++++++++++++++++++
//                 Conection DB 
// ++++++++++++++++++++++++++++++++++++++++++++++
error_reporting(~E_NOTICE);

$Host = "localhost";	
$User = "root";
$Pass = "";
$Database = "devx_katar";

// $Host = "localhost";    
// $User = "admin_katar";
// $Pass = "DevX@2019";
// $Database = "devx_katar";

$conn =  mysqli_connect($Host,$User,$Pass,$Database);
if (!$conn)
	die("ไม่สามารถติดต่อกับ MYSQL ได้");

mysqli_query($conn,"SET character_set_results=utf8");//ตั้งค่าการดึงข้อมูลออกมาให้เป็น utf8
mysqli_query($conn,"SET character_set_client=utf8");//ตั้งค่าการส่งข้อมุลลงฐานข้อมูลออกมาให้เป็น utf8
mysqli_query($conn,"SET character_set_connection=utf8");//ตั้งค่าการติดต่อฐานข้อมูลให้เป็น utf8

date_default_timezone_set('Asia/Bangkok');


// ++++++++++++++++++++++++++++++++++++++++++++++
//                    Define 
// ++++++++++++++++++++++++++++++++++++++++++++++
$Web_Title = "#Souqmajid - Auto Spareparts &amp; Marketplace";

$Search_Top = "
<form class=\"ps-form--quick-search\" action=\"shop_allproduct.php\" method=\"get\">
<input class=\"form-control\" type=\"text\" name=\"search\"  id=\"css_time_run\" placeholder=\"I'm shopping for...\">
<input class=\"form-control\" type=\"text\" name=\"id\" value=\"".$_GET['id']."\" hidden>
<button>Search</button>
</form>";


// ++++++++++++++++++++++++++++++++++++++++++++++
//                   Web Menu 
// ++++++++++++++++++++++++++++++++++++++++++++++
$cmd = " SELECT * FROM category_db ORDER BY CAT_ID ASC ";
$result = mysqli_query($conn,$cmd);
$Web_Menu = "
<div class=\"menu--product-categories\">
    <div class=\"menu__toggle\" style=\"height:50px\"><i class=\"icon-menu\"></i><span> All Catagories</span></div>
    <div class=\"menu__content\">
        <ul class=\"menu--dropdown\">";
            while ($rs = mysqli_fetch_array($result)) {            
            $CAT_ID = $rs["CAT_ID"];
            $CAT_Name = $rs["CAT_Name1"];
            if ($CAT_ID==0) {
            $Web_Menu = $Web_Menu."<li><a href=\"shop_allproduct.php?id=$CAT_ID\"><i class=\"icon-star\"></i> $CAT_Name</a></li>";
        } else {            
        $Web_Menu = $Web_Menu."<li><a href=\"shop_allproduct.php?id=$CAT_ID\"><i class=\"icon-tag\"></i> $CAT_Name</a></li>";
    }
}
$Web_Menu = $Web_Menu."
</ul>

</div>
</div> ";


// ++++++++++++++++++++++++++++++++++++++++++++++
//                   Mobile Menu 
// ++++++++++++++++++++++++++++++++++++++++++++++
$cmd = " SELECT * FROM category_db ORDER BY CAT_ID ASC ";
$result = mysqli_query($conn,$cmd);
$Mobile_Menu ="
<div class=\"ps-panel__header\"><h3>Categories</h3></div>
<div class=\"ps-panel__content\">
    <ul class=\"menu--mobile\">";
        while ($rs = mysqli_fetch_array($result)) {            
        $CAT_ID = $rs["CAT_ID"];
        $CAT_Name = $rs["CAT_Name1"];
        if ($CAT_ID==0) {
        $Mobile_Menu = $Mobile_Menu."<li><a href=\"shop_allproduct.php?id=$CAT_ID\"><i class=\"icon-star\"></i> $CAT_Name</a></li>";     
    } else {        
    $Mobile_Menu = $Mobile_Menu."<li><a href=\"shop_allproduct.php?id=$CAT_ID\"><i class=\"icon-tag\"></i> $CAT_Name</a></li>";
}


}
$Mobile_Menu = $Mobile_Menu."
</ul>
</div>";

$Footer_Bottom = "
<p>© 2019 Souqmajid.com All Rights Reserved</p>
<p>
    <span>We Using Safe Payment For:</span>
    <a href=\"#\"><img src=\"img/payment-method/master.jpg\"></a>
    <a href=\"#\"><img src=\"img/payment-method/visa.jpg\"></a>           
</p> ";


?>

