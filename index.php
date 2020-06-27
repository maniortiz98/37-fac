

<?php
$alert = '';
session_start();
if(!empty( $_SESSION['active'])){
    header('location: sistema/');
}else{

if(!empty($_POST)){
    if(empty($_POST['usuario']) || empty($_POST['clave'])){
        $alert = 'ingrese usuario y clave';
    }else{
        require_once "conexion.php";
        $user = mysqli_real_escape_string($conection, $_POST['usuario']); //evatar caracteres extraños
        $pass = md5(mysqli_real_escape_string($conection, $_POST['clave']));

        $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$user' AND clave ='$pass'");
        mysqli_close($conection);
        $result = mysqli_num_rows($query);

        if($result > 0){
            $data = mysqli_fetch_array($query);
            
            $_SESSION['active'] = true;
            $_SESSION['iduser'] = $data['idusuario'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['email'] = $data['correo'];
            $_SESSION['user'] = $data['usuario'];
            $_SESSION['rol'] = $data['rol'];

            header('location: sistema/');

        }else{
            $alert = 'Usuario o clave son incorrecto.';
            session_destroy();
                }

    }

    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
    <title>SISTEMA</title>
  </head>
  <body>
    
<div class="container">
    <div class="tomas">
  <form action="" method="post">
  <div class="form-group">
      <h1>Inicio de sesion</h1>
    <label for=""  >Usuario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" name="usuario">
    
  </div>
  <div class="form-group">
    <label for="clave">Password</label>
    <input type="password" class="form-control" id="clave" placeholder="Password" name="clave">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <br>
  <p class="alert"><?php echo isset($alert)? $alert :''; ?></p>
  <button type="submit" class="btn btn-primary" value="INGRESAR">Ingresar</button>
</form>
</div>
</div>

		<!-- Start cssSlider.com -->
		<!-- Generated by cssSlider.com 2.1 -->
		<link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
		<!--[if IE]><link rel="stylesheet" href="cssslider_files/csss_engine1/ie.css"><![endif]-->
		<!--[if lte IE 9]><script type="text/javascript" src="cssslider_files/csss_engine1/ie.js"></script><![endif]-->
		 <div class="csslider1 autoplay ">
		<input name="cs_anchor1" id="cs_slide1_0" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_slide1_1" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_slide1_2" type="radio" class="cs_anchor slide">
		<input name="cs_anchor1" id="cs_play1" type="radio" class="cs_anchor" checked="">
		<input name="cs_anchor1" id="cs_pause1_0" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_1" type="radio" class="cs_anchor pause">
		<input name="cs_anchor1" id="cs_pause1_2" type="radio" class="cs_anchor pause">
		<ul>
			<li class="cs_skeleton"><img src="cssslider_files/csss_images1/mwp22_av1.jpg" style="width: 100%;"></li>
			<li class="num0 img slide"> <img src="cssslider_files/csss_images1/mwp22_av1.jpg" alt="MWP22_AV1" title="MWP22_AV1"></li>
			<li class="num1 img slide"> <img src="cssslider_files/csss_images1/mwp22_av3.jpg" alt="MWP22_AV3" title="MWP22_AV3"></li>
			<li class="num2 img slide"> <img src="cssslider_files/csss_images1/mwp22_av4_geo_mx.jpg" alt="MWP22_AV4_GEO_MX" title="MWP22_AV4_GEO_MX"></li>
		</ul><div class="cs_engine"><a href="http://cssslider.com">image slider</a> by cssSlider.com v2.1</div>
		<div class="cs_description">
			<label class="num0"><span class="cs_title"><span class="cs_wrapper">MWP22_AV1</span></span><br><span class="cs_descr"><span class="cs_wrapper">rrrr </span></span></label>
			<label class="num1"><span class="cs_title"><span class="cs_wrapper">MWP22_AV3</span></span></label>
			<label class="num2"><span class="cs_title"><span class="cs_wrapper">MWP22_AV4_GEO_MX</span></span></label>
		</div>
		<div class="cs_play_pause">
			<label class="cs_play" for="cs_play1"><span><i></i><b></b></span></label>
			<label class="cs_pause num0" for="cs_pause1_0"><span><i></i><b></b></span></label>
			<label class="cs_pause num1" for="cs_pause1_1"><span><i></i><b></b></span></label>
			<label class="cs_pause num2" for="cs_pause1_2"><span><i></i><b></b></span></label>
			</div>
		<div class="cs_arrowprev">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		<div class="cs_arrownext">
			<label class="num0" for="cs_slide1_0"><span><i></i><b></b></span></label>
			<label class="num1" for="cs_slide1_1"><span><i></i><b></b></span></label>
			<label class="num2" for="cs_slide1_2"><span><i></i><b></b></span></label>
		</div>
		<div class="cs_bullets">
			<label class="num0" for="cs_slide1_0"> <span class="cs_point"></span>
				<span class="cs_thumb"><img src="cssslider_files/csss_tooltips1/mwp22_av1.jpg" alt="MWP22_AV1" title="MWP22_AV1"></span></label>
			<label class="num1" for="cs_slide1_1"> <span class="cs_point"></span>
				<span class="cs_thumb"><img src="cssslider_files/csss_tooltips1/mwp22_av3.jpg" alt="MWP22_AV3" title="MWP22_AV3"></span></label>
			<label class="num2" for="cs_slide1_2"> <span class="cs_point"></span>
				<span class="cs_thumb"><img src="cssslider_files/csss_tooltips1/mwp22_av4_geo_mx.jpg" alt="MWP22_AV4_GEO_MX" title="MWP22_AV4_GEO_MX"></span></label>
		</div>
		</div>
		<!-- End cssSlider.com -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>