<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Tenis</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" crossorigin="anonymous" />
  <!-- BOX ICONS -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- APP JS -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/cart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Verificar si el usuario ha iniciado sesión
      fetch('php/check_login.php')
        .then(response => response.json())
        .then(data => {
          var isLoggedIn = data.loggedin;
          var loginButton = document.getElementById('login-button');
          var registerButton = document.getElementById('register-button');
          var logoutButton = document.getElementById('logout-button');

          if (isLoggedIn) {
            loginButton.style.display = 'none';
            registerButton.style.display = 'none';
            logoutButton.style.display = 'block';
          } else {
            loginButton.style.display = 'block';
            registerButton.style.display = 'block';
            logoutButton.style.display = 'none';
          }
        })
        .catch(error => console.error('Error:', error));

      // Cerrar sesión
      document.getElementById('logout-button').addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
          title: 'Cerrar sesión',
          text: "¿Está seguro de que desea cerrar sesión?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, cerrar sesión',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            fetch('php/logout.php')
              .then(response => response.json())
              .then(data => {
                if (data.status === 'success') {
                  Swal.fire({
                    icon: 'success',
                    title: 'Sesión cerrada',
                    text: 'Has cerrado sesión con éxito.',
                    confirmButtonText: 'Aceptar'
                  }).then(() => {
                    window.location.reload();
                  });
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo cerrar la sesión.',
                    confirmButtonText: 'Aceptar'
                  });
                }
              });
          }
        });
      });

      // Agregar productos al carrito
      document.getElementById('buy-tennis-one').addEventListener('click', function () {
        addToCart('Tenis Nike Air Max', 150.00, 'https://tafmx.vtexassets.com/arquivos/ids/343752-800-1067?v=637820183989930000&width=800&height=1067&aspect=true');
      });
      document.getElementById('buy-tennis-two').addEventListener('click', function () {
        addToCart('Tenis Adidas Ultraboost', 180.00, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f0ca2dd8bdb84a2ab11faacb8802c4dc_9366/Tenis_Ultraboost_1.0_Blanco_HQ4202_HM1.jpg');
      });
    });
  </script>
</head>

<body>
  <header class="bg-primary p-4 flex justify-between items-center">
    <div class="flex items-center">
      <img src="" alt="Logo" class="mr-4" width="75" height="auto">
      <nav>
        <ul class="flex space-x-4">
          <a href="#" class="btn-secondary">Inicio</a>
          <a href="#" class="btn-secondary">Hombre</a>
          <a href="#" class="btn-secondary">Mujer</a>
        </ul>
      </nav>
    </div>
    <div class="flex items-center space-x-4">
      <a id="login-button" href="html/login.html" class="btn-secondary">Iniciar sesión</a>
      <a id="register-button" href="html/registro.html">
        <button class="btn-secondary">Regístrese</button>
      </a>
      <a id="logout-button" href="#" style="display: none;" class="btn-secondary">Cerrar sesión</a>
      <a href="html/carrito.html" class="btn-secondary">
        <i class="fas fa-shopping-cart"></i>
      </a>
    </div>
  </header>

  <section class="p-8 text-center bg-secondary">
    <h1 class="text-3xl font-bold mb-4 text-glow">¡Encuentra lo mejor!</h1>
    <p class="mb-4">Descubre nuestra colección. Compra ahora y recibe envío gratis.</p>
    <button class="btn btn-primary mb-4" id="scrollButton">Ver productos</button>

    <!-- Carrusel de imágenes debajo del botón "Ver productos" -->
    <div class="carousel-container owl-carousel">
      <div class="carousel-item"><img src="https://i0.wp.com/thehappening.com/wp-content/uploads/2021/02/reebok-nano-x1.jpg?fit=1024%2C694&ssl=1" alt="Imagen 1"></div>
      <div class="carousel-item"><img src="https://fintualist.com/content/images/2023/06/Captura-de-pantalla-2023-06-05-a-la-s--08.22.43--1-.png" alt="Imagen 2"></div>
      <div class="carousel-item"><img src="https://static.euronews.com/articles/stories/08/59/05/26/808x608_cmsv2_75aa317e-1504-50c0-8d93-325ce11ece0e-8590526.jpg" alt="Imagen 3"></div>
    </div>
  </section>

  <section class="text-center p-8 flex justify-center">
    <div class="w-full max-w-screen-lg">
      <h2 class="section-title">Elige tus tenis favoritos</h2>
      <div class="flex justify-center gap-4">
        <div class="card animated-slide-in w-full md:w-1/3">
          <div class="card-header">
            <h3 class="text-xl font-bold">Tenis Nike Air Max</h3>
          </div>
          <div class="product-img-container">
            <img src="https://tafmx.vtexassets.com/arquivos/ids/343752-800-1067?v=637820183989930000&width=800&height=1067&aspect=true" alt="Nike Air Max">
          </div>
          <p class="mt-4">Cómodos y con diseño elegante, ideales para cualquier ocasión.</p>
          <p class="mt-2"><strong>Precio:</strong> $150 USD</p>
          <button id="buy-tennis-one" class="btn-primary mt-4">Comprar tenis</button>
        </div>

        <div class="card animated-slide-in w-full md:w-1/3">
          <div class="card-header">
            <h3 class="text-xl font-bold">Tenis Adidas Ultraboost</h3>
          </div>
          <div class="product-img-container">
            <img src="https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f0ca2dd8bdb84a2ab11faacb8802c4dc_9366/Tenis_Ultraboost_1.0_Blanco_HQ4202_HM1.jpg" alt="Adidas Ultraboost">
          </div>
          <p class="mt-4">Máximo confort y estilo, perfectos para tu rutina diaria.</p>
          <p class="mt-2"><strong>Precio:</strong> $180 USD</p>
          <button id="buy-tennis-two" class="btn-primary mt-4">Comprar tenis</button>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-primary p-4">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 Tienda de Tenis. Todos los derechos reservados.</p>
      <nav>
        <ul class="flex justify-center space-x-4">
          <li><a href="#" class="hover:underline">Aviso legal</a></li>
          <li><a href="#" class="hover:underline">Política de privacidad</a></li>
          <li><a href="#" class="hover:underline">Términos y condiciones</a></li>
        </ul>
      </nav>
    </div>
  </footer>

  <!-- Incluir jQuery (requerido por Owl Carousel) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Incluir Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,  // Cambia las imágenes cada 5 segundos
        autoplayHoverPause: true,
        nav: true,
        dots: true
      });
    });
  </script>
</body>

</html>
