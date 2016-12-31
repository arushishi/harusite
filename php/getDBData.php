<?php
// 共通の設定を読み込む
require_once('../php/common.php');
require_once('../php/recsetDB.php');
require_once('../php/updateDB.php');


function & getContents($start=0, $end=0)
{
	$dbcon = new recsetDB();
	$sql  = "SELECT * FROM `t_contents` c";
	$sql .= " WHERE 1=1";
	$sql .= " ORDER BY c.`date`,c.`kind`,c.`auth`,c.`id`;";

	$rec = $dbcon->getrec($sql);

	$DBData;
	
	for ($i = 0; $row = mysql_fetch_assoc($rec); $i++){  
	  $DBData[$i] = $row;
	}

	return $DBData;
}

?>
