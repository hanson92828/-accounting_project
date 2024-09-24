<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>addpage</title>
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
        $oid = $_GET['oid'];

        // 列出所有客戶選項
        $sql = "SELECT cid,cname from company_table";
        $company_option = [];

        if ($result = mysqli_query($conn,$sql))
        {
            $count = 0;
            while ($row = mysqli_fetch_row($result))
            {
                $string = $row[0]." ".$row[1];
                // echo $string;
                array_push($company_option,$string);
                $count++;
            }
        }

        $sql2 = "SELECT pname from product_table";
        $product_option = [];

        if ($result = mysqli_query($conn,$sql2))
        {
            $count = 0;
            while ($row = mysqli_fetch_row($result))
            {
                array_push($product_option,$row[0]);
                $count++;
            }
        }

        // 找特定oid的order
        $sql_findOrder = "SELECT cid,cname,year,month,product,amount,unit,oid,unit_price from myorder WHERE oid='$oid'";
        $wantedOrder = [];

        if ($result = mysqli_query($conn,$sql_findOrder))
        {
            while ($row = mysqli_fetch_row($result))
            {
                array_push($wantedOrder,$row[0],$row[1],$row[2],$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
                // 0:cid // 1:cname // 2:year // 3:month // 4:product // 5:amount // 6:unit // 7:oid // 8:unitPrice
            }
        }
        $mystring = $wantedOrder[0]." ".$wantedOrder[1];
    ?>
    
    <div>
        <form action="updateOrderToDB.php" method="post">
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">表單編號</label>
                <input value="<?php echo $wantedOrder[7]?>" type="text" name="oid" id="formGroupExampleInput" class="form-control" readonly><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">公司名稱:</label><br>
                <select name="ID_Name" required>
                    <?php
                        echo "<option value='".$mystring."'>".$mystring."</option>";
                        foreach ($company_option as $key => $value) 
                        {
                            echo "<option value='".$value."'>".$value."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="formGroupExampleInput" class="form-label">年分/日期</label>
                <input value="<?php echo $wantedOrder[2]."-".$wantedOrder[3]?>" type="month" name="yearAndMonth" id="formGroupExampleInput" class="form-control" required><br>
            </div>
            <div class="row g-0">
                <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">品名</label>
                    <select name="productName" required>
                        <?php
                            echo "<option value='".$wantedOrder[4]."'>".$wantedOrder[4]."</option>";
                            foreach ($product_option as $key => $value) 
                            {
                                echo "<option value='".$value."'>".$value."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">單價(元/kg)</label>
                    <input value="<?php echo $wantedOrder[8]?>" type="text" name="unitPrice" id="formGroupExampleInput" class="form-control" required><br>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">數量</label>
                    <input type="text" name="amount" value="<?php echo $wantedOrder[5]?>" id="formGroupExampleInput" class="form-control" required><br>
                </div>
                <div class="col-lg-3">
                    <label for="formGroupExampleInput" class="form-label">單位</label>
                    <input value="<?php echo $wantedOrder[6]?>" type="text" name="unit" id="formGroupExampleInput" class="form-control" required><br>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit"  class="btn btn-primary" value="更新" name="Update">
            </div>
        </form>
    </div>
</body>
</html>