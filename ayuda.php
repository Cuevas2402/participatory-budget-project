<?php
	require 'config/db.php';
	require 'config/config.php';
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>

    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/ayuda.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Letra -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
    <!-- Icono -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Icono Redes Sociales -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body style="font-family: Roboto;">
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="LOGO"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="participa.php">Participa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a-active" href="ayuda.php">Ayuda</a>
                    </li>
                    <li class=" mx-5 nav-item">
                        <a class="nav-link" href="calendario.php">Calendario</a>
                    </li>
                </ul>
                <!-- (Iniciar Sesión / Registrarse) o Sesion Inicada -->
                <?php require 'components/login.php' ?>
            </div>
        </div>
    </nav>
    <!-- Start search bar-->

    <?php require 'components/search_bar.php'; ?>
    
    <!-- End search bar-->

    <!-- End Navbar -->
    
    <div class="contenido">
        <center>    
            <h1>Ayuda</h1>
            <p>En esta sección podrás resolver tus dudas y encontrar distintos recursos para participar en la plataforma.</p>
        </center>

        <div class="tabs-ayuda">
            <div class="tabs">
                <div><button id="opc1" class="tablinks" onclick="openCat(event,'info1')">El presupuesto participativo</button></div>
                <div><button id="opc2" class="tablinks" onclick="openCat(event,'info2')">Operación del programa en Monterrey</button></div>
                <div><button id="opc3" class="tablinks" onclick="openCat(event,'info3')">Requisitos para participar</button></div>
                <div><button id="opc4" class="tablinks" onclick="openCat(event,'info4')">¿Cómo obtener mi carta de residencia?</button></div>
                <div><button id="opc5" class="tablinks" onclick="openCat(event,'info5')">Propuestas</button></div>
                <div><button id="opc6" class="tablinks" onclick="openCat(event,'info6')">Votación</button></div>
                <div><button id="opc7" class="tablinks" onclick="openCat(event,'info7')">Participación en bibliotecas</button></div>
                <div><button id="opc8" class="tablinks" onclick="openCat(event,'info8')">Monto por sector</button></div>
                <div><button id="opc9" class="tablinks" onclick="openCat(event,'info9')">¿A qué sector pertenece mi colonia?</button></div>
                <div class="off-canvas"></div>
            </div>
            <div class="info">
                <div id="info1" class="tabcontent" style="display: block;">
                    <h2>El presupuesto participativo</h2>
                    <h4>¿Qué es un presupuesto participativo?</h4>
                    <p>Es un mecanismo de participación ciudadana a través del que las personas deciden en qué se gasta una parte de los recursos públicos.</p>
                    <h4>¿Cómo puedo participar?</h4>
                    <p>De manera directa, cargando tu propuesta en esta página y votando por tu proyecto preferido para que sea realizado. Además, puedes compartir la información con tus vecinos y vecinas e incluso postularte para ser parte de los Consejos Distritales.</p>
                </div>
                <div id="info2" class="tabcontent">
                    <h2>Operación del programa en Monterrey</h2>
                    <p>En el Presupuesto Participativo, Monterrey es nuestro rompecabezas y nos toca armarlo.</p>
                    <h4>¿Cómo lo haremos?</h4>
                    <ul>
                        <li>Monterrey se ha divido en 30 sectores, en cada uno de ellos se llevará a cabo un proyecto. Desde luego, este proyecto será propuesto y votado por ti y tus vecinos y vecinas.</li>
                        <li>Para participar, la ciudadanía tendrá que registrarse y validar su cuenta en esta plataforma. Validar una cuenta implica compartir una INE con domicilio o una Carta de Residencia emitida por la Dirección de Concertación Social. ¿Para qué? Bueno, necesitamos verificar tu identidad y asegurarnos que vivas en Monterrey.</li>
                        <li>Para asegurarnos que las ideas son realizables y tienen un gran impacto social y ecológico positivo, se evalúa si estas pueden realizarse con el presupuesto destinado para sector, si no infringen ninguna ley o reglamento y si son técnicamente posibles. Para cada evaluación se emitirá un reporte suficiente, el Presupuesto Participativo es un ejercicio transparente.</li>
                        <li>Los proyectos aprobados podrán ser votados en la plataforma a cualquier hora y desde cualquier lugar durante un período establecido. Dentro del mismo período se establecerán módulos de votación en la ciudad. OJO: cada ciudadano solo puede votar por un proyecto en su zona.</li>
                        <li>Los resultados serán publicados tras la votación y la dependencia asignada deberá hacer el proyecto realidad.</li>
                    </ul>
                    <h4>¿Cómo se divide el dinero?</h4>
                    <p>El Presupuesto Participativo nace de, al menos, el 5% de lo recaudado en el impuesto predial en el período inmediato anterior; es decir, de la recaudación del año pasado. De ese total, la división entre los 30 sectores se hace de acuerdo a los siguientes criterios:</p>
                    <ul>
                        <li>El 40% en función del número de personas beneficiadas.</li>
                        <li>El 15% en función de la cantidad de Juntas Vecinales formalmente constituidas.</li>
                        <li>El 45% en función del porcentaje de cumplimiento del pago del Impuesto Predial en el año anterior.</li>
                    </ul>
                    <p>Antes del inicio del programa, se dará a conocer cuál es el presupuesto para cada sector. ¡Mantente atento!</p>
                    <h4>¿De qué otra forma puedo participar?</h4>
                    <p>Además cargar propuestas y votar por tu favorita, también es importante que invites a tu comunidad a participar. Si te interesa aún más el proyecto, puedes formar parte de los 5 Consejos Distritales que se crearán en toda la ciudad. Estos órganos de participación ciudadana tienen la responsabilidad de representar a la ciudadanía y velar la operación óptima del programa, promoviendo la transparencia y la rendición de cuentas. Si quieres saber más, entra aquí (Enlace externo).</p>
                    <h4>¿Puedo proponer donar el presupuesto de mi sector a otro sector o sumarlo con el de otra colonia?</h4>
                    <p>No, en esta edición del Programa se busca que la ciudadanía logre organizarse y familiarizarse con sus vecinos más próximos y aprenda a detectar necesidades en su entorno en equipo, por lo que donar un presupuesto a otro sector no es una opción.</p>
                    <h4>¿Puedo sumar el presupuesto de mi sector al presupuesto del siguiente año?</h4>
                    <p>No, cada presupuesto está relacionado con un período fiscal, por lo que no puede acumularse para el siguiente año.</p>
                </div>
                <div id="info3" class="tabcontent">
                    <h2>Requisitos para participar</h2>
                    <h4>¿Quiénes pueden participar?</h4>
                    <p>Toda la ciudadanía mayor de 18 años que pueda acreditar su residencia en Monterrey a través de una INE vigente o una Carta de Residencia expedida por la Dirección de Concertación Social.</p>
                    <h4>¿Por qué tengo que cargar una INE que muestre domicilio o una Carta de Residencia?</h4>
                    <p>Para que acreditemos tu identidad, podamos generar un identificador único para tu cuenta y nos aseguremos de que resides en Monterrey.</p>
                    <h4>Si tengo propiedades en más de un sector, ¿puedo participar en esos sectores?</h4>
                    <p>No, cada persona puede votar únicamente una vez y registrar propuestas solo para el sector donde reside según muestra su INE o Carta de Residencia. El derecho de participación se extiende por ciudadano.</p>
                    <h4>Para poder proponer y votar proyectos, necesitas una cuenta verificada:</h4>
                    <ol>
                        <li>Lo primero que tienes que hacer es crear una cuenta, para ello da click en "Regístrate" en la esquina superior derecha.</li>
                        <li>Ingresa tus datos personales, crea un nombre de usuario y da click en "Regístrate".</li>
                        <li>En breve recibirás un correo en la dirección de correo electrónico que registraste donde se te pide confirmar tu cuenta. Da click en "confirmar" dentro del correo.</li>
                        <li>Ahora tienes que verificar tu cuenta, para ello da click en "Verificación INE / Carta de Residencia", ahí completa tu información personal y carga una foto del documento. OJO: los datos que ingreses deben coincidir con los del documento.</li>
                        <li>Ahora tu cuenta será verificada de manera manual por personal de la Secretaría, cuando esté listo recibirás un correo en la dirección e-mail que registraste. En caso de haber algún error, se te pedirá corregirlo.</li>
                    </ol>
                </div>
                <div id="info4" class="tabcontent">
                    <h2>¿Cómo obtener mi carta de residencia?</h2>
                    <p>Para poder verificar tu identidad y asegurarnos de que eres un vecino o una vecina de Monterrey, necesitamos comprobar tu domicilio. En la mayoría de los casos, esto se hará a través de una credencial INE que muestre la dirección, pero comprendemos si al tramitar este documento decidiste que no la mostrara, o tu INE se encuentra desactualizada. Si este es tu caso, no dudes en atender a las diferentes oficinas que la Dirección de Concertación Social tiene para extender Cartas de Residencia, misma que te permitirá validar tu identidad. Los horarios son desde 09:00 hasta 17:00 horas los días lunes, martes, miércoles, jueves y viernes.</p>
                    <h4>Las oficinas se encuentran en:</h4>
                    <ul>
                        <li>Los bajos del Palacio Municipal.</li>
                        <li>Parque Tucán (Comisión Tripartita s/número esquina con Uranio. Colonia Valle de Infonavit 5º sector).</li>
                        <li>Parque Aztlán (Av. Aztlán s/n entre Apolo y Prolongación Aztlán. Colonia San Bernabé).</li>
                        <li>Centro de Atención Ciudadana de Garza Sada (Garza Sada 3900 esquina con Sierra de Taray. Colonia Sierra Ventana)</li>
                        <li>Dirección de Participación Ciudadana (Esquina 5ta zona y Magallanes. Colonia Caracol)</li>
                    </ul>
                    <h4>La persona a la que se extenderá carta debe ir personalmente. Si es tu caso, no olvides llevar contigo:</h4>
                    <ul>
                        <li>Copia de tu credencial INE.</li>
                        <li>Un comprobante de domicilio.</li>
                        <li>2 vecinas o vecinos testigos que puedan dar fe de tu domicilio.</li>
                    </ul>
                </div>
                <div id="info5" class="tabcontent">
                    <h2>Propuestas</h2>
                    <h4>¿Cuántas propuestas puedo cargar?</h4>
                    <p>Puedes proponer únicamente un proyecto.</p>
                    <h4>¿Cómo sé que mi propuesta es factible?</h4>
                    <p>En el lenguaje técnico, decimos que una propuesta válida de debe ser jurídica, presupuestal y técnicamente factible. Esto significa que:</p>
                    <ol>
                        <li>No debe romper ninguna ley o reglamento.</li>
                        <li>Debe hacer uso de al menos 2 millones 147 mil 231 pesos mexicanos y respetar la cantidad tope asignada para su sector.</li>
                        <li>Debe ser realista y realizable a largo plazo. Es decir, debe poder llevarse a cabo con los recursos del municipio y no invadir las responsabilidades del gobierno estatal y federal. De la misma manera, debe tener efectos sociales positivos y no alterar el medio ambiente de manera negativa.</li>
                    </ol>
                    <h4>¿Qué pasa si en mi sector ninguna propuesta es calificada como factible?</h4>
                    <p>Guiadas por la Dirección de Participación Ciudadana, el Consejo Distrital y las juntas vecinales existentes tomarán las ideas clave de las propuestas hechas por la ciudadanía para generar una propuesta factible.</p>
                    <h4>¿Cuáles son las categorías bajo las que puedo proponer mi idea?</h4>
                    <p>Movilidad sostenible, desarrollo urbano sostenible, salud, servicios básicos, y cultura y deporte.</p>
                    <h4>¿Cuáles son los ejemplos de Movilidad Sostenible?</h4>
                    <p>Algunos ejemplos serían la construcción, rehabilitación, mantenimiento, remodelación o equipamiento de ciclovías, banquetas y andadores. De cualquier manera, recuerda que la creatividad e innovación es fundamental en el Programa.</p>
                    <h4>¿Cuáles son los ejemplos de Desarrollo Urbano Sostenible?</h4>
                    <p>Todos aquellos que hagan de Monterrey una ciudad inteligente, compacta y amigable con su gente y el medio ambiente. Por ejemplo, aquellos relacionados con centros comunitarios, pluviales, áreas verdes, parques y plazas. También se incluyen la sustitución de energía eléctrica por energías alternativas o la instalación de nomenclaturas, señales y semáforos; así como cualquier otra acción para la regeneración urbana.</p>
                    <h4>¿Cuáles son los ejemplos de Salud?</h4>
                    <p>La salud en el presupuesto participativo está relacionada con la atención e innovación en salud pública. Es decir, proyectos para prevenir enfermedades, así como para proteger, promover y recuperar la salud colectiva de las y los regiomontanos. Mientras sea para beneficio de la población del municipio, los proyectos también pueden ser para uso de Órganos de Participación y Organizaciones de la Sociedad Civil.</p>
                    <h4>¿Cuáles son los ejemplos de Cultura y Deporte?</h4>
                    <p>Todos aquellos relacionados con el fomento, la difusión y el apoyo del arte, la cultura, la educación, el deporte y el civismo.</p>
                    <h4>¿Cuáles son los ejemplos de Servicios Básicos?</h4>
                    <p>Esta categoría es muy concreta, su mejor ejemplo es la introducción de la red de agua potable, drenaje sanitario, electricidad y alumbrado público.</p>
                    <h4>¿Puedo proponer proyectos fuera de estas categorías?</h4>
                    <p>Sí. En tanto el proyecto esté contemplado en el reglamento y cumpla con los requisitos técnicos, presupuestarios y jurídicos, puedes cargarlo y asociarlo a la categoría más próxima.</p>
                    <h4>¿Puedo proponer un proyecto por etapas?</h4>
                    <p>No. Para que un proyecto sea técnica y presupuestalmente factible, la ejecución debe implicar una función suficiente que respete los objetivos principales de la propuesta.</p>
                </div>
                <div id="info6" class="tabcontent">
                    <h2>Votación</h2>
                    <h4>¿Cómo se vota en esta plataforma, Decidimos Monterrey?</h4>
                    <p>Para votar es necesario tener una cuenta validada; es decir, haber compartido los documentos de INE o Carta de Residencia correspondientes a la persona registrada donde se muestre de manera clara que esta tiene su domicilio en Monterrey.</p>
                    <p>Más tarde, tras la revisión de propuestas, la votación se hace en la sección de propuestas, dando click en tu proyecto preferido.</p>
                    <h4>¿Puedo conocer la votación en tiempo real?</h4>
                    <p>No, los resultados de la votación se darán a conocer al final con el objetivo de evitar los sesgos en la decisión de cada ciudadano y ciudadana.</p>
                    <h4>¿Puedo votar presencialmente?</h4>
                    <p>Sí, la votación se hace en ciberespacios con apoyo de diversas bibliotecas en Monterrey. También a través de boleta física en los espacios y fechas dispuestas por la Dirección de Participación Ciudadana que se darán a conocer al acercarse la fecha de votación.</p>
                    <h4>¿Puedo votar digital y presencialmente?</h4>
                    <p>No, el proceso no permite votos duplicados. De encontrarse alguno, ambos votos serían eliminados.</p>
                    <h4>¿Qué pasa si hay un empate?</h4>
                    <p>En caso de empate en alguno de los sectores, se realizarán las rondas de votación que sean necesarias pudiendo ser elegidos únicamente los proyectos empatados.</p>
                </div>
                <div id="info7" class="tabcontent">
                    <h2>Participación en bibliotecas</h2>
                    <p>Para asegurarnos que todos y todas podamos participar en este presupuesto participativo, se han habilitan 22 bibliotecas municipales para cargar propuestas y votar proyectos. Puedes encontrar el mapa en la página principal. (Enlace externo)</p>
                    <p>Aquí la lista:</p>
                    <ul>
                        <li>Biblioteca Mederos</li>
                        <li>Biblioteca Mirador</li>
                        <li>Biblioteca La Republica</li>
                        <li>Centro Civico y Cultural Sierra Ventana</li>
                        <li>Biblioteca Publica Col Independencia</li>
                        <li>Biblioteca NO.3 VENUSTIANO CARRANZA</li>
                        <li>Biblioteca Pública Parque España</li>
                        <li>FERROCARRILERA</li>
                        <li>Biblioteca Pública Municipal de Nueva Madero</li>
                        <li>Biblioteca VIDRIERA</li>
                        <li>Biblioteca CROC</li>
                        <li>Biblioteca Pública CHURUBUSCO</li>
                        <li>Biblioteca Pública</li>
                        <li>Biblioteca Publica Hidalgo</li>
                        <li>Biblioteca Publica Simon Bolivar</li>
                        <li>Biblioteca Pública Estrella</li>
                        <li>Biblioteca Pública Nueva Galicia</li>
                        <li>Biblioteca San Martín</li>
                        <li>Biblioteca VILLA MITRAS</li>
                        <li>Biblioteca Modelo Valle de Infonavit</li>
                        <li>Biblioteca Publica San Bernabé 1</li>
                        <li>Biblioteca Lomas de Anahuac</li>
                    </ul>
                </div>
                <div id="info8" class="tabcontent">
                    <h2>Monto por sector</h2>
                    <p>Este es el presupuesto asignado para cada uno de los 30 sectores:</p>
                    <table style="width:100%">
                        <tr>
                            <th>Sector</th>
                            <th>Presupuesto asignado</th>
                        </tr>
                        <tr>
                            <td>Burócratas y Mitras Norte</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Campana Altamira</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Céntrika</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Chapultepec</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>CROC y Gloria Mendiola</td>
                            <td>$2,387,750.37 MXN</td>
                        </tr>
                        <tr>
                            <td>Cumbres Vista Hermosa y Cumbres Norte</td>
                            <td>$2,684,988.63 MXN</td>
                        </tr>
                        <tr>
                            <td>Distrito Norte y Niños Héroes</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Distrito Tec - Roma sur - Contry</td>
                            <td>$3,815,466.43 MXN</td>
                        </tr>
                        <tr>
                            <td>Edison Industrial</td>
                            <td>$2,332,562.58 MXN</td>
                        </tr>
                        <tr>
                            <td>El Uro, Los Cristales, La Bola y El Barro</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Fundadores - Las Torres - Las Brisas</td>
                            <td>$2,519,092.73 MXN</td>
                        </tr>
                        <tr>
                            <td>La Alianza</td>
                            <td>$2,507,016.47 MXN</td>
                        </tr>
                        <tr>
                            <td>La Estanzuela</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Loma Larga - Independiencia</td>
                            <td>$2,329,196.06 MXN</td>
                        </tr>
                        <tr>
                            <td>Médico, Gonzalitos y Obispado</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Moderna y Churubusco</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Puerta de Hierro y Cumbres Elite</td>
                            <td>$4,982,161.82 MXN</td>
                        </tr>
                        <tr>
                            <td>Purísima, Alameda, Centro y Fundidora</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>San Ángel</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>San Bernabé</td>
                            <td>$3,064,107.07 MXN</td>
                        </tr>
                        <tr>
                            <td>San Jerónimo, Santa Maria y El Carmen</td>
                            <td>$3,170,330.69 MXN</td>
                        </tr>
                        <tr>
                            <td>Sátelite y Mederos</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Sierra Ventana</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Solidaridad</td>
                            <td>$3,100,884.66 MXN</td>
                        </tr>
                        <tr>
                            <td>Tierra y libertad</td>
                            <td>$2,341,365.96 MXN</td>
                        </tr>
                        <tr>
                            <td>Topo Chico y Penitenciaria</td>
                            <td>$2,738,277.51 MXN</td>
                        </tr>
                        <tr>
                            <td>Unidad modelo y Valle de Santa Lucía</td>
                            <td>$2,429,921.03 MXN</td>
                        </tr>
                        <tr>
                            <td>Valle Alto y El Diente</td>
                            <td>$2,147,241 MXN</td>
                        </tr>
                        <tr>
                            <td>Valle de Infonavit y Valle Verde</td>
                            <td>$3,028,727.48 MXN</td>
                        </tr>
                        <tr>
                            <td>Villa Mitras</td>
                            <td>$2,818,306.06 MXN</td>
                        </tr>
                    </table>
                    <br>
                    <p><i>* Este monto está sujeto a cambios por el recuento final ante la fecha de cierre de la recaudación de este año.</i></p>
                </div>
                <div id="info9" class="tabcontent">
                    <h2>¿A qué sector pertenece mi colonia?</h2>
                    <p>Listado de colonias en cada uno de los 30 sectores del Presupuesto Participativo:</p>
                    <form>
                        <select name="sector" id="sector">
                            <option value="0">-- Seleccione una opción --</option>
                            <option value="1">Burócratas y Mitras Norte</option>
                            <option value="2">Campana Altamira</option>
                            <option value="3">Céntrika</option>
                            <option value="4">Chapultepec</option>
                            <option value="5">CROC y Gloria Mendiola</option>
                            <option value="6">Cumbres Vista Hermosa y Cumbres Norte</option>
                            <option value="7">Distrito Norte y Niños Héroes</option>
                            <option value="8">Distrito Tec - Roma sur - Contry</option>
                            <option value="9">Edison Industrial</option>
                            <option value="10">El Uro, Los Cristales, La Bola y El Barro</option>
                            <option value="11">Fundadores - Las Torres - Las Brisas</option>
                            <option value="12">La Alianza</option>
                            <option value="13">La Estanzuela</option>
                            <option value="14">Loma Larga - Independiencia</option>
                            <option value="15">Médico, Gonzalitos y Obispado</option>
                            <option value="16">Moderna y Churubusco</option>
                            <option value="17">Puerta de Hierro y Cumbres Elite</option>
                            <option value="18">Purísima, Alameda, Centro y Fundidora</option>
                            <option value="19">San Ángel</option>
                            <option value="20">San Bernabé</option>
                            <option value="21">San Jerónimo, Santa Maria y El Carmen</option>
                            <option value="22">Sátelite y Mederos</option>
                            <option value="23">Sierra Ventana</option>
                            <option value="24">Solidaridad</option>
                            <option value="25">Tierra y libertad</option>
                            <option value="26">Topo Chico y Penitenciaria</option>
                            <option value="27">Unidad modelo y Valle de Santa Lucía</option>
                            <option value="28">Valle Alto y El Diente</option>
                            <option value="29">Valle de Infonavit y Valle Verde</option>
                            <option value="30">Villa Mitras</option>
                        </select>
                        <br><br>
                        <center>
                            <input type="submit" value="Submit">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Footer -->
    <?php require 'components/footer.php'; ?>
    <!-- End Footer -->

	<!--& SCRIPT PARA SECCIONES -->
	<script>
		function openCat(evt, categoria) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(categoria).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>
</body>
</html>

