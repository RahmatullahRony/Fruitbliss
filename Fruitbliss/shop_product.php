<?php
    $pro_id    = $val['product_id'];
?>

<div class="col-md-6 col-lg-4 col-xl-3">
    
    <div class="rounded position-relative fruite-item">
        <a href="shop-detail.php?product_id=<?php echo $val['product_id']; ?>">
            <div class="fruite-img">
                <img src=<?php echo $val['product_image']; ?> class="img-fluid w-100 rounded-top" alt="">
            </div>
        </a>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
            <?php echo $val['product_cat']; ?>
        </div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            <h4><?php echo $val['product_name']; ?></h4>
            <p><?php echo $val['description']; ?></p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">Tk <?php echo $val['unit_price']; ?> / kg</p>
                <a href="#" pid='<?php echo $pro_id?>' id='product' class="btn border border-secondary rounded-pill px-3 text-primary">
                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                </a>
            </div>
        </div>
    </div>
</div>