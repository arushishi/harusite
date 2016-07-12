<?php


require_once('mySql.php');

/*
	更新用クラス
	内部にpgDBを２つ保有
	update(SQL文字列)を使用して更新
	オブジェクトnewからupdateEnd()までがトランザクション内部
	
	【使用例】
	// 履歴登録
	$upDB = new updateDB();

	$sql  ="insert into dl_history values(";
	$sql .="'".date("Y/m/d H:i:s")."'";
	$sql .=",".$kind_num;
	$sql .=",'".date("Y/m/d H:i:s", $sDate)."'";
	$sql .=",'".date("Y/m/d H:i:s", $eDate)."'";
	$sql .=",'".$ip."');";

	$upDB->update($sql);
	$upDB->updateEnd();
*/

class updateDB
{
	private $m_myDB = NULL;
	private $m_myDBSts = 0;
	
	public function __construct()
	{
		$this->m_myDB = new mySql();
		$this->begintrans();
	}

	public function __destruct()
	{
		$this->endtrans();
	}
	
	public function update($sql)
	{
		//$res = mysql_query($this->m_myDB->getDB(), $sql);
		$res = mysql_query($sql);
		
		// デバッグコード↓
		if (strlen($sql) < 100)
		{// 画像ファイルのとき大きくなりすぎるので
			$a_logstr = array("debug:", $sql);
			logout($a_logstr);
		}
		else
		{
			$a_logstr = array("debug:", substr($sql, 0, 100));
			logout($a_logstr);
		}
		// デバッグコード↑
		
		if (!$res)
		{
			$a_logstr = array("SQL実行失敗", $sql);
			logout($a_logstr);
			$this->m_myDBSts++;
			return true;
		}
	}
	
	public function updateEnd()
	{
		$this->endtrans();
	}
	
	public function getLastID()
	{
		$id = 0;
		$id = mysql_insert_id();
		return $id;
	}
	
	public function real_escape_string($escapeString)
	{
		return mysql_real_escape_string($escapeString, $this->m_myDB->getDB());
	}
	
	private function begintrans()
	{
		if ($this->m_myDB != NULL)
		{
			//mysql_query($this->m_myDB->getDB(), "START TRANSACTION;");
			mysql_query("START TRANSACTION;");
			//$this->debug_code($this->m_mastrDB->getDB());
		}
	}
	
	private function endtrans()
	{
		if ($this->m_myDB != NULL)
		{
			if ($this->m_myDB==NULL)
			{
				//mysql_query($this->m_myDB->getDB(), "COMMIT;");
				mysql_query("COMMIT;");
			}
			else
			{
				//mysql_query($this->m_myDB->getDB(), "ROLLBACK;");
				mysql_query("ROLLBACK;");
			}
		}
	}
	
	private function debug_code($con)
	{
	}
}
?>
