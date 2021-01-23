@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="home-page">
    <!-- Desktop Version -->

    <div class="desktop-only container-fluid">
        <!-- Category Row -->
        <div class="row my-2 mx-4">
            <div class="col-2 .col-md-offset-2 mx-2 home__category">
                <a href="/category/social-distancing"
                    ><h5 class="category__heading">
                        <b> > </b> Social Distancing Signs
                    </h5>
                    <img
                        class="d-block mx-auto"
                        src="/images/frontend/home/categories/social-distancing-200.png"
                        alt=""
                        srcset=""
                /></a>
            </div>

            <div class="col-2 .col-md-offset-2 mx-2 home__category">
                <a href="/category/social-distancing"
                    ><h5 class="category__heading">
                        <b> > </b> Mask Required Signs
                    </h5>
                    <img
                        class="d-block mx-auto"
                        src="/images/frontend/home/categories/mask-required-signs-200.png"
                        alt=""
                        srcset=""
                /></a>
            </div>

            <div class="col-2 .col-md-offset-2 mx-2 home__category">
                <a href="/category/social-distancing-floor-signs"
                    ><h5 class="category__heading">
                        <b> > </b> Floor Signs and Tapes
                    </h5>
                    <img
                        class="d-block mx-auto"
                        src="/images/frontend/home/categories/social-distancing-floor-signs-200.png"
                        alt=""
                        srcset=""
                /></a>
            </div>
            <div class="col-2 .col-md-offset-2 mx-2 home__category">
                <a href="/category/social-distancing"
                    ><h5 class="category__heading">
                        <b> > </b> Coronavirus Symptoms Signs
                    </h5>
                    <img
                        class="d-block mx-auto"
                        src="/images/frontend/home/categories/corona-virus-signs-200.png"
                        alt=""
                        srcset=""
                /></a>
            </div>
            <div class="col-3">
                <div class="shipping_card">
                    <div class="col-12 text-center">
                        <img
                            src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                            alt=""
                            width="50%"
                            class=""
                        />
                        <p style="border-bottom: 1px solid #cccccc">
                            <b>Ships Today.</b>
                            Order Within
                            <br />
                            <b>1 hr 26 mins</b>
                        </p>
                        <h2 class="capatalize" style="font-size: 1.2rem">
                            <span style="color: #0057ba">FREE</span
                            ><span style="color: #cc0000"> SHIPPING</span>
                        </h2>
                        <div class="text-left">
                            <ul>
                                <li>Orders over $29.95.</li>
                                <li>
                                    Sign orders over $100 ship UPS/Expedited 2nd
                                    Day for free. Get your signs on Monday!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row - Two -->
        <div class="row my-2 no-gutters">
            <!-- Carousel -->

            <div class="col-3 text-center no-gutters carousel-div">
                <div
                    id="carouselExampleIndicators"
                    class="carousel slide"
                    data-ride="carousel"
                    class="col-12"
                >
                    <ol class="carousel-indicators">
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="0"
                            class="active"
                        ></li>
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="1"
                        ></li>
                        <li
                            data-target="#carouselExampleIndicators"
                            data-slide-to="2"
                        ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img
                                src="/images/frontend_images/carousel-images/1.png"
                                class="d-block carousel-img"
                                alt="..."
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="/images/frontend_images/carousel-images/2.png"
                                class="d-block carousel-img"
                                alt="..."
                            />
                        </div>
                        <div class="carousel-item">
                            <img
                                src="/images/frontend_images/carousel-images/3.png"
                                class="d-block carousel-img"
                                alt="..."
                            />
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Popular Custom Template -->
            <div class="col-md-8 mx-auto">
                <h5>Popular Custom Templates</h5>
                <p>
                    Our Affordable custom products feature 3M inks and films.
                    The overlaminate protects signs for over 10 years.
                </p>
                <div class="row cards_row">
                    <div class="col-3 custom_card">
                        <a href="/category/custom-danger-signs">
                            <div class="custom_header">
                                <h5 class="">Danger</h5>
                            </div>
                            <img
                                src="/images/frontend/home/custom_templates/danger-120.jpg"
                                alt=""
                                class="d-block mx-auto"
                            />
                        </a>
                    </div>
                    <div class="col-3 custom_card">
                        <a href="/category/custom-warning-signs">
                            <div class="custom_header">
                                <h5 class="">Warning</h5>
                            </div>
                            <img
                                src="/images/frontend/home/custom_templates/warning-header-signs.jpg"
                                alt=""
                                class="d-block mx-auto"
                            />
                        </a>
                    </div>
                    <div class="col-3 custom_card">
                        <a href="/category/custom-caution-signs">
                            <div class="custom_header">
                                <h5 class="">Caution</h5>
                            </div>
                            <img
                                src="/images/frontend/home/custom_templates/caution-header-signs.jpg"
                                alt=""
                                class="d-block mx-auto"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related -->
        <div class="row my-2 mx-2">
            <div class="col-md-12">
                <h5>Choose By Header: Danger, Warning, Caution or Notice</h5>
                <p>
                    When do you need to use danger, warning, caution or notice
                    designs? Learn more about the important standards and
                    definitions for each.
                </p>
            </div>
            <div class="col-2 mx-3 mx-2 custom_card">
                <a href="/category/custom-danger-signs">
                    <div class="custom_header">
                        <h5 class="">Danger</h5>
                    </div>
                    <img
                        src="/images/frontend/home/custom_templates/danger-120.jpg"
                        alt=""
                        class="d-block mx-auto"
                    />
                </a>
            </div>
            <div class="col-2 mx-3 custom_card">
                <a href="/category/custom-caution-signs">
                    <div class="custom_header">
                        <h5 class="">Caution</h5>
                    </div>
                    <img
                        src="/images/frontend/home/custom_templates/custom-caution-ansi-signs-120.jpg"
                        alt=""
                        class="d-block mx-auto"
                    />
                </a>
            </div>
            <div class="col-2 mx-3 custom_card">
                <a href="/category/custom-warning-signs">
                    <div class="custom_header">
                        <h5 class="">Warning</h5>
                    </div>
                    <img
                        src="/images/frontend/home/custom_templates/custom-warning-ansi-signs-120.jpg"
                        alt=""
                        class="d-block mx-auto"
                    />
                </a>
            </div>
            <div class="col-2 mx-3 custom_card">
                <a href="/category/custom-notice-signs">
                    <div class="custom_header">
                        <h5 class="">Notice</h5>
                    </div>
                    <img
                        src="/images/frontend/home/custom_templates/custom-notice-ansi-signs-120.jpg"
                        alt=""
                        class="d-block mx-auto"
                    />
                </a>
            </div>
            <!-- <div class="col-2 mx-3 custom_card">
                <a href="#">
                    <div class="custom_header">
                        <h5 class="">Danger</h5>
                    </div>
                    <img
                        src="/images/frontend/home/custom_templates/danger-120.jpg"
                        alt=""
                        class="d-block mx-auto"
                    />
                </a>
            </div> -->
        </div>
    </div>

    <!-- Mobile Version -->
    <div class="mobile-only">
        <div class="col-md-12 text-center carousel-div">
            <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
            >
                <ol class="carousel-indicators">
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="0"
                        class="active"
                    ></li>
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="1"
                    ></li>
                    <li
                        data-target="#carouselExampleIndicators"
                        data-slide-to="2"
                    ></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img
                            src="/images/frontend_images/carousel-images/1.png"
                            class="d-block carousel-img"
                            alt="..."
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/images/frontend_images/carousel-images/2.png"
                            class="d-block carousel-img"
                            alt="..."
                        />
                    </div>
                    <div class="carousel-item">
                        <img
                            src="/images/frontend_images/carousel-images/3.png"
                            class="d-block carousel-img"
                            alt="..."
                        />
                    </div>
                </div>
                <a
                    class="carousel-control-prev"
                    href="#carouselExampleIndicators"
                    role="button"
                    data-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a
                    class="carousel-control-next"
                    href="#carouselExampleIndicators"
                    role="button"
                    data-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- ICONS (MOBILE ONLY) -->

        <div class="row no-gutters col-12" id="icons">
            <div>
                <i
                    class="icon rounded-circle fa fa-phone phone-icon"
                    aria-hidden="true"
                ></i>
                <p class="icon-text">Call us</p>
            </div>

            <div class="">
                <i class="icon rounded-circle fas fa-video"></i>
                <p class="icon-text">Watch Video</p>
            </div>
            <div class="">
                <i class="icon rounded-circle fas fa-edit"></i>
                <p class="icon-text">Customize</p>
            </div>
        </div>

        <div class="row no-gutters mx-1" id="free-shipping">
            <div class="col-2">
                <img
                    src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                    alt=""
                    width="100%"
                    class=""
                />
            </div>
            <div class="col-10">
                <b>Ships Tomorrow. </b> Order within
                <span class="highlighted-text">1 day 7 hrs</span> Get your signs
                on Wednesday. Free shipping for orders over $29.95. Orders over
                $100 ship <b>UPS/Expendited 2nd Day</b> for free. Details:
            </div>
        </div>

        <!-- CHOOSE BY HEADER -->
        <!-- <div class="mx-2"> -->
        <div class="col-12 my-2 mx-2">
            <h4 class="red-heading">Choose By Header:</h4>
        </div>
        <!-- <div
        class="col-md-2 col-6 col-xs-6 product text-center"
        v-for="product in allProducts"
    >
        <a :href="'/product/' + product.slug ">
            <img
                :src="'/images/backend_images/product/small/' + product.image "
                class="sign-img"
                :alt="product.product_name"
            />
            <p>@{{ product.product_name }}</p>
        </a>
    </div> -->
        <div class="row mx-2">
            <div class="col-md-2 col-6 col-xs-6 product text-center">
                <a href="/category/danger-signs">
                    <img
                        src="/images/frontend_images/home/danger-header-signs.jpg"
                        class="sign-img"
                        alt="Danger Sign"
                    />
                    <p>Danger Signs</p>
                </a>
            </div>
            <div class="col-md-2 col-6 col-xs-6 product text-center">
                <a href="/category/danger-sign">
                    <img
                        src="/images/frontend/home/custom_templates/warning-header-signs.jpg"
                        class="sign-img"
                        alt="Danger Sign"
                    />
                    <p>Warning Signs</p>
                </a>
            </div>

            <div class="col-md-2 col-6 col-xs-6 product text-center">
                <a href="/category/custom-caution-signs">
                    <img
                        src="/images/frontend/home/custom_templates/caution-header-signs.jpg"
                        class="sign-img"
                        alt="Danger Sign"
                    />
                    <p>Caution Signs</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script>

    $(".carousel").swipe({
            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                if (direction == 'left') $(this).carousel('next');
                if (direction == 'right') $(this).carousel('prev');
            },
            allowPageScroll: "vertical"
        });
        var products = {!! $products !!};
        new Vue({

            el:'#home-page',
            data:{
                allProducts:{}
            },
            mounted(){
                this.allProducts = products;
                console.log(this.allProducts)

            }

        })
</script>

<!-- Desktop Styling -->

<style>
    .home__category {
        padding: 25px 5px;
        border: 1px solid #d3d3d3;
        border-radius: 5px;
        /* -webkit-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.36);
        -moz-box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.36);
        box-shadow: 0px 5px 5px 0px rgba(50, 50, 50, 0.36); */
    }
    .home__category img {
        width: 100%;
    }
    .category__heading {
        font-size: 1.1rem;
        color: #1d50c7;
        font-weight: 400;
    }
    a:hover {
        text-decoration: none;
    }

    /* Row Two */

    .custom_card {
        border: #cccccc 1px solid;
        border-radius: 2px;
        padding: 0;
    }
    .custom_card img {
        padding: 30px;
        width: 75%;
    }

    .custom_header {
        width: 100%;
        background-color: #f0f0f0;
        padding: 3px 0;
        border-bottom: solid 1px #cccccc;
        font-size: 1.1rem;
        color: #1d50c7;
        font-weight: 600;
    }
    .custom_header h5 {
        margin-left: 10px;
    }
    .cards_row {
        display: flex;
        justify-content: space-around;
    }

    .shipping_card {
        border: 1px #e3e3e3 solid;
        border-radius: 5px;
    }
    .shipping_card ul {
        list-style: disc;
        display: grid;
        font-size: 0.9rem;
    }
</style>

<!-- Mobile Styling -->
<style>
    .red-heading {
        font-size: 1.1rem;
        color: #d43900;
    }

    /* Icons (MOBILE ONLY) */

    #icons {
        margin: 8px 0;
        display: flex;
        justify-content: space-around;
    }

    .icon {
        padding: 15px;
        /* width: 64px; */
        /* height: 64px; */
        margin: auto;
        text-align: center;
        justify-self: center;
        color: white;
        font-size: 35px;
        background-color: #5bc0de;
    }
    .icon-text {
        text-align: center;
        font-weight: 500;
        margin: 2px 0;
        color: black;
        font-size: 1rem;
    }
    .phone-icon {
        background-color: #4cda64 !important;
    }

    /* Free Shipping */

    #free-shipping {
        font-size: 0.9rem;
        border: #b6d498 2px solid;
        padding: 5px;
    }

    /* Carousel */
    .carousel-div {
        margin-left: 0px !important;
        background-color: #f9f9f9;
    }
    .carousel-img {
        margin: auto;
        padding: 10px 0px;
    }

    /* Category Headers */
    .product {
        border: 1px solid black;
        border-collapse: collapse;
        margin-left: -1px;
        margin-bottom: -1px;
    }

    .sign-img {
        width: 50%;
    }

    @media only screen and (max-width: 768px) {
        #categories_row {
            display: none;
        }
    }
</style>
@endsection
