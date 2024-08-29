<?php

require "connection.php";

if (isset($_POST["k"])) {
    $k = $_POST["k"];
    $c = $_POST["c"];
    $b = $_POST["b"];
    $m = $_POST["m"];
    $con = $_POST["con"];
    $clr = $_POST["clr"];
    $pf = $_POST["pf"];
    $pt = $_POST["pt"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `description` LIKE '%" . $k . "%' ");
    $n = $productrs->num_rows;

    for ($x = 0; $x < $n; $x++) {

        $r = $productrs->fetch_assoc();
?>

        <div class="card col-lg-6 col-12 mt-3 mb-3">
            <div class="row g-0">
                <div class="col-md-4 mt-4">
                    <?php
                    $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$r["id"]."' ");
                    $img = $imgrs->fetch_assoc();
                    ?>
                    <img src="<?php echo $img["code"]; ?>" class="img-fluid rounded-start" alt="..." />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $r["title"] ?></h5>
                        <span class="card-text fw-bold text-primary">Rs.<?php echo $r["price"]; ?> .00</span>
                        <br />
                        <span class="card-text fw-bold text-success"><?php echo $r["qty"] ?> Item Left</span>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="#" class="btn btn-success d-grid">Buy Now</a>
                                </div>
                                <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                    <a href="#" class="btn btn-danger d-grid">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
} else {

    echo "2";
}
?>