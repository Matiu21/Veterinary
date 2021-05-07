<h1 class="page-header">
    <?php echo $alm->id_mascota != null ? $alm->nombra_mascota : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c3=Mascota">Mascotas</a></li>
  <li class="active"><?php echo $alm->id_mascota != null ? $alm->nombra_mascota : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-mascota" action="?c3=Mascota&a3=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_mascota" value="<?php echo $alm->id_mascota; ?>" />
    
    <div class="form-group">
        <label>Nombre de la mascota</label>
        <input type="text" name="nombra_mascota" value="<?php echo $alm->nombra_mascota; ?>" class="form-control" placeholder="Ingrese el nombre de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Peso de la mascota</label>
        <input type="text" name="peso_mascota" value="<?php echo $alm->peso_mascota; ?>" class="form-control" placeholder="Ingrese el peso de la mascota" data-validacion-tipo="requerido|min:4" />
    </div>
    
    <div class="form-group">
        <label>Tamaño de la mascota</label>
        <input type="text" name="tamaño_mascota" value="<?php echo $alm->tamaño_mascota; ?>" class="form-control" placeholder="Ingrese el tamaño de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Raza de la mascota</label>
        <input type="text" name="raza_mascota" value="<?php echo $alm->raza_mascota; ?>" class="form-control" placeholder="Ingrese la raza de la mascota" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Fecha de nacimiento de la mascota</label>
        <input readonly type="text" name="fecha_nacimiento_mascota" value="<?php echo $alm->fecha_nacimiento_mascota; ?>" class="form-control datepicker" placeholder="Ingrese la fecha de nacimiento de la mascota" data-validacion-tipo="requerido" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-mascota").submit(function(){
            return $(this).validate();
        });
    })
</script>