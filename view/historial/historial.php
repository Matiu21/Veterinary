<h1 class="page-header"><center>Historial</center></h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c2=Historial&a2=Crud">Nuevo Historial</a>
</div>
idhistorial




<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Fecha</th>
            <th style="width:180px;">Tipo de visita</th>
            <th style="width:120px;">Pago</th>
            <th style="width:120px;">Causa de la visita</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->tipo_visita; ?></td>
            <td><?php echo $r->pago; ?></td>
            <td><?php echo $r->causa_visita; ?></td>
            <td>
                <a class="btn btn-success" href="?c2=Historial&a2=Crud&idhistorial=<?php echo $r->idhistorial; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c2=Historial&a2=Eliminar&idhistorial=<?php echo $r->idhistorial; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas.html">Volver</a> 
</p>
    

