<?php
    session_start();
    include 'DBconnection.php';

    if (isset($_POST["UpdateProduct"]))
    {
        $productID = $_POST["productID"];
        $productName = $_POST["productName"];
    }

    $sql = "UPDATE product_table SET pname='$productName' WHERE pid='$productID'";

    mysqli_query($conn, 'SET NAMES utf8');
    if ( mysqli_query($conn, $sql) ) // 執行SQL指令
    { 
        mysqli_close($conn); 
        echo '<p style="color: blue;">' . "修改產品成功" . '</p>';
    }
    else
    {
        die("資料庫新增記錄失敗<br/>");
        mysqli_close($conn); 
    }

    header("Location: product.php"); 
    exit;
?>