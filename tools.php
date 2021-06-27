<?php

function db_connect(){
    try {

        // $pdo = new PDO('mysql:dbname=package_matching;charset=utf8;host=mysql57.mil16.sakura.ne.jp','mil16','GONgon6015');
        $pdo = new PDO('mysql:dbname=package_matching;charset=utf8;host=localhost','root','root');
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e-> getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name)
{
    header("Location: " . $file_name );
    exit();
}


?>