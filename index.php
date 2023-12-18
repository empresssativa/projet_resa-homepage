<?php

require "header.php";

    
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=project_resa', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $req = 'SELECT roomType FROM room';
        $stmt = $pdo->query($req);
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }


 
// on recupere les donnees de la table Room pour les mettre dans le formulaire et on peut faire echo pour les afficher


?>

    <!-- Banner section -->
    <section id="home" class="banner_wrapper p-0">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url(https://i.pinimg.com/564x/c1/43/07/c14307a39edff142264842ee70e9b78f.jpg);">
                    <div class="slide-caption text-center">
                        <div>
                            <h1>~ Bienvenu chez Bokit Hotel ~</h1>
                            <p> Tout est mis en place pour votre satisfaction. </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url(https://i.pinimg.com/564x/47/04/de/4704dea89ce8b7b4a248dab62cd77999.jpg);">
                    <div class="slide-caption text-center">
                        <div>
                            <h1>welcome to Bokit Hotel</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="container booking-area">
            <form action="resaRooms.php" method="POST" class="row" >
            <div class="col-lg mb-3 mb-lg-0">
                    <p>Chambre</p>                   
                   <select class="form-select" name="roomType" id="id"> 
                   <!--on rajour le donne dans le formulair en mettant le echo  -->
                        <option selected>Nos Chambre</option> 
                        <?php foreach ($rooms as $room) : ?>
                            <?php echo "<option value=".$room['roomType'].'>'. $room['roomType'] . '</option>'?>
                        <?php endforeach; ?>
                    </select>
            </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <p> Date d'arrivée </p>
                    <input type="date" class="form-control" placeholder="Date" name="date_darivée">
                </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <p> Date de départ </p >
                    <input type="date" class="form-control" placeholder="Date" name="date_départ">
                </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <p> Nombre d'adultes </p>
                    <select class="form-select" name="nbAdult">
                        <option selected>Adults</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="col-lg mb-3 mb-lg-0">
                    <p> Nombre d'enfant </p>
                    <select class="form-select" name="nbChild">
                        <option selected>Children</option>
                        <option value="1">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div> 
                <?php if(!isset($_SESSION['user_id'])) { ?>
                        <div class="d-flex" role="search">
                            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#errorModal">
                                valider
                            </button></p>
                        </div>
                    
                    <?php } else { ?>
                        <div class="d-flex" role="search">
                           <a href="resaRooms.php" ><button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" href="logout.php">
                                valider
                            </button></a>
                        </div>
                    <?php } ?>
            </form>
        </div>
    </section>
    <!-- Banner section exit -->

    <!-- About section -->
    <section id="about" class="about_wrapper"> </br></br>
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse ">
                <h3>Bienvenue  chez <span>Bokit Hotel, <br class="d-none d-lg-block">
                    l'étape crutiale</span> de votre week end</h3>
                <div class="col-lg-6 text-center text-lg-start">
                    <br><p>C'est avec une immense joie que nous vous accueillons chez Bokit Hotel, un lieu où chaque moment devient une expérience exceptionnelle. </p>
                    <p>Que vous soyez ici pour affaires, une escapade romantique, ou simplement pour vous offrir une pause bien méritée, notre équipe dévouée est prête à faire de votre séjour une expérience mémorable.
                        De nos suites élégantes à nos espaces de restauration raffinés, chaque élément de Bokit Hotel a été conçu pour élever votre séjour à des sommets inégalés. Notre personnel attentif est à votre disposition pour répondre à vos besoins et vous assurer un séjour des plus agréables.</p>
                    <p>Nous vous invitons à explorer les merveilles de notre établissement, à vous détendre dans notre spa somptueux, à savourer des délices gastronomiques dans nos restaurants primés, et à profiter de l'atmosphère enchanteresse qui caractérise Bokit Hotel.
                        Que votre séjour soit bref ou prolongé, nous sommes ravis de vous avoir parmi nous et nous nous efforcerons de faire de votre expérience à Bokit Hotel un moment inoubliable. </p>
                    <p>Bienvenue chez nous, où le luxe devient une réalité. </p>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0 ps-lg-4 text-center">
                    <img decoding="auto" src="https://i.pinimg.com/564x/47/04/de/4704dea89ce8b7b4a248dab62cd77999.jpg" class="img-fluid" alt="About Us">
                </div>

            </div>
        </div>
    </section>
    <!-- About section exit -->

    <!-- Rooms section -->
    <section id="rooms" class="rooms_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Favorite Rooms</h3>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img decoding="async" src="./images/room/room1.webp" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline">Royal Suit</h5>
                                <p class="text-white">Discover five of our favourite dresses from our new collection that
                                    are destined to be worn and loved immediately</p>
                                <p class="text-white fw-bold mt-lg-4">$220 / Per Night</p>
                                <a class="main-btn border-white text-white mt-lg-5" href="#">Book now</a>
                            </div>
                        </div> 
                    </div> 
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img decoding="async" src="./images/room/room2.webp" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline">Royal Suit</h5>
                                <p class="text-white">Discover five of our favourite dresses from our new collection that
                                    are destined to be worn and loved immediately</p>
                                <p class="text-white fw-bold mt-lg-4">$220 / Per Night</p>
                                <a class="main-btn border-white text-white mt-lg-5" href="#">Book now</a>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4 mb-4 mb-lg-0">
                    <div class="room-item">
                        <img decoding="async" src="./images/room/room3.webp" class="img-fluid">
                        <div class="room-item-wrap">
                            <div class="room-content">
                                <h5 class="text-white mb-lg-5 text-decoration-underline">Royal Suit</h5>
                                <p class="text-white">Discover five of our favourite dresses from our new collection that
                                    are destined to be worn and loved immediately</p>
                                <p class="text-white fw-bold mt-lg-4">$220 / Per Night</p>
                                <a class="main-btn border-white text-white mt-lg-5" href="#">Book now</a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section Exit -->

    <!-- Services section -->
    <section id="services" class="services_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>We Are Here For You</h6>
                    <h3>Our Awesome Services</h3>
                </div>
            </div>
            <div class="row align-items-center service-item-wrap">
                <div class="col-lg-7 p-lg-0">
                    <!--Service Area Start-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="spa" role="tabpanel">
                            <img decoding="async" src="./images/services/service1.webp" alt="">
                        </div>
                        <div class="tab-pane fade" id="restaurent" role="tabpanel">
                            <img decoding="async" src="./images/services/service2.webp" alt="">
                        </div>
                        <div class="tab-pane fade" id="swimming" role="tabpanel">
                            <img decoding="async" src="images/services/service3.webp" alt="">
                        </div>
                        <div class="tab-pane fade" id="conference" role="tabpanel">
                            <img decoding="async" src="./images/services/service6.webp" alt="">
                        </div>
                    </div>
                    <!--Service Area End--> 
                </div>
                <div class="col-lg-5 position-relative">
                    <!--Service Tab Menu Area Start-->
                    <div class="service-menu-area">
                        <ul class="nav">
                            <li>
                                <a data-bs-toggle="tab" href="#spa" class="active">
                                    <span class="service-icon">
                                        <img decoding="async" src="./images/services/service-icon1.webp" alt="">
                                    </span>
                                    <h5>Spa, beauty & Health</h5>
                                    <p><span>Spa and beauty </span>luptatem quia voluptas sit aspernatur aut odit aut
                                        fugit, sed quia </p>
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#restaurent">
                                    <span class="service-icon">
                                        <img decoding="async" src="./images/services/service-icon2.webp" alt="">
                                    </span>
                                    <h5>Restaurant</h5>
                                    <p><span>Restaurant</span> lup provide grro tatem quia voluptas sit aspernatur aut
                                        odit aut fugit, </p>
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#swimming">
                                    <span class="service-icon">
                                        <img decoding="async" src="./images/services/service-icon3.webp" alt="">
                                    </span>
                                    <h5>Swimming Pool</h5>
                                    <p><span>Swimming</span> pool luptatem quia voluptas sit aspernatur aut odit aut
                                        fugit, sed quia </p>
                                </a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#conference">
                                    <span class="service-icon">
                                        <img decoding="async" src="./images/services/service-icon4.webp" alt="">
                                    </span>
                                    <h5>Conference Hall</h5>
                                    <p><span>Conference</span> luptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Service Tab Menu Area End-->
                </div>
            </div>
        </div>
        <div class="counter mt-5">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <span id="count1"></span>+
                        </h1>
                        <p>Happy Clients</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <span id="count2"></span>+
                            </h2>
                            <p>New Friendships</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <span id="count3"></span>+
                            </h2>
                            <p>Five Start Ratings</p>
                    </div>
                    <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                        <h1>
                            <span id="count4"></span>+
                            </h2>
                            <p>Served Breakfast</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section Exit -->

    <!-- Team section -->
    <section id="team" class="team_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>What I can do for you</h6>
                    <h3>Our Special Staff</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img decoding="async" src="images/team/team1.webp" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Shirley Gibson</h5>
                            <p>Manager</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img decoding="async" src="images/team/team2.webp" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Ronald Long</h5>
                            <p>Chif Reciption Officer</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img decoding="async" src="images/team/team3.webp" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Ashley Sanchez</h5>
                            <p>Master Chef</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-0 rounded-3">
                        <img decoding="async" src="images/team/team4.webp" class="img-fluid rounded-3" />
                        <div class="team-info">
                            <h5>Jessica Watson</h5>
                            <p>Housekeeping</p>
                            <ul class="social-network">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section Exit  -->

    <!-- Gallery section -->
    <section id="gallery" class="gallery_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Best Pictures Of Our Hotel</h6>
                    <h3>Our Gallery</h3>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/1.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/2.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/3.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/4.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"></div>
                </div>
                <div class="col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/5.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"> </div>
                </div>
                <div class="col-md-6 gallery-item">
                    <img decoding="async" src="./images/gallery/6.webp" class="img-fluid w-100">
                    <div class="gallery-item-content"> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section Exit -->

    <!-- Pricing section -->
    <section id="price" class="price_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Best & Affordable Price for you</h6>
                    <h3>Our Pricing</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-4 text-center rounded-3">
                        <h5 class="text-decoration-underline mb-4">Economic</h5>
                        <ul class="list-unstyled">
                            <li>
                                <p>Flight Ticket(2)</p>
                            </li>
                            <li>
                                <p>Music Concert (30% Off)</p>
                            </li>
                            <li>
                                <p>Restaurant (Snacks)</p>
                            </li>
                            <li>
                                <p>Face Make(No)</p>
                            </li>
                        </ul>
                        <hr />
                        <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                        <a href="#" class="main-btn">Sign Up</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-4 text-center rounded-3">
                        <h5 class="text-decoration-underline mb-4">Economic</h5>
                        <ul class="list-unstyled">
                            <li>
                                <p>Flight Ticket(2)</p>
                            </li>
                            <li>
                                <p>Music Concert (30% Off)</p>
                            </li>
                            <li>
                                <p>Restaurant (Snacks)</p>
                            </li>
                            <li>
                                <p>Face Make(No)</p>
                            </li>
                        </ul>
                        <hr />
                        <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                        <a href="#" class="main-btn">Sign Up</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-4 text-center rounded-3">
                        <h5 class="text-decoration-underline mb-4">Economic</h5>
                        <ul class="list-unstyled">
                            <li>
                                <p>Flight Ticket(2)</p>
                            </li>
                            <li>
                                <p>Music Concert (30% Off)</p>
                            </li>
                            <li>
                                <p>Restaurant (Snacks)</p>
                            </li>
                            <li>
                                <p>Face Make(No)</p>
                            </li>
                        </ul>
                        <hr />
                        <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                        <a href="#" class="main-btn">Sign Up</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card p-4 text-center rounded-3">
                        <h5 class="text-decoration-underline mb-4">Economic</h5>
                        <ul class="list-unstyled">
                            <li>
                                <p>Flight Ticket(2)</p>
                            </li>
                            <li>
                                <p>Music Concert (30% Off)</p>
                            </li>
                            <li>
                                <p>Restaurant (Snacks)</p>
                            </li>
                            <li>
                                <p>Face Make(No)</p>
                            </li>
                        </ul>
                        <hr />
                        <h3>$150<sub class="fs-6 fw-normal">/NIGHT</sub></h3>
                        <a href="#" class="main-btn">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section Exit  -->

    <!-- blog section -->
    <section id="blog" class="blog_wrapper pb-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 section-title text-center mb-5">
                    <h6>Say Hello TO Our Visiters</h6>
                    <h3>Our Blog</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card p-0 border-0 rounded-0">
                        <img decoding="async" src="images/blog/blog1.webp" alt="">
                        <div class="blog-content bg-white p-4">
                            <h5 class="text-decoration-underline mb-4">Relax Zone</h5>
                            <h6>By Admin - February 18, 2018</h6>
                            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.
                            </p>
                            <a href="#" class="main-btn mt-2">Read More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card p-0 border-0 rounded-0">
                        <img decoding="async" src="images/blog/blog2.webp" alt="">
                        <div class="blog-content bg-white p-4">
                            <h5 class="text-decoration-underline mb-4">Relax Zone</h5>
                            <h6>By Admin - February 18, 2018</h6>
                            <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, nostrum.
                            </p>
                            <a href="#" class="main-btn mt-2">Read More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-partner-slider mt-5">
            <div class="container swiper our-partner">
                <div class=" swiper-wrapper">
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand1.webp"></div>
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand2.webp"></div>
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand3.webp"></div>
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand4.webp"></div>
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand5.webp"></div>
                    <div class="swiper-slide"><img decoding="async" src="images/partners/brand6.webp"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog Section Exit  -->

<?php

require "footer.php";

?>