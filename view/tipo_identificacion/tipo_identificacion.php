<h1 class="page-header"><center>Tipo de identificacion</center></h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c6=Tipo_identificacion&a6=Crud">Nuevo tipo de identificacion</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Tipo de identificacion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->tipo_identificacion; ?></td>
            <td>
                <a class="btn btn-success" href="?c6=Tipo_identificacion&a6=Crud&idtipo_identificacion=<?php echo $r->idtipo_identificacion; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c6=Tipo_identificacion&a6=Eliminar&idtipo_identificacion=<?php echo $r->idtipo_identificacion; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas.html">Volver</a> 
</p>
    

