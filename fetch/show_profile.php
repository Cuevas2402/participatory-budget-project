<?php
    require '../config/db.php';
    require '../config/config.php';
    session_start();
    if(isset($_POST['dato']) && isset($_POST['id'])){
        
        if($_POST['dato'] == 1){

            $sql = $pdo->prepare("SELECT *, participaciones.img as imagen FROM participaciones, usuarios, distritos WHERE usuarios.uid = ? AND  usuarios.uid = participaciones.uid and distritos.did = participaciones.did");
            $sql->execute([$_POST['id']]);
            $rows = $sql->fetchAll();
            $count = $sql->rowCount();
            $sql->closeCursor();
            if($count == 0){
                ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                    </svg>

                    <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 2rem auto; width: 90%;">
                        <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            <h1 class="text-center" style="font-weight: 400;">Este usuario no ha hecho ninguna propuesta 😰</h1>
                        </div>
                    </div>
                <?php
            }else{
                foreach($rows as $row){
                    require '../components/card_ficha.php';
                }
            }
        }else{
            if($_POST['dato'] == 2){
                $sql = $pdo->prepare("SELECT * FROM favoritos, usuarios, procesos, ambitos, municipios,fases WHERE usuarios.uid = ? AND  usuarios.uid = favoritos.uid AND favoritos.pid = procesos.pid AND  procesos.mid = municipios.mid AND procesos.aid = ambitos.aid AND procesos.pid = fases.pid AND procesos.fase_actual = fases.n_fase");
                $sql->execute([$_POST['id']]);
                $rows = $sql->fetchAll();
                $count = $sql->rowCount();
                $sql->closeCursor();
                if($count == 0){
                    ?>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                        </svg>

                        <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 2rem auto; width: 90%;">
                            <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                <h1 class="text-center" style="font-weight: 400;">Este usuario no sigue ningun proceso 😰</h1>
                            </div>
                        </div>
                    <?php
                }else{
                    foreach($rows as $row){

                        require '../components/card_proceso.php';

                    }
                }
            }else{
                if($_POST['dato'] == 3 || $_POST['dato'] == 4){
                    if($_POST['dato'] == 3){
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE followed = ? AND usuarios.uid = seguir.follow ");
                    }else{
                        $sql = $pdo->prepare("SELECT * FROM seguir, usuarios WHERE follow = ? AND usuarios.uid = seguir.followed");
                    }

                    $sql->execute([$_POST['id']]);
                    $rows = $sql->fetchAll();
                    $count = $sql->rowCount();
                    $sql->closeCursor();
                    if($count == 0){
                        ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                            </svg>

                            <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 2rem auto; width: 90%;">
                                <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <h1 class="text-center" style="font-weight: 400;">No se encontro ningun usuario 😰</h1>
                                </div>
                            </div>
                        <?php
                    }else{
                        foreach($rows as $row){

                            require '../components/card_perfil.php';
                        }
                    }
                }else{
                    
                    if($_POST['dato'] == 5){
                        $sql = $pdo->prepare("SELECT *, participaciones.img as imagen FROM votos, usuarios, participaciones, distritos WHERE votos.voted = usuarios.uid AND votos.voting = ? AND votos.pid = participaciones.pid AND votos.voted = participaciones.uid and distritos.did = participaciones.did");
                        $sql->execute([$_POST['id']]);
                        $rows = $sql->fetchAll();
                        $count = $sql->rowCount();
                        $sql->closeCursor();
                        if($count == 0){
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </symbol>
                                <symbol id="info-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </symbol>
                                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </symbol>
                                </svg>

                                <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 2rem auto; width: 90%;">
                                    <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div>
                                        <h1 class="text-center" style="font-weight: 400;">Este usuario no ha votado 😰</h1>
                                    </div>
                                </div>
                            <?php
                        }else{
                            foreach($rows as $row){
                                require '../components/card_ficha.php';
                            }
                        }
                    }else{
                        header("Location: ../components/404.php");
                        exit(); 
                    }
                }
            }

        }

    }else{
        header("Location: ../components/404.php");
        exit();
    }

?>
     



