  <!DOCTYPE html>
  <html>

  <head>
    <link rel="shortcut icon" href="./img/logogoat-fi.ico" type="image/x-icon">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="">

    <title>Go@</title>

    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
    <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '1064403640259012',
        xfbml      : true,
        version    : 'v2.5'
      });
    };

    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
    </script>

    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link href="css/reset.css" rel="stylesheet">
    <link href= "css/main.css" rel="stylesheet" >
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php
    error_reporting(0);
    ?>
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
          <a href="./"><img src="img/logo_goat.png" class="h_logo" alt="" title=""></a>
          <nav>


            <?php 

            if(isset($_SESSION['username'])){ ?>
            <ul class="main_nav">
              <li><a href="./?pagina=createEvent"><i class="fa fa-plus"></i> Add Event</a></li>
              <li><a href="./?pagina=searchEvents">Search</a></li>
                <li><a href="./?pagina=userPage"><p><?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?></p></a></li>
                <li><a href="./php/action_logout.php"><span class="icon"><i class="fa fa-sign-out"></i></span></a></li>
              </ul>
              <?php }else{?>
              <ul class="main_nav">
                <!--@TODO: Check when user is not on homepage to substitute link for a button -->
                <li><a href="./?pagina=searchEvents">Search</a></li>
                <li>
                <a href="#modal" id="modal_trigger" ><i class="fa fa-sign-in"></i></a>
                </li>
              </ul>
              <?php }?>

            </nav>
          </div>
        </header>
      </section>
