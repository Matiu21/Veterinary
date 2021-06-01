<h1 class="page-header">
    <?php echo $alm->id_personas != null ? $alm->identificacion_per : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c4=Personas">Personas</a></li>
  <li class="active"><?php echo $alm->id_personas != null ? $alm->identificacion_per : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-personas" action="?c4=Personas&a4=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_personas" value="<?php echo $alm->id_personas; ?>" />
    
    <div class="form-group">
        <label>Identificacion</label>
        <input type="number" name="identificacion_per" value="<?php echo $alm->identificacion_per; ?>" class="form-control" placeholder="Ingrese su identificacion" data-validacion-tipo="requerido|min:8" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre_per" value="<?php echo $alm->nombre_per; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellido_per" value="<?php echo $alm->apellido_per; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion_per" value="<?php echo $alm->direccion_per; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono_per" value="<?php echo $alm->telefono_per; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="email" value="<?php echo $alm->email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    
    <div class="form-group">
        <label>Tipo</label>
        <select name="Tipo" class="form-control">
            <option <?php echo $alm->Tipo == 1 ? 'selected' : ''; ?> value="1">Cliente</option>
            <option <?php echo $alm->Tipo == 2 ? 'selected' : ''; ?> value="2">Veterinario</option>
        </select>
    </div>

    <div class="form-group">
    <label for="description">Especialidades (en dado caso de ser veterinario)</label>
<?php
$especialidades = get_especialidades();
?>
<?php if(count($especialidades)>0):?>

        <?php foreach($especialidades as $alm):?>

  <div class="form-check">
      <input class="form-check-input" type="checkbox" name="especialidades_<?php echo $alm->id_especialidades; ?>" value="id_especialidades">
      <label class="form-check-label" for="flexCheckDefault"> <?php echo $alm->tipo_especialidades; ?>
    </label>
  </div>
<?php endforeach; ?>
<?php endif; ?>
    </div>


    <div class="form-group">
    <label for="description">Mascota</label>
<?php
$mascota = get_mascota();
?>
<?php if(count($mascota)>0):?>

        <?php foreach($mascota as $alm):?>

  <div class="form-check">
      <input class="form-check-input" type="checkbox" name="mascota_<?php echo $alm->id_mascota; ?>">
      <label class="form-check-label" for="flexCheckDefault"> <?php echo $alm->nombra_mascota; ?>
    </label>
  </div>
<?php endforeach; ?>
<?php endif; ?>
    </div>


    <div class="form-group">
    <label for="description">Tipo de identificación</label>
<?php
$tipoid = get_tipoid();
?>
<?php if(count($tipoid)>0):?>

        <?php foreach($tipoid as $alm):?>

  <div class="form-check">
      <input class="form-check-input" type="radio" name="tipo_identificacion_<?php echo $alm->idtipo_identificacion; ?>">
      <label class="form-check-label" for="flexRadioDefault1"> <?php echo $alm->tipo_identificacion; ?>
    </label>
  </div>
<?php endforeach; ?>
<?php endif; ?>
    </div>


    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-personas").submit(function(){
            return $(this).validate();
        });
    })
</script>


<?php function get_especialidades(){
    $con = connect();
    $sql = "select * from especialidades";
    $query  =$con->query($sql);
    $data =  array();
    if($query){
        while($r = $query->fetch_object()){
            $data[] = $r;
        }
    }
    return $data;
}

 function get_mascota(){
    $con = connect();
    $sql = "select * from mascota";
    $query  =$con->query($sql);
    $data =  array();
    if($query){
        while($r = $query->fetch_object()){
            $data[] = $r;
        }
    }
    return $data;
}

 function get_tipoid(){
    $con = connect();
    $sql = "select * from tipo_identificacion";
    $query  =$con->query($sql);
    $data =  array();
    if($query){
        while($r = $query->fetch_object()){
            $data[] = $r;
        }
    }
    return $data;
}


function connect(){
    return new mysqli("localhost","root","","veterinaria");
} ?>