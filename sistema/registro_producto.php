

<?php 
session_start();

if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 2 )
{
  header("location: ../");
}

include "../conexion.php";
if(!empty($_POST)){
    $alert='';
    if (empty ($_POST['proveedor']) || empty ($_POST['contacto']) || empty ($_POST['direccion']) ||  empty ($_POST['telefono']))  {

        $alert='<p class="msg_error"> Todos los campos son obligatorios.</p>';
        # code...
    }else {
        
        $proveedor          =$_POST['proveedor'];
        $contacto      =$_POST['contacto'];
        $telefono     =$_POST['telefono'];
        $direccion    =$_POST['direccion'];
        //$clave      =  md5($_POST['clave']);
        $usuario_id  =$_SESSION['iduser'];

        
            $query_insert = mysqli_query($conection, "INSERT INTO proveedor(proveedor, contacto, telefono, direccion, usuario_id)

            VALUES('$proveedor','$contacto', '$telefono', '$direccion', '$usuario_id')");

            if ($query_insert ) {
                $alert='<p class="msg_save">Proveedor guardado Correctamente.</p>';
                   # code...
               }else{
                $alert='<p class="msg_error">Error al guardar proveedor.</p>';
               }
        
    }
}
?>
<!doctype html>
<html lang="en">
    <link rel="stylesheet" href="css/style1.css">
    
    
   
    
  <head>
    <?php include "includes/scripts.php" ?>
    
    <title>Registro Producto</title>
  </head>
  <body>

  <?php include "includes/header.php" ?>

<section id="container">

<div class="container">
<div class="form_refister">
     
    <h1>Registro Producto</h1>
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
    <form action="" method="post" enctype="multipart/form-data">
  
    <div class="form-group row">
    <label for="proveedor" class="col-sm-2 col-form-label">Proveedor </label>

    <?php
    
    $query_proveedor = mysqli_query($conection, "SELECT codproveedor, proveedor FROM proveedor WHERE estatus = 1 ORDER BY proveedor ASC");
    
    $result_proveedor = mysqli_num_rows($query_proveedor);
    mysqli_close($conection);
    
    
    ?>
    <div class="col-sm-10">
        <select name="proveedor" id="proveedor" class="col-sm-2 col-form-label" >
        <?php
        
        if ($result_proveedor > 0){
          while($proveedor = mysqli_fetch_array($query_proveedor)){
            ?>
              <option value="<?php echo $proveedor['codproveedor'] ; ?>"><?php echo $proveedor['proveedor'] ; ?></option>
             <?php
          }
        }
        
        ?>
            
        </select>
      
    </div>
  </div>
  <div class="form-group row">
    <label for="cproducto" class="col-sm-2 col-form-label">Producto</label>
    <div class="col-sm-10">
      <input type="text" name="producto" class="form-control" id="producto" placeholder="Nombre del producto ">
    </div>
  </div>
  <div class="form-group row">
    <label for="precio" class="col-sm-2 col-form-label">Precio </label>
    <div class="col-sm-10">
      <input type="number" name="precio" class="form-control" id="precio" placeholder="Precio del puducto">
    </div>
  </div>
  <div class="form-group row">
    <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
    <div class="col-sm-10">
      <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad del producto ">
    </div>
  </div>

  <div class="photo">
	<label for="foto">Foto</label>
        <div class="prevPhoto">
        <span class="delPhoto notBlock">X</span>
        <label for="foto"></label>
        </div>
        <div class="upimg">
        <input type="file" name="foto" id="foto">
        </div>
        <div id="form_alert"></div>
</div>
<br><br>

  <div>
    <div class="form-group row container ">
      <input type="submit" value="Guardar producto" name="clave" class="form-control  bg-primary text-white" id="guardar" placeholder=" ">
    </div>
    </div>
  </div>
</form>

</div>
</div>

</section>

 
  <?php include "includes/footer.php" ?>
  
   </body>
</html>