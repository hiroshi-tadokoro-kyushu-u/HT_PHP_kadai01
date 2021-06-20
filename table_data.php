<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/reset.css">
    <link rel="stylesheet" href="/HT_kadai01/HT_PHP_kadai01/toppage.css">
    <script src="/HT_kadai01/HT_PHP_kadai01/jquery-2.1.3.min.js"></script>
    <title>データ登録</title>
</head>
<body>

<?php
//1.  DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=package_matching;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
    }

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM product");

//3. 実行
$status = $stmt->execute();

?>

    <div id="workspace_02" class="workspace">
        <div class="table_space">
            <form method="post" action="database.php">
                <table class="input_table">
                    <?php
                        echo '<tr>';
                        //4．データ表示
                        if($status==false) {
                            //execute（SQL実行時にエラーがある場合）
                            $error = $stmt->errorInfo();
                            exit("ErrorQuery:".$error[2]);
                        }else{
                            //Selectデータの数だけ自動でループしてくれる
                            //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
                            while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
                            // var_dump($result);
                            echo '<td style="width: 158px;">'.$result['order_number'].'</td>';
                            echo '<td style="width: 158px;">'.$result['product_name'].'</td>';
                            echo '<td style="width: 158px;">'.$result['point_from'].'</td>';
                            echo '<td style="width: 158px;">'.$result['point_to'].'</td>';
                            echo '<td style="width: 155px;">'.$result['time_from'].'</td>';
                            echo '<td style="width: 155px;">'.$result['time_to'].'</td>';
                            echo '<td style="width: 65px;"><input type="button" value="修正" class="revise_button"></input></td>';
                            echo '</tr>';
                            echo '<tr>';
                            }
                        }
                        echo '</tr>';
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>