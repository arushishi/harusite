<?php
// 共通の設定を読み込む
require_once('../php/common.php');
require_once('../php/recsetDB.php');
require_once('../php/updateDB.php');

//SQLを作成し実行
$dbcon = new recsetDB();
$sql  = "SELECT * FROM `hpupdhist` A";
$sql .= " ORDER BY A.`Id` limit " . $_POST['index'] . ", 1;";

$rec = $dbcon->getrec($sql);
//結果行が取得できたらliタグに埋め込んで表示
if ($rec === false) {
	$DBData[0] = array('Id'=>'777','Explain'=>'waoooooooooo');
} else {
	for ($i = 0; $row = @mysql_fetch_assoc($rec); $i++){  
	  $DBData[$i] = $row;
	}
}
?>
<li><a href="#/<?=$DBData[0]['Id']?>"><?=$DBData[0]['Explain']?></a></li>
