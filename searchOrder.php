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
    <title>搜尋訂單頁面</title>
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
        if (isset($_POST["Search"]))
        {
            $companyID_NAME = $_POST["ID_Name"];
            $arr = explode(" ", $companyID_NAME);
            $companyID = $arr[0];
            $companyName = $arr[1];
    
            $yearAndMonth = $_POST["yearAndMonth"];
            $yearAndMonth = explode("-", $yearAndMonth);
            $year = $yearAndMonth[0];
            $month = $yearAndMonth[1];
        }

        $sql = "SELECT cid,cname,year,month,product,amount,unit,oid,unit_price from myorder WHERE cid='$companyID' AND year='$year' AND month='$month'";
        $show_some_order=[];

        if ($result = mysqli_query($conn,$sql))
        {
            $count = 0;
            while ($row = mysqli_fetch_row($result))
            {
                    array_push($show_some_order,[]);
                    array_push($show_some_order[$count],$row[0],$row[1],$row[2],$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
                    // 0:cid // 1:cname // 2:year // 3:month // 4:product // 5:amount // 6:unit // 7:oid // 8:unit_price
                    $count++;
            }
        }

        $sql2 = "SELECT cid,cname from company_table";
        $company_option = [];

        if ($result2 = mysqli_query($conn,$sql2))
        {
            $count = 0;
            while ($row = mysqli_fetch_row($result2))
            {
                $string = $row[0]." ".$row[1];
                // echo $string;
                array_push($company_option,$string);
                $count++;
            }
        }

        $total_account = 0;
    ?>

    <div>
        <form action="searchOrder.php" method="post">
            <div class="row g-1">
                <div class="col-lg-1" style="display: flex; align-items: center;">
                    <label for="formGroupExampleInput" class="form-label">公司</label>
                    <select name="ID_Name" required>
                        <?php
                            foreach ($company_option as $key => $value) 
                            {
                                echo "<option value='".$value."'>".$value."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-lg-1" style="display: flex; align-items: center;">
                    <label for="formGroupExampleInput" class="form-label">年分/日期</label>
                    <input type="month" name="yearAndMonth" id="formGroupExampleInput" class="form-control" required>
                </div>
                <div class="col-lg-1" style="display: flex; align-items: center;">
                    <input type="submit"  class="btn btn-primary" value="搜尋" name="Search">
                </div>
            </div>
        </form>
    </div>

    <div class="container" style="margin-top:1%;">
        <table style="border: 3px #cccccc solid;" rules="all" cellpadding="20">
            <?php
                if (count($show_some_order) == 0)
                {
                    echo "<tr>";
                    echo "<td class='col-1' style='text-align: center;'>目前沒有新的訂單</td><br>"; 
                    echo "</tr>";
                }
                else
                {
                    echo "<tr>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>公司編號</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>公司名稱</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>年/月</td>";
                    echo "<td class='col-2' style='text-align: center; border-width:1px;'>品名</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>數量</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>單位</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>單價</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'>金額</td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'></td>";
                    echo "<td class='col-1' style='text-align: center; border-width:1px;'></td>";
                    echo "</tr>";
                    for ($i = 0; $i<count($show_some_order); $i++)
                    {
                        echo "<tr>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][0]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][1]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][2]."/".$show_some_order[$i][3]."</td>";
                        echo "<td class='col-2' style='text-align: center; border-width:1px;'>".$show_some_order[$i][4]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][5]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][6]."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$show_some_order[$i][8]."</td>";
                        $account = $show_some_order[$i][5] * $show_some_order[$i][8];
                        $account = round($account);
                        $total_account = $total_account + $account;
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$account."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>"."<a class='topic' href='updateOrder.php?oid=".$show_some_order[$i][7]."' style='font-size: 15pt;font-weight: bold;'>修改</a>"."</td>";
                        echo "<td class='col-1' style='text-align: center; border-width:1px;'>"."<a class='topic' href='deleteOrder.php?oid=".$show_some_order[$i][7]."' style='font-size: 15pt;font-weight: bold;'>刪除</a>"."</td>";
                        echo "</tr>";
                        // echo "<td class='col-1' style='text-align: center;border:1px #cccccc solid;'>"."<a href=\"delete.php?lid=".$show_all_activity[$i][4]
                        //."&type=".$show_all_activity[$i][5]."\"style=\"text-decoration:none\">刪除活動</a>"."</td>";
                    }
                }
            ?>
        </table>

        <table style="border: 3px #ff0000 solid;" rules="all" cellpadding="20">
            <?php
                echo "<tr>";
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>合計</td>";
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>稅額</td>";
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>總額</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$total_account."</td>";
                $tax = $total_account * 0.05;
                $tax = round($tax);
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$tax."</td>";
                $last_account = $total_account + $tax;
                $last_account = round($last_account);
                echo "<td class='col-1' style='text-align: center; border-width:1px;'>".$last_account."</td>";
                echo "</tr>";
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