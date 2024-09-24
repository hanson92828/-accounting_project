<?php
    session_start();
    include 'DBconnection.php';

    if (isset($_POST["InsertProduct"]))
    {
        $pname = $_POST["productName"];
    }

    $sql = "INSERT INTO product_table VALUES (NULL,'$pname')";
    mysqli_query($conn, 'SET NAMES utf8');
    if ( mysqli_query($conn, $sql) ) // 執行SQL指令
    { 
        mysqli_close($conn); 
        echo '<p style="color: blue;">' . "新增產品成功" . '</p>';
    }
    else
    {
        die("資料庫新增記錄失敗<br/>");
        mysqli_close($conn); 
    }
    header("Location: addProduct.php"); 
    exit;
?>