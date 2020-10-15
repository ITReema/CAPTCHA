<!DOCTYPE html>
<html>
<head>
  <title>Text_Based CAPTCHA</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <div class="container">
    <!-- CAPTCHA error -->
    <?php include('assets/alert_captcha.php');
    if(!empty($captchaError)) {?>
      <div class="form-group text-center">
        <div class="alert text-center <?php echo $captchaError['status']; ?>">
          <?php echo $captchaError['alert']; ?>
        </div>
      </div>
    <?php }?>
    <!-- Form CAPTCHA -->
    <form action="" method="post">
      <div class="form-group center">
        <img src="assets/generate_captcha.php">
      </div>
      <div class="form-group">
        <label for="captcha">Type the charecters above:</label>
        <input type="text" class="form-control captcha" name="captcha" id="captcha">
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-dark btn-block">
    </form>
  </div>
</body>
</html>
