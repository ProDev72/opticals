<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Opticals</title>
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/jquery-ui.css">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../dist/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../dist/js/jquery-ui.js"></script>
    <link type="text/javascript" href="../dist/css/dataTables.bootstrap.min.css"/>

    <link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
  <script type="text/javascript">
    $(document).ready(function() {
    setInterval(timestamp, 1000);
    });

    function timestamp() {
        $.ajax({
            url: 'clock.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }
  </script>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="welcome.php">Super Opticals</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div id="timestamp"></div>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="../app/login/logout.php">Sign Out</a></li>  
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	