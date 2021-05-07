<h1 class="page-header">
    <?php echo $alm->idhistorial != null ? $alm->fecha : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c2=Historial">Historial</a></li>
  <li class="active"><?php echo $alm->idhistorial != null ? $alm->fecha : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-historial" action="?c2=Historial&a2=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idhistorial" value="<?php echo $alm->idhistorial; ?>" />
    
    <div class="form-group">
        <label>Fecha de visita</label>
        <input readonly type="text" name="fecha" value="<?php echo $alm->fecha; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de visita" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Tipo de visita</label>
        <input type="text" name="tipo_visita" value="<?php echo $alm->tipo_visita; ?>" class="form-control" placeholder="Ingrese el tipo de visita para su mascota" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Pago</label>
        <input type="text" name="pago" value="<?php echo $alm->pago; ?>" class="form-control" placeholder="Ingrese el pago ingresado" data-validacion-tipo="requerido|min:5" />
    </div>
    
    <div class="form-group">
        <label>Causa de la Visita</label>
        <input type="text" name="causa_visita" value="<?php echo $alm->causa_visita; ?>" class="form-control" placeholder="Ingrese la causa de visita a la veterinaria" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-historial").submit(function(){
            return $(this).validate();
        });
    })
</script>