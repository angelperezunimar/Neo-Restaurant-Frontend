<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neo Restaurant</title>
    <link rel="shortcut icon" href="public/img/icon.ico">
    <link rel="stylesheet" href="/NeoRestaurante/public/css/bootstrap.css">
    <link rel="stylesheet" href="public/Glider.js-master/glider.min.css">
    
    <style>
       @font-face {
      font-family: montserrat;
      src: url(/NeoRestaurante/public/Fonts/Montserrat/static/Montserrat-Regular.ttf);
    }

    body {
      font-family: 'montserrat';
      background-image: url(/NeoRestaurante/public/img/fondoteraro.jpg);
      background-color: rgb(217, 213, 213);
      background-size: cover;
      background-position: center;
      margin: 0; 
    }

    #Navbar {

      width: 100%; 
      margin: 0; 
      padding: 0; 
      position: sticky;
      top: 0;
      left: 0;
      z-index: 100;
      background-color: #fff; 
    }

    #navbarNav{
          padding-left: 24%;
        font-size: 95%;
        
      }
      #navbar{
        width: 100%;
      }
      
      #item{
        margin-left: 3%;
        padding-left: 5%;
        
      }


    #modal {
      margin-top: 8%;
      margin-right: 50%;
      size: unset;
    }

    #message {
      padding-top: 5%;
      padding-bottom: 5%;
      padding-left: 8%;
      padding-right: 18%;
    }

    .slider-contenido {
      margin-top: 8%;
      margin-left: 10%;
      margin-right: 10%;
      overflow: hidden;
    }
    .slider-elemento{
      padding-left: 0.5%
    }

    .left,
    .right {
      background: none;
      display: block;
      width: 30px;
      height: 30px;
      border: none;
      cursor: pointer;
      background-color: none;
      color: #ffffff;
      opacity: 20%;
    }

    .left {
      position: absolute;
      top: 74%;
      left: 30px;
      padding-top: 10%;
    }

    .right {
      position: absolute;
      top: 74%;
      right: 30px;
      padding-top: 10%;
    }

    .left:hover,
    .right:hover {
      opacity: 100%;
    }
    .slider-elemento{
      font-size: 120%;
    }

    .slider-indicadores .glider-dot{
      display: block;
      width: 30px;
      height: 4px;
      background: #646464;
      opacity: 50%;
      border-radius: 0;
    }
    .slider-indicadores .glider-dot:hover{
      opacity: 100%;
      background-color: #301f14;
      opacity: 65%;
    }
   
    </style>
</head>
<body >
  <div id="Navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-white" >
      <div class="container-fluid" id="Nav-bar">
              <div class="navbar-brand d-flex"  style="align-items: center; margin-left: 3%; cursor:pointer" onclick="location.href='#index'"  >
                <img src="./public/img/neo-favicon-white.svg" alt="Logo" width="85" height="85" class="d-inline-block align-top">
                <span class="ms-2 fs-6 fw-bold text-uppercase">Neo Restaurant</span>
              </div>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item" id="item">
                      <a class="nav-link" aria-current="page" href="./views/menu" >Menú</a>
                  </li>
                  <li class="nav-item" id="item">
                      <a class="nav-link" href="./views/reservation">Reserva</a>
                  </li>
                  <li class="nav-item" id="item">
                      <a class="nav-link" href="./views/we">Nosotros</a>
                  </li>
                  <li class="nav-item" id="item">
                      <a class="nav-link" href="./views/contactus">Contacto</a>
                  </li>
                  <li class="nav-item" id="item"  style="white-space: nowrap;">
                    <a id="titleusers" class="nav-link" href="./views/Auth/login">Iniciar Sesión</a>
                </li>
                </ul>
              </div> 
      </div>
  </nav>
  </div>

  <div class="row" id="modal" style="Opacity: 95%;">
    <div class="col-md-11 mx-auto row-8" id="cont"> 
        <div class="card bg-white rounded-5 card-body  shadow-lg p-3 bg-body rounded" style="border-color: #dedede;" id="Contenedor">
          <div id="message">
            <h1 class="" style="font-size: 230%; padding-bottom: 3%;"><b>Neo Membresía</b></h1>
        <p style="font-size: 110%; padding-bottom: 3%; ">
          Obtén una membresía única de por vida <br>que te otorgara atención preferencial,<br>
          acceso a áreas únicas y<br> otros beneficios
        </p>
        <div class="text-center col-md-6">
          <button type="button" class="btn btn-lg rounded-4" onclick="location.href='./views/membership.php'" style="margin-left: 0%;background-color:#301f14; width: 110%; border-radius: 0; color:white; font-size: 105%; ; "><b>Obtener membresía</b></button>
      </div>
          </div>
    </div>
</div>
</div>

<!--el slider-->

<div class="slider" style="background-color:  rgb(0, 0, 0)">
  <div class="slider-contenedor ">
    <button aria-label="prueba" class="left" style="padding-top: 20%;">
      <img src="/NeoRestaurante/public/fontawesome-free-6.5.1-web/svgs/solid/chevron-left.svg" alt=""> 
    </button>
      <div class="slider-contenido" style="padding-top: 3%;">
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo1.jpg" alt="">
          <p style="color: #dedede; text-align: center;"><b>Platillo 1</b></p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo2.jpg" alt="">
          <p style="color: #dedede; text-align: center;"><b>Platillo 2</b></p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo3.jpg" alt="">
          <p style="color: #dedede; text-align: center;"><b>Platillo 3</b></p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo4.jpg" alt="">
          <p style="color: #dedede; text-align: center;"><b>Platillo 4</b></p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo1.jpg" alt="">
          <p style="color: #dedede; text-align: center;">prueba</p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo1.jpg" alt="">
          <p style="color: #dedede; text-align: center;">prueba</p>
        </div>
        <div class="slider-elemento">
          <img src="/NeoRestaurante/public/img/platillo1.jpg" alt="">
          <p style="color: #dedede; text-align: center;">prueba</p>
          </div>
        </div>
        
        <button aria-label="prueba" class="right" style="padding-top: 20%">
          <img src="/NeoRestaurante/public/fontawesome-free-6.5.1-web/svgs/solid/chevron-right.svg" alt="">
        </button>
      </div>

    

</div>
  <div role="tablist" class="slider-indicadores" style="background-color: #000000;"></div>
  
</div>
  

 
 
<script src="/NeoRestaurante/public/fontawesome-free-6.5.1-web/js/fontawesome.js"></script>  
<script src="/NeoRestaurante/public/Glider.js-master/glider.min.js"></script>   
<script src="/NeoRestaurante/public/js/bootstrap.js"></script>
<script src="/NeoRestaurante/public/Scripts/slider.js"></script>

</body>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
</html>
