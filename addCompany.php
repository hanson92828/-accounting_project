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

    <div>
        <form action="newCompanyToDB.php" method="post">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">公司名稱</label><br>
                <input type="text" name="companyName" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">公司完整名稱</label><br>
                <input type="text" name="companyFullName" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">地址</label>
                <input type="text" name="address" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">統編</label>
                    <input type="text" name="uniformNumbers" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">郵遞區號</label>
                    <input type="text" name="postalCode" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">負責人</label>
                <input type="text" name="principal" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">聯絡人1</label>
                    <input type="text" name="contactPerson1" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">連絡電話1</label>
                    <input type="text" name="phoneNumber1" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">聯絡人2</label>
                    <input type="text" name="contactPerson2" id="formGroupExampleInput" class="form-control"><br>
                </div>
                <div class="col-lg-6">
                    <label for="formGroupExampleInput" class="form-label">連絡電話2</label>
                    <input type="text" name="phoneNumber2" id="formGroupExampleInput" class="form-control"><br>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">傳真號碼</label>
                <input type="text" name="faxNumber" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">備註</label>
                <input type="text" name="note" id="formGroupExampleInput" class="form-control"><br>
            </div>
            <div class="mb-3">
                <input type="submit"  class="btn btn-primary" value="送出" name="InsertCompany">
            </div>
        </form>
    </div>
</body>
</html>