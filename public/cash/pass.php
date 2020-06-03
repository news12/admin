<?php if(!$_Func)return false; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WYD</title>
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
  </head>
  <body>
    <div class="top-bar"></div>
    <div class="bar-center"></div>
    <div id="content">
      <div class="title"></div>
      <div class="form">
        <div class="erro">
          <img src="img/img_01.gif" /><br><br><br>
          <span class="tarea">
            <?php echo $_Func->_Error2;?>
          </span>
              <div class="return">
        <a href="?page=home<?php if(!$_Func->isLogged){echo '&login='.$_GET['login'];}?>	">

      </div>

        </a>
      </div>
    </div>
  </body>
</html>
