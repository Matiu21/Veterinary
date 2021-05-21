<h1 class="page-header"><center>Usuarios</center></h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c7=Usuarios&a7=Crud">Nuevo usuario</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Nombre de usuario</th>
            <th style="width:120px;">Contraseña</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_usuario; ?></td>
            <td><?php echo $r->password; ?></td>
            <td>
                <a class="btn btn-success" href="?c7=Usuarios&a7=Crud&idusuarios=<?php echo $r->idusuarios; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c7=Usuarios&a7=Eliminar&idusuarios=<?php echo $r->idusuarios; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas.html">Volver</a> 
</p>
    

