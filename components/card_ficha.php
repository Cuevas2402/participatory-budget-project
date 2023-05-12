<!-- START INDIVIDUAL CARD -->
<div class="col">
    <div class="card h-100">
        <div class="card-header" style="background-color: #894B5D"></div>
        
        <img src="img/<?php echo $row['nombre_distrito']; ?>.jpg" class="object-fit-cover" alt="..." style="height:150px; border-radius: 0">
            
        <div class="card-body" style="padding: 0;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-center align-items-center" style="height: 100px">
                    <h5 class="process-title-card"><?php echo $row['titulo_registro']; ?></h5>
                </li>
                <li class="list-group-item">
                    <p class="process-content-card"><strong>Autor:</strong><a class="process-filter-a-active"  href="perfilPublico.php?id=<?php echo $row['uid']; ?>&token=<?php echo hash_hmac('sha1', $row['uid'], KEY_PERFIL );?>"> <?php echo $row['nombre']; ?></a></p> 
                </li>
                <li class="list-group-item">
                    <p class="process-content-card"><strong>Distrito:</strong> <?php echo $row['nombre_distrito']; ?></p>
                </li>
                <li class="list-group-item">
                    <p class="process-content-card"><strong>Fecha de creación: </strong><?php echo $row['fecha_creacion']; ?></p>
                </li>
                <li class="list-group-item">
                    <p class="process-content-card"><strong>Status: </strong><?php echo $row['fecha_creacion']; ?></p>
                </li>
                <li class="list-group-item d-flex flex-column" style="background-color: #ead9d8">
                    <a href="propuesta.php?id=<?php echo $row['uid'].'|'.$row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['uid'].'|'.$row['pid'] , KEY_PRO ); ?>"><button class="process-button-card"><strong>Más información</strong></button></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END INDIVIDUAL CARD -->