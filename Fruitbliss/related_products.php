<div class="border border-primary rounded position-relative vesitable-item">
    <a href="shop-detail.php?product_id=<?php echo $val['product_id']; ?>">
    <div class="vesitable-img">
        <img src="<?php echo $val['product_image']; ?>" class="img-fluid w-100 rounded-top" alt="">
    </div>
    </a>    
    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;"><?php echo $val['product_cat']; ?>
    </div>
    <div class="p-4 pb-0 rounded-bottom">
        <h4><?php echo $val['product_name']; ?></h4>
        <p><?php echo $val['description']; ?></p>
        <div class="d-flex justify-content-between flex-lg-wrap">
            <p class="text-dark fs-5 fw-bold">TK <?php echo $val['unit_price']; ?> / kg</p>
            <a href="#" pid='<?php echo $val['product_id'] ?>' id='product' class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
        </div>
    </div>
</div>