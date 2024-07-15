<main class="main-content mt-1 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-md"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active text-capitalize" aria-current="page">
                        {{ str_replace('-', ' ', Route::currentRouteName()) }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0 text-capitalize">
                    {{ str_replace('-', ' ', Route::currentRouteName()) }}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
                <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                    <div class="card-navbar">
                        <div class="card-body p-3">
                            <span>Puntos: </span>
                            <span class="badge bg-gradient-dark">{{ Auth::user()->puntos }}</span>
                        </div>
                    </div>
                    <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                        <div class="card-navbar">
                            <div class="card-body p-3">
                                <span>Id: </span>
                                <span class="badge bg-gradient-dark">{{ Auth::id() }}</span>
                            </div>
                        </div>
                    </div>


                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            
                            <button href="javascript:;" class="Btn2">
                                <div class="sign">
                                    <svg viewBox="0 0 512 512">
                                        <path
                                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                        </path>
                                    </svg>
                                </div>

                                <div class="text  font-weight-bold px-1"><livewire:auth.logout /></div>
                            </button>

                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
    </nav>