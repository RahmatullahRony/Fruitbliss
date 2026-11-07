<tr>
    <th scope="row">
        <div class="d-flex align-items-center mt-2">
            <img src="<?php echo $val["product_image"] ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                alt="">
        </div>
    </th>
    <td class="py-5"><?php echo $val["product_name"] ?></td>
    <td class="py-5"><?php echo $val["unit_price"] ?></td>
    <td class="py-5"><?php echo $val["quantity"] ?></td>
    <td class="py-5"><?php echo $val["unit_price"]*$val["quantity"] ?></td>
</tr>