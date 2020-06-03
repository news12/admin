<?php
/**
 *
 */
class DataBase
{
  public $db;
  private $_Config = array(
    "Host" => 'localhost',
    "dBase" => 'wyd_eternal',
    "User" => 'root',
    "Pass" => '123456'
  );
  public $isConnect = false;

  function __construct()
  {
    $this->connect();
  }

  private function connect()
  {
    try {
      $this->db = new PDO('mysql:host='.$this->_Config['Host'].';dbname='.$this->_Config['dBase'], $this->_Config['User'], $this->_Config['Pass']);
      $this->isConnect = true;
      return true;
    } catch (PDOException $e) {
        if(@$_GET['show-error'])
          print "Error!: " . $e->getMessage() . "<br/>";
        $this->isConnect = false;
        return false;
    }
  }
}

?>
