<?php
    require_once("includes/dbcon.inc.php");
    require_once("includes/header.php");

?>

<body class=" d-flex justify-content-center center" style="margin-top: 30vh; background-image: url(images/splash.png);color: orange;">

<form class="col-lg-4 col-md-4" action="includes/validate.php" method="POST" style="margin: 30px;">
    <h2>Login</h2>
    <div class="mb-6 ">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <?php echo $emptyusername  ?? null; ?>
      <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <?php echo $emptypassword ?? null; ?>
      <?php echo $error ?? null; ?>
      <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="index.html">Home</a>
  </form>
</body>
</html>



