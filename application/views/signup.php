<html lang="en">
<head>
  <title>Sign Up </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style ="background-color: #003153">

  <nav class="navbar navbar-expand-md  navbar-dark shadow" style="background-color:#1c2841">
    <a class="navbar-brand" href="#"> Welcome To Our Online Shopping World</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="container mt-5 w-50 p-5 rounded shadow-lg" style="background-color:#1c2844">
    <span class="text-danger"></span>
    <div class="text-info">
      <?php if(isset($_SESSION['success']));?>
      <?php echo validation_errors('');?>
    </div>  
    <form method="post"class="text-white" action="<?php echo base_url().'index.php/Products/signup';?>" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group col-md-6">
          <label>User Name</label>
          <input type="text" name="user_name" class=" form-control form-control-sm" placeholder="user name" required="This">
        </div>
          </div>
          <div class="row">
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" name="email" class=" form-control form-control-sm" placeholder="email" required="This">
        </div>
          </div>
          <div class="row">
          <div class="form-group col-md-6">
          <label>Password</label>
          <input type="password" name="password" class=" form-control form-control-sm" required="This">
            </div>
            </div>
          <div class="row">
          <div class="form-group col-md-6">
          <label>Phone</label>
          <input type="number" name="phone" class=" form-control form-control-sm" required="This">
            </div>
        </div>
       <button type="submit" name="submit" class="btn btn-sm text-white"style="background-color:#003153">Submit</button>
     </form>
 
  </body>
</html>
