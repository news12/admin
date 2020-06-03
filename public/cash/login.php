<?php 
require_once('index.php'); 
?>

<?php if(!$_Func)return false; ?>
<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="BR" lang="PT-BR" >
<head>	
<title>Neil</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" >
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css" charset="utf-8">
</head>
<body class="body-login">
<?php if(!empty($alert)){echo "<script>alert('".$alert."');</script>";} ?>
  
    <?php
	
  if(!$_Func->isLogged){ ?>
    <div name="div-login" class="div-login">
      <h3>SENHA:</h3>
    <form method="post" style="form-login" name="login" value="<?php echo $_GET['login'];?>"/>
    <input type="password" class="form-control form-control senha" placeholder="Entre com sua senha" name="pass" id="pwd">
    <button type="submit" class="btn btn-success btn-enter" name="ddsg"> Entar</button>
	</form>
<?php 
}
  ?>
</div>
</body>
<!-- JS, Popper.js, and jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
</html>
