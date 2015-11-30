
<?php

include 'template/header.php';

if (isset ( $_GET ['pagina'] )) 
{
	 $url = 'template/' . $_GET['pagina'] . '.php';
	 include  $url;
} 
else 
{
 	include 'template/home.php';
}

include 'template/footer.php';
?>


