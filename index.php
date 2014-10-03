<?php
error_reporting(-1);
ini_set("display_errors", 1);

$title = "xkcd Password Generator";
$password = "Sample Password";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Javascript-->
  <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.0.js"></script>

  <!--CSS-->
  <link type="text/css" rel="stylesheet" href="css/app.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

  <title><?= $title; ?></title>
  <?php require_once "xkcdPasswordGen.php"; ?>
  <?php
  $password_length = 0;
  if (isset($_POST['qtyOfWords'])) {
    $password_length = $_POST['qtyOfWords'];
  }
  $password_isIncludingNumber = false;
  if (isset($_POST['isIncludingNumber'])) {
    $password_isIncludingNumber = true;
  }
  $password_isIncludingSymbol = false;
  if (isset($_POST['isIncludingSymbol'])) {
    $password_isIncludingSymbol = true;
  }

  if (isset($_POST['qtyOfWords'])) {
    $passwordGen = new XkcdPasswordGen();
    $password = $passwordGen->xkcd_pw_gen($password_length, $password_isIncludingNumber, $password_isIncludingSymbol);
  }
  ?>
</head>
<body>
<div class="container">
  <div class="header">
    <ul class="nav nav-pills pull-right">
      <li><a href="http://p1.lisaliu.me/">p1</a></li>
      <li class="active" href="http://p2.lisaliu.me"><a href="#">p2</a></li>
      <li><a href="http://p3.lisaliu.me">p3</a></li>
      <li><a href="http://p4.lisaliu.me">p4</a></li>
    </ul>
    <h3 class="text-muted"><?= $title ?></h3>
  </div>

  <div class="jumbotron">
    <div class="container-fluid">
      <div class="row">
        <h1><span class="label label-primary"><?= $password ?></span></h1>
        <br/>
      </div>
      <div class="row">
        <form class="form-horizontal" role="form" action="index.php" method="post">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label"># of Words (Max 9)</label>

            <div class="col-sm-4">
              <input type="text" class="form-control" name="qtyOfWords" value="<?php
              if (isset($_POST['qtyOfWords'])) {
                echo htmlentities($_POST['qtyOfWords']);
              }
              ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="isIncludingNumber" <?php
                  if (isset($_POST['isIncludingNumber'])) {
                    echo "checked";
                  }
                  ?>> Add a number
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="isIncludingSymbol" <?php
                  if (isset($_POST['isIncludingSymbol'])) {
                    echo "checked";
                  }
                  ?>> Add a symbol
                </label>
              </div>
            </div>
          </div>
          <br>

          <div class="form-group">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-default">Generate</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; Lisabeth Liu 2014</p>
  </div>

</div>
</body>
</html>

