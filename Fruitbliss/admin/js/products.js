$(document).ready(function(){
	var productList;

	function getProducts(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					var productHTML = '';
					productList = resp.message.products;
					if (productList) {
						$.each(productList, function(index, value){
							productHTML += '<tr>'+
								              '<td>'+ value.product_name +'</td>'+
								              '<td><img width="60" height="60" src="../'+ value.product_image +'"></td>'+
								              '<td>'+ value.product_cat +'</td>'+
								              '<td>'+ value.product_sec +'</td>'+
								              '<td>'+ value.unit_price +'</td>'+
								              '<td>'+ value.description +'</td>'+
								              '<td>'+ value.weight +'</td>'+
								              '<td>'+ value.origin +'</td>'+
								              '<td>'+ value.quality +'</td>'+
								              '<td>'+ value.chek +'</td>'+
								              '<td>'+ value.stock +'</td>'+
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.product_id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';
						});
						$("#product_list").html(productHTML);
					}
				}
			}
		});
	}

	getProducts();

	$(".add-product").on("click", function(){
		var form = $("#add-product-form")[0];
		var formData = new FormData(form);
		formData.append('ADD_PRODUCT', 1);
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : formData,
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					getProducts();
				} else if (resp.status == 303) {
					alert(resp.message);
				}
			}
		});
	});

	$(document.body).on('click', '.edit-product', function(){
		var product = $.parseJSON($.trim($(this).find('span').text()));
		$("input[name='pid']").val(product.product_id);
		$("input[name='product_name']").val(product.product_name);
		$("textarea[name='description']").val(product.description);
		$("input[name='unit_price']").val(product.unit_price);
		$("input[name='stock']").val(product.stock);
		$("input[name='product_cat']").val(product.product_cat);
		$("input[name='product_sec']").val(product.product_sec);
		$("input[name='weight']").val(product.weight);
		$("input[name='origin']").val(product.origin);
		$("input[name='quality']").val(product.quality);
		$("input[name='chek']").val(product.chek);
		$("input[name='product_image']").siblings("img").attr("src", "../"+product.product_image);
		$("#edit_product_modal").modal('show');
	});

	$(".submit-edit-product").on('click', function(){
		var form = $("#edit-product-form")[0];
		var formData = new FormData(form);
		formData.append('EDIT_PRODUCT', 1);
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : formData,
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getProducts();
				} else if(resp.status == 303){
					alert(resp.message);
				}
			}
		});
	});

	$(document.body).on('click', '.delete-product', function(){
		var pid = $(this).attr('pid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({
				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_PRODUCT: 1, pid: pid},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getProducts();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}
			});
		}else{
			alert('Cancelled');
		}
	});
});
