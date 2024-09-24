<?php
    session_start();
    include 'DBconnection.php';

    if (isset($_POST["Insert"]))
    {
        $companyID_NAME = $_POST["ID_Name"];
        $arr = explode(" ", $companyID_NAME);
        $companyID = $arr[0];
        $companyName = $arr[1];

        $yearAndMonth = $_POST["yearAndMonth"];
        $year = substr( $yearAndMonth, 0, 4);
        $month = substr( $yearAndMonth, 5, 2);

        $productName = $_POST["productName"];
        $amount = $_POST["amount"];
        $unit = $_POST["unit"];
        $unitPrice = $_POST["unitPrice"];
    }


    $sql = "INSERT INTO myorder VALUES (NULL,";
    $sql .= $companyID.",'".$companyName."',".$year.",'".$month."','".$productName."',".$amount.",'".$unit."',".$unitPrice.")";

    echo $sql;

    mysqli_query($conn, 'SET NAMES utf8');
    if ( mysqli_query($conn, $sql) ) // 執行SQL指令
    { 
        mysqli_close($conn); 
        echo '<p style="color: blue;">' . "新增訂單成功" . '</p>';
    }
    else
    {
        die("資料庫新增記錄失敗<br/>");
        mysqli_close($conn); 
    }
    header("Location: homepage.php"); 
    exit;
?>