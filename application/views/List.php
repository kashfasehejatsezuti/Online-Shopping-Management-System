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
<body style ="background-color: white">

	<nav class="navbar navbar-expand-md  navbar-dark shadow" style="background-color:#1c2841">
		<a class="navbar-brand" href="#">Home Page</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
  <div class="container-fluid">
  <h2>Product Lists </h2>
  <div class="text-right">
  	<a href="<?php echo base_url().'index.php/Products/create'?>"class="btn-primary btn">Add New Product</a><br>
  </div>
  
</div>
<div class="row">
	
	<div class="col-md-12">
		<table class=" table table-striped">
			<tr>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Quantity</th>
				<th>Product Description</th>
				<th>Product Image</th>
				<th>Product Edit</th>
				<th>Product Delete</th>	
			</tr>
			<?php if(!empty($products))
			{
				foreach ($products as $product)
			{
				?>
			<tr>
				
					
					<td><?php echo $product['product_name']?></td>
					<td><?php echo $product['product_price']?></td>
					<td><?php echo $product['product_quantity']?></td>
					<td><?php echo $product['product_description']?></td>
					<td><img src="<?php echo base_url().$product['product_image'] ?>" style="width: 150px; height:80px"></td>
					<td> <a href="<?php echo base_url().'index.php/Products/edit/'.$product['product_id'];?>"class="btn-success btn">Edit</a></td>
					<td> <a href="<?php echo base_url().'index.php/Products/delete/'.$product['product_id']?>"class="btn-danger btn">Delete</a></td>
						
			</tr>
			<?php }} else{}?>
		</table>
	</div>
</div>
</body>
</html>
 

 



