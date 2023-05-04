<!-- START INDIVIDUAL CARD -->
<div class="col-12 text-center">
    <div class="card-profile">
        <img src="img/avatar.png" style="width: 50px;">
        <div class="col-12 col-md my-2" style="margin: 8px 0 0 0 !important;">
            <h5 class="mt-2 profile-name"><?php echo $row['nombre']; ?></h5>
            <p class="my-2"><small>Creado el: <?php echo $row['fecha_creacion']; ?></small></p>
            <div class="card-profile-button">
                <a href="perfilPublico.php?id=<?php echo $row['uid']; ?>&token=<?php echo hash_hmac('sha1', $row['uid'], KEY_PERFIL );?>"> <button class="my-2 profile-button">Más información</button></a>
            </div>
        </div>
    </div>
</div>
<!-- END INDIVIDUAL CARD -->