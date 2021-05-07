<h1 class="page-header">
    <?php echo $alm->idusuarios != null ? $alm->nombre_usuario : 'Nuevo Registro'; ?>
</h1>
<ol class="breadcrumb">
  <li><a href="?c7=Usuarios">Usuarios</a></li>
  <li class="active"><?php echo $alm->idusuarios != null ? $alm->nombre_usuario : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c7=Usuarios&a7=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idusuarios" value="<?php echo $alm->idusuarios; ?>" />
    
    <div class="form-group">
        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" value="<?php echo $alm->nombre_usuario; ?>" class="form-control" placeholder="Ingrese su nombre de usuario" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Contraseña</label>
        <input type="text" name="password" value="<?php echo $alm->password; ?>" class="form-control" placeholder="Ingrese su contraseña" data-validacion-tipo="requerido|min:8" />
    </div>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-usuario").submit(function(){
            return $(this).validate();
        });
    })
</script>