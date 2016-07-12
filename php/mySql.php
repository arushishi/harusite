<?php
// 共通の設定を読み込む

require_once('common.php');

/*
	DB接続クラス
	PHPから直接呼ぶことはないはず
	　コンストラクタで繋いでデストラクタで切断
	　getDB()でコネクションオブジェクトを返す
*/

class mySql
{
	private $m_dbcon = NULL;
	private $m_host = NULL;

	public function __construct()
	{
		$this->m_dbcon = $this->connect();
	}

	public function __destruct()
	{
		if ($this->m_dbcon != null)
		{
			mysql_close($this->m_dbcon);
			$this->m_dbcon = null;
		}
	}

	public function & getDB()
	{
		return $this->m_dbcon;
	}

	protected function connect()
	{
		global $ini;													// イニシャルファイル
		
		$conStr  = " dbname=".$ini['hstname'];
		$conStr .= " user=".$ini['dbuser'];
		$conStr .= " password=".$ini['dbpass'];
		
		
		@$con = mysql_connect($ini['hstname'], $ini['dbuser'], $ini['dbpass']);
		if (!$con)
		{
			$a_logstr = array("データベース接続失敗", $conStr);
			logout($a_logstr);
			return NULL;
		    // die('接続できませんでした: ' . mysql_error());
		}
		
		mysql_query("use " .$ini['dbname'] .";") or die('Query failed: ' . mysql_error());
		mysql_set_charset('utf8' ,$con); 
		return $con;
	}
}
?>
