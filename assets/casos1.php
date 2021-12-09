 
<!-- 
    Inicio de tabla con AJAX
-->      
<table class="mt-4" id="datatable">
            <thead>
            <?php 
            $dia=($_REQUEST['dia']);
            $sucu=($_REQUEST['obtener']);
            ?>
              <tr>
              <?php
                //inicializacion de variables de la tabla            
                $nom1="Quito";
                $nom2="Cuenca";
                $nom3="Guayaquil";
                
                //colocar cabecera de la tabla
                //filtrado por provincia de la cabecera
                if($sucu=='Quito'){
                  echo"<th></th>";
                  echo"<th>$nom1</th>";
                }
                if($sucu=='Cuenca'){
                  echo"<th></th>";
                  echo"<th>$nom2</th>";
                }
                if($sucu=='Guayaquil'){
                  echo"<th></th>";
                  echo"<th>$nom3</th>";
                }
                if($sucu=='Todas' OR $sucu=='Selec'){
                  echo"<th></th>";
                  echo"<th>$nom1</th>";
                  echo"<th>$nom2</th>";
                  echo"<th>$nom3</th>";
                }
                   ?>
              </tr>
            </thead>
            <tbody>

            <?php
               //filtrar datos por columnas y provincias
                $archivo = "datos.csv";
                $vc1;
                $vc2;
                $vc3;

              if($sucu===Quito){
                $cont=-2;
              for($i=1;$i<=31;$i++){
                $cont=$cont+3;
                if($dia==$i){

                  $vc1=$cont;
                }
              }
            }
            if($sucu===Cuenca){
              $cont=-1;
            for($i=1;$i<=31;$i++){
              $cont=$cont+3;
              if($dia==$i){

                $vc1=$cont;
              }
            }
          }
          if($sucu===Guayaquil){
            $cont=0;
          for($i=1;$i<=31;$i++){
            $cont=$cont+3;
            if($dia==$i){

              $vc1=$cont;
            }
          }
        }
        
        if($sucu===Todas OR $sucu===Selec){
          $cont1=-2;
          $cont2=-1;
          $cont3=0;
        for($i=1;$i<=31;$i++){
          $cont1=$cont1+3;
          $cont2=$cont2+3;
          $cont3=$cont3+3;
          if($dia==$i){
         

            $vc1=$cont1;
            $vc2=$cont2;
            $vc3=$cont3;

          }
        }
      }

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
                      case $vc1: //Segunda columna es de Quito
                        ?>
                        <td><?php echo $csv_line[$i] ?></td>
                        
                        <?php
                       
                        break;
                      case $vc2: //Tercera columna es de Cuenca
                        ?>
                        <td><?php echo $csv_line[$i] ?></td>
                        
                        <?php  

                        break;
                      case $vc3: //Cuarta columna es de Guayaquil 
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


