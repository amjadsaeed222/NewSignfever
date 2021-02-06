@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="category-page">
    <div class="desktop-only">
        <div class="row no-gutters mx-3 my-4">
            <div class="col-12">
                <h4>@{{ category.title }}</h4>
            </div>
            <div class="col-3">
                <div class="col-12">
                    <img
                        :src="'/images/backend_images/index/' + category.image"
                        :alt="category.name"
                        class="d-block w-100"
                    />
                </div>
            </div>
            <!-- Description -->
            <div class="col-7">
                <div
                    class="col-12"
                    v-html="category.description"
                    class="description"
                ></div>
            </div>
            <div class="col-2">
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
            <div class="col-12">
                <h4>@{{ category.title }} - Featured</h4>
            </div>
            <!-- <div class="products" > -->
            <div class="col-2 border" v-for="product in products">
                <!-- <div class="col-12"> -->
                <a :href="'/product/' + product.slug ">
                    <img
                        :src="'/images/backend_images/product/large/' + getProductImage(product)"
                        :alt="product.slug"
                        class="d-block mx-auto w-100"
                    />
                    <!-- :src=" '/images/backend_images/large/' + product.product_name " -->
                    <p class="text-center">@{{ product.product_name }}</p>
                </a>

                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>

    <div class="mobile-only">
        <div class="my-5 text-center">
            <div class="mx-2 text-center">
                <h3 class="text-left">@{{ category.title }}</h3>
                <div class="row category-main no-gutters">
                    <div class="col-md-3">
                        <!-- <img src="https://via.placeholder.com/250" style="width:100%;"> -->
                        <img
                            :src="'/images/backend_images/index/' + category.image"
                            :alt="category.name"
                            class="d-block mx-auto my-5"
                        />
                    </div>
                    <div class="col-md-5 mobile-only">
                        <!-- <p>@{{ category.description }}</p> -->
                        <p>
                            <!-- class="overview-btn my-2" -->
                            <a
                                class="btn btn-outline-success"
                                data-toggle="collapse"
                                href="#collapseExample"
                                role="button"
                                aria-expanded="false"
                                aria-controls="collapseExample"
                            >
                                More Info
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div
                                class="card card-body text-left"
                                v-html="category.description"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="row no-gutters my-3 mx-1 mobile-only"
                id="free-shipping"
            >
                <div class="row no-gutters">
                    <img
                        class="col-2 d-block w-100 no-gutters"
                        src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                        alt="free_shipping_timer"
                        width="100%"
                        class=""
                    />

                    <div class="col-9 text-left">
                        <b>Ships Tomorrow. </b> Order within
                        <span class="highlighted-text">1 day 7 hrs</span> Get
                        your signs on Wednesday. Free shipping for orders over
                        $29.95. Orders over $100 ship
                        <b>UPS/Expendited 2nd Day</b> for free. Details:
                    </div>
                </div>
            </div>
            <div v-if="products.length > 0" class="my-2 mx-3">
                <h4 class="text-left">@{{ category.title }} - Featured</h4>
                <div class="row">
                    <div v-for="product in products" class="col-6">
                        <!-- <div class="col-12"> -->
                        <a :href="'/product/' + product.slug">
                            <div class="card" style="width: 100%">
                                <img
                                    stlye="width:100%"
                                    class="card-img-top"
                                    alt="Card image cap"
                                    :src="'/images/backend_images/product/large/' + getProductImage(product)"
                                />
                                <!-- src="https://images.mysafetysign.com/img/dp/md/danger-signs-custom.jpg" -->
                                <div class="card-body w-100">
                                    <p class="card-text w-100">
                                        @{{ product.product_name }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div v-else>
                <h5 class="text-center">
                    No Products on Sale Currently for @{{ category.title }}
                </h5>
                <h6 class="text-center">Vist Later :)</h6>
            </div>
            <div id="accordion">
                <h4>Frequently Asked Questions</h4>
                <div class="card text-left">
                    <div class="card-header text-left">
                        <a
                            class="card-link"
                            data-toggle="collapse"
                            href="#collapseOne"
                        >
                            <b class="question">Q.</b> Which is the most durable
                            material for danger signs?
                        </a>
                    </div>
                    <div
                        id="collapseOne"
                        class="collapse show"
                        data-parent="#accordion"
                    >
                        <div class="card-body">
                            We offer danger signs in a variety of material
                            options to suit different preferences and
                            requirements. While our quality plastic danger signs
                            fall in the more economic range, the aluminum signs,
                            reflective aluminum in particular, are designed to
                            withstand abrasions, chemicals, and abuse. These can
                            be used indoors or outdoors and have a lifespan
                            spanning several years. When it comes to danger
                            labels, our engineer grade labels are a more durable
                            option and created to last over seven years
                            outdoors. Glow vinyl danger signs are available as
                            well that glow-in-the-dark and last outdoors for
                            over five years at least.
                        </div>
                    </div>
                </div>

                <div class="card text-left">
                    <div class="card-header">
                        <a
                            class="collapsed card-link"
                            data-toggle="collapse"
                            href="#collapseTwo"
                        >
                            <b class="question">Q.</b> Can messages written on
                            blank danger signs be erased?
                        </a>
                    </div>
                    <div
                        id="collapseTwo"
                        class="collapse"
                        data-parent="#accordion"
                    >
                        <div class="card-body">
                            The dry-erase laminated blank danger signs and
                            labels feature a special erasable surface that makes
                            these signs and labels reusable 100s of times. Write
                            your messages with a dry erase pen and use a cloth
                            to erase the writing.
                        </div>
                    </div>
                </div>

                <div class="card text-left">
                    <div class="card-header">
                        <a
                            class="collapsed card-link"
                            data-toggle="collapse"
                            href="#collapseThree"
                        >
                            <b class="question">Q.</b> Do you offer any Spanish
                            custom danger signs?
                        </a>
                    </div>
                    <div
                        id="collapseThree"
                        class="collapse"
                        data-parent="#accordion"
                    >
                        <div class="card-body">
                            Yes we do. Our custom danger sign templates are
                            available in Spanish as well as in English and
                            Spanish bilingual formats. The custom Bilingual
                            danger sign templates are available in ANSI design
                            as well. You may also personalize a bilingual danger
                            sign book to convey your message to a larger
                            audience.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var category = {!! $category !!}
    var products = {!! $products !!}

    new Vue({
        el:'#category-page',
        data:{
            category:{},
            products:[]
        },
        mounted(){
            this.category = category
            this.products = products
            console.log(this.products)
            console.log(this.category)
        },
        methods:{
            getProductImage(product) {
                return product.images[0].image
            }
        }
    })
</script>

<style>
    #category-page ul {
        list-style: disc;
        display: grid;
    }

    .shipping_card {
        border: 1px #e3e3e3 solid;
        border-radius: 5px;
        width:250px;
    }
    .shipping_card ul {
        list-style: disc;
        display: grid;
        font-size: 0.9rem;
    }
</style>

<style>
    .mobile-only {
        display: none;
    }

    h3 {
        color: #0057a6;
    }

    h4 {
        font-size: 1.1rem;
        color: #d43900;
    }
    .question {
        color: #d43900;
        font-size: 1.3rem;
    }

    #free-shipping {
        max-height: 120px;
        font-size: 0.9rem;
        border: #b6d498 2px solid;
        padding: 5px;
    }
    .overview-btn {
        width: 100%;
        background-color: gray;
        padding: 10px;
    }
    .overview-btn:hover {
        text-decoration: none;
    }
    .category-main {
        border: 1px solid gray;
        padding: 10px 0;
    }
    @media only screen and (max-width: 768px) {
        #categories_row {
            display: none;
        }
        .mobile-only {
            display: block;
        }
    }
</style>

@endsection
