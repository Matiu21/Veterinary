  
<h1 class="page-header"><center>Personas</center></h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c4=Personas&a4=Crud">Nueva persona</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Identificacion</th>
            <th style="width:180px;">Nombre</th>
            <th style="width:180px;">Apellido</th>
            <th style="width:180px;">Direccion</th>
            <th style="width:180px;">Telefono</th>
            <th style="width:120px;">Email</th>
            <th style="width:120px;">Tipo</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->identificacion_per; ?></td>
            <td><?php echo $r->nombre_per; ?></td>
            <td><?php echo $r->apellido_per; ?></td>
            <td><?php echo $r->direccion_per; ?></td>
            <td><?php echo $r->telefono_per; ?></td>
            <td><?php echo $r->email; ?></td>
            <td><?php echo $r->Tipo == 1 ? 'Cliente' : 'Veterinario'; ?></td>
            <td>
                <a class="btn btn-success" href="?c4=Personas&a4=Crud&id_personas=<?php echo $r->id_personas; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c4=Personas&a4=Eliminar&id_personas=<?php echo $r->id_personas; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas-admin.html">Volver</a> 
</p>