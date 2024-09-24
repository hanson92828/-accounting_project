<?php
    session_start();
    include 'DBconnection.php';

    function normalize($s) 
    {
        if ($s == null or $s == '')
        {
            return 'N/A';
        }
        return $s;
    }

    if (isset($_POST["InsertCompany"]))
    {
        $companyName = normalize($_POST["companyName"]);
        $companyFullName = normalize($_POST["companyFullName"]);
        $address = normalize($_POST["address"]);
        $uniformNumbers = normalize($_POST["uniformNumbers"]);
        $postalCode = normalize($_POST["postalCode"]);
        $principal = normalize($_POST["principal"]);
        $contactPerson1 = normalize($_POST["contactPerson1"]);
        $phoneNumber1 = normalize($_POST["phoneNumber1"]);
        $contactPerson2 = normalize($_POST["contactPerson2"]);
        $phoneNumber2 = normalize($_POST["phoneNumber2"]);
        $faxNumber = normalize($_POST["faxNumber"]);
        $note = normalize($_POST["note"]);

        if (empty($companyName)) 
        {
            header("Location: addCompany.php?error=公司名稱不得為空");
            exit();
        }
    }

    $sql = "INSERT INTO company_table VALUES (NULL,'";
    $sql .= $companyName."','".$companyFullName."','".$uniformNumbers."','".$postalCode."','".$address."','".$principal."','".$contactPerson1."','";
    $sql .= $phoneNumber1."','".$contactPerson2."','".$phoneNumber2."','".$faxNumber."','".$note."')";

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

    header("Location: company.php"); 
    exit;
?>