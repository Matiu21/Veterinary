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