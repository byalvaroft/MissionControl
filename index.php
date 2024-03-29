<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Apollo Airways</title>

  <!-- Estilos CSS -->
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.css">
  <link href=" https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Modal para el video -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen="always" allowscriptaccess="always" allow="autoplay"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="PrincipalAdaptativo">
    <div id="container">
      <!-- Botones de registro y acceso -->
      <a class="login_button" href="register.php">Register</a>
      <a style="right: 12%" class="login_button" href="login.php">Login</a>

      <!-- Título principal -->
      <h1>Apollo Airways</h1>

      <!-- Efecto parallax -->
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
        <!-- Imágenes de la primera fila -->
        <div class="row">
          <div id="columna1" class="col-md-4">
            <a href="">
              <img class=logosTripleMenu src="src/logos/placeholder1.png" alt="">
            </a>
          </div>
          <div id="columna2" class="col-md-4">
            <img class=logosTripleMenu src="src/logos/experiencia.png" alt="">
            <button type="button" class="btn btn-primary video-btn" data-toggle="modal" value="Vive la experiencia" data-src="https://www.youtube.com/embed/21X5lGlDOfg" data-target="#myModal">Vive La Experiencia</button>
          </div>
          <div id="columna3" class="col-xs-12 col-md-4">
            <a href="">
              <img class=logosTripleMenu src="src/logos/placeholder3.png" alt="">
            </a>
          </div>
        </div>
        <!-- Fila con slider de imágenes y texto -->
        <div class="row">
          <div style="background-color: transparent" id="zonaimagen" class="col-xs-12 col-md-6">
            <div style="background-color: transparent" class="slider"></div>
          </div>
          <div id="zonatexto" class="col-md-6">
            <img class="columna2" src="src/placeholdercolumna2.png" alt="">
          </div>
        </div>

        <!-- Fila con carrusel de imágenes y sección final -->
        <div class="row">
          <div id="footer" class="col-xs-12">
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

            <!-- Sección final con mensaje y botón -->
            <div style="background-color: black; height: 600px">
              <div class="text-center">The trip of your life time</div>
              <a style="right: 45%; top: 80%;" class="login_button" href="login.php">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fila con slider de imágenes y texto -->
    <div class="row">
      <div style="background-color: transparent" id="zonaimagen" class="col-xs-12 col-md-6">
        <div style="background-color: transparent" class="slider"></div>
      </div>
      <div id="zonatexto" class="col-md-6">
        <img class="columna2" src="src/placeholdercolumna2.png" alt="">
      </div>
    </div>

    <!-- Fila con carrusel de imágenes y sección final -->
    <div class="row">
      <div id="footer" class="col-xs-12">
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

        <!-- Sección final con mensaje y botón -->
        <div style="background-color: black; height: 600px">
          <div class="text-center">The trip of your life time</div>
          <a style="right: 45%; top: 80%;" class="login_button" href="login.php">Book Now</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Scripts JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30
  d7ea4c6877eb615f89387.js"></script>
  <script src='https://code.jquery.com/jquery-3.1.1.slim.min.js'></script>
  <script src='https://cdn.rawgit.com/JacobLett/bootstrap4-latest/master/bootstrap-4-latest.min.js'></script>

  <script>
    // Función de alerta para elementos en construcción
    function alerta() {
      alert("En Construcción!");
    }

    // Función para manejar la reproducción del video en el modal
    $(document).ready(function() {
      var $videoSrc;
      $('.video-btn').click(function() {
        $videoSrc = $(this).data("src");
      });
      console.log($videoSrc);

      // Al mostrar el modal, se reproduce el video
      $('#myModal').on('shown.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
      });

      // Al ocultar el modal, se detiene el video
      $('#myModal').on('hide.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc);
      });
    });
  </script>
</body>

</html>