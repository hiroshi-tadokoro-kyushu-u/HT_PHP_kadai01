<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/reset.css">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/toppage.css">
    <script src="/HT_kadai01/HT_PHP_kadai01/jquery-2.1.3.min.js"></script>
    <title>データ修正</title>
</head>
<body>

<?php
//1.  DB接続します
// try {
//     //Password:MAMP='root',XAMPP=''
//     $pdo = new PDO('mysql:dbname=package_matching;charset=utf8;host=localhost','root','root');
//     } catch (PDOException $e) {
//     exit('DBConnectError:'.$e->getMessage());
//     }

    require_once('tools.php');
    $pdo = db_connect();

    $order_number = $_GET["order_number"];

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("DELETE FROM product WHERE order_number=:order_number;");
$stmt->bindValue(':order_number',$order_number,PDO::PARAM_INT);

//3. 実行
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
    } else {
      redirect('index.php');
}
?>