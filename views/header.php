<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $headerTitle; ?></title>

    <link rel="stylesheet" href="<?= $root; ?>includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $root; ?>includes/styles/style.css">

    <script src="<?= $root; ?>includes/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $root; ?>includes/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?= $root; ?>includes/js/custom.js"></script>

</head>
<body>
    <header>
      <div id="topBar"><?= $textTopBar; ?></div>
      <div class="px-3 py-2 text-bg-dark border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="tables" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-blue text-decoration-none">
                  <?= $headerTitle; ?>
              </a>
          </div>
          <div id="account">
              <?php if($userAuth === true){ ?>
                <?=$textLogout; ?>
              <?php }else{ ?>
                <?=$textLogin; ?>
              <?php } ?>
          </div>
        </div>
      </div>  
  </header>