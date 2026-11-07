<?php
    $pro_id    = $val['product_id'];
?>

<tr id="product-<?php echo $val['product_id']; ?>">
    <th scope="row">
        <div class="d-flex align-items-center">
            <img src="<?php echo $val["product_image"]; ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
        </div>
    </th>

    <td>
        <p class="mb-0 mt-4"><?php echo $val["product_name"]; ?></p>
    </td>

    <td>
        <p class="mb-0 mt-4"><?php echo $val["unit_price"]; ?> Tk</p>
    </td>

    <td>
        <div class="input-group quantity mt-4" style="width: 100px;">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input type="text" id="cartQuantity-<?php echo $val['product_id']; ?>" class="form-control form-control-sm text-center border-0" value="<?php echo $val["quantity"]; ?>">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </td>

    <td>
        <?php
            $total_price = $val["unit_price"] * $val["quantity"];
        ?>
        <p  id="totalprice-<?php echo $val['product_id']; ?>" class="mb-0 mt-4"><?php echo $total_price; ?> Tk</p>
    </td>

    <td>
        <!--<a href="javascript:void(0);" onclick="removeFromCart(<?php //echo $val['product_id']; ?>, '<?php //echo $_SESSION['user']; ?>')">-->
            <button id="cartRemove" pid='<?php echo $pro_id?>' class="btn btn-md rounded-circle bg-light border mt-4">
                <i class="fa fa-times text-danger"></i>
            </button>
        <!--</a>-->
    </td>
</tr>
