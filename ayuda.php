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
			<a class="navbar-brand" href="#"><img src="img/logo.png" style="width: 200px;" alt="Logo del Gobierno de Monterrey"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
				<ul class="navbar-nav d-flex justify-content-around w-100 text-center">
				<li class="nav-item">
					<a class="nav-link " href="index.php">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="participa.php">Participa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link a-active" href="ayuda.php">Ayuda</a>
				</li>
				<li class="nav-item">
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
                            <option selected>Seleccione una opción</option>
                            <option>Burócratas y Mitras Norte</option>
                            <option>Campana Altamira</option>
                            <option>Céntrika</option>
                            <option>Chapultepec</option>
                            <option>CROC y Gloria Mendiola</option>
                            <option>Cumbres Vista Hermosa y Cumbres Norte</option>
                            <option>Distrito Norte y Niños Héroes</option>
                            <option>Distrito Tec - Roma sur - Contry</option>
                            <option>Edison Industrial</option>
                            <option>El Uro, Los Cristales, La Bola y El Barro</option>
                            <option>Fundadores - Las Torres - Las Brisas</option>
                            <option>La Alianza</option>
                            <option>La Estanzuela</option>
                            <option>Loma Larga - Independiencia</option>
                            <option>Médico, Gonzalitos y Obispado</option>
                            <option>Moderna y Churubusco</option>
                            <option>Puerta de Hierro y Cumbres Elite</option>
                            <option>Purísima, Alameda, Centro y Fundidora</option>
                            <option>San Ángel</option>
                            <option>San Bernabé</option>
                            <option>San Jerónimo, Santa Maria y El Carmen</option>
                            <option>Sátelite y Mederos</option>
                            <option>Sierra Ventana</option>
                            <option>Solidaridad</option>
                            <option>Tierra y libertad</option>
                            <option>Topo Chico y Penitenciaria</option>
                            <option>Unidad modelo y Valle de Santa Lucía</option>
                            <option>Valle Alto y El Diente</option>
                            <option>Valle de Infonavit y Valle Verde</option>
                            <option>Villa Mitras</option>
                        </select>
                    </form>
                    <div id="show" class="mt-3 p-0"></div>
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

        var show = document.getElementById("show");
        var select = document.getElementById("sector");

        select.onchange = function(){
        value = select.options[select.selectedIndex].text;
        if(value == "Burócratas y Mitras Norte"){
            show.innerHTML = "<ul><li>Abraham Lincoln 2 Sector 1</li><li>Abraham Lincoln 2 Sector 2</li><li>Abraham Lincoln 4 Sector</li><li>Antonio I. Villarreal</li><li>Burocratas del Estado</li><li>Industrial Habitacional Abraham Lincoln</li><li>Jardín de las Mitras</li><li>UH Lazaro Cardenas</li><li>Unidad Residencial Lincoln</li><li>Urdiales</li><li>Urdiales (Fomerrey 58)</li><li>Zapata</li></ul>";
        }
        else if(value == "Campana Altamira"){
            show.innerHTML = "<ul><li>Altamira</li><li>Altamira (Manz 20)</li><li>Cerro de la Campana</li><li>Desarrollo Las Torres 91</li><li>Heriberto Jara</li><li>Laderas del Mirador (Fomerrey XXI)</li><li>Laderas del Mirador Ampliación</li><li>Las Canteras</li><li>Las Retamas</li><li>Luis Echeverria Sur</li><li>Martinez Dominguez A. Union ( La Campana)</li><li>Union El Rinconcito</li><li>Valle del Mirador</li> </ul>";
        }
        else if(value == "Céntrika"){
            show.innerHTML = "<ul><li>Asarco</li><li>Cantu</li><li>Cementos</li><li>Centrika 1 Sector 1 etapa</li><li>Centrika 1 Sector 2 etapa</li><li>Centrika 1 Sector 3 etapa</li><li>Centrika 2 Sector</li><li>Del Padro</li><li>Juana de Arco</li><li>Mariano Escobedo</li><li>Primero de Mayo</li><li>Terminal</li><li>Treviño</li><li>Union Mariano Escobedo</li><li>Victoria</li><li>Vidriera</li></ul>";
        }
        else if(value == "Chapultepec"){
            show.innerHTML = "<ul><li>Ancon del Huajuco</li><li>Buenos Aires</li><li>Caracol</li><li>El Realito</li><li>España</li><li>Fraccionamiento Buenos Aires</li><li>Fraccionamiento La Florida</li><li>Jardín Español</li><li>Nueva Española</li><li>Residencial La Española</li><li>Valle del Huajuco</li></ul>";
        }
        else if(value == "CROC y Gloria Mendiola"){
            show.innerHTML = "<ul><li>Artículo 27(F-96)</li><li>Balcones de Aztlán</li><li>Benito Juarez (Tiraderos de Basura)</li><li>C.R.O.C.</li><li>Conquistadores</li><li>CROC 1 sección</li><li>CROC 3 sección F-155</li><li>DIF(F-15)</li><li>El Porvenir</li><li>Fraccionamiento Popular</li><li>Gloria Mendiola(Tierra Propia)</li><li>Laderas del Topo Chico(F-23)</li><li>Libertadores de America</li><li>Lomas del Topo Chico</li><li>Municipal Ampliación</li><li>Pepenadores(F-87)</li><li>Reforma (F-21)</li><li>Rene Alvarez</li><li>Tierra Propia(F-35)</li><li>Valle de San Martin(F-24)</li></ul>";
        }
        else if(value == "Cumbres Vista Hermosa y Cumbres Norte"){
            show.innerHTML = "<ul><li>Bosques de las Cumbres C-1</li><li>Bosques de las Cumbres C-2</li><li>Bosques de las Cumbres C-3</li><li>Bosques de las Cumbres Sector B-1</li><li>Bosques de las Cumbres Sector B-2</li><li>Bosques de las Cumbres Sector B-3</li><li>Bosques de las Cumbres Sector B-6</li><li>Bosques de las Cumbres Sector B-7</li><li>Bosques de las Cumbres Sector B-8</li><li>Bosques de las Cumbres Sector B-9</li><li>Cima de las Cumbres</li><li>Colinas de las Cumbres 1 Sector</li><li>Colinas de las Cumbres 2 Sector</li><li>Condocasa Cumbres</li><li>Cumbres 3 Sector Seccion 3 - 4</li><li>Cumbres Campanario</li><li>Cumbres las Palmas</li><li>Cumbres Mediterraneo 1 Sector</li><li>Cumbres Mediterraneo 2 Sector</li><li>Cumbres Paraiso 1 Sector</li><li>Cumbres Sector La Esperanza</li><li>Cumbrescondido 1 Sector</li><li>Cumbrescondido 2 Sector</li><li>Cumbrescondido 3 Sector</li><li>La Escondida Centro Urbano</li><li>Las CumbresLas Cumbres 1 Sector</li><li>Las Cumbres 2 Sector</li><li>Las Cumbres 2 Sector Ampliación</li><li>Las Cumbres 2 Sector C</li><li>Las Cumbres 2 Sector II</li><li>Las Cumbres 3 Sector</li><li>Las Cumbres 3 Sector Seccion 5</li><li>Las Cumbres 4 Sector A</li><li>Las Cumbres 4 Sector B</li><li>Las Cumbres 4 Sector C</li><li>Las Cumbres 5 Sector A</li><li>Las Cumbres 5 Sector B</li><li>Las Cumbres 5 Sector C</li><li>Las Cumbres 5 Sector D-1</li><li>Las Cumbres 5 Sector D-2</li><li>Las Cumbres 5 sector D-3</li><li>Las Cumbres 5 sector D-4</li><li>Las Cumbres 6 Sector D-1</li><li>Las Cumbres 6 Sector D-2</li><li>Las Cumbres 6 Sector D-3</li><li>Las Cumbres 6 Sector D-4</li><li>Las Cumbres 6 Sector Sección B</li><li>Leones</li><li>Patronato Cruz Verde</li><li>Residencial Cumbres 1 Sector</li><li>Residencial Cumbres 2 Sector B</li><li>Residencial Cumbres 2 Sector 1 Etapa</li><li>Rincón de las Cumbres</li> <li>Vista Hermosa</li></ul>";
        }
        else if(value == "Distrito Norte y Niños Héroes"){
            show.innerHTML = "<ul><li>Bernardo Reyes</li><li>Bernardo Reyes 3-5 Sector</li><li>Central</li><li>Estrella</li><li>Fraccionamiento Industrial</li><li>Hidalgo</li><li>Hogares Ferrocarrileros Infonavit</li><li>Luis Echeverria (F-35)</li><li>Mitras Norte</li><li>Monterrey Conjunto Habitacional</li><li>Narciso Mendoza</li><li>Niño Artillero</li><li>Popular</li><li>Predio Estrella</li><li>Pueblo Quieto</li><li>Regina</li></ul>";
        }
        else if(value == "Distrito Tec - Roma sur - Contry"){
            show.innerHTML = "<ul><li>Alta Vista Sur Sector Lomas</li><li>Altavista</li><li>Altavista Sur</li><li>Altavista Invernadero</li><li>Altavista Lomas</li><li>Ancira</li><li>Arroyo Seco</li><li>Balcones de Altavista</li><li>Balcones de Altavista 2 Sector</li><li>Cerro de la Silla</li><li>Colonial La Silla</li><li>Condominio Horizontal ICONOS</li><li>Contry</li><li>Contry la Silla Sector La Costa</li><li>Contry Los Estanques</li><li>Contry Los Nogales</li><li>Contry San Juanito</li><li>Contry Tesoro</li><li>Estadio</li><li>Estadio 2 sector</li><li>Fraccionamiento Centro</li><li>Jardines de Altavista</li><li>Jardines de Altavista Norte</li><li>Jardines del Contry</li><li>Jardines Roma</li><li>L.T.H</li><li>La Primavera 1 Sector</li><li>La Primavera 3 Sector</li><li>Ladrillera</li><li>Los Naranjos</li><li>Mas Palomas ( Valle de Santiago)</li><li>México</li><li>Narvarte</li><li>Nueva España</li><li>Paseo del Contry</li><li>Pedregal Contry</li><li>Plaza Revolución</li><li>Residencial La Florida</li><li>Rincon de Altavista</li><li>Rincon de la Primavera 2 Sector</li><li>Rincon de la Primavera 3 Sector</li><li>Rincon de la Primavera 4 Sector</li><li>Rincon de la Primavera 5 Sector</li><li>Rincon de la Primavera 6 Sector</li><li>Rincón del Contry</li><li>Roma</li><li>Roma Privada</li><li>Roma Sur</li><li>Tecnológico</li><li>Torremolinos</li><li>Valle Primavera</li><li>Villa del Rio</li><li>Villa Florida</li><li>Villa Los Pinos</li><li>Villas de Lux</li></ul>";
        }
        else if(value == "Edison Industrial"){
            show.innerHTML = "<ul><li>Bella Vista</li><li>Benito Juarez</li><li>Diez de Marzo</li><li>Garza Nieto</li><li>Industrial</li><li>Larralde</li><li>Obrerista</li><li>Pedro Lozano</li><li>Progreso</li><li>Ruben Jaramillo</li><li>Sarabia</li><li>Talleres</li></ul>";
        }
        else if(value == "El Uro, Los Cristales, La Bola y El Barro"){
            show.innerHTML = "<ul><li>Aires del Vergel</li><li>Almendros de Laderas</li><li>Antara (Privada Residencial)</li><li>Antigua Hacienda Santa Anita 1 Sector</li><li>Antigua Hacienda Santa Anita 2 Sector</li><li>Arboretto Privada Residencial</li><li>Bosques de Vistancia</li><li>Bosques del Vergel</li><li>Campestre El Barro</li><li>Campestre Los Cristales</li><li>Campestre Sertoma</li><li>Cantarel</li><li>Canterias 1 Sector</li><li>Canterias Norte</li><li>Carolco 1 Sector</li><li>Carolco 2 Sector</li><li>Carolco 3 Sector</li><li>Castaños del Vergel Etapa 1°</li><li>Castaños del Vergel Etapa 2°</li><li>Catujanes</li><li>Cerezos de Laderas</li><li>Dos Encinos</li><li>El Barro</li><li>El Eden</li><li>El Mirador</li><li>El Refugio</li><li>El Vergel</li><li>Encinos del Vergel</li><li>Fraccionamiento Portal del Huajuco</li><li>La Joya Privada Residencial</li><li>La Toscana 1 Sector</li><li>La Toscana 2 Sector</li><li>Laderas 1 Sector</li><li>Laderas 2 Sector</li><li>Lania Residencial</li><li>Las Caleras</li><li>Las Diligencias</li><li>Las Esmeraldas</li><li>Las Granadas</li><li>Las Jaras</li><li>Las Margaritas</li><li>Los Cristales Fracc. Campestre</li><li>Maestranzas</li><li>Misión Canterias</li><li>MONTEALBAN RESIDENCIAL ETAPA 1</li><li>Moretta</li><li>Portal del Uro</li><li>Privada la Herradura (Antes el Vergel II)</li><li>Residencial El Uro</li><li>Residencial y Club de Golf la Herradura 1a. Etapa</li><li>Residencial y Club de Golf la Herradura 2a. Etapa</li><li>Residencial y Club de Golf la Herradura 3a. Etapa</li><li>Residencial y Club de Golf la Herradura 4a. Etapa</li><li>Robleza Fincas</li><li>Santa Isabel 1 Sector</li><li>Santa Isabel 2°Sector 1° Etapa</li><li>Santa Isabel 3 Sector</li><li>Santa Lucia</li><li>Siena</li><li>Soria</li><li>Valle del Vergel</li><li>Valles de Cristal 1era. Etapa</li><li>Valles de Cristal 2a. Etapa</li><li>Valles de Cristal 3a. Etapa 'A B y C'</li><li>Valles de Cristal 4a. Etapa A</li><li>Valles de Cristal 4a. Etapa B</li><li>Villa Isabel</li><li>Villas Canterias</li><li>Villas Moretta</li><li>Vistancia 1 Sector</li><li>Vistancia 2 Sector</li><li>Vistancia 2°Sector 2° Etapa</li><li>Vistancia 2°Sector 3°Etapa</li></ul>";
        }
        else if(value == "Fundadores - Las Torres - Las Brisas"){
            show.innerHTML = "<ul><li>Alfareros</li><li>Antigua</li><li>Brisas del Valle</li><li>Club Sonoma Residencial 1°Sector</li><li>Del Paseo Residencial</li><li>Del Paseo Residencial 2 Sector</li><li>Del Paseo Residencial 3 Sector</li><li>Del Paseo Residencial 4 Sector</li><li>Del Paseo Residencial 5 Sector</li><li>Del Paseo Residencial 5 A</li><li>Del Paseo Residencial 5 B</li><li>Del Paseo Residencial 6 Sector</li><li>Del Paseo Residencial 7 Sector</li><li>Empleados SFEO</li><li>Jardines de las Torres</li><li>Jardines de las Torres 1 Sector</li><li>Jardines de las Torres 2 Sector</li><li>Jardines del Paseo 1 Sector</li><li>Jardines del Paseo 2 Sector</li><li>Jardines del Paseo 3 Sector</li><li>La Republica</li><li>Las Brisas</li><li>Las Brisas 10 Sector</li><li>Las Brisas 11 Sector</li><li>Las Brisas 2 Sector</li><li>Las Brisas 3 Sector</li><li>Las Brisas 4,5,6 Sector</li><li>Las Brisas 7 Sector</li><li>Las Brisas 8 Sector</li><li>Las Brisas 9 Sector 1 etapa</li><li>Las Brisas 9 Sector 2-3 etapa</li><li>Las Torres 2 Sector</li><li>Lomas de Montecristo</li><li>Lomas del Paseo 1 Sector</li><li>Lomas del Paseo 2 Sector</li><li>Lomas del Paseo 3 Sector A</li><li>Lomas del Paseo 3 Sector B</li><li>Los Angeles</li><li>Mirador Residencial</li><li>Privada Fundadores 1 Sector</li><li>Privada Fundadores 2 Sector 1era. Etapa</li><li>Privada Fundadores 2 sector 2 Etapa</li><li>Privadas del Paseo</li><li>Privanzas 5 Sector</li><li>Privanzas 6 Sector</li><li>Renacimiento 1,2,3,4 Sector</li><li>Solaria BrisaTorre BrisasValle de Fundadores</li><li>Valle del Marquez ( Fom - 16)</li></ul>";
        }
        else if(value == "La Alianza"){
            show.innerHTML = "<ul><li>Arboledas de Escobedo (P-44)</li><li>Alfonso Reyes (P-38)</li><li>Ampliación Nogales (P-87)</li><li>Aniceto Corpus (P-60)</li><li>Arboledas de San Bernabe</li><li>Balcones de San Bernabe</li><li>Cerradas del Poniente</li><li>Colonial San Bernabe</li><li>Comercial Linconl Poniente</li><li>El Palmar (P-96,141)</li><li>Hacienda San Bernabe (Parcela 128)</li><li>Ing J.M.Maldonado T. (P-11,19,22,23)</li><li>Jardines de la Alianza</li><li>Jeronimo Treviño (P-35)</li><li>La Alianza P-128</li><li>La Alianza sector B</li><li>La Alianza sector D (P-94)</li><li>Eugenio Garza Sada</li><li>La alianza sector E (P-47,48)</li><li>La Alianza sector F (P-142)</li><li>La Alianza sector H (P-140,192)</li><li>La Alianza sector I (P-58,68)</li><li>La Alianza sector J Ignacio Altamirano (P-79,137,87)</li><li>La Alianza sector K (P-43,51)</li><li>La Alianza sector L (P-107)</li><li>La Alianza sector M (P-61)</li><li>La Alianza sector N (P-71,74)</li><li>La Alianza sector O (P-67)</li><li>La Alianza sector P Diego de Montemayor (P-88)</li><li>La Alianza sector Q (P-90)</li><li>La Alianza sector T (P-24)</li><li>La Alianza sector V (P-68)</li><li>La Alianza Trazo Barron (P-93)</li><li>La Alianza Trazo de A (P-28)</li><li>La Alianza Trazo Mao (P-46)</li><li>La Alianza Trazo Marcelino (P-130)</li><li>La Alianza Trazo Marco (P-52)</li><li>La Alianza Trazo Rosario (P-90)</li><li>La Marina, Alianza Parcela 61</li><li>Las Fuentes (P-53,54,134)</li><li>Lorenzo Garza (P-1)</li><li>Los Angeles (P-133)</li><li>Los Angeles (P-49)</li><li>Los Angeles (P-50)</li><li>Los Naranjos Parcela 41</li><li>Los Nogales I y II (P-98,109)</li><li>Los Nogales III (P-102)</li><li>Martin de Zavala (P-34)</li><li>Misión de San Bernabé</li><li>La Alianza Sector O</li><li>Oasis</li><li>Parcela #83</li><li>Parcela 61, La Alianza Sector M</li><li>Parcela 7 Ma. Leija Briones Col. La Alianza</li><li>Paseo de San Bernabe</li><li>Periodistas de Mexico 1era. Etapa</li><li>Periodistas de Mexico 2a. Etapa</li><li>Periodistas de Mexico 4a. Etapa</li><li>Portal del Valle</li><li>Portales de Valles de San Bernabe</li><li>Prados de San Bernabe</li><li>Puerta del Sol 1 Sector La Alianza sector S (P-28)</li><li>Puerta del Sol 2 Sector La Alianza sector R (P-8,9)</li><li>Puesta del Sol</li><li>Real de San Bernabe</li><li>Rincon de San Bernabe (Poligono Vll)</li><li>San Antonio (P-37)</li><li>San David 1P-33)</li><li>San Gabriel (La Alianza)</li><li>San Isidro (P-108)</li><li>San Juan de Guadalupe Parcela 36</li><li>San Pedro (P-72,76,136)</li><li>San Rodolfo I (P-89,139)</li><li>Santa Ana (P-63)</li><li>Union Antorchista Parcela 16</li><li>Valle de la Esperanza</li><li>Valles de San Bernabe</li><li>Valles de San Bernabe III</li><li>Venustiano Carranza Seccion A</li><li>Villas de la Alianza</li><li>Villas de San Agustin</li><li>Villas de San Bernabe 1° Sector P 65</li><li>Villas de San Sebastian</li><li>Villas del Carmen</li></ul>";
        }
        else if(value == "La Estanzuela"){
            show.innerHTML = "<ul><li>Residencial La Escondida</li><li>Privadas del Rio</li><li>San Pablo</li><li>Villas de la Herradura</li><li>La Rioja Privada Residencial 1era. Etapa</li><li>Residencial La Lagrima</li><li>La Rioja Privada Residencial 2da. Etapa</li><li>El Sabino Cerrada Residencial</li><li>Rincon de la Escondida</li><li>Encino Real</li><li>Residencial La Escondida 2 Sector</li><li>El Fortin del Huajuco</li><li>Brisas de Valle Alto</li><li>Villas la Rioja</li><li>Las Callejas Residencial</li><li>Las Riveras</li><li>Cerradas de Valle Alto</li><li>Privada Villa Real</li><li>Paraiso Residencial</li><li>Residencial El Encanto</li><li>Residencial de la Sierra</li><li>Alejandrias Privada Residencial</li><li>Sierra Escondida</li><li>Residencial el Encanto ll</li><li>Privada Los Encinos</li><li>Amura Residencial</li><li>Kiara Residencial</li><li>Thessalia</li><li>Cerradas de Valle Alto Segundo Sector</li><li>Ignacio Altamirano</li><li>Nogales de La Sierra</li><li>Estanzuela ( F - 45 )</li><li>Granja Postal</li><li>Estanzuela Nueva</li><li>Estanzuela Vieja</li><li>Colinas del Huajuco</li><li>UH El Milagro</li><li>La Estanzuela</li><li>Mision Silla</li><li>Bosques de la Estanzuela</li><li>De los Santos</li><li>La Alhambra</li><li>La Privada del Vergel 1a.Etapa</li><li>Paseo del Vergel 1era. Etapa</li><li>La Privada del Vergel 2a.Etapa</li><li>Paseo del Vergel 2 etapa</li><li>Paseo del Vergel 3era. Etapa</li><li>Lomas del Vergel 2 Sector</li><li>La Perla</li><li>Contry Sur 2 sector</li><li>Privada de la Fuente</li><li>Contry Sur</li></ul>";
        }
        else if(value == "Loma Larga - Independiencia"){
            show.innerHTML = "<ul><li>Alfonso Reyes</li><li>America No 2</li><li>Arturo B. de la Garza</li><li>Benito Juarez ( F-96)</li><li>Comercial Ampliación Doctores</li><li>Conjunto Habit Loma Larga</li><li>El Maguey</li><li>Fraccionamiento Independencia</li><li>Hacienda San Francisco</li><li>Independencia</li><li>Loma Larga</li><li>Lomas de San Francisco</li><li>Los Doctores</li><li>Los Magueyes</li><li>Nuevas Colonias</li><li>Nuevo Repueblo</li><li>Pio X</li><li>Predio Francisco Zarco</li><li>Sertoma</li><li>Tanque de Guadalupe</li><li>Union de colonos A Reyes</li><li>Union Francisco I Madero</li><li>Union Francisco Zarco</li><li>Union J Carlos Camacho</li><li>Union Loma Larga</li><li>Union Luis Echeverria</li><li>Union Miguel Barrera</li><li>Venustiano Carranza (Loma Larga - Independencia)</li></ul>";
        }
        else if(value == "Médico, Gonzalitos y Obispado"){
            show.innerHTML = "<ul><li>Chepevera</li><li>Deportivo Obispado</li><li>Gonzalitos</li><li>Jardín</li><li>Jardines del Cerro</li><li>Lomas</li><li>Mitras Centro</li><li>Mitras Sur</li><li>Obispado</li><li>Tijerina</li><li>Unidad Aldama Maria Luisa</li></ul>";
        }
        else if(value == "Moderna y Churubusco"){
            show.innerHTML = "<ul><li>Agrícola Acero</li><li>Alamos Corregidora</li><li>Almaguer</li><li>ArgentinaArgentina (Union F Balero Sanchez)</li><li>Churubusco</li><li>Coyoacán</li><li>Del Vidrio</li><li>Fabriles</li><li>Fierro</li><li>Fontanares Churubusco Sur</li><li>Industrial Benito Juarez</li><li>Jardines de Churubusco</li><li>Jardines de la Moderna</li><li>La Reforma</li><li>Las Flores</li><li>Los Fresnos</li><li>Madero (Moderna - Churubusco)</li><li>Madero Norte</li><li>Martinez</li><li>Moderna</li><li>Nueva Madero</li><li>Pablo A. de la Garza</li><li>Parque Industrial Regiomontano</li><li>Predios Industriales</li><li>Privada PinosPrivada Pinos 1 Sector</li><li>Privada Pinos 3 Sector</li><li>Santa Fe</li><li>Tampico</li><li>Venustiano Carranza (Moderna - Churubusco)</li><li>Villas de Linda Vista</li></ul>";
        }
        else if(value == "Puerta de Hierro y Cumbres Elite"){
            show.innerHTML = "<ul><li>Cerrada de Cumbres Sector Miralta 1 Sector</li><li>Cerrada de Cumbres sector Miralta 2°Sector</li><li>Cerradas de Cumbres 1 etapa</li><li>Cerradas de Cumbres 2 etapa</li><li>Cerradas de Cumbres 2 etapa 2 Sector</li><li>Cerradas de Cumbres Norte</li><li>Cerradas de Cumbres Poniente 1 Sector</li><li>Cerradas de Cumbres sector Verona</li><li>Cima de la Montaña</li><li>Cima del Bosque</li><li>Crisanto</li><li>Cumbres Santa Clara 1 Sector</li><li>Cumbres Allegro</li><li>Cumbres Antares 1a. Etapa</li><li>Cumbres Antares 2a. Etapa</li><li>Cumbres Antares 3a. Etapa</li><li>Cumbres Callejuelas 1 Sector</li><li>Cumbres de Santa Clara 4 Sector</li><li>Cumbres del sol 1era. Etapa</li><li>Cumbres del Sol 2da. Etapa</li><li>Cumbres Elite 1 Sector</li><li>Cumbres Elite 2 Sector</li><li>Cumbres Elite 3 Sector</li><li>Cumbres Elite 4 Sector</li><li>Cumbres Elite 5 Sector</li><li>Cumbres Elite 6 Sector</li><li>Cumbres Elite 7 Sector</li><li>Cumbres Elite 8 Sector</li><li>Cumbres Elite Premier Privadas Alpes y Everest</li><li>Cumbres Elite Privadas</li><li>Cumbres Elite Sec La Hacienda</li><li>Cumbres Elite Sector Villas</li><li>Cumbres Jade Sector Alamo</li><li>Cumbres Jade Sector Ebano</li><li>Cumbres Jade Sector Encino</li><li>Cumbres Jade Sector Roble</li><li>Cumbres Jade,Comercial Ruiz Cortines</li><li>Cumbres Le Fontaine 2 Sector</li><li>Cumbres Madeira 1 Sector 1a. Etapa</li><li>Cumbres Madeira 2 Sector</li><li>Cumbres Madeira Frances Sector Alpes</li><li>Cumbres Madeira Sector Frances Priv.Martinica</li><li>Cumbres Madeira Sector Frances Priv.Matisse Seccion A</li><li>Cumbres Madeira Sector Frances Priv.Matisse Seccion B</li><li>Cumbres Madeira Sector Frances Priv. Remi</li><li>Cumbres Madeira Sector Frances Priv.Sena</li><li>Cumbres Oro Le Fontaine</li><li>Cumbres Platino</li><li>Cumbres Providencia</li><li>Cumbres Renacimiento 1 Sector</li><li>Cumbres San Agustin 1 Sector</li><li>Cumbres San Agustin 1 Sector 2a Etapa</li><li>Cumbres San Agustin 2 Sector</li><li>Cumbres San Agustin 2 Sector 1a Etapa</li><li>Cumbres San Agustin 2 Sector 2a Etapa</li><li>Cumbres San Agustin 2 Sector 3a Etapa</li><li>Cumbres San Agustin 2 Sector 4a. Etapa</li><li>Cumbres San Agustin 2 Sector 6a. Etapa</li><li>Cumbres San Agustin 2 Sector 5ta. Etapa</li><li>Cumbres San Agustin 3 Sector</li><li>Cumbres San Agustin 4 Sector 1era.Etapa (Sección B)</li><li>Cumbres San Agustin 4°Sector 1era. Etapa (Sección A)</li><li>Cumbres San Agustin Priv.Italiana y Francesa</li><li>Cumbres San Angel</li><li>Cumbres Santa Clara 2 Sector</li><li>Cumbres Sta Clara 3 Sector</li><li>Desarrollo Comercial Puerta de Hierro</li><li>Espacio Cumbres</li><li>Espacio Cumbres Privada 4 y 5</li><li>Hacienda Santa Clara</li><li>Paseo de Cumbres</li><li>Paseo de Cumbres 1 Sector</li><li>Paseo de Cumbres 2 Sector</li><li>Paseo de Cumbres 3 Sector</li><li>Paseo de Cumbres 4 Sector 1er etapa</li><li>Paseo de Cumbres 4 Sector 2do etapa</li><li>Paseo de Cumbres 4 Sector 3er etapa</li><li>Paseo de Cumbres 4 Sector 4a etapa</li><li>Paseo de Cumbres 4 Sector 5a etapa</li><li>Paseo de Cumbres 4 Sector 6a etapa</li><li>Paseo de Cumbres 4 Sector 7a etapa</li><li>Privadas Cumbres Diamante 1 Sector</li><li>Privadas de Cumbres 1a Etapa</li><li>Privadas de Cumbres 2a Etapa</li><li>Privadas de Cumbres 3a. Etapa (Privada Real)</li><li>Privadas de Cumbres 4a. Etapa (Privada Escondida)</li><li>Puerta de Hierro Ariza,Zaragoza,Aragón,Calatayud, Almazán</li><li>Puerta de Hierro Castilla Privada Cantabria, Burgos,Logroña</li><li>Puerta de Hierro Castilla Privada Palencia, Valladolid, Soria, Segovia</li><li>Puerta de Hierro Castilla, Priv.Alboran</li><li>Puerta de Hierro Linces</li><li>Puerta de Hierro Linces II</li><li>Puerta de Hierro Priv. Las Vistas</li><li>Puerta de Hierro Privada de la Hacienda</li><li>Puerta de Hierro Privada del Balcón</li><li>Puerta de Hierro Privada del Jardín</li><li>Puerta de Hierro Privada del Mirador</li><li>Puerta de Hierro Privada Las Fuentes</li><li>Puerta de Hierro Privada Los Arcos</li><li>Puerta de Hierro Privada Pedregal</li><li>Puerta de Hierro Residencial Privada Gran Vía</li><li>Real de Cumbres 1 Sector</li><li>Real de Cumbres 2 Sector</li><li>Residencial Cumbres Renacimiento 2 Sector 2da. Etapa</li><li>Residencial Cumbres Renacimiento 2 Sector 1a. Etapa</li></ul>";
        }
        else if(value == "Purísima, Alameda, Centro y Fundidora"){
            show.innerHTML = "<ul><li>Acero</li><li>Centro</li><li>Centro (Poniente)</li><li>Condominios Constitución</li><li>Desarrollo Urbano Reforma</li><li>La Finca</li><li>Mirador</li><li>Modelo</li><li>Nuevo Centro de Monterrey</li><li>Obrera</li></ul>";
        }
        else if(value == "San Ángel"){
            show.innerHTML = "<ul><li>La Condesa</li><li>Los Remates</li><li>San Ángel</li><li>Unión Canoas San Ángel Sur</li></ul>";
        }
        else if(value == "San Bernabé"){
            show.innerHTML = "<lu><li>Colina de San Bernabe(F-25)</li><li>Fomerrey 114</li><li>Plutarco Elias Calles 1 - 2</li><li>San Bernabe</li><li>San Bernabe (F-51)</li><li>San Bernabe (F105)</li><li>San Bernabe II (F-120)</li><li>San Bernabe III</li><li>San Bernabe IV(F124)</li><li>San Bernabe IX(F-112)</li><li>San Bernabe Topo Chico</li><li>San Bernabe VIII(F-125)</li><li>San Bernabe X(F-113)</li><li>San Bernabe XII(F-115)</li><li>San Bernabe XIII(F-116)</li><li>San Bernabe XIV(F-109)</li><li>San Bernabe XV(F-119)</li><li>San Martin</li></ul>";
        }
        else if(value == "San Jerónimo, Santa Maria y El Carmen"){
            show.innerHTML = "<ul><li>Balcones de C. San Jeronimo</li><li>Balcones de Galerias</li><li>Balcones del Carmen</li><li>Colinas de San Jeronimo 1 Sector</li><li>Colinas de Liverpool</li><li>Colinas de San Gerardo</li><li>Colinas de San Jeronimo</li><li>Colinas de San Jeronimo 10 Sector</li><li>Colinas de San Jeronimo 11 Sector</li><li>Colinas de San Jeronimo 2 Sector</li><li>Colinas de San Jeronimo 2 Sector 3era Sección</li><li>Colinas de San Jeronimo 3 Sector</li><li>Colinas de San Jeronimo 4 Sector</li><li>Colinas de San Jeronimo 5 Sector</li><li>Colinas de San Jeronimo 6 Sector</li><li>Colinas de San Jeronimo 7 Sector</li><li>Colinas de San Jeronimo 8 Sector</li><li>Colinas de San Jeronimo 9 Sector</li><li>Colinas de San Jeronimo Sector Lomas</li><li>Colinas de San Jerónimo Sector Panorama 2° Sector</li><li>Colinas del Valle 1 Sector 1a. Etapa</li><li>Colinas del Valle 1 Sector 2a. Etapa</li><li>Colinas del Valle 2 Sector 2a. Etapa</li><li>Colinas del Valle 2 Sector 3era etapa</li><li>Colinas Diamante</li><li>Colonial de San Jeronimo 3 Sector</li><li>Colonial San Jeronimo 1 Sector</li><li>Colonial San Jerónimo 2 Sector 1 etapa</li><li>Cumbres del Valle 1era. Etapa</li><li>Cumbres del Valle 2da. Etapa</li><li>Del Carmen</li><li>Dinastías 1 Sector</li><li>Dinastías 2 Sector</li><li>Dinastías 3 Sector</li><li>Hacienda San Jeronimo</li><li>Jardines de San Jeronimo 1 Sector</li><li>Jardines de San Jeronimo 2 Sector</li><li>La Escondida</li><li>La Vereda Privada Residencial</li><li>Las Colinas 1 Sector 1 etapa</li><li>Las Colinas 2 Sector</li><li>Las Colinas 2 Sector etapa 2</li><li>Las Colinas 2 etapa</li><li>Las Colinas 3 Sector (C San Bernardo)</li><li>Las Colinas 3 Sector (C San Felipe)</li><li>Las Colinas 3 etapa</li><li>Las Lajas 1 Sector</li><li>Las Lajas 2 Sector</li><li>Las Lajas 3 Sector</li><li>Lomas de San Jeronimo</li><li>Miravalle</li><li>Misión San Jeronimo</li><li>Monteleon 1 Sector</li><li>Monteleon 2 Sector</li><li>Prados de San Jeronimo</li><li>Real de San Jeronimo</li><li>Residencial San Jeronimo II</li><li>Riberas de San Jeronimo</li><li>Rincon de las Colinas</li><li>Rincon de San Jemo</li><li>Rincon de San Jeronimo</li><li>Rincon de Santa Maria</li><li>Rincon del Valle</li><li>San Jemo 1 Sector</li><li>San Jemo 2 Sector</li><li>San Jemo 3 Sector</li><li>San Jemo 4 Sector Ampliación</li><li>San Jemo 4 Sector Panorama</li><li>San Jemo Sector Aguilas</li><li>San Jemo Sector Cumbres</li><li>San Jemo Sector Tesoro</li><li>San Jeronimo</li><li>Santa Maria</li><li>Sendero San Jeronimo</li><li>Union Cuauhtémoc (San Jerónico, Santa María y El Carmen)</li><li>Valle de San Jeronimo</li><li>Valle de San Jeronimo 2 Sector</li><li>Villas de San Jeronimo</li></ul>";
        }
        else if(value == "Sátelite y Mederos"){
            show.innerHTML = "<ul><li>Balcones de Mederos</il><li>Balcones de Satélite</il><li>Bosques de Satélite</il><li>Ciudad Satélite</il><li>Ciudad Satélite 3 Sector</il><li>Ciudad Satélite 4 Sector</il><li>Ciudad Satélite 5 Sector</il><li>Colinas del SurCortijo del Rio 1 Sector</il><li>Cortijo del Rio 3 Sector</il><li>Cortijo del Rio 4 Sector</il><li>Cortijo del Rio sector La Silla</il><li>Eduardo A. Elizondo</il><li>Estanza Primera Etapa</il><li>Lagos del Bosque</il><li>Lagos del Bosque 1 Sector</il><li>Lomas de Satelite</il><li>Lomas Mederos</il><li>Mederos Campestre</il><li>Pedregal la Silla 1 Sector</il><li>Pedregal la Silla 2 Sector</il><li>Pedregal la Silla 3 Sector 1 etapa</il><li>Pedregal la Silla 3 Sector 2 etapa</il><li>Pedregal la Silla 4 Sector</il><li>PEDREGAL LA SILLA 4 SECTOR 2A.ETAPA B</il><li>PEDREGAL LA SILLA 4 SECTOR 2A.ETAPA A</il><li>PEDREGAL LA SILLA 5 SECTOR 1A.ETAPA</il><li>PEDREGAL LA SILLA 5 SECTOR 2A.ETAPA</il><li>Prados de la Silla 1 Sector</il><li>Privada Villalta Residencial</il><li>Privadas de la Silla</il><li>Privadas del Pedregal</il><li>Privadas del Pedregal 1 Sector</il><li>Privadas del SurResidencial La Hacienda 1 Sector</il><li>Residencial La Hacienda 2 Sector</il><li>Residencial La Hacienda 2 Sector Ampliación</il><li>Residencial La Hacienda 3 Sector</il><li>Residencial La Hacienda 4 Sector</il><li>Residencial Mederos</il><li>Rincon Colonial Mederos</il><li>Santa Sofia</il><li>Satélite 6 Sector Acueducto</il><li>Satélite 6 Sector Acueducto 2 etapa</il><li>Satélite Acueducto 7 Sector</il><li>Satélite Miradores 1 Sector</il><li>Satélite Miradores 2 Etapa</il><li>Torres de Satélite</il><li>Villa las Fuentes</il><li>Villa las Fuentes 1 Sector</il><li>Villa las Fuentes 4 Sector</il><li>Villa las Fuentes 4-5 Sector</il><li>Villa las Fuentes 5 Sector 1 etapa</il><li>Villa las Fuentes 5 Sector 2 etapa</il><li>Villa las Fuentes 5 sector 3 etapa</il><li>Villa las Fuentes 7 Sector 1a. Etapa</il><li>Villa las Fuentes 7 Sector 2a. Etapa</il><li>Villa Sol</il><li>Vistalta 1 Sector</il><li>Vistalta 2 Sector</li></ul>";
        }
        else if(value == "Sierra Ventana"){
            show.innerHTML = "<ul><li>15 de Septiembre</li><li>18 de Marzo</li><li>Balcones del Mirador</li><li>Burocratas Municipales 1 Sector</li><li>Burocratas Municipales 4 Sector</li><li>Los RosalesPaseos Marquez (F-16)</li><li>Revolución Proletaria</li><li>Ruiz Cortines</li><li>Sierra Ventana</li><li>Veinticinco de Marzo ( Sierra Ventana)</li></ul>";
        }
        else if(value == "Solidaridad"){
            show.innerHTML = "<ul><li>Arcos del Sol 7 Sector</li><li>Arcos del Sol 1 Sector</li><li>Arcos del Sol 2 Sector</li><li>Arcos del Sol 3 Sector</li><li>Arcos del Sol 4 Sector</li><li>Arcos del Sol 5 Sector</li><li>Arcos del Sol Elite</li><li>Barrio Acero</li><li>Barrio Alameda</li><li>Barrio Antiguo Cd. Solidaridad</li><li>Barrio Aztlán</li><li>Barrio Chapultepec Norte</li><li>Barrio Chapultepec Sur</li><li>Barrio de la Industria</li><li>Barrio del Parque</li><li>Barrio del Parque 1 Sector 1 Etapa</li><li>Barrio del Parque 2 Etapa</li><li>Barrio del Prado</li><li>Barrio Estrella Norte y Sur</li><li>Barrio Margaritas 1 Sector 1 etapa</li><li>Barrio Margaritas 1 Sector 2 etapa</li><li>Barrio Mirasol l</li><li>Barrio Mirasol ll</li><li>Barrio Moderna</li><li>Barrio Puerta del Sol</li><li>Barrio San Carlos 1 Sector</li><li>Barrio San Carlos 2 Sector</li><li>Barrio San Carlos 3 Sector</li><li>Barrio San Carlos 4 Sector</li><li>Barrio San Luis 1 Sector</li><li>Barrio San Luis 2 Sector</li><li>Barrio San Pedro 1 Sector</li><li>Barrio San Pedro 2 Sector</li><li>Barrio Santa Isabel</li><li>Barrio Topo Chico (Barrio Monterrey 400)</li><li>Fraccionamiento Comercial Barrio Estrella Norte</li><li>Las Estaciones</li><li>Las Plazas</li><li>Privadas de Lincoln</li><li>Reserva Cumbres Sector Pinos</li><li>Reserva Cumbres,Sector Bosques</li><li>Urbi Villa Bonita 1 Sector 2da. Etapa</li><li>Urbi Villa Colonial 1 Sector</li><li>Urbi Villa Colonial 2 Sector</li><li>Urbi Villa del Cedro 1 Sector</li><li>Urbi Villa del Cedro 2 Sector</li><li>Urbi Villa del Rey 1 Sector</li><li>Urbi Villa del Rey 2 Sector</li><li>Villa Bonita 1 Sector</li></ul>";
        }
        else if(value == "Tierra y libertad"){
            show.innerHTML = "<ul><li>21 de Marzo 2 Sector</il><li>C.N.O.P</il><li>Cinco de Mayo(F-93)</il><li>Cuatro de Diciembre</il><li>Diecinueve de Abril</il><li>Diez de Junio</il><li>Flores Magón 3 Sector</il><li>Fomerrey Sector Poniente</il><li>Francisco Gonzalez Bocanegra</il><li>La Amistad</il><li>Las Pedreras Ampliación (F-116)</il><li>Las Pedreras(F-106)</il><li>Lazaro Cardenas</il><li>Loma BonitaLoma Bonita 2 Sector</il><li>Lomas de San Martin</il><li>Madero (Tierra y Libertad)</il><li>Martires de San Cosme</il><li>Plan de San Luis</il><li>Primero de Junio</il><li>Primero de Mayo(F-97)</il><li>Rafael Buelna</il><li>Siete de Noviembre(F-82)</il><li>Tierra y Libertad Sector Centro</il><li>Tierra y Libertad Sector Heroíco</il><li>Tierra y Libertad Sector Norte</il><li>Tierra y Libertad sector Sur</il><li>Unidad Reforma Urbana</il><li>Unión Cuauhtémoc (Tierra y Libertad)</il><li>Villa de San Angel Topo Chico</il><li>Villa Francisco</li></ul>";
        }
        else if(value == "Topo Chico y Penitenciaria"){
            show.innerHTML = "<ul><li>Avila Camacho</li><li>Belisario Dominguez</li><li>Cinco de Mayo</li><li>Constituyentes del 57</li><li>Del Maestro</li><li>Dieciséis de Septiembre</li><li>Ferrocarrilera</li><li>Hogares Ferrocarrileros</li><li>Kenedy</li><li>Lomas de Anahuac</li><li>Los Nogales</li><li>Morelos</li><li>Nueva Morelos</li><li>Nueva Topo Chico</li><li>Pablo Gonzalez</li><li>Plaza Insurgentes</li><li>Residencial Aztlán</li><li>Residencial Raul Rangel Frias</li><li>San JoseSanta Fe Norponiente</li><li>Simon Bolivar</li><li>Topo Chico</li><li>Torres Pravía</li><li>Union Benito Garza Cantú</li><li>Union Benito Juarez</li><li>Union de Fierreros</li><li>Valle del Topo Chico</li><li>Valle Morelos</li></ul>";
        }
        else if(value == "Unidad modelo y Valle de Santa Lucía"){
            show.innerHTML = "<ul><li>Abelardo Zapata</li><li>Carmen Serdán</li><li>Dieciocho de Febrero</li><li>Fray Servando Teresa de Mier(F--6)</li><li>Jardín Modelo</li><li>La Esperanza(Tierra Propia)</li><li>Loma Linda</li><li>Lomas de Villa Alegre</li><li>Lomas Modelo</li><li>Lomas Modelo 2 Sector</li><li>Moctezuma</li><li>Nueva Galicia</li><li>Nueva Modelo(F-8)</li><li>San Angel(F-78)</li><li>Unidad Modelo</li><li>Valle de Santa Lucia (Granja Sanitaria)</li><li>Valle del Topo Chico 6 Sector</li><li>Villa Alegre</li></ul>";
        }
        else if(value == "Valle Alto y El Diente"){
            show.innerHTML = "<ul><li>Aurea</li><li>Bioma</li><li>Bosquencinos 1a. Etapa</li><li>Bosquencinos 2a. Etapa</li><li>Bosquencinos 3a. Etapa</li><li>Bosques de Valle Alto 1 Sector</li><li>Bosques de Valle Alto 2 Etapa</li><li>Bosques de Valle Alto 2 Sector</li><li>Campestre Bugambilias</li><li>Cañada del Sur A.C.</li><li>Coto San Carlos ll</li><li>El Encino</li><li>El Pinito</li><li>El Porton de Valle Alto</li><li>Flor de Piedra</li><li>Flor de Piedra 2 Sector</li><li>Hacienda Los Encinos</li><li>Jardines de Valle Alto</li><li>Lagos 1era. Etapa</li><li>Lagos 2da.Etapa Sector A</li><li>Lagos 2da.Etapa Sector B</li><li>Las Estancias 1 Sector</li><li>Las Estancias 2da. Etapa</li><li>Las Estancias 3 Sector</li><li>Las Jacarandas</li><li>Loma Bonita Residencial Etapa 1</li><li>Loma Bonita Residencial Etapa 2</li><li>Loma Bonita Residencial Etapa 3</li><li>Lomas de Valle Alto</li><li>Lomas del Hipico 1 Sector</li><li>Los Azulejos</li><li>Los Ebanos (antes Rincon de la Estanzuela)</li><li>Los Milagros de Valle Alto</li><li>Los Milagros de Valle Alto 2 Sector</li><li>Manantiales del Diente</li><li>Natura</li><li>Palmares 1 Sector</li><li>Palmares 2 Sector</li><li>Pedregal de Valle Alto</li><li>Portal de Valle Alto</li><li>Privada Valle Alto</li><li>Real de la Sierra</li><li>Real de Valle Alto 1 Sector</li><li>Real de Valle Alto 2 Sector</li><li>Real de Valle Alto 3 Sector</li><li>Rincón de las Montañas</li><li>Rincón de los Ahuehuetes</li><li>Rincón de los Encinos</li><li>Rincón de Sierra Alta</li><li>Rincón de Valle Alto</li><li>San Gabriel (Valle Alto)</li><li>San Michelle</li><li>Sierra Alta 1era. Etapa</li><li>Sierra Alta 2o. Sector</li><li>Sierra Alta 3er. Sector</li><li>Sierra Alta 4o. Sector</li><li>Sierra Alta 5o. Sector</li><li>Sierra Alta 6o. Sector</li><li>Sierra Alta 9 Sector Etapa 4</li><li>Sierra Alta 9 Sector Etapa 2</li><li>Sierra Alta 9°Sector Etapa 3</li><li>Sierra Alta10 Sector, Etapa 1</li><li>Trino Residencial</li><li>Valle de Bosquencinos 1a. Etapa</li><li>Valle de Bosquencinos 2a. Etapa</li><li>Valle de Bosquencinos 3a. Sector</li><li>Villas Monarca</li></ul>";
        }
        else if(value == "Valle de Infonavit y Valle Verde"){
            show.innerHTML = "<ul><li>Colonial Cumbres</li><li>Cumbres Oro Residencial</li><li>Cumbres Oro Sector Regency</li><li>Cumbres Quinta Real</li><li>Francisco Garcia Naranjo(INDECO)</li><li>Francisco Garcia Naranjo(PROVILEON)</li><li>Hacienda Mitras</li><li>Hacienda Mitras 1 Etapa</li><li>Hacienda Mitras 2 Etapa</li><li>Hacienda Mitras 4 Sector</li><li>Jardines de las Cumbres</li><li>La Esperanza</li><li>Los Altos</li><li>Los Cedros</li><li>Mirador de las Mitras</li><li>Mirador de las Mitras 2 Sector</li><li>Mirador de las Mitras 3 Sector</li><li>Mirador de las Mitras 4 Sector 1 etapa</li><li>Mirador de las Mitras 4 Sector 2 etapa</li><li>Misión Cumbres 2 Sector</li><li>Misión de las Cumbres</li><li>Pedregal Cumbres 1 Sector</li><li>Pedregal Cumbres 2 Sector</li><li>Pedregal Cumbres 3 - 4 Sector</li><li>Portal de Cumbres 1 Sector 2a. Etapa</li><li>Portal de Cumbres 1 Sector 3a Etapa</li><li>Portal de Cumbres 2 Sector 1 Etapa</li><li>Portal de Cumbres 2 Sector 2 Etapa</li><li>Portal de Cumbres 3 Sector</li><li>Portal de San Antonio 1 Sector 1 Etapa</li><li>San JorgeValle de Infonavit 1 Sector</li><li>Valle de Infonavit II</li><li>Valle de las Cumbres</li><li>Valle de las Cumbres 2 Sector</li><li>Valle de las Mitras</li><li>Valle de los Cedros</li><li>Valle del Infonavit</li><li>Valle Verde 1 Sector</li><li>Valle Verde 2 Sector (Sección Sur)</li><li>Valle Verde 3 Sector Oriente</li><li>Valle Verde 3 Sector Poniente</li><li>Villa Cumbres 1 Sector</li><li>Villa de Cumbres 2 Sector</li><li>Villa Dorada</li><li>Villa Dorada (Manzana 18 - 24)</li></ul>";
        }
        else if(value == "Villa Mitras"){
            show.innerHTML = "<ul><li>Alvaro Obregón</li><li>Balcones de las Mitras 1 Sector 1 Etapa</li><li>Balcones de las Mitras 2 Sector</li><li>Balcones de las Mitras 4 Sector Etapa 1</li><li>Balcones de las Mitras 4 Sector Etapa 2</li><li>Balcones de las Mitras 5 Sector San Felipe</li><li>Balcones de las Mitras Sector Monarcas</li><li>Bortoni</li><li>Cerritos Modelo(F-76)</li><li>Colinas de Valle Verde</li><li>Colinas de Valle Verde 3 Sector</li><li>Condocasa Mitras</li><li>Cumbre AltaCumbre Alta 2 Sector</li><li>Esperanza o Peña Elizondo</li><li>Felipe AngelesFidel Velazquez (S.N.A.T.)</li><li>Genaro Vazquez Rojas</li><li>Lomas de Cumbres</li><li>Lomas de Cumbres 2 Sector</li><li>Lomas de Santa Cecilia</li><li>Lomas Modelo Norte</li><li>Madre Selva</li><li>Misión Lincoln</li><li>Misión Lincoln 2 Sector</li><li>Misión Lincoln 3 Sector</li><li>Mitra Dorada</li><li>Paseo de las Mitras</li><li>Paso del Aguila</li><li>Quince de Marzo</li><li>Rincon Santa Cecilia</li><li>San Francisco de Asis</li><li>Santa Cecilia</li><li>Santa Cruz(F-10)</li><li>Valle Verde 2 Sector (Sección Norte)</li><li>Villa Mitras</li><li>Villa Mitras 5 Sector</li><li>Villa Santa Cecilia</li><ul>";
        }
        else {
            show.innerHTML = "";
        }
        }
	</script>
</body>
</html>