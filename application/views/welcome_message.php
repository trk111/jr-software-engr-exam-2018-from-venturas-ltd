<!DOCTYPE html>
<html lang="en">
<head>
  <title>venturas-bd Exam Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>




    <nav class="navbar navbar-default">
  <div class="container-fluid">


    <ul class="nav navbar-nav">
      <li class="active"><a href="<?=base_url();?>">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?=base_url();?>add_developer">Developer</a></li>
          <li><a href="<?=base_url();?>add_pl">PL</a></li>
          <li><a href="<?=base_url();?>add_language">Language</a></li>

        </ul>
      </li>

    </ul>

  </div>
</nav>

<div class="container">
  <?php $this->load->view($body);?>
</div>




</body>
</html>
