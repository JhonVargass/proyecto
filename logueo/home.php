<?php session_start() ?>
<?php if(isset($_SESSION['nombre']))
{
?>
 <h1>Bienvenido de nuevo <?php echo $_SESSION['nombre'] ?>.</h1>
<?php 
}else{
 header("Location: admin.html");


}


