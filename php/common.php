<?php
ini_set('display_errors', 1);

// 共通で使用する変数・定数定義をconfig.iniから読み込み
$temp=parse_ini_file('config.ini', true);
$env=parse_ini_file('../env.ini');
$ini=$temp[$env['application_env']];

// 各ファイルでは　
// global $ini;
// $ini['master_ip']
// という形でアクセスする

// Smartyインストールディレクトリを定数定義
define('SMARTY_DIR', $ini['smarty_dir']);

//Smartyクラスを参照
require_once(SMARTY_DIR .'Smarty.class.php');

// Smartyオブジェクト取得
function & getSmartyObj()
{
	//Smartyクラスの生成
	static $smarty = null;
	global $ini;													// イニシャルファイル
	if( is_null( $smarty ) )
	{
		//Smartyクラスの生成
		$smarty = new Smarty();
		
		//$smarty->debugging = true;	// ★デバッグのときだけ
		
		//作業用ディレクトリの指定
		$smarty->template_dir = $ini['smarty_work_dir'].'templates/';
		$smarty->compile_dir  = $ini['smarty_work_dir'].'templates_c/';
		$smarty->config_dir   = $ini['smarty_work_dir'].'configs/';
		$smarty->cache_dir    = $ini['smarty_work_dir'].'cache/';
	}

	return $smarty;
}

// ログ出力関数
function logout($a_logstr)
{
	$fp = fopen("logdata.log", "a");
	if ($fp == NULL)
	{
		return true;
	}
	
	fwrite($fp, date("Y/m/d H:i:s")."=>");
	foreach($a_logstr as $val)
	{
		fwrite($fp, $val);
	}
	fwrite($fp, "\r\n");
	fclose($fp);
}

?>

