<?php 
//v0.2 🤔
$path = $_SERVER['DOCUMENT_ROOT'].'/background';
$files=array();
if ($handle=opendir("$path")) {
while(false !== ($file = readdir($handle))) {
if ($file != "." && $file != "..") {
if(substr($file,-3)=='png' || substr($file,-3)=='jpg') $files[count($files)] = $file;//带后缀筛选的文件数组
}
$random=rand(0,count($files)-1);
}
closedir($handle);
$url="https://photo2023.vercel.app/background/$files[$random]";
header("Location: $url");
}
?>
