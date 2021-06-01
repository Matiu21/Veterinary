<h1 class="page-header"><center>Recetas</center></h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c5=Receta&a5=Crud">Nueva receta</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Tipo de medicina</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->tipo_medicina; ?></td>
            <td>
                <a class="btn btn-success" href="?c5=Receta&a5=Crud&idReceta=<?php echo $r->idReceta; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c5=Receta&a5=Eliminar&idReceta=<?php echo $r->idReceta; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas-admin.html">Volver</a> 
</p>
    

