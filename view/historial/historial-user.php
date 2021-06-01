<h1 class="page-header"><center>Historial</center></h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Fecha</th>
            <th style="width:180px;">Tipo de visita</th>
            <th style="width:120px;">Pago</th>
            <th style="width:120px;">Causa de la visita</th>
            <th style="width:120px;">ID de la mascota</th>
            <th style="width:120px;">ID de la medicina</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->fecha; ?></td>
            <td><?php echo $r->tipo_visita; ?></td>
            <td><?php echo $r->pago; ?></td>
            <td><?php echo $r->causa_visita; ?></td>
            <td><?php echo $r->id_mascota; ?></td>
            <td><?php echo $r->idReceta; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas-user.html">Volver</a> 
</p>
    

