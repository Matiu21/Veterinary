<h1 class="page-header">
    <?php echo $alm->idtipo_identificacion != null ? $alm->tipo_identificacion : 'Nuevo Registro'; ?>
</h1>


<ol class="breadcrumb">
  <li><a href="?c6=Tipo_identificacion">Tipo de identificacion</a></li>
  <li class="active"><?php echo $alm->idtipo_identificacion != null ? $alm->tipo_identificacion : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-tipo_identificacion" action="?c6=Tipo_identificacion&a6=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idtipo_identificacion" value="<?php echo $alm->idtipo_identificacion; ?>" />
    
    <div class="form-group">
        <label>Tipo de identificacion</label>
        <input type="text" name="tipo_identificacion" value="<?php echo $alm->tipo_identificacion; ?>" class="form-control" placeholder="Ingrese su tipo de identificacion" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-tipo_identificacion").submit(function(){
            return $(this).validate();
        });
    })
</script>