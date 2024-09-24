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
        $cid = $_GET['cid'];

        // 找特定cid的company
        $sql_findCompany = "SELECT cid,cname,`cname_complete`,` uniformNumbers`,`postal_code`,`company_address`,` principal`,`contact_person1`";
        $sql_findCompany .= ",`phone_number1`,`contact_person2`,`phone_number2`,`fax_number`,`note`";
        $sql_findCompany .= " from company_table WHERE cid='$cid'";
        $wantedCompany = [];

        if ($result = mysqli_query($conn,$sql_findCompany))
        {
            while ($row = mysqli_fetch_row($result))
            {
                array_push($wantedCompany,$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12]);
                // 0:cid // 1:cname // 2:cname_complete // 3:uniformNumbers // 4:postal_code // 5:company_address 
                // 6:principal // 7:contact_person1 // 8:phone_number1 // 9:contact_person2 // 10.phone_number2 // 11.fax_number
                // 12:note
            }
        }
    ?>

    <div>
        <form action="updateCompanyToDB.php" method="post">
            <div class="row g-0">
                <div class="col-lg-2">
                    <label for="formGroupExampleInput" class="form-label">公司編號</label>
                    <input type="text" name="companyID" value="<?php echo $wantedCompany[0]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">公司名稱</label><br>
                <input type="text" name="companyName" value="<?php echo $wantedCompany[1]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">公司完整名稱</label><br>
                <input type="text" name="companyFullName" value="<?php echo $wantedCompany[2]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">地址</label>
                <input type="text" name="address" value="<?php echo $wantedCompany[5]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">統編</label>
                    <input type="text" name="uniformNumbers" value="<?php echo $wantedCompany[3]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">郵遞區號</label>
                    <input type="text" name="postalCode" value="<?php echo $wantedCompany[4]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">負責人</label>
                <input type="text" name="principal" value="<?php echo $wantedCompany[6]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">聯絡人1</label>
                    <input type="text" name="contactPerson1" value="<?php echo $wantedCompany[7]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">連絡電話1</label>
                    <input type="text" name="phoneNumber1" value="<?php echo $wantedCompany[8]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">聯絡人2</label>
                    <input type="text" name="contactPerson2" value="<?php echo $wantedCompany[9]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">連絡電話2</label>
                    <input type="text" name="phoneNumber2" value="<?php echo $wantedCompany[10]?>" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">傳真號碼</label>
                <input type="text" name="faxNumber" value="<?php echo $wantedCompany[11]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">備註</label>
                <input type="text" name="note" value="<?php echo $wantedCompany[12]?>" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <input type="submit"  class="btn btn-primary" value="送出" name="UpdateCompany">
            </div>
        </form>
    </div>
</body>
</html>