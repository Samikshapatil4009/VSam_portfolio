<?php
require_once __DIR__ . '/../config/config.php';require_admin();
if($_SERVER['REQUEST_METHOD']==='POST'){$id=(int)($_POST['id']??0);$status=$_POST['status']??'New';if(in_array($status,['New','Contacted','Closed'],true)){$st=db()->prepare('UPDATE enquiries SET status=? WHERE id=?');$st->execute([$status,$id]);}}
header('Location: dashboard.php');exit;
