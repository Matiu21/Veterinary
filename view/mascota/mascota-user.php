<h1 class="page-header"><center>Mascotas</center></h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:180px;">Nombre de la mascota</th>
            <th style="width:120px;">Peso de la mascota</th>
            <th style="width:120px;">Tamaño de la mascota</th>
            <th style="width:120px;">Raza de la mascota</th>
            <th style="width:120px;">Fecha de nacimiento de la mascota</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombra_mascota; ?></td>
            <td><?php echo $r->peso_mascota; ?></td>
            <td><?php echo $r->tamaño_mascota; ?></td>
            <td><?php echo $r->raza_mascota; ?></td>
            <td><?php echo $r->fecha_nacimiento_mascota; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas-user.html">Volver</a> 
</p>
    

