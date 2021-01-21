@extends('layouts.frontendLayout.frontend_design') @section('content')
<div id="home-page" class="row no-gutters">
    <div class="col-12" id="categories_row">
        <h5>Categories You Might Like:</h5>
        <div class="col-md-2">
            <a href="/category/medical-safety">
                <div class="card" style="width: 100%">
                    <img
                        class="card-img-top"
                        src="{{
                            asset(
                                '/images/frontend_images/home/medical_safety.png'
                            )
                        }}"
                        alt="Card image cap"
                        stlye="width:100%"
                    />
                    <div class="card-body">
                        <p class="card-text">Medical Safety</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-2">
            <a href="/category/social-distances">
                <div class="card" style="width: 100%">
                    <img
                        class="card-img-top"
                        src="{{
                            asset(
                                '/images/frontend_images/home/social_distancing.jpg'
                            )
                        }}"
                        alt="Card image cap"
                        stlye="width:100%"
                    />
                    <div class="card-body">
                        <p class="card-text">Social Distancing</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- <div class="col-12 text-center carousel-div">
        <div
            id="carouselExampleSlidesOnly"
            class="text-center carousel slide"
            data-ride="carousel"
        >
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
        </div>
    </div> -->
    <div class="col-12 text-center carousel-div">
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
            <span class="highlighted-text">1 day 7 hrs</span> Get your signs on
            Wednesday. Free shipping for orders over $29.95. Orders over $100
            ship <b>UPS/Expendited 2nd Day</b> for free. Details:
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
            <a href="/category/danger-sign">
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
                    src="/images/frontend_images/home/danger-header-signs.jpg"
                    class="sign-img"
                    alt="Danger Sign"
                />
                <p>Danger Signs</p>
            </a>
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
