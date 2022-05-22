<?php 
require 'database_connection.php';
require 'login_check.php';  
error_reporting(0);


$low = $high = $watch_brand = $watch_color = $gov = $watch_resistance = "";
 if (isset($_POST["submit"])) {

  /*  brand */
$watch_brand = $_POST["brand"];

/* water resistance */
$watch_resistance = $_POST["resist"];

/* price */

if(isset($_POST['price'])) {
  if($_POST['price']=='price1'){
  $low = 250; $high = 1999;
}
if($_POST['price']=='price2'){
  $low = 2000; $high = 2999;
}

if($_POST['price']=='price4'){
  $low = 3000;
  $high = 1000000; 
} 
}

/* color */

$watch_color = $_POST["color"];



/* GOV */

if(isset($_POST['gov'])){

  if($_POST['gov']=='cairo'){
    $gov = 'القاهره';
  }if($_POST['gov']=='alex'){
    $gov = 'الاسكندريه';
  }if($_POST['gov']=='giza'){
    $gov = 'الجيزه';
  }if($_POST['gov']=='aswan'){
    $gov = 'اسوان';
  }if($_POST['gov']=='sharkia'){
    $gov = 'الشرقيه';
  }if($_POST['gov']=='matrouh'){
    $gov = 'مطروح';
  }if($_POST['gov']=='dakahlia'){
    $gov = 'الدقهليه';
  }if($_POST['gov']=='sohag'){
    $gov = 'سوهاج';
  }


}


/* select all */

if(isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id  WHERE sub_id = 3 AND brand = '$watch_brand' AND  color = '$watch_color' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}


/* choose only 6 */

/* select all except city */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id  WHERE sub_id = 3 AND brand = '$watch_brand' AND  color = '$watch_color' AND water_resistance = $watch_resistance";
}


/* select all except resist */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND  color = '$watch_color' AND branch_location = '$gov'";
}

/* select all except ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}


/* choose only 5 */


/* select all except resist and ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except resist and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND ram = '$watch_ram' AND branch_location = '$gov'";
}

/* select all except resist and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND branch_location = '$gov'";
}

/* select all except resist and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND branch_location = '$gov'";
}

/* select all except resist and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND branch_location = '$gov'";
}



/* select all except ram and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except ram and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except ram and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}




/* select all battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}



/* select all except color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}




/* select all except price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}



/*select all except city and brand*/ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND price BETWEEN '$low' AND '$high'";
}


/* select all except city and price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND brand = '$watch_brand'";
}

/* select all except city and color */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND brand = '$watch_brand'";
}

/* select all except city and battery */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND brand = '$watch_brand' AND color = '$watch_color'";
}

/* select all except city and ram */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high'  AND water_resistance = $watch_resistance AND brand = '$watch_brand' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high'";
}


/* select all except city and resist */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high'  AND brand = '$watch_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND ram = '$watch_ram'";
}




/* choose only 4 */

/* all except resist and battery and price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND ram = '$watch_ram' AND color = '$watch_color' AND brand = '$watch_brand'";
}



/*all except resist and battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}

/* all except resist and color and brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}



/* select all except resist and ram and battery */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND branch_location = '$gov'";
}

/* select all except resist and ram and color */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except resist and ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except resist and ram and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND battery BETWEEN '$b_low' AND '$b_high' AND branch_location = '$gov'";
}

/* select all except battery and color and resist */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$watch_ram' AND branch_location = '$gov'";
}

/* select all except color and price and resist */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND branch_location = '$gov'";
}



/* all except battery and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==Null && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}


/* select all ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except ram and battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND color = '$watch_color' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except ram and battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND color = '$watch_color' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}
 
/* select all except battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}



/* select all except battery and color and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}

/* select all except color and price and ram */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance AND branch_location = '$gov'";
}


/* all except brand , price , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color'";
}




/* all except brand , color , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN $low AND $high";
}





/* all except brand , battery , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND color = '$watch_color' AND price BETWEEN $low AND $high";
}




/* all except brand , ram , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND price BETWEEN $low AND $high";
}




/* all except brand , resist , city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND price BETWEEN $low AND $high";
}






/* all except price , color , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND brand = '$watch_brand'";
}





/* all except price , battery , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND color = '$watch_color' AND brand = '$watch_brand'";
}






/* all except price , ram , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"])==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND brand = '$watch_brand'";
}






/* all except price , resist , city*/
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND brand = '$watch_brand'";
}





/* all except color , battery , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND  brand = '$watch_brand'";
}





/* all except color , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND  brand = '$watch_brand'";
}





/* all except color , resist , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND  brand = '$watch_brand'";
}






/* all except color , battery , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND  brand = '$watch_brand'";
}






/* all except color , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND  brand = '$watch_brand'";
}





/* all except color , resist , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND  brand = '$watch_brand'";
}






/* all except battery , ram , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND color = '$watch_color' AND  brand = '$watch_brand'";
}





/* all except battery , resist , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND  brand = '$watch_brand'";
}




/*all except ram , resist , city */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND  brand = '$watch_brand'";
}



/* choose only 3 */

/* select all except resist and ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND brand = '$watch_brand' AND price BETWEEN '$low' AND '$high'";
}

/* select all except resist and ram and battery and price */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND brand = '$watch_brand' AND color = '$watch_color'";
}

/* select all except resist and ram and battery and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_idWHERE sub_id = 3 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high' AND color = '$watch_color'";
}

/* select all except battery and color and price and resist */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND brand = '$watch_brand' AND ram = '$watch_ram'";
}


/* select all except color and price and brand and resist */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_idWHERE sub_id = 3 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$watch_ram'";
}


/* all except resist,ram,color,price */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND brand = '$watch_brand' AND branch_location = '$gov'";
}


/* all except resist , ram,color,brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}




/* all except resist , ram , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND branch_location = '$gov'";
}





/* all except resist , battery , color , brand */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND price BETWEEN '$low' AND '$high' AND branch_location = '$gov'";
}





/* all except resist , battery , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND branch_location = '$gov'";
}



/* select all except ram and battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND brand = '$watch_brand' AND water_resistance = $watch_resistance";
}

/* select all except ram and battery and color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high' AND water_resistance = $watch_resistance";
}



/* select all except battery and color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND ram = '$watch_ram' AND water_resistance = $watch_resistance";
}

/* select all except color and price and brand and ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high' AND water_resistance = $watch_resistance";
}

/* all except ram , battery , price , brand */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND branch_location = '$gov'  AND water_resistance = $watch_resistance";
}



/* all except city, brand,price,color */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high'";
}




/* all except city,brand,price,batterry */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND color = '$watch_color'";
}




/* all except city,brand,price,ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color'";
}




/*all except city,brand,price,resist */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color'";
}




/* all except city, brand,color,battery */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , color , ram */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}






/* all except city , brand , color , resist */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}






/* all except city , brand , batterry , ram */
if ($_POST["brand"]==NULL && isset($_POST["price"])==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND color = '$watch_color' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , battery , resist */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND price BETWEEN '$low' AND '$high'";
}





/* all except city , brand , ram , resist */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND price BETWEEN '$low' AND '$high'";
}






/*all except city , price , color , batterry */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram' AND brand = '$watch_brand'";
}





/* all except city , price , color , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high' AND brand = '$watch_brand'";
}




/*all except city , price , color , resist */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high' AND brand = '$watch_brand'";
}




/* all except city , price , batterry , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND color = '$watch_color' AND brand = '$watch_brand'";
}





/* all except city , price , battery , resist */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color' AND brand = '$watch_brand'";
}





/* all except city , price , ram , resist */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color' AND brand = '$watch_brand'";
}




/*all except city , color , batterry , ram */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND price BETWEEN '$low' AND '$high' AND brand = '$watch_brand'";
}





/* all except city , color , batterry , resist */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND price BETWEEN '$low' AND '$high' AND brand = '$watch_brand'";
}






/* all except city , color , ram , resist */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high' AND brand = '$watch_brand'";
}






/* all except city , battery , ram , resist */
if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND price BETWEEN '$low' AND '$high' AND brand = '$watch_brand'";
}







/* choose only 2 */


/* brand , price */
if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN '$low' AND '$high' AND brand = '$watch_brand'";
}



/* brand , color */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND brand = '$watch_brand'";
}



/* brand , battery */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND brand = '$watch_brand'";
}


/* brand , ram */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND brand = '$watch_brand'";
}



/* brand , resist */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND brand = '$watch_brand'";
}


/* brand , city */
if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND brand = '$watch_brand'";
}




/* price , color */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color' AND price BETWEEN '$low' AND '$high'";
}




/* price , battery */ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND price BETWEEN '$low' AND '$high'";
}



/* price , ram */ 
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND price BETWEEN '$low' AND '$high'";
}




/* price , resist */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND price BETWEEN '$low' AND '$high'";
}





/* price, city */
if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND price BETWEEN '$low' AND '$high'";
}





/* color , battery */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high' AND color = '$watch_color'";
}





/* color , ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND color = '$watch_color'";
}




/* color , resist */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND color = '$watch_color'";
}





/* color , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND color = '$watch_color'";
}






/*battery , ram */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram' AND battery BETWEEN '$b_low' AND '$b_high'";
}






/* battery , resist */ 
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND battery BETWEEN '$b_low' AND '$b_high'";
}






/* battery , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND battery BETWEEN '$b_low' AND '$b_high'";
}





/* ram , resist */ 
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance AND ram = '$watch_ram'";
}





/* ram , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND ram = '$watch_ram'";
}





/* resist , city */
if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND branch_location = '$gov' AND water_resistance = $watch_resistance";
}


/* choose only 1 */

/* only brand */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND brand = '$watch_brand'";
}

/* only price */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND price BETWEEN $low AND $high";
}

/* only resist */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["resist"]) && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND water_resistance = $watch_resistance";
}

/* only color */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND color = '$watch_color'";
}

/* only ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND ram = '$watch_ram'";
}

/* only battery */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3 AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* only gov*/

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && isset($_POST["gov"])) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
          ON e.e_id = ep.electronics_products_id
          INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id
          WHERE sub_id = 3 AND branch_location = '$gov'";
}




/* Unselect all */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["resist"]==NULL && $_POST["gov"]==NULL) {
  $sql = "SELECT * FROM electronic_products e INNER JOIN electronic_products_stores ep 
  ON e.e_id = ep.electronics_products_id
  INNER JOIN stores_address sa ON sa.branch_id = ep.store_branch_id WHERE sub_id = 3";
}





$_SESSION['sql']=$sql;
header("location: watch_filter_results.php");



 }


?>


  <!doctype html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <title>Buy Guide</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="../img/magnifying_glass.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="../style/style.css">
 <link rel="stylesheet" href="../style/caregories.css">
 <link rel="stylesheet" href="../style/user.css">
 <link rel="stylesheet" href="../style/theme.css">
 <link rel="stylesheet" href="../style/storepage.css">
 <link rel="stylesheet" href="../style/loadingpage.css">
 <link rel="stylecheet" href="../fontawesome-free-6.1.1-web/css/all.css">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">





</head>
<body>
  <!-- <div id="preloader">

  </div> -->
    <nav class="navbar navbar-dark  navbar-expand-lg" id="nav">
        <div class="container-fluid">
        <div class="col-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                     Electronic Devices
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a href="mobile_filter.php">Mobiles</a></li>
                      <li><a href="laptop_filter.php">Labtops</a></li>
                      <li><a href="watch_filter.php">Smart Watches</a></li>
                      <li><a href="airpod_filter.php">Airpods</a></li>
                    </ul>
                    <li class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                       Clothes
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a href="#">men</a></li>
                      <li><a href="#">women</a></li>
                      <li><a href="#">kids</a></li>                 
                 
                 
                </ul>
              </div>
        </div>
          <div class="col-1">
          <a class="navbar-brand" href="categories.php">
            <img src="../img/logo.png" alt="" width="60" height="60" id="logo" >
            
          </a>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
         
       
         
            <div class="container user-cont">
              <div class="dropdown">
                  <div class="profile"> <img class="dropbtn" src="../img/user.png"><span class="username"><?php echo $_SESSION['user']['firstname']; ?></span>
                      <div class="dropdown-content">
                          <ul class="user-li">
                            <li><i class='bx bx-cog'></i><a href="saved.php"><span>Saved</span></a></li>

                              <li><div>
                                <input type="checkbox" class="checkbox" id="chk" />
                                <label class="label" for="chk">
                                  <div class="ball"></div> 
                                </label>
                              </div>
                            <span>&nbsp; &nbsp; Dark mode</span></li>
                              <li><i class='bx bx-cog'></i><span><a href="logout.php">Logout</a></span></li>
                     
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          
              
        </div>
        
     
        </div>
      </nav>
     
      <div class="container">
        <div class="row">
          <div class="col-2 ">
            <a  class="btn btn-outline-warning" href="categories.php"> <i class="fa-solid fa-arrow-left"></i>Back to categories</a>
          </div>
          
        </div>
        <br>

        <div class="row filterdiv">
          <div class="col-1 "></div>
          <div class="col-4 ">
            <p class="about">
<br>
             Choose whats is you need and  we will recommend best products for you
             

  
  
          </p>
          <div class="alert alert-warning" role="alert">
           Note: if you want to see all products click on show directly 
          </div>
          </div>
          <div class="col-2 "></div>



            <div class="col-4 ">
              <h1 class="heading"></h1>
              <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">


              <div class="options">
          
                      <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Brand </div>
                        <div class="inner-box2" class="collapse mt-2 mr-1">
                            <div class="my-1"> <label class="tick">samsung <input type="radio" name="brand" value="samsung"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">apple <input type="radio" name="brand" value="apple"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">mi <input type="radio" name="brand" value="mi"> <span class="check"></span> </label> </div> 
                            <div class="my-1"> <label class="tick">honor <input type="radio" name="brand" value="honor"> <span class="check"></span> </label> </div> 
                        </div>
                    </div>
                    <div class="box border-bottom">
                      <div class="box-label text-uppercase d-flex align-items-center">Price  </div>
                      <div class="inner-box2" class="collapse mt-2 mr-1">
                      <div class="my-1"> <label class="tick">250-999 <input type="radio" name="price" value="price1"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">1000-1999 <input type="radio" name="price" value="price1"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">2000-2999 <input type="radio" name="price" value="price2"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">above 3000 <input type="radio" name="price" value="price4"> <span class="check"></span> </label> </div>
    
                      </div>
                  </div>
                              

                          
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Color </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">black <input type="radio" name="color" value="black"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">white <input type="radio" name="color" value="white"> <span class="check"></span> </label> </div>
  
                    </div>
                    
                    
                </div>



        

                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">water resistance </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">Yes <input type="radio" name="resist" value="1"> <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">No <input type="radio" name="resist" value="0"> <span class="check"></span> </label> </div>
  
                    </div>
                    
                    
                </div>




        


                <div class="box border-bottom">
                  
                <label for="Select" class="form-label">Choose you city</label>
                <select id="Select" class="form-select" name="gov">
                <option value="">--- Choose a city ---</option>
                  <option value="cairo">القاهره</option>
                  <option value="giza">الجيزه</option>
                  <option value="alex"> الاسكندريه</option> 
                  <option value="matrouh"> مطروح</option>
                  <option value="sohag"> سوهاج</option>
                  <option value="dakahlia"> الدقهليه</option>
                  <option value="aswan"> اسوان</option>
                  <option value="sharkia"> الشرقيه</option>
                </select>
                  </div>

       
  
  
      
                
                  
                    
                  
              </div>
              <button type="submit" class="btn btn-outline-warning" name="submit" value="Show">show</button>
          </div> 
          </form>


</div>
</div>

    
      <footer class="page-footer font-small  "  id="footer" >
  
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 " >© 2022 Copyright:
          <a href="categories.html"> BUYGUIDE.Com</a>
        </div>
        <!-- Copyright -->
      
      </footer>
    </div>
    </div>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../fontawesome-free-6.1.1-web/js/all.js"></script>  
      <script src="../JS/script.js"></script>
      <script src="../JS/theme.js"></script>
  </body>
  </html>