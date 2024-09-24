<?php
    session_start();
    include('DBconnection.php');
    $oid = $_GET['oid'];
    $sql ="DELETE FROM myorder WHERE oid = '$oid'";
    mysqli_query($conn, 'SET NAMES utf8'); 

    if ( mysqli_query($conn, $sql) ){ // 執行SQL指令
        mysqli_close($conn); 
        echo '<script type="text/javascript">';
        echo 'function showAlertAndRedirect() {';
        echo '  alert("刪除訂單成功");';
        echo '  window.location.href = "homepage.php";';
        echo '}';
        echo 'window.onload = showAlertAndRedirect;';
        echo '</script>';
    }
    else{
        die("資料庫刪除記錄失敗<br/>");
        mysqli_close($conn); 
    }
?>