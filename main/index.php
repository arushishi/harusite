<?php
// 共通の設定を読み込む
require_once('../php/common.php');
require_once('../php/getDBData.php');

// Smartyオブジェクト取得
$smarty =& getSmartyObj();

// イニシャル情報
global $ini;

// contents取得
$t_contents = getContents();

$smarty->assign('t_contents', $t_contents);

//使用するテンプレートファイル名の指定
$smarty->display('mainIndex.tpl');

?>
