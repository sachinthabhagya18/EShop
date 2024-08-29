<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>eShop| Seller's Product View</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css" />
</head>

<body class="bg-info">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-body border border-primary border-start-0 border-end-0 border-top-0">
                <?php require "header.php"; ?>
            </div>
            <div class="col-12 bg-white">
                <div class="row">
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4">
                        <div class="row">
                            <div class="col-2 mt-2">
                                <div class="mb-3 logo"></div>
                            </div>
                            <div class="col-10">
                                <label class="text-black-50 fw-bolder fs-2 mt-4">Advanced Search</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12 col-lg-10 mt-3 mb-2">
                                <input type="text" class="form-control fw-bold" placeholder="Type keyword to Search..." id="k" />
                            </div>
                            <div class="col-12 col-lg-2 mt-3 mb-2">
                                <button class="btn btn-primary searchbtn1" onclick="advanceSearch();">Search</button>
                            </div>
                            <div class="col-12">
                                <hr class="border border-primary border-3" />
                            </div>
                        </div>
                    </div>

                    <div class="offset-0 offset-lg-1 col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <select class="form-select" id="c">
                                            <option value="0">Select Category</option>
                                            <?php
                                            $category = Database::search("SELECT * FROM `category`");
                                            $cn = $category->num_rows;

                                            for ($a = 0; $a < $cn; $a++) {
                                                $cr = $category->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $cr["id"]; ?>"><?php echo $cr["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <select class="form-select" id="b">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $brand = Database::search("SELECT * FROM `brand`");
                                            $bn = $brand->num_rows;

                                            for ($b = 0; $b < $bn; $b++) {
                                                $br = $brand->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $br["id"]; ?>"><?php echo $br["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <select class="form-select" id="m">
                                            <option value="0">Select Model</option>
                                            <?php
                                            $model = Database::search("SELECT * FROM `model`");
                                            $mn = $model->num_rows;

                                            for ($a = 0; $a < $mn; $a++) {
                                                $mr = $model->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $mr["id"]; ?>"><?php echo $mr["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <select class="form-select" id="con">
                                    <option value="0">Select Condition</option>
                                    <?php
                                    $condition = Database::search("SELECT * FROM `condition`");
                                    $conn = $condition->num_rows;

                                    for ($a = 0; $a < $conn; $a++) {
                                        $con = $condition->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $con["id"]; ?>"><?php echo $con["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="form-select" id="clr">
                                    <option value="0">Select Colour</option>
                                    <?php
                                    $colour = Database::search("SELECT * FROM `color`");
                                    $col = $colour->num_rows;

                                    for ($a = 0; $a < $col; $a++) {
                                        $colr = $colour->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $colr["id"]; ?>"><?php echo $colr["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Price form" id="pf" />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Price to" id="pt" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="offset-0 offset-lg-1 col-12 col-lg-10 mb-3 rounded">
                    <div class="row">
                        <div class="offset-0 col-12 col-lg-12 text-center">
                            <div class="row" id="viewResults">
                                
                                


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="offset-4 col-4 text-center">
                            <div class="offset-3 mb-5 pagination">
                                <a href="#">&laquo;</a>
                                <a href="#" class="ms-1 active">1</a>
                                <a href="#" class="ms-1">2</a>
                                <a href="#">&raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php

            require "footer.php";
            ?>

        </div>
    </div>



    <script src="home.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>