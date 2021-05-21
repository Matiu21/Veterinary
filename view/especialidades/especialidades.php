<h1 class="page-header"><center>Especialidades</center></h1>
id_especialidades
tipo_especialidades
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c1=Especialidades&a1=Crud">Nuevas especialidades</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Tipo de Especialidades</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->tipo_especialidades; ?></td>
            <td>
                <a class="btn btn-success" href="?c1=Especialidades&a1=Crud&id_especialidades=<?php echo $r->id_especialidades; ?>">Editar</a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c1=Especialidades&a1=Eliminar&id_especialidades=<?php echo $r->id_especialidades; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas.html">Volver</a> 
</p>
    

