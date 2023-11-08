<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $headerTitle; ?></title>

    <link rel="stylesheet" href="<?php echo $root; ?>/includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $root; ?>/includes/styles/style.css">

    <script src="<?php echo $root; ?>/includes/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $root; ?>/includes/jquery/jquery-3.7.1.min.js"></script>

</head>
<body>
    <header>
    <div class="px-3 py-2 text-bg-dark border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="dashboard" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-blue text-decoration-none">
                <?php echo $headerTitle; ?>
            </a>
        </div>
      </div>
    </div>
    
  </header>