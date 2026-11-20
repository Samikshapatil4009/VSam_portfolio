
<?php
$pageTitle = $pageTitle ?? 'VSam Digital Solution | Websites That Grow Your Business';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional, responsive websites for businesses, startups and creators. Web design, PHP development and e-commerce solutions.">
    <meta name="theme-color" content="#0b1020">

   <title><?= e($pageTitle ?? 'VSam Digital Solution') ?></title>

<link rel="icon"
      type="image/png"
      href="/freelance-portfolio/assets/image/VS_logo_5.png?v=4">

    <!-- WEBSITE LOGO IN BROWSER TAB -->
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet"
          href="/pixelnest-php-backend/assets/css/style.css?v=2">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top site-nav">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
    <img src="/freelance-portfolio/assets/image/VS_logo.png"
         alt="VSam Digital Solution"
         class="brand-logo">
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#work">Work</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                <li class="nav-item"><a class="btn btn-primary btn-sm px-3" href="index.php#contact">Let's Talk <span aria-hidden="true">↗</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
