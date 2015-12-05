	<!DOCTYPE html>
<html>

    <head>
      <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="">

      <title>Univento</title>

      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
			<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
			<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="js/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
      <link href="css/reset.css" rel="stylesheet">
      <link href= "css/main.css" rel="stylesheet" >
      <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

      </head>
      <body>
      <?
      session_start ();
      if (isset($_SESSION['errors'])){
        echo $_SESSION['errors'];
        ?>

        <!-- @TODO: Put error text from $_SESSION['errors'] on the alert above and add other types of alerts from this plugin -->

        <?
        unset($_SESSION['errors']);
        }
        ?>

        <section class="billboard-header">
          <header id="header_geral">
            <div class="wrapper">
              <a href="#"><img src="img/logo.png" class="h_logo" alt="" title=""></a>
              <nav>
                <ul class="main_nav">
                  <li class="current"><a href="./"> Home </a></li>
                  <li><a href="#services">About us</a></li>
                   <!--@TODO: Check when user is not on homepage to substitute link for a button -->
                  <li><a href="#join">Join us</a></li>
                  <li><a href="./?pagina=createEvent">Criar Evento</a></li>
                  <li>

                  </li>
                </ul>
              </nav>
            </div>
          </header>
				</section>
