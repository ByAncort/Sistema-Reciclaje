<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




        <title>Responsive website food</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo"><img src="{{ asset('assets/img/mainPictures/Logo-Test.png') }}" width="200" alt="Musixmatch Logo">
</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                        
                        <li class="nav__item"><a href="#descarga" class="nav__link">App Movil</a></li>

                        <li class="nav__item"><a class="nav__link" href="{{ route('login') }}">login</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                    <h1 class="home__title">¡Recicla y gana!</h1>
<h2 class="home__subtitle">Descubre las mejores recompensas <br> de la semana.</h2>
    <a href="#" class="button">Ver Catálogo</a>

                    </div>
                
                    <img src="{{ asset('assets/img/home.png') }}" alt="" class="imgHome">

                </div>
            </section>
            
            <!--========== ABOUT ==========-->
            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                    <span class="section-subtitle about__initial">Acerca de nosotros</span>
<h2 class="section-title about__initial">Canjea tus puntos <br> por increíbles premios</h2>
<p class="about__description">Somos una plataforma que te permite canjear tus puntos de reciclaje por una amplia variedad de premios emocionantes. Con un servicio al cliente excepcional y una selección de premios de calidad, estamos aquí para recompensar tu compromiso con el medio ambiente. ¡Únete a nosotros hoy mismo!</p>
<a href="#" class="button">Explorar más</a>

                    </div>

                    <img src="{{ asset('assets/img/point.png') }}" alt="" class="about__img">
                </div>
            </section>

            <!--========== SERVICES ==========-->
            <section class="services section bd-container" id="services">
            <span class="section-subtitle">Nuestra oferta</span>
    <h2 class="section-title">Nuestros servicios increíbles</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                    <img src="{{ asset('assets/img/latas.png') }}" alt="" class="services__img">
                        
                        <h3 class="services__title">Reciclaje de Latas</h3>
<p class="services__description">En nuestro punto de reciclaje para latas, ofrecemos una solución eco-friendly para desechar tus latas de aluminio. Ayúdanos a reducir residuos y mantener un medio ambiente más limpio.</p>

                        
                    </div>

                    <div class="services__content">
                    <img src="{{ asset('assets/img/vidrio.png') }}" alt="" class="services__img">
                    <h3 class="services__title">Reciclaje de Vidrios</h3>
        <p class="services__description">
            En nuestro punto de reciclaje para vidrios, brindamos una solución sostenible para desechar tus materiales de vidrio. Contribuye a reducir residuos y preservar el medio ambiente trayendo tus vidrios a nuestro centro de reciclaje.
        </p>
    </div>
                    <div class="services__content">
                        <img src="{{ asset('assets/img/plastico.png') }}" alt="" class="services__img">
                        <h3 class="services__title">Reciclaje de Plásticos</h3>
<p class="services__description">En nuestro centro de reciclaje de plásticos, proporcionamos una solución ambientalmente amigable para desechar tus productos de plástico. Ayuda a reducir la contaminación y proteger nuestro entorno trayendo tus plásticos para su reciclaje.</p>

                    </div>
                </div>
            </section>

            <!--========== MENU ==========-->
            <!-- <section class="menu section bd-container" id="menu">
                <span class="section-subtitle">Special</span>
                <h2 class="section-title">Menu of the week</h2>

                <div class="menu__container bd-grid">
                    <div class="menu__content">
                        <img src="{{ asset('assets/img/mainPictures/.png') }}" alt="" class="menu__img">
                        <h3 class="menu__name">Barbecue salad</h3>
                        <span class="menu__detail">Delicious dish</span>
                        <span class="menu__preci">$22.00</span>
                        <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>

                    <div class="menu__content">
                        <img src="assets/img/plate2.png" alt="" class="menu__img">
                        <h3 class="menu__name">Salad with fish</h3>
                        <span class="menu__detail">Delicious dish</span>
                        <span class="menu__preci">$12.00</span>
                        <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>
                    
                    <div class="menu__content">
                        <img src="assets/img/plate3.png" alt="" class="menu__img">
                        <h3 class="menu__name">Spinach salad</h3>
                        <span class="menu__detail">Delicious dish</span>
                        <span class="menu__preci">$9.50</span>
                        <a href="#" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>
                </div>
            </section> -->

            <!--===== APP =======-->
            <section class="app section bd-container" id="descarga">
                <div class="app__container bd-grid">
                    <div class="app__data">
                    <span class="section-subtitle app__initial">Aplicación</span>
<h2 class="section-title app__initial">¡Ya disponible!</h2>
<p class="app__description">Encuentra nuestra aplicación y descárgala. Podrás hacer reservas, pedidos de comida, ver el estado de tus entregas en camino y mucho más.</p>

                        <div class="app__stores">
                            <!-- icono disponible para iphone
                            <a href="#"><img src="{{ asset('assets/img/mainPictures/app1.png') }}" alt="" class="app__store"></a> -->
                            <a href="#"><img src="{{ asset('assets/img/mainPictures/app2.png') }}" alt="" class="app__store"></a>
                        </div>
                    </div>

                    <img src="{{ asset('assets/img/mainPictures/movil-app.png') }}" alt="" class="app__img">
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <!-- <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Let's talk</span>
                        <h2 class="section-title contact__initial">Contact us</h2>
                        <p class="contact__description">If you want to reserve a table in our restaurant, contact us and we will attend you quickly, with our 24/7 chat service.</p>
                    </div>

                    <div class="contact__button">
                        <a href="#" class="button">Contact us now</a>
                    </div>
                </div>
            </section> -->
        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Iecos</a>
                    <span class="footer__description">Cuidemos el medio ambiente</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Servicio</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Latas</a></li>
                        <li><a href="#" class="footer__link">Cartón</a></li>
                        <li><a href="#" class="footer__link">Plásticos</a></li>
                        <li><a href="#" class="footer__link">recicla ya</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Information</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Event</a></li>
                        <li><a href="#" class="footer__link">Contact us</a></li>
                        <li><a href="#" class="footer__link">Privacy policy</a></li>
                        <li><a href="#" class="footer__link">Terms of services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adress</h3>
                    <ul>
                        <li>Santiago - Chile</li>
                        <li>Jr Union #999</li>
                        <li>999 - 888 - 777</li>
                        <li>Test@email.com</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; {{ $currentYear }} Iecos. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <!-- <script src="assets/js/main.js"></script> -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>