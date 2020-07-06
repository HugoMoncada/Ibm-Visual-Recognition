# visualRecognitionPHP
 
!IMPORTANTE: Se necesita api key de IBM.
 
Descripción:
   Aplicación web creada con HTML, CSS Y PHP, que permite mostrar de una forma visual e intuitiva el resultado de consultar el servicio de
   reconocimiento de imágenes (IBM watson visual recognition) al pasarle a la interfaz una url de una imagen lo cual dará como resultado una tabla
   con la respuesta dada por IBM watson visual recognition y también permite tomar una foto y enviarla al ibm watson recognition system retornando una respuesta.
 
Requisitos para su uso:
       -Xammp.
         -Conexión a internet para mostrar la interfaz por medio de cdn de Bootstrap.
 
Pasos:
   1. Copiar la carpeta "IbmImagePhp" encontrada en el archivo .zip dentro de la carpeta htdocs de Xampp.
       -En la carpeta dentro de controllers en consulta.php ingresar tu api key
   2. Inicializar Xammp.
   3. Abrir una nueva pestaña en su navegador y buscar la ruta "http://localhost/IbmImagePhp/"
   4. Una vez abierta la interfaz pegar una url correspondiente a una imagen en el campo.
       -De querer tomar una captura dirigirse a la pestaña en la parte superior "Tomar Foto".
   5. Presionar el botón consultar. (La respuesta puede demorar un par de segundos).
   6. En caso de que la imagen se pueda usar se observan
       los resultados obtenidos por el servicio en una tabla junto con la imagen enviada.
       De no ser así se encontrar con una mensaje de error, en este caso volvemos a la página
       principal e intentamos con otra imagen por ejemplo:
       https://www.acueducto.com.co/guatoc/Archivos/resources/seccion_gerente/images/Swan_large.jpg
   7. Tambien puedes tomar una foto desde la cámara de tu computador en la pestaña "tomar foto", la foto
      tomada se enviará al servicio de IBM y retorna una respuesta igual que con una imagen sacada de internet.


	
	
