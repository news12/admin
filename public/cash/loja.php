<!-- <?php if(!$_Func)return false;

if(!is_numeric($_GET['pages']) || empty($_GET['pages']))
  $_GET['pages'] = 1;
?> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WYD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
  </head>
  <body class="body-loja">
  
    <div id="bar-center"class="bar-loja">
      <div class="select">
        <select name="cat" id="selectMenu">
          <option value="0">[Item]> Lista de Itens</option>
          <option value="0">----------------------</option>
          <?php $_Func->GetProdListSelect(); ?>
        </select>
      </div>
      <div class="id">
        <label>ID <input type="text" value="<?php echo $_Func->account['login'];?>" disabled/></label>
      </div>
      <div class="serv">
        <label>Server <input type="text" value="Eternal" disabled/></label>
      </div>
      <div class="cash1">
        <label>Cash <input type="text" value="<?php echo number_format($_Func->account['cash'], 2, ',', '.');?>" disabled/></label>
      </div>
      <button class="buy" onclick="">NewsGames</button>
    </div>
    <div id="content">
      <div class="prods">
        <?php $_Func->GetProdList(); ?>

      </div>

      <div class="page">
          <?php if($_GET['pages'] > 1){ ?>
            <a href="?page=home&pages=<?php echo ($_GET['pages']-1); ?>"> Anterior </a>
          <?php 
		  }
            $a = $_GET['pages'];
            $a -= 5;
            if($a <= 0)
              $a = 1;

            for($i=($a); $i<($a+0); $i++)
              if($i == @$_GET['pages'])
                echo '<a href="?page=home&pages='.$i.'" class="a">'.$i.'</a>';
              else
                echo '<a href="?page=home&pages='.$i.'">'.$i.'</a>';
          ?>

          <a href="?page=home&pages=<?php echo ($_GET['pages']+1); ?>"> Próxima </a>

      </div>
    </div>
  </body>
  <script type="text/javascript">
  var selectmenu=document.getElementById("selectMenu");
  selectmenu.onchange=function(){ //run some code when "onchange" event fires
     var chosenoption=this.options[this.selectedIndex] //this refers to "selectmenu"
     if (chosenoption.value!="0"){
       location.href="?item="+chosenoption.value;
     }
   }
   </script>
</html>
