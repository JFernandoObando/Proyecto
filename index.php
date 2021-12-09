<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Proyecto</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <link rel="stylesheet" href="assets/css/calendar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script src="assets/js/highcharts.src.js"></script>
<script src="assets/js/data.src.js"></script>
<script src="assets/js/exporting.src.js"></script>
<script src="assets/js/accessibility.src.js"></script>
<script src="assets/js/export-data.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<body>
   <!--
   Inicio de navbar
   -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">ACSO</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tabla
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" id="plain">Plano</a></li>
            <li><a class="dropdown-item" id="inverted">Invertido</a></li>
            <li><a class="dropdown-item" id="polar">Pastel</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Exportar
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" id="botonpng">PNG</a></li>
            <li><a class="dropdown-item" id="botonpdf">PDF</a></li>
            <li><a class="dropdown-item" id="botoncsv">CSV</a></li>
          </ul>
        </li>
       
        </ul>
        <form class="d-flex">
          <!--
          Boton de Login
          -->
          <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@getbootstrap">Log in</button>


          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header-center">
                  <div class="float-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <h5 class="modal-title text-center" id="exampleModalLabel">Iniciar Sesion</h5>

                </div>
                <div class="modal-body">
                  <form>
                    <div class="mb-3">
                      <label for="recipient-name" class="col-form-label">Usuario:</label>
                      <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">Contraseña:</label>
                      <input type="password" class="form-control" id="message-text">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Ingresar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--
        Final de Login
      -->



    </div>
  </nav>
  <!--
      Final de navbar
  -->


  <!--
    Inicio de la Gráfica
  -->

  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <figure class="highcharts-figure">
          <div id="ad"></div>
          <div class="row">
            <div class="col text-center">
              <button  class="btn btn-outline-dark" id="plain2">Plano</button>
              <button  class="btn btn-outline-dark" id="inverted2">Invertido</button>
              <button  class="btn btn-outline-dark" id="polar2">Pastel</button>
            </div>
        </div>
        

        <!--
          Inicio de tabla
        -->
        <div id="tabla">
         <table class="table table-striped table-hover" id="datatable">
            <thead>
              
              <tr>
            
              <!--
            Inicializacion de variables de la tabla
             -->

              <?php
                $nom1="Quito";
                $nom2="Cuenca";
                $nom3="Guayaquil";
                echo"<th></th>";
                echo"<th>$nom1</th>";
                echo"<th>$nom2</th>";
                echo"<th>$nom3</th>";
                   ?>
              </tr>
            </thead>
            <tbody>

           
            <?php
                //Declaracion de la variable del archivo .csv
                $archivo = "assets/datos.csv";

              //Ingresamos valores a la tabla

              // Abrir archivo a procesar
              $fp = fopen($archivo,'r') or die("No se puede abrir el archivo");
              
              //Leer linea por linea
              while($csv_line = fgetcsv($fp,0,",")) {
                  //Procesar con un for, cada columna en esta fila
                  for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                    switch ($i) {
                      case 0: //Primera columna es de productos
                        ?>
                        <tr>
                        <th><?php echo $csv_line[$i];?></th>
                        <?php 
                        
                        break;
                      case 1: //Segunda columna es de Quito
                        ?>
                        <td><?php echo $csv_line[$i] ?></td>
                        
                        <?php
                       
                        break;
                      case 2: //Tercera columna es de Cuenca
                        ?>
                        <td><?php echo $csv_line[$i] ?></td>
                        
                        <?php  

                        break;
                      case 3: //Cuarta columna es de Guayaquil 
                        ?>
                        <td><?php echo $csv_line[$i] ?></td>
                        </tr>
                        <?php
                       
                        break;
                        
                      default:
                        break;
                    }
                  }
              }
              fclose($fp) or die("Error al cerrar el archivo");
                  ?>
            
              
            </tbody>
          </table>
          <!-- 
            Final de la tabla
          -->

        </figure>
        <!-- 
            Botones de exportacion
          -->
        <div class="row">
            <div class="col text-center mb-3">
              <button class="btn btn-outline-dark" id="botonpng2">PNG</button>
              <button  class="btn btn-outline-dark" id="botonpdf2">PDF</button>
              <button  class="btn btn-outline-dark" id="botoncsv2">CSV</button>
          </div>
        </div> 
        
      </div>
      
      <!-- 
         Filtracion de datos
      -->
      <div class="col ms-5 mt-4">
      <h3 class="text-center">Filtrar Datos</h3>

      <div class="card mb-3" style="max-width: 100%;">        
      <select  class="form-select" id="cat" aria-label="Default select example">
        <option value="Selec">Seleccione Sucursal</option>
        <option value="Todas">Todas</option>
        <option value="Quito">Quito</option>
        <option value="Cuenca">Cuenca</option>
        <option value="Guayaquil">Guayaquil</option>
      </select> 

            </div>
        <div class="root">
        <div class="calendar" id="calendar">        
        </div>
      
      </div>

  </div>

  </div>

  </div>
  
  <!-- 
     Librerias del calendario
  -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
  <script type="text/javascript" src="assets/js/calendar.js"></script>
  <script type="text/javascript">

    let calendar = new Calendar('calendar');
    var a = document.getElementById("cat");
    var obtener;
    a.onchange=function(){
        console.log(a.value);
        obtener=a.value;
      }

    //Escoger dia del mes
    calendar.getElement().addEventListener('change', e => {
   
    console.log(obtener);
    let dia=calendar.value().format('D');
    //Llama AJAX con la estructura de jquery
      $("#tabla").load("assets/casos1.php",{dia,obtener});
    });
  

  </script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
</body>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript" src="assets/js/script.js"></script>

<!-- 
    Inicio de footer 
-->
<footer class="bg-light text-center text-dark">

        <div class="container  p-1 pb-0">
          
       
 
      
        <!-- Copyright -->
        <div class="text-center p-3">
          © 2021 Copyright:
          <a class="refe" href="#">ACSO</a>
        </div>
        <!-- Copyright -->
      </footer>   
<!-- 
    Final de footer 
-->

  </div>
</html>