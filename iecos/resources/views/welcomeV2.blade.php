<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>IECOS - R</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('assets/css/stylesV2.css') }}">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#top">IECOS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about-2">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#socio">Socio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#puntos">puntos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#canjeo">canjeo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead" id="top">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">IECOS – R</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Recicla y gana, juntos cuidamos el medioambiente</h2>
                    <a class="btn btn-primary" href="{{ route('login') }}">Empezar</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">IECOS – R</h2>
                    <p class="text-white-50">
                        Se crea en 2021 para aportar al desarrollo de actividades amigables con el
                        medio ambiente. A partir de 2023 damos inicio a nuestro proyecto de Reciclaje
                        Participativo, que busca incorporar a la mayor cantidad de personas al reciclaje de sus
                        residuos, generando un sistema de recolección que se adapte a las necesidades de los
                        participantes, y un innovador sistema de beneficios que premia el compromiso adquirido.
                    </p>
                </div>
            </div>
            <img class="img-fluid2" src="{{ asset('assets/img/imgWelcomeV2/iphone2.png') }}" alt="..." />
        </div>
    </section>
    <section class="about-section-top text-center" id="about-2">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">Proyecto Reciclaje Participativo</h2>
                    <p class="text-white-50">
                        El proyecto “RECICLAJE PARTICIPATIVO”, pretende ampliar la base de personas
                        comprometidas con el reciclaje, incorporándolas como Socios Colaboradores.
                        Cada Socio Colaborador se compromete a entregar sus residuos domiciliarios. IECOS - R se
                        compromete a retirar los residuos domiciliarios en forma oportuna, y a entregar
                        beneficios que premien su participación en base al Sistema de ECO PUNTOS.
                        Los ECO PUNTOS podrán ser canjeados en cualquier momento por el Socio Colaborador,
                        en función de nuestra oferta de beneficios.
                    </p>
                </div>
            </div>
            <!-- <img class="img-fluid" src="{{ asset('assets/img/imgWelcomeV2/ipad.png') }}" alt="..." /> -->
        </div>
    </section>
    <!-- Socio-->
    <section class="projects-section bg-light" id="socio">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0"
                        src="{{ asset('assets/img/imgWelcomeV2/socio.jpg') }}" alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Como ser Socio Colaborador</h4>
                        <p class="text-black-50 mb-0">Ser Socio Colaborador es muy sencillo. Solo debes inscribirte en
                            nuestra aplicación
                            <a href="#">xxxx</a>
                            o en está <a href="{{ route('sign-up') }}">página WEB</a>.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
             
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <h4 class="text-center" id="puntos">ECO PUNTOS</h4>

                <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/imgWelcomeV2/hojala.jpg') }}"
                        alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Hojalata</h4>
                                <p class="mb-0 text-white-50">Hojalata (latas de conserva, pescados, mariscos, etc.)
                                    <span>otorgando 10 ECO Puntos por kg</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid"
                        src="{{ asset('assets/img/imgWelcomeV2/latasAluminio.jpg') }}" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Latas de Aluminio</h4>
                                <p class="mb-0 text-white-50">Latas de Aluminio (latas de bebidas gaseosas, cerveza,
                                    jugos, etc.)
                                    <span>otorgando 70 ECO Puntos por kg</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="{{ asset('assets/img/imgWelcomeV2/pet.jpg') }}"
                        alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Botellas Plásticas PET</h4>
                                <p class="mb-0 text-white-50">Botellas Plásticas PET (botellas de bebidas gaseosas, agua
                                    mineral, aguas
                                    saborizadas, jugos)
                                    <span>otorgando 20 ECO Puntos por kg</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid"
                        src="{{ asset('assets/img/imgWelcomeV2/Carton.jpg') }}" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Carton</h4>
                                <p class="mb-0 text-white-50">Por ahora recibimos el cartón como material de reciclaje, pero no otorgamos eco puntos. Próximamente proporcionaremos novedades
                                    <span>otorgando 0 ECO Puntos por kg</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
   
    <section class="about-section text-center bg-dark text-white py-5" id="canjeo">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">Sistema de Canjeo</h2>
                <p class="text-white-50 lead">
                    El canjeo de los puntos puede ser en cualquier momento, accediendo a la <a
                        href="{{ route('store') }}" class="text-decoration-underline text-info">Iecos</a>. Consulta
                    nuestra oferta de beneficios.
                    Si deseas algún beneficio que no está en nuestra oferta, contáctanos y lo evaluaremos
                    para ti.
                </p>
            </div>
        </div>
        <!-- Optional Image, uncomment if needed -->
        <!-- <img class="img-fluid mt-4 rounded shadow-lg" src="{{ asset('assets/img/imgWelcomeV2/ipad.png') }}" alt="iPad with app" /> -->
    </div>
</section>
  
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fa-brands fa-google text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">WebSite</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="/">www.iecos.cl</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">sergioveloz@iecos.cl</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+56 9 8156 3517</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
    <p class="footer__copy">&#169; {{ $currentYear }} Iecos. All right reserved</p>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>