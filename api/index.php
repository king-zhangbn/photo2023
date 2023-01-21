<?php 
//v0.1 未测试，不能用再改 —— ll0u0ll
$host=$_SERVER['HTTP_HOST'];
$referer=$_SERVER['HTTP_REFERER'];
$referer = parse_url($referer);
$referer = strtolower($referer['host']) ;
//白名单
$white_list = array($host,'');//这两个可以留着，可以继续往后面加域名，暂不支持通配符
//白名单判断
if (in_array($referer,$white_list)) {
main();
}else {
	echo '未授权的请求！';
	exit;
}
function main(){
$path = $_SERVER['DOCUMENT_ROOT'].'/background';
echo $path;//让我康康路径对不对
$files=array();
if ($handle=opendir("$path")) {
while(false !== ($file = readdir($handle))) {
if ($file != "." && $file != "..") {
if(substr($file,-3)=='png' || substr($file,-3)=='jpg') $files[count($files)] = $file;//带后缀筛选的文件数组
}
}
}
closedir($handle);
$random=rand(0,count($files)-1);
$url="https://vercelpic.en.icu/background/$files[$random]";
header("Location: $url".$request_uri);//302
}
?>
