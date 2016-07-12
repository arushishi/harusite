<?php
require_once('mySql.php');

class recsetDB extends mySql
{
	private $m_recset = NULL;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function __destruct()
	{
		// 結果セットを開放する
		if ($this->m_recset != NULL)
		{
			mysql_free_result($this->m_recset);
			$this->m_recset = NULL;
		}
	}

	public function chkDB()
	{
		if (parent::getDB() == NULL) {
			return false;
		}
		return true;
	}
	
	// ★★まだ
	public function & getrec($sql)
	{
		@$this->m_recset = mysql_query($sql);
		// デバッグコード↓
		$a_logstr = array("debug:", $sql);
		logout($a_logstr);
		// デバッグコード↑
		
		//@$rec = mysql_fetch_array($this->m_recset, MYSQL_ASSOC);
		
		@$rec = $this->m_recset;
		if ($this->getcnt() == 0) {
			$rec = false;
		}

		return $rec;
	}
	
	public function getcnt()
	{
		return @mysql_num_rows($this->m_recset);
	}
	
	public function disp($sql)
	{
		$this->m_recset = mysql_query($sql) or die('Query failed: ' . mysql_error());
		
		// 結果を HTML で表示する
		echo "<table>\n";
		while ($line = mysql_fetch_array($this->m_recset, MYSQL_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($line as $col_value) {
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";
		}
		echo "</table>\n";
	}
}
?>
