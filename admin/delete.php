<?php
require_once __DIR__ . '/../config/config.php';require_admin();
$type=$_GET['type']??'';$id=(int)($_GET['id']??0);$tables=['project'=>'projects','service'=>'services'];
if(isset($tables[$type])&&$id){$st=db()->prepare('DELETE FROM '.$tables[$type].' WHERE id=?');$st->execute([$id]);}
header('Location: dashboard.php?saved=1');exit;
