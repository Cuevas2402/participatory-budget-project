<div class="col">
    <div class="card h-100">
        <div class="card-header" style="background-color: #894B5D"></div>
        <img src="img/Distrito Sur.jpg" class="card-img-top" alt="Imagen del Distrito">
        <div class="card-body" style="padding: 0; background-color: #ead9d8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex align-items-center" style="height: 100px; background-color: white;">
                    <h5 class="process-title-card"><?php echo $row['titulo_proceso'];?></h5>
                </li>
                <li class="list-group-item" style="background-color: white; ">
                    <p class="process-date-card"><strong>Ambito:</strong> <?php echo $row['nombre_ambito'];?> </p>
                </li>
                <li class="list-group-item " style="background-color: white;">
                    <p class="process-date-card"><strong>Municipio:</strong> <?php echo $row['nombre_municipio'];?> </p>
                </li>
                <li class="list-group-item" style="background-color: white;">
                    <div class="row d-flex align-items-center">
                        <div class="col">
                            <p class="process-date-card"><strong>Fecha de inicio</strong></p>
                        </div>
                        <div class="col">
                            <p class="process-date-card"><strong>Fecha de finalización</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="process-date-card"><?php echo $row['fecha_inicio_proceso'];?></p>
                        </div>
                        <div class="col">
                            <p class="process-date-card"><?php echo $row['fecha_fin_proceso'];?></p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item d-flex flex-column" style="background-color: #ead9d8">
                    <p class="process-status-card"><strong>Fase actual</strong></p>
                    <button class="process-button"><?php echo $row['titulo_fase'];?></button>
                    <a href="participa2.php?id=<?php echo $row['pid']; ?>&token=<?php echo hash_hmac('sha1', $row['pid'], KEY_TOKEN );?>" ><button class="process-button-card"><strong>Más información</strong></button></a>
                </li>
            </ul>
        </div>
    </div>
</div>