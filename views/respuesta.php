<?php
session_start();
echo'
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/styles.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet"> 
     <title>Document</title>
</head>
<body>';
     
if(isset($_SESSION['resultado'])){

     $resultado = $_SESSION['resultado'];

     if($resultado== 'Error'){
          
          echo '
          <div class="container text-center pt-5">
               <h1>ERROR</h1>
               <p>La url proporcionada no es valida o no se puede acceder a la imagen.</p>
               <a href="../index.html">Volver</a>
          </div>
          ';   
     }
     else{
          echo '
          <div class="container text-center pt-3">
               <h1 class="mb-4">RESULTADOS</h1>
               <img src='.$_SESSION["imagen"].' alt="Img enviada" class="img-fluid mb-4">     
               
               <table class="table table-striped table-bordered text-white mb-3">
               <thead class="table-head">
               <tr class="text-uppercase font-weight-bold">
                    <th scope="col">Class</th>
                    <th scope="col">Score</th>
                    <th scope="col">Type</th>
               </tr>
               </thead>
               <tbody>';


               // print_r($resultado);
               for ($i=0; $i < sizeof($resultado) ; $i++) { 
                         # code...
                         echo '<tr>';

                             echo ' <td>'. $resultado[$i]["class"] .' </td>';
                             echo ' <td>'. $resultado[$i]["score"]*100 .'% </td>';

                              if(isset($resultado[$i]["type_hierarchy"]))
                              echo ' <td>'.   $resultado[$i]["type_hierarchy"] .' </td>';    
                              else{
                                   echo ' <td> - </td>'; 
                              }

                        echo '</tr>'; 
               }
               

         
             echo'
               </tbody>
               </table>


               <a href="../index.html"class="btn btn-primary btn-lg btn-block">Volver</a>

          </div>';
     }


}
else{
     header("Location: ../index.html");
}
echo'</body>
</html>
';

session_destroy();
