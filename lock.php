<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$url = $protocol . "://" . $host . $_SERVER['SCRIPT_NAME'];
$type = $_REQUEST['type'];
$count = 0;
if($type == 'lock'){
    $folder_list = getAllFolders($path, 8);
    foreach($folder_list as $k=>$v){
        $flag = chmodFolder($v, 0555);
        if($flag){$count++;}
    }
   echo 'all is '.count($folder_list).';'.$count.'is lock success';
}else if($type == 'unlock'){
    $folder_list = getAllFolders($path, 8);
    foreach($folder_list as $k=>$v){
        $flag = chmodFolder($v, 0755);
	$file_url = $v.'/.htaccess';
	chmodFolder($file_url, 0755);
        if($flag){$count++;}
    }
    echo 'all is '.count($folder_list).';'.$count.'is unlock success';
}
function getAllFolders($path = '.', $maxDepth = 8, $currentDepth = 1) {
    $directories = [];
    if ($currentDepth > $maxDepth) {
        return $directories;
    }
    $items = scandir($path);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        $fullPath = $path . DIRECTORY_SEPARATOR . $item;
        if (is_dir($fullPath)) {
            $directories[] = $fullPath;
            $subDirs = getAllFolders($fullPath, $maxDepth, $currentDepth + 1);
            $directories = array_merge($directories, $subDirs);
        }
    }
    return $directories;
}

function chmodFolder($dir, $dirMode){
    $flag = false;
    if (chmod($dir, $dirMode)) {
        $flag = true;
    } else {
         $flag = false;
    }
    return $flag;
}
?>
<html>
<head>
    <title>test</title>
<head>
<body>
   <a href="<?php echo $url;?>?type=lock&time=<?php echo time();?>">全部锁文件夹</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="<?php echo $url;?>?type=unlock&time=<?php echo time();?>">全部解锁</a>
</body>
</html>