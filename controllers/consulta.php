<?php
session_start();
/* 
Documentacion:
      https://cloud.ibm.com/apidocs/visual-recognition/visual-recognition-v3

Notas errores en el camino:
     -Typos, siempre revisar bien la URL.
     -Intente enviarle headers al curl cuando tuve error 401 y no funciono solo funcionó con CURLOPT_USERPWD.
     -Tenia error de autorizacion pero me sali de ibm por error volvi a entrar y ahi si funcionó---- ????

Guias:     
     https://stackoverflow.com/questions/57103747/how-to-set-apikey-in-php-curl-call-to-ibm-natural-language-understanding
     https://stackoverflow.com/questions/49589780/how-to-convert-ibm-watson-curl-commands-to-php
 */ 


 if(isset($_POST['submit']) || isset($_POST['imagen']) ){


     $imagen = $_POST['imagen']; 
     // echo $imagen;

     //LA APIKEY ENVIADA POR ACA NO LA RECONOCE SE PUEDE QUITAR!!
     $url = 'https://gateway.watsonplatform.net/visual-recognition/api/v3/classify?api_key=CoKh1p1CiJMm_DC2hFva_09ii0-073sPhyk2k82Y9JCP&version=2018-03-19';

     $apiKey= "YOUR API KEY HERE";

     $image_url = '&url='.$imagen;

     //Hay tipos de clasifier como: comida, con default saca todos
     $classifier = '&classifier_ids=default';

     // Para que muestre un rango de score 0 es todo
     $threshold = '&threshold=0';

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url); 
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_POST, 1); 
     curl_setopt($ch, CURLOPT_POSTFIELDS, $image_url . $classifier . $threshold); 
     //SIN ESTA MIERDA NO FUNCIONA, ACA ES DONDE RECONOCE LA APIKEY, SIN ESTO TIRA 401
     curl_setopt($ch, CURLOPT_USERPWD, 'apikey:' . $apiKey);
     

     $result = curl_exec($ch);

     if (curl_errno($ch)) {
     echo 'Error: ' . curl_error($ch);
     }

     curl_close ($ch);

     //Convierto el resultado en objeto
     $objeto = json_decode($result, true);

     // Verifico el resultado
     if(isset($objeto['images'][0]['error'])){
          //En caso de haber algo mal con la imagen el json vuelve con un error
          // echo 'Ahora si la cagamos';
          $_SESSION['resultado']= 'Error';
          header("Location: ../views/respuesta.php");
          
     }
     else{
          //La respuesta siempre tienen estos 3 primeros niveles asi que envio solo lo que esta adentro
          $resultados = $objeto['images'][0]['classifiers'][0]['classes'];
          $_SESSION['resultado']= $resultados;
          $_SESSION['imagen'] = $imagen;
          header("Location: ../views/respuesta.php");
     }
 }
 else{
      header("Location: ./index.html");
 }