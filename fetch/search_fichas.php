<?php
    require '../config/config.php';
    require '../config/db.php';
    if(isset($_POST['datos']) && isset($_POST['id'])){
        $busqueda = $_POST['datos'];
        $id = $_POST['id'];
        //sanitizar el string
        //$busqueda = $pdo->quote($busqueda); //Escapar el string de caracteres espciales 
        $busqueda = filter_var($busqueda, FILTER_SANITIZE_STRING); 

        // Definir el parametro
        $busqueda = '%'.$busqueda.'%';
        $sql = $pdo->prepare("SELECT participaciones.*, usuarios.*, distritos.* FROM participaciones INNER JOIN usuarios ON participaciones.uid = usuarios.uid INNER JOIN distritos ON distritos.did = participaciones.did WHERE pid = ? AND (LOWER(titulo_registro) LIKE ? OR LOWER(propuesta) LIKE ? OR LOWER(nombre) LIKE ? OR participaciones.uid LIKE ?)");
        // Agregar los parametros
        $sql->execute([$id, $busqueda, $busqueda, $busqueda, $busqueda]);
        // Fetch los resultados
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        $count = $sql->rowCount();
        if($count > 0){
            foreach($rows as $row){
                    
                require '../components/card_ficha.php';
            }       
        }else{
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

                <div class="container alert alert-warning d-flex align-items-center" role="alert" style="margin: 1rem auto; width: 90%;">
                    <svg class="bi flex-shrink-0 me-2" style="height:50%" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        <h1 class="text-center" style="font-weight: 400;">No se encontró ninguna búsqueda con esos valores 😰</h1>
                    </div>
                </div>
            <?php
        }
        $sql->closeCursor();   
    }else{
        header("Location: ../components/404.php");
        exit();
    }
?>