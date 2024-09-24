<?php
    session_start();
    include('DBconnection.php');
    $pid = $_GET['pid'];
    $sql ="DELETE FROM product_table WHERE pid = '$pid'";
    mysqli_query($conn, 'SET NAMES utf8'); 

    if ( mysqli_query($conn, $sql) ){ // 執行SQL指令
        mysqli_close($conn); 
        echo '<script type="text/javascript">';
        echo 'function showAlertAndRedirect() {';
        echo '  alert("刪除產品成功");';
        echo '  window.location.href = "company.php";';
        echo '}';
        echo 'window.onload = showAlertAndRedirect;';
        echo '</script>';
    }
    else{
        die("資料庫刪除記錄失敗<br/>");
        mysqli_close($conn); 
    }
?>