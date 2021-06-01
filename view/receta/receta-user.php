<h1 class="page-header"><center>Recetas</center></h1>

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
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p align="right">
   <a class="btn btn-primary" href="consultas-user.html">Volver</a> 
</p>
    

