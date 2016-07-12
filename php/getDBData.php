<?php
// 共通の設定を読み込む
require_once('../php/common.php');
require_once('../php/recsetDB.php');
require_once('../php/updateDB.php');


function & getContentsWords($contents, $default, $start=0, $end=0)
{
	$dbcon = new recsetDB();
	$sql  = "SELECT A.word1,A.word2,A.word3,A.word4 FROM `contents_words` A";
	$sql .= " WHERE A.`kind` = (SELECT B.`kind` FROM contents_names B WHERE B.`name` = '".$contents."')";
	$sql .= " ORDER BY A.`sort`;";

	$rec = $dbcon->getrec($sql);

	$DBData;
	
	if ($rec === false) {
		$DBData = $default;
	} else {
		for ($i = 0; $row = @mysql_fetch_assoc($rec); $i++){  
		  $DBData[$i] = $row;
		}
	}
	return $DBData;
}

?>
