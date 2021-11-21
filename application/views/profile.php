<!DOCTYPE html>
<html lang="en">
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
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="text-white"><br>
                     	Login Successful
                     	<br> 
                     	Welcome
                     	<?=$this->session->userdata('user_name')?>
                     <br>
                     <?=$this->session->userdata('email')?></h3>
                     
                     <form method="post"class="text-white" action="<?php echo base_url().'index.php/Products/show';?>" enctype="multipart/form-data">
                     	
                    <a href="<?= base_url();?>/index.php/Products/logout" style="background-color:#003153">Logout</a>
                     <button type="submit" name="submit" class="btn btn-sm text-white"style="background-color:#003456">Show List</button>
                                                                    
                     </form>                                               
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>