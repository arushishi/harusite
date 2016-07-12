<?php
// 共通の設定を読み込む
require_once('../php/common.php');
require_once('../php/getDBData.php');

// Smartyオブジェクト取得
$smarty =& getSmartyObj();

// イニシャル情報
global $ini;

// 待遇・福利厚生部分
$default_message = array(
	array('word1' => "給与", 'word2' => "年俸制<br />※経験、能力、前職給を十分考慮の上、個別に決定いたします。"),
	array('word1' => "諸手当", 'word2' => "通勤費支給（上限あり）、他"),
	array('word1' => "待遇・福利厚生", 'word2' => "雇用保険、労災保険、健康保険、厚生年金保険"),
	array('word1' => "休日・休暇", 'word2' => "完全週休2日制(土曜、日曜)、祝祭日、夏期休暇、年末年始、慶弔、有給、年間休日125日"),
	array('word1' => "勤務時間", 'word2' => "9：00～18：00（休憩1時間）※プロジェクトにより異なります")
);
$m_welfare = getContentsWords('welfare', $default_message);

// トップタイトル下の臨時メッセージ
$default_message2 = array();
$m_temporary = getContentsWords('temporary', $default_message2);

// 会社からの一言タイトル（太字）
$default_message3 = array(
	array('word1' => "メガロジックはSIサービスを提供する会社として、2015年4月に生まれました。"),
);
$m_top_message_title = getContentsWords('top_message_title', $default_message3);

// 会社からの一言本文
$default_message4 = array(
	array('word1' => "本格的な活動を起こすべく、創業期なる今、一緒に走っていく仲間を募集しております。"),
	array('word1' => "コンセプトは「接客」"),
	array('word1' => "サービス業として接客を心がけ、地域に貢献すべく、技術はもちろん、エンドユーザー・お客様・チームの仲間に対してのニーズに人間力で応えます！"),
);
$m_top_message_body = getContentsWords('top_message_body', $default_message4);



$smarty->assign('m_welfare', $m_welfare);
$smarty->assign('m_temporary', $m_temporary);
$smarty->assign('m_top_message_title', $m_top_message_title);
$smarty->assign('m_top_message_body', $m_top_message_body);

//使用するテンプレートファイル名の指定
$smarty->display('mainIndex.tpl');

?>
