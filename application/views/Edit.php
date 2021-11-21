<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style ="background-color: #003153">

	<nav class="navbar navbar-expand-md  navbar-dark shadow" style="background-color:#1c2841">
		<a class="navbar-brand" href="#"> Admin Panel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<div class="container mt-5 w-50 p-5 rounded shadow-lg" style="background-color:#1c2841">
		<span class="text-danger"></span>
		<div class="text-info">
			<?php if(isset($_SESSION['success'])) ?>
			<?php echo validation_errors('');?>
		</div>
		
		<form method="post"class="text-white" action="" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-md-6">
					<label>Product Name</label>
					<input type="text"value="<?php echo set_value('p_name',$products['product_name']);?>" name="p_name" class=" form-control form-control-sm">
				</div>
				<div class="form-group col-md-6">
					<label>Product Price $</label>
					<input type="text" value="<?php echo set_value('p_price',$products['product_price']);?>" name="p_price" class=" form-control form-control-sm">
				</div>	
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Product Quantity</label>
					<input type="text"  value="<?php echo set_value('p_qty',$products['product_quantity']);?>" name="p_qty" class=" form-control form-control-sm">
				</div>
				<div class="form-group col-md-6">
					<label>Product Desceiption</label>
					<input type="text" value="<?php echo set_value('p_des',$products['product_description']);?>"  name="p_des" class=" form-control form-control-sm">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12">
					<?php  $a= set_value('product_image',$products['product_image']);?>
					<img src="<?php echo base_url().$a ?>" style="width: 150px; height:80px">
					<label for="">Product Image </label>
					<input type="file" value="<?php echo set_value('product_image');?>" name="product_image" class=" form-control form-control"><br>
				</div>
			</div>
			<button type="submit" name="submit" class="btn btn-sm text-white"style="background-color:#003153">Update Item</button>
</form>
		</div>	
	</div>






</body>
</html>
