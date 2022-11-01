<?php require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$client = new \Contentful\Delivery\Client($_ENV['CONTENTFUL_KEY'], $_ENV['CONTENTFUL_SPACE']);
$query = (new \Contentful\Delivery\Query())->orderBy('sys.updatedAt', false);;
$text_query = (new \Contentful\Delivery\Query())->orderBy('sys.updatedAt', false);;

$query->setContentType('galery');

$products = $client->getEntries($query);
if (isset($_GET['lang'])) {
    $text_query->setContentType('textos')->setLocale($_GET['lang']);
} else {
    $text_query->setContentType('textos');
}

$texts = $client->getEntries($text_query);
function findTxt($id, $texts)
{
    foreach ($texts as $element) {
        if ($id == $element->getName()) {
            return $element->getText();
        }
    }
    return false;
}

?>
<!DOCTYPE html>
<?php if (isset($_GET['lang'])) { ?>
    <html lang="<?php echo $_GET['lang'] ?>">
<?php } else { ?>
    <html lang="es">
<?php } ?>

<head>
    <meta charset="utf-8" />
    <title>Exportadora y servicios forestales Andes Chile - Concepción</title>
    <?php if (isset($_GET['lang'])) { ?>
        <link rel="alternate" hreflang="es" href="http://expoandes.cl" />
    <?php } else { ?>
        <link rel="alternate" hreflang="en" href="http://expoandes.cl/?lang=en" />
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EXPOANDES, productos forestales de la más alta calidad" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#006c2e">
    <meta name="theme-color" content="#ffffff">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/unicons.line.css" />
    <link rel="stylesheet" href="css/glightbox.min.css" type="text/css" />
    <link href="css/style.min.css" rel="stylesheet" type="text/css" />
    <link href="css/efac.css" rel="stylesheet" type="text/css" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">

    <!-- Pre-loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">Cargando...</div>
        </div>
    </div>
    <!-- End Preloader-->

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="index-2.html">
                <div class="d-flex align-items-center">
                    <img src="img/efac_logo.png" alt="logo-expoandes" height="40">
                    <h2 class="logo-text text-white ms-1 mb-0 ">Expoandes</h2>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto navbar-center">
                    <li class="nav-item">
                        <a href="#home" class="nav-link"><?php echo findTxt('inicio', $texts) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#products" class="nav-link"><?php echo findTxt('productos', $texts) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#weare" class="nav-link"><?php echo findTxt('quienessomos', $texts) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#galery" class="nav-link"><?php echo findTxt('galeria', $texts) ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link"><?php echo findTxt('contacto', $texts) ?></a>
                    </li>
                </ul>
                <?php if (isset($_GET['lang'])) { ?>
                    <a href="/" class="nav-link"><button class="btn btn-sm btn-outline-success" type="submit">ES</button></a>
                <?php } else { ?>
                    <a href="?lang=en" class="nav-link"><button class="btn btn-sm btn-outline-success" type="submit">EN</button></a>
                <?php } ?>
            </div>
            <!--end navabar-collapse-->
        </div>
        <!--end container-->
    </nav>
    <!-- Navbar End -->

    <!-- START HOME -->
    <section class="bg-home2" id="home">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="home-content me-lg-5">
                        <h6 class="sub-title mb-3 text-white">Exportaciones Forestales Andes Chile</h6>
                        <h1 class="mb-4 text-white"><?php echo findTxt('banner1', $texts) ?></h1>
                        <p class="text-white-50 fs-17"><?php echo findTxt('banner2', $texts) ?></p>
                        <div class="mt-4">
                            <a href="https://wa.me/56978786979" class="btn btn-primary mt-2" target="_blank"><?php echo findTxt('btn-banner-1', $texts) ?></a>
                            <a href="#products" class="btn btn-outline-white mt-2 ms-md-1"><?php echo findTxt('btn-banner2', $texts) ?></a>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-6">
                    <div class="home-dashboard mt-4 mt-lg-0 video-wrapper">
                        <div style="width:100%;height:100%;position:relative;padding-bottom:150.000%;"><iframe src="https://streamable.com/e/92i4vt" frameborder="0" width="100%" height="100%" allowfullscreen style="width:100%;height:50vh;position:absolute;left:0px;top:0px;overflow:hidden;"></iframe></div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </section>

    <div class="position-relative">
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="1440" height="150" preserveAspectRatio="none" viewBox="0 0 1440 150">
                <g mask="url(&quot;#SvgjsMask1022&quot;)" fill="none">
                    <path d="M 0,58 C 144,73 432,131.8 720,133 C 1008,134.2 1296,77.8 1440,64L1440 250L0 250z" fill="rgba(255, 255, 255, 1)"></path>
                </g>
                <defs>
                    <mask id="SvgjsMask1022">
                        <rect width="1440" height="250" fill="#ffffff"></rect>
                    </mask>
                </defs>
            </svg>
        </div>
    </div>
    <section class="section" id="products">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="header-title text-center">
                        <p class="text-uppercase text-muted mb-2"><?php echo findTxt('product-title1', $texts) ?></p>
                        <h3><?php echo findTxt('product-title2', $texts) ?></h3>
                        <div class="title-border mt-3"></div>
                        <p class="text-muted mt-3"><?php echo findTxt('product-title3', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4">
                        <img src="img/dimensionada_icon.png" alt="Icono madera dimensionada" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-dimensioned-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3"><?php echo findTxt('product-dimensioned-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4 box-shadow">
                        <img src="img/tropicales_icon.png" alt="" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-tropical-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3 mb-0"><?php echo findTxt('product-tropical-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4">
                        <img src="img/tableros_icon.png" alt="" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-boards-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3 mb-0"><?php echo findTxt('product-boards-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4 box-shadow">
                        <img src="img/molduras_icon.png" alt="" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-moldings-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3 mb-0"><?php echo findTxt('product-moldings-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4">
                        <img src="img/maquinaria_icon.png" alt="" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-forklift-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3 mb-0"><?php echo findTxt('product-forklift-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6">
                    <div class="service-box text-center mt-4 box-shadow">
                        <img src="img/impotaciones_icon.png" alt="" class="img-fluid product-icon">
                        <h5 class="fs-18 mt-4"><?php echo findTxt('product-imports-title', $texts) ?></h5>
                        <div class="lighlight-border mt-3"></div>
                        <p class="text-muted mt-3 mb-0"><?php echo findTxt('product-imports-text', $texts) ?></p>
                        <span class="more-details" data-bs-toggle="modal" data-bs-target="#productDescriptionModal"><?php echo findTxt('more', $texts) ?></span>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END SERVICE -->

    <!-- START About -->
    <section class="section bg-light" id="weare">
        <div class="container">
            <div class="row align-items-center g-3 g-lg-0">
                <div class="col-lg-6">
                    <div class="skill-box bg-white p-4 rounded box-shadow">
                        <p class="text-uppercase mb-1"><?php echo findTxt('about-efac', $texts) ?></p>
                        <h3 class="mb-2"><?php echo findTxt('about-title', $texts) ?></h3>
                        <p class="text-muted"><?php echo findTxt('about-text', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-6 about-img">
                    <img src="img/wood_entrance.jpg" class="img-fluid rounded box-shadow" alt="EFAC">
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END About -->

    <!--start portfolio-->
    <section class="section" id="galery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="header-title text-center">
                        <p class="text-uppercase text-muted mb-2"><?php echo findTxt('galery-title1', $texts) ?></p>
                        <h3><?php echo findTxt('productos', $texts) ?></h3>
                        <div class="title-border mt-3"></div>
                        <p class="title-desc text-muted mt-3"><?php echo findTxt('galery-title2', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row my-4 pt-2">
                <div class="col-lg-12">
                    <div class="filters-group">
                        <ul class="nav filter-options list-unstyled list-inline justify-content-center">
                            <li data-group="all" class="active nav-link list-inline-item mt-2">
                                <?php echo findTxt('all', $texts) ?></li>
                            <li data-group="dimensioned" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-dimensioned-title', $texts) ?></li>
                            <li data-group="tropical" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-tropical-title', $texts) ?></li>
                            <li data-group="boards" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-boards-title', $texts) ?></li>
                            <li data-group="moldings" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-moldings-title', $texts) ?></li>
                            <li data-group="rental" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-forklift-title', $texts) ?></li>
                            <li data-group="imports" class="nav-link list-inline-item mt-2">
                                <?php echo findTxt('product-imports-title', $texts) ?></li>
                        </ul>
                        <!--end portfolio-list-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->

        <div class="container-fluid mt-5">
            <div class="row g-2" id="grid">
                <?php foreach ($products as $product) { ?>
                    <div class="col-lg-3 col-md-6  picture-item" data-groups='["<?php echo $product->getCategory() ?>"]'>
                        <div class="portfolio-box rounded">
                            <img class="img-fluid" src="<?php echo $product->getPicture()->getFile()->getUrl(); ?>" alt="Madera Dimensionada Expoandes" />
                            <div class="portfolio-content">
                                <div class="img-view">
                                    <a href="<?php echo $product->getPicture()->getFile()->getUrl(); ?>" class="text-muted image-popup"><i class="mdi mdi-plus"></i></a>
                                </div>
                                <div class="portfolio-caption">
                                    <a href="#" class="text-primary">
                                        <h5 class="mb-1 fs-18"><?php echo $product->get('title') ?></h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end portfolio-box-->
                    </div>
                    <!--end col-->
                <?php } ?>
                <!--end row-->
            </div>
            <!--end container-fluid-->
    </section>
    <!--end portfolio-->
    <!-- START CTA -->
    <section class="bg-cta">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="header-title text-center">
                        <h2 class="text-white"><?php echo findTxt('cta-title', $texts) ?></h2>
                        <p class="title-desc mt-3 text-white"><?php echo findTxt('cta-text', $texts) ?></p>
                        <div class="mt-4">
                            <a href="https://wa.me/56978786979" class="btn btn-primary mt-2" target="_blank"><?php echo findTxt('contact-us', $texts) ?></a>
                        </div>
                    </div>

                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END CTA -->

    <!-- START CONTACT -->
    <section class="section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-4">
                        <p class="text-uppercase text-muted mb-2"><?php echo findTxt('contact-title1', $texts) ?></p>
                        <h3 class="text-uppercase"><?php echo findTxt('contact-title2', $texts) ?></h3>
                        <div class="title-border mt-3"></div>
                        <p class="title-desc text-muted mt-3"><?php echo findTxt('contact-title3', $texts) ?></p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row mt-5 pt-2 justify-content-center">

                <div class="col-lg-9">
                    <div class="custom-form">
                        <form name="contact-form" id="contact-form">
                            <p id="error-msg"></p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label"><?php echo findTxt('nombre', $texts) ?></label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="<?php echo findTxt('your-name', $texts) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"><?php echo findTxt('telefono', $texts) ?></label>
                                        <input type="tel" class="form-control" name="phone" id="email" placeholder="<?php echo findTxt('your-phone', $texts) ?>">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo findTxt('your-email', $texts) ?>">
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="product" class="form-label">Producto o servicio:</label>
                                        <select class="form-select form-control" aria-label="Select product" name="product">
                                            <option selected> -- </option>
                                            <option value="Madera Dimensionada"><?php echo findTxt('product-dimensioned-title', $texts) ?></option>
                                            <option value="Maderas Tropicales"><?php echo findTxt('product-tropical-title', $texts) ?></option>
                                            <option value="Tableros"><?php echo findTxt('product-boards-title', $texts) ?></option>
                                            <option value="Molduras"><?php echo findTxt('product-moldings-title', $texts) ?></option>
                                            <option value="Arriendo Maquinaria"><?php echo findTxt('product-forklift-title', $texts) ?></option>
                                            <option value="Importaciones"><?php echo findTxt('product-imports-title', $texts) ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comments" class="form-label"><?php echo findTxt('mensaje', $texts) ?></label>
                                        <textarea class="form-control" placeholder="<?php echo findTxt('dejanos-consulta', $texts) ?>" name="comments" id="comments" style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <!-- end col -->

                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mt-3 text-end">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="<?php echo findTxt('enviar', $texts) ?>">
                                        <div id="simple-msg"></div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!-- END CONTACT -->


    <!-- FOOTER PARA DESPUES
    <footer class="bg-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="mt-4">
                        <img src="img/efac_logo.png" alt="Logo Efac" height="130">
                        <p class="text-white-50 mt-3 pt-2 mb-0 ">Productos forestales de la más alta calidad y con un servicio de excelencia</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="mt-4 ps-0 ps-lg-5">
                        <h6 class="text-white text-uppercase fs-16">Resources</h6>
                        <ul class="list-unstyled footer-link mt-3 mb-0">
                            <li><a href="#">Company History</a></li>
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Term &amp; Service</a></li>
                            <li><a href="#">Components</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="mt-4">
                        <h6 class="text-white text-uppercase fs-16">Help</h6>
                        <ul class="list-unstyled footer-link mt-3 mb-0">
                            <li><a href="#">Sign Up </a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-4">
                        <h6 class="text-white text-uppercase fs-16">Latest news</h6>
                        <div class="mt-3 mb-0">
                            <div class="d-flex">
                                <i class="mdi mdi-twitter text-white-50 float-start"></i>
                                <div class="flex-grow-1">
                                    <p class="text-white-50 ps-3">Pleasures have to repudiated annoyances accepted
                                        therefore always holds chooses enjoy a pleasure consequences.</p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="d-flex">
                                    <i class="mdi mdi-twitter text-white-50 float-start"></i>
                                    <div class="flex-grow-1">
                                        <p class="text-white-50 ps-3">Greater pleasures el esndures pains avoid welcomed
                                            avoided pariatu</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    END FOOTER -->

    <!-- FOOTER-ALT -->
    <div class="footer-alt py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="text-white-50 mb-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Exportaciones forestales Andes Chile</a>
                        </p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </div>
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up-bold"></i>
    </button>
    <div class="modal fade" id="productDescriptionModal" tabindex="-1" aria-labelledby="productDescriptionModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card"">
  <div class=" row g-0">
                    <div class="col-md-1">
                        <img src="img/impotaciones_icon.png" alt="" class="img-fluid rounded-start product-icon" style="margin:1rem">
                    </div>
                    <div class="col-md-11 ps-2">
                        <div class="card-body">
                            <div class="modal-header mb-2">
                                <h5 class="modal-title" id="productDescriptionModalLabel"><?php echo findTxt('product-imports-title', $texts) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <p class="card-text"><?php echo findTxt('product-imports-text-long', $texts) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/shuffle.min.js"></script>
    <script src="js/gallery.init.js"></script>
    <script src="js/app.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeYsM4iAAAAABLcLi8kyUJ4h2XXpAWPts6WA7ju"></script>
    <script src="js/efac.js"></script>
</body>

    </html>