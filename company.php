<?php
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>firstpage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="topic" href="homepage.php" style="font-size: 15pt;font-weight: bold;">首頁</a>
            <a class="topic" href="company.php" style="font-size: 15pt;font-weight: bold;">客戶一覽</a>
            <a class="topic" href="addOrder.php" style="font-size: 15pt;font-weight: bold;">添加訂單</a>
            <a class="topic" href="addCompany.php" style="font-size: 15pt;font-weight: bold;">添加客戶</a>
            <a class="topic" href="product.php" style="font-size: 15pt;font-weight: bold;">產品一覽</a>
            <a class="topic" href="addProduct.php" style="font-size: 15pt;font-weight: bold;">添加產品</a>
        </div>
    </nav>

    <?php
        include 'DBconnection.php';
        $sql = "SELECT cid,cname,` uniformNumbers`,`company_address`,`contact_person1`,`phone_number1` from company_table";
        $show_all_company=[];

        if ($result = mysqli_query($conn,$sql))
        {
            $count = 0;
            while ($row = mysqli_fetch_row($result))
            {
                    array_push($show_all_company,[]);
                    array_push($show_all_company[$count],$row[0],$row[1],$row[2],$row[3], $row[4], $row[5]);
                    $count++;
            }
        }
    ?>

    <div class="container" style="margin-top:1%;">
        <table style="border: 3px #cccccc solid;" rules="all" cellpadding="20">
            <?php
                if (count($show_all_company) == 0)
                {
                    echo "<tr>";
                    echo "<td class='col-1' style='text-align: center;'>目前沒有新的客戶</td><br>"; 
                    echo "</tr>";
                }
                else
                {
                    echo "<tr>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>公司編號</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>公司名稱</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>統編</td>";
                    echo "<td class='col-2' style='text-align: center; border-width:1px;'>地址</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>聯絡人</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>電話</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'></td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'></td>";
                    echo "</tr>";
                    for ($i = 0; $i<count($show_all_company); $i++)
                    {
                        echo "<tr>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_all_company[$i][0]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_all_company[$i][1]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_all_company[$i][2]."</td>";
                        echo "<td class='col-2' style='text-align: center; border-width:1px;'>".$show_all_company[$i][3]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_all_company[$i][4]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_all_company[$i][5]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>"."<a class='topic' href='updateCompany.php?cid=".$show_all_company[$i][0]."' style='font-size: 15pt;font-weight: bold;'>修改</a>"."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>"."<a class='topic' href='deleteCompany.php?cid=".$show_all_company[$i][0]."' style='font-size: 15pt;font-weight: bold;'>刪除</a>"."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>

    <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>