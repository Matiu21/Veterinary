<h1 class="page-header">
    <?php echo $alm->id_especialidades != null ? $alm->tipo_especialidades : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c1=Especialidades">Tipo de especialidades</a></li>
  <li class="active"><?php echo $alm->id_especialidades != null ? $alm->tipo_especialidades : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-especialidades" action="?c1=Especialidades&a1=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_especialidades" value="<?php echo $alm->id_especialidades; ?>" />
    
    <div class="form-group">
        <label>Tipo de especialidades</label>
        <input type="text" name="tipo_especialidades" value="<?php echo $alm->tipo_especialidades; ?>" class="form-control" placeholder="Ingrese su tipo de especialidad" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-especialidades").submit(function(){
            return $(this).validate();
        });
    })
</script>