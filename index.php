<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Apollo Airways</title>

  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href=" https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.css">

</head>

<body>



  
   <!-- Modal -->
   <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
  
        
        <div class="modal-body">
       
          <!-- 16:9 aspect ratio -->
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen="always" allowscriptaccess="always" allow="autoplay"></iframe>
  </div>
          
          
        </div>
  
      </div>
    </div>
  </div> 
    
    
    
  </div>
  


  <div id="PrincipalAdaptativo">

    <div id="container">
        <a class="login_button" href="login.php">Entrar</a>

      
    <h1>Apollo Airways</h1>

      <div class="areaParallax ">
        <video id="videoFondo" class="section" playsinline autoplay muted poster="src/capas/capa1.png">
          <source src="src/capas/capa1.mp4" type="video/webm">
          Your browser does not support the video tag.
        </video>
        <div class="section capa2"></div>
        <div class="section capa3"></div>
        <div class="section capa4"></div>
        <div class="section capa5"></div>
        <div class="section capa6"></div>
        <div class="section capa7"></div>
      </div>

      <div id="todoSalvoParalax">
        <div class="row">
          <div id="columna1" class="col-md-4">
            <a href="">
            <img class=logosTripleMenu src="src/logos/placeholder1.png" alt="">
            </a>
          </div>
          <div id="columna2" class="col-md-4">
          <img class=logosTripleMenu src="src/logos/experiencia.png" alt="">

           <!-- Button trigger modal -->
           <button type="button" class="btn btn-primary video-btn" data-toggle="modal" value="Vive la experiencia" data-src="https://www.youtube.com/embed/21X5lGlDOfg" data-target="#myModal">Vive La Experiencia</button>
            
          </div>

          <div id="columna3" class="col-xs-12 col-md-4">
            <a href="">
            <img class=logosTripleMenu src="src/logos/placeholder3.png" alt="">
          </a>
          </div>
        </div>
        <div class="row">
          <div id="zonaimagen" class="col-xs-12 col-md-6">



            <div class="slider"></div>


          </div>

          <div id="zonatexto" class="col-md-6">
            <img class="columna2" src="src/placeholdercolumna2.png" alt="">
          </div>
        </div>
        <div class="row">


         
          <div id="footer" class="col-xs-12">
          

            


            <div class="row">

          
              <video width="100%" controls src="src/aunnoexiste.mp4" poster="src/FondoVideo.png"></video>

             
              
            </div>



              <div id="carousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="src/carousel/placeholder-cohete.gif" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="src/carousel/placeholder-iss.gif" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="src/carousel/placeholder-alien.gif" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </button>
              </div>


              <div id="placeholderabajo">
                <img src="src/placeholderabajo.png" style="width: 100%" alt="">
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>

  


    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>

      <script src='https://code.jquery.com/jquery-3.1.1.slim.min.js'></script>


    <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>
          <script id="rendered-js" >


    function alerta() {
      alert("En Construcción!");
    }





    $(document).ready(function () {
    
      // Cojer los datos del video del boton
    
      var $videoSrc;
      $('.video-btn').click(function () {
        $videoSrc = $(this).data("src");
      });
      console.log($videoSrc);
    
    
    
      // Autoplay el video al abrir modal
      $('#myModal').on('shown.bs.modal', function (e) {
    
      // No mostrar relacionados y autoreproducir
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
      });
    
    
    
      // Parar el video al clickar fuera
      $('#myModal').on('hide.bs.modal', function (e) {

        $("#video").attr('src', $videoSrc);
      });
    
    });

        </script>
    
    
</body>

</html>