<?php 
//if (empty($_GET)) header("Location: http://www.google.com");//caso nao tenha parametro 
?>

<?php 

require_once('class/functions.class.php');

$_Func = new Functions();

if($_Func->_Error)
  require_once('error.php');


else if($_Func->_Sucess)
  require_once('sucess.php');

else if(!$_Func->isLogged)
  require_once('login.php');

else {if(@$_GET['page'] == 'donate')
    require_once('donate.php');
  
else if(@$_GET['item'])
    require_once('info.php');
  
else
    require_once('loja.php');
}


?>
