<?php if(!$_Func)return false; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eternal</title>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
  </head>
  <body>
    <div class="top-bar"></div>
    <div class="bar-center"></div>
    <div id="content">
      <div class="title"></div>
      <div class="form">
        <div class="login-error">
          <span class="tarea">
            <?php echo $_Func->_Error;?>
          </span>
              <div class="return">
        <a href="?page=home<?php if(!$_Func->isLogged){echo '&login='.$_GET['login'];}?>	">
  		      <img src="img/botton-03.gif" width="70" height="21" name="Image3" border="0">
      </div>

        </a>
      </div>
    </div>
  </body>
</html>
