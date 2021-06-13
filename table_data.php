<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/reset.css">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/toppage.css">
    <title>データ登録</title>
</head>
<body>

<?php

$order_number = $_POST["order_number"];
$product_name = $_POST["product_name"];
$point_from = $_POST["point_from"];
$point_to = $_POST["point_to"];
$time_from = $_POST["time_from"];
$time_to = $_POST["time_to"];

$data_pack = array($order_number,$product_name,$point_from,$point_to,$time_from,$time_to);

// if(isset($data_pack)){}else{
$file = fopen("data_pack.txt","a");
foreach($data_pack as $key => $value){
    fwrite($file, $key.",".$value."\n");
}
fclose($file);
// }


$data = file("data_pack.txt");
$result = array();
$lap = 0;
foreach($data as $row):
   $params = explode(",", $row);
   $result[$lap] = $params[1];

// print_r($result);

        $lap = $lap +1;
        endforeach;
?>

<table class="input_table">
    <tr>
        <!-- <th>OD</th>
        <th>製品名</th>
        <th>出荷地点</th>
        <th>発送先</th>
        <th>発送時間(From)</th>
        <th>発送時間(To)</th>
        <th>登録</th> -->
    </tr>
    <tr class="new_table">
        <td>
        </td>
    </tr>
    <tr>

    </tr>
</table>



<ul>
    <li><a href="index.php">戻る</a></li>
</ul>


</body>
</html>