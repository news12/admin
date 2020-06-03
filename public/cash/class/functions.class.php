<?php
ob_start();
session_start();
/*
print_r($_COOKIE);
print_r($_POST);
print_r($_GET);
*/
if(!empty($_GET['id'])){$_GET['login'] = $_GET['id'];}

require(dirname(__FILE__).'/database.class.php');
class Functions
{
  public $_DB;
  public $_Config = array(
    "account_dir" => 'C:\\Users\\Uerley\\Desktop\\WYD_SERVER\\Server\\DBSrv\\run\\account\\',
    "account_info_dir" => 'C:\\Users\\Uerley\\Desktop\\WYD_SERVER\\Server\\DBSrv\\run\\Cash\\',
    "deliver_item_dir" => 'C:\\Users\\Uerley\\Desktop\\WYD_SERVER\\Server\\Common\\ImportItem\\'
  );
  public $account = array("login" => '', "pass"=>'', "cash"=>"");
  public $_Error;
  public $isLogged = false;
  public $_Sucess;

  function __construct()
  {
    $this->_DB = new DataBase();
    if($this->_DB->isConnect){
      $this->_Posttrate();
    }else {
      $this->_Error = "DB Fail !";
    }

  }

  public function GetProdListSelect()
  {
    $sql = 'SELECT id, item_name FROM premiun_nell_itens ORDER BY item_date';
    foreach ($this->_DB->db->query($sql) as $row)
    {
      echo '<option value="'.$row['id'].'">'.$row['item_name'].'</option>';
    }
  }
  public function GetProdList()
  {
    $page = @$_GET['pages'];
    if(!is_numeric($page))
      $page = 0;

    $page -= 1;
    if($page < 0)
      $page = 0;

    $sql = 'SELECT id, item_name, item__img, item_price, item_cont, item_cont, item_type, item_date, item__id FROM premiun_nell_itens ORDER BY item_date LIMIT '.($page*12).',12';
    foreach ($this->_DB->db->query($sql) as $row)
    {
        echo '
        <div class="prod">
          <div class="ptitle">'.$row['item_name'].'</div>
          <div class="cont">
            <div class="img"><img src="img/itens/'.$row['item__img'].'.gif" width="76" height="45"/></div>
            <div class="info">
              <span>VALOR: <font color=\"#FF0000\">'.$row['item_price'].' </font> de CASH</span><br>
			   <span>ESTOQUE: <font color=\"#FF0000\">'.$row['item_cont'].'</font>/200</span><br>
              <button class="buy" onclick="location.href=\'?item='.$row['id'].'\'">Comprar</button>
            </div>
          </div>
        </div>';
    }
  }

  public function GetItemInfo()
  {
    $id = $_GET['item'];
    if(!is_numeric($id))
      return false;

    $sql = 'SELECT * FROM premiun_nell_itens WHERE id='.$id.' LIMIT 1';
    $query = $this->_DB->db->query($sql);
    if(!$query)
      return false;

    return $query->fetch();
  }

  function _Posttrate()
  {
    $this->isLogged = $this->login();
    if($this->isLogged)
      $this->BuyItem();
  }

  function BuyItem()
  {
    if(empty($_GET['item']) || empty($_POST['key']))
      return false;

    //if($_POST['key'] == $_SESSION['key'])
     // return false;

    $item = $this->GetItemInfo();
    if($item['item_price'] > $this->account['cash']){
      $_SESSION['key'] = $_POST['key'];
      $this->_Error = 'Você possui não cash suficiente.';
      return false;
    }
    if($item['item_cont'] <= 0){
      $_SESSION['key'] = $_POST['key'];
      $this->_Error = 'Desculpe! <br>Este itens esta em falta.<br> Aguarde a recomposição.';
      return false;
    }

    $newCash = $this->account['cash']-$item['item_price'];
    if(!$this->DeliverItem($item, @time())){
      $_SESSION['key'] = $_POST['key'];
      $this->_Error = "Falha! Estamos passando por problemas internos , tente novamente mais tarde.";
      return false;
    }
    $_SESSION['key'] = $_POST['key'];
    $this->SaveCashUpdate($newCash);
    $this->_DB->db->query("UPDATE premiun_nell_itens SET item_cont=item_cont-1 WHERE id=".$_GET['item'].";");
    $this->_DB->db->query("INSERT INTO premiun_nell_buylog (log_type, log_client_name, log_msg, log_date) VALUES ('1', '".$this->account['login']."', 'Buy item: ".$item['item__id']." ".$item['item__ef1']." ".$item['item__efv1']." ".$item['item__ef2']." ".$item['item__efv2']." ".$item['item__ef3']." ".$item['item__efv3']."', '".@time()."');");
    $this->_Sucess = "Parabéns! Sua compra foi bem sucedida</br>
	Obrigado por contribuir.</br></br>
	<td align='right'><font color='yellow'>Atenciosamente Equipe: </font><br><font color='red'>Eternal WYD</font></td>";
    return true;
  }
  function retorno(){
    return true;
  }

  function login()
  {
	if(!empty($_COOKIE['login'])){
		if(!empty($_GET['login'])){
			setcookie("login", "");setcookie("pass", "");
			return false;
		}
		$_GET['login'] = $_COOKIE['login'];
	}
	if(empty($_GET['login'])){
      return false;
    }

    if(!empty($_COOKIE['pass'])){
      $_POST['pass'] = $_COOKIE['pass'];
    }
	if(empty($_POST['pass'])){
      return false;
	}

    $login = $_GET['login'];
    $passw = $_POST['pass'];

    if($account=$this->loadAccount($login)){
      if($account['pass'] == $passw){
        setcookie("login", $login);
        setcookie("pass", $passw);

        $this->isLogged = true;
        $this->account = $account;
        return true;
      }
    }
    $this->_Error = "Conta não registrado ou senha inválida ! Por favor, verifique e tente novamente! ";
    $this->isLogged = false;
    $this->account = array();

    return false;
  }

  function DeliverItem($item, $time)
  {
    $dir = $this->_Config['deliver_item_dir'].$this->account['login']."-".rand().$time.".item";
    if(file_exists($dir))
      $dir = $this->_Config['deliver_item_dir'].$this->account['login']."-".rand().$time().".item";

    try {
      $file = fopen($dir, "w+");
      if(!$file)
        return false;

      fwrite($file, $this->account['login']." ".$item['item__id']." ".$item['item__ef1']." ".$item['item__efv1']." ".$item['item__ef2']." ".$item['item__efv2']." ".$item['item__ef3']." ".$item['item__efv3']);
      fclose($file);
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  function loadAccount($name){
    $init=substr($name,0,1);if(is_numeric($init)){$init="etc";}
    $dir = $this->_Config['account_dir'].$init."\\".$name;
    if(!file_exists($dir))
      return false;

    $o=@fopen($dir,"r");
    if(!$o)
      return false;
    $fsenha=trim(substr(fread($o, 32), 16, 16));

    return array('login' => $name, 'pass'=> $fsenha, 'cash'=> $this->getCash($name));
  }

  function getCash($name){
    $consulta = $this->_DB->db->prepare("SELECT cash FROM t_account WHERE name = :usuario;");
    $consulta->bindParam(':usuario', $name, PDO::PARAM_STR);
    $consulta->execute();

    if(!$consulta)
      return 0;
    else{
      $consulta = $consulta->fetch(PDO::FETCH_ASSOC);
      return $consulta['cash'];
    }
  }


  function SaveCashUpdate($newCash){
    $consulta = $this->_DB->db->prepare("UPDATE t_account SET cash = :cash  WHERE name = :usuario;");
    $consulta->bindParam(':cash', $newCash, PDO::PARAM_INT);
    $consulta->bindParam(':usuario', $this->account['login'], PDO::PARAM_STR);
    $consulta->execute();

    if(!$consulta)
      return false;
    else
      return true;
  }

  function hex2bin($data){return pack("H".strlen($data),$data);}
  function inverterhex($d){$t=strlen($d);if($t%2){$d="0".$d;}$d2="";for($i=0;$i<=$t;$i+=2){$d2.=substr($d,($t-$i),2);}return $d2;}
  function hex2num($data){return hexdec($this->inverterhex($data));}
  function num2hex($data){return $this->inverterhex(dechex($data));}
}

?>
