<h1 class="page-header">
    <?php echo $alm->idReceta != null ? $alm->tipo_medicina : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c5=Receta">Recetas</a></li>
  <li class="active"><?php echo $alm->idReceta != null ? $alm->tipo_medicina : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-receta" action="?c5=Receta&a5=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idReceta" value="<?php echo $alm->idReceta; ?>" />
    
    <div class="form-group">
        <label>Tipo de medicina</label>
        <input type="text" name="tipo_medicina" value="<?php echo $alm->tipo_medicina; ?>" class="form-control" placeholder="Ingrese su tipo de medicina" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-receta").submit(function(){
            return $(this).validate();
        });
    })
</script>