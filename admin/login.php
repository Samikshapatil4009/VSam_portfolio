<?php
require_once __DIR__ . '/../config/config.php';
if (is_admin()) { header('Location: dashboard.php'); exit; }
$error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $username=trim($_POST['username']??''); $password=$_POST['password']??'';
 $stmt=db()->prepare('SELECT id,username,password_hash FROM admins WHERE username=?');$stmt->execute([$username]);$admin=$stmt->fetch();
 if($admin && password_verify($password,$admin['password_hash'])){session_regenerate_id(true);$_SESSION['admin_id']=$admin['id'];$_SESSION['admin_name']=$admin['username'];header('Location: dashboard.php');exit;}
 $error='Invalid username or password.';
}
$pageTitle='Admin Login | PixelNest'; require __DIR__.'/../includes/header.php';
?>
<section class="section-pad"><div class="container" style="max-width:480px;padding-top:60px"><div class="section-kicker">PRIVATE AREA</div><h1 class="section-title">Admin sign in</h1><?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post" class="contact-form"><label>Username</label><input class="form-control mb-3" name="username" required><label>Password</label><input class="form-control mb-3" type="password" name="password" required><button class="btn btn-primary w-100">Sign in</button></form></div></section>
<?php require __DIR__.'/../includes/footer.php'; ?>
