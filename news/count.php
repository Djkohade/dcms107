<?
$k_p = result(query("SELECT COUNT(*) FROM `news`", $db), 0);
$k_n = result(query("SELECT COUNT(*) FROM `news` WHERE `time` > '" . $ftime . "'",$db), 0);
if ($k_n == 0)$k_n = NULL; else $k_n = '+' . $k_n;
echo '(' . $k_p . ') <font color="red">' . $k_n . '</font>';
?>