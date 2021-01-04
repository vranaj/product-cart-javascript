<?php
// By Sasi Spenzer 2020-12-24 X mas Eve ** Corona Days **
include("DB.php");
include("Extra.php");
if(isset($_POST)){
    if(isset($_POST['getData'])){

        $cat_id_1 = isset($_POST['cat_id_1']) ? $_POST['cat_id_1']:' ';
        $cat_id_2 = isset($_POST['cat_id_2']) ? $_POST['cat_id_2']:' ';
        $cat_id_3 = isset($_POST['cat_id_3']) ? $_POST['cat_id_3']:' ';
        $db_obj = new DB();

        $query_1 = "SELECT product_id,product_name,price,feature_image,is_loose
       FROM product WHERE category_id =".$cat_id_1." ORDER BY Order_id LIMIT 100";

        $query_2 = "SELECT product_id,product_name,price,feature_image,is_loose
       FROM product WHERE category_id =".$cat_id_2." ORDER BY Order_id LIMIT 100";

        $query_3 = "SELECT product_id,product_name,price,feature_image,is_loose
       FROM product WHERE category_id =".$cat_id_3." ORDER BY Order_id LIMIT 100";

        $results_1 = $db_obj->getResults($query_1);
        $results_2 = $db_obj->getResults($query_2);
        $results_3 = $db_obj->getResults($query_3);

        $retunArray = array();
        $retunArray[0] = $results_1;
        $retunArray[1] = $results_2;
        $retunArray[2] = $results_3;

        print_r (json_encode($retunArray));
    }
}



?>
