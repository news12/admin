<?php if(!$_Func)return false; ?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" charset="utf-8">
  </head>
  <body class="body-info">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Info Item</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <!-- <div id="bar-center" class="bar-info">
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
      <div class="cash">
        <label>Cash <input type="text" value="<?php echo $_Func->account['cash'];?>" disabled/></label>
      </div>
      <button class="buy" onclick="location.href='?page=donate'">WYDCash</button>
    </div> -->
    <div id="content">
      <?php $item = $_Func->GetItemInfo(); ?>
      <div class="info-prod">
        <div class="ptitle"><?php echo $item['item_name']; ?></div>
        <div class="info">
          <div class="img"><img src="img/itens/<?php echo $item['item__img']; ?>.gif" width="116" height="100"/></div>
          <div class="infos">
            <div class="text"><?php echo $item['item_desc']; ?></div>
            <div class="shop-info">ESTE ITEM CONTEM: <font color=\"#FF0000\"><?php echo $item['item_type']; ?></font> UNIDADE(S).<!-- <?php echo $item['item_price']; ?> Cash--></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="bg-bottom"></div>
		    <br /><center>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Caso adquira o item acima, Será  <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;descontado. Como o valor mostrado.<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Deseja prosseguir?</center><br /> 
        <div class="clear"></div>
      </div>
	  
      <div class="clear"></div>
      <div class="conf-buy">
	  
        <div class="cash">
		
          <label>Saldo:<input type="text" value="<?php echo $_Func->account['cash']; ?>" /></label>
        </div>
        <div class="preco">
          <label>Valor Pago: <input type="text" value="<?php echo $item['item_price']; ?>" /></label>
        </div>
        <div class="saldo">
          <label>Restante:<input type="text" value="<?php echo ($_Func->account['cash']-$item['item_price']); ?>" /></label>
        </div>
		 
        <br><br><br><br>
        <center><button style="margin: 0 0 0 25px;" onclick="document.confirm.submit();">Confirmar</button>
        <button style="margin: 0 0 0 20px;" onclick="window.location.href='?page=home'">Cancelar</button>

        <form method="post" name="confirm" style="display:none;">
          <input type="hiden" name="key" value="<?php echo @time();?>" />
          <input type="submit"/>
        </form>

      </div>
    </div>
  </body>

  <script type="text/javascript">
  // var selectmenu=document.getElementById("selectMenu");
  // selectmenu.onchange=function(){ //run some code when "onchange" event fires
  //    var chosenoption=this.options[this.selectedIndex] //this refers to "selectmenu"
  //    if (chosenoption.value!="0"){
  //      location.href="?item="+chosenoption.value;
  //    }
  //  }
   </script>
</html>
