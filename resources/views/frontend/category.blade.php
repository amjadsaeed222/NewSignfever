@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="category-page" class="my-5 text-center">
    <div class="mx-2 text-center">
        <h3 class="text-left">@{{ category.name }}</h3>
        <div class="row category-main no-gutters">
            <div class="col-md-3">
                <!-- <img src="https://via.placeholder.com/250" style="width:100%;"> -->
                <img
                    src="https://images.mysafetysign.com/img/dp/md/danger-signs-custom.jpg"
                    alt=""
                    srcset=""
                />
            </div>
            <div class="col-md-5 mobile-only">
                <!-- <p>@{{ category.description }}</p> -->
                <p>
                    <a
                        class="overview-btn my-2"
                        data-toggle="collapse"
                        href="#collapseExample"
                        role="button"
                        aria-expanded="false"
                        aria-controls="collapseExample"
                    >
                        Details
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high
                        life accusamus terry richardson ad squid. Nihil anim
                        keffiyeh helvetica, craft beer labore wes anderson cred
                        nesciunt sapiente ea proident.
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <p>
                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                    accusamus terry richardson ad squid. Nihil anim keffiyeh
                    helvetica, craft beer labore wes anderson cred nesciunt
                    sapiente ea proident.
                </p>
            </div>
            <div class="col-md-2">
                <img
                    src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                    alt=""
                    width="100%"
                    class=""
                />
                <p>Ships Today. Order within</p>
                <b>1 hr 9 mins</b>
                <b>FREE SHIPPING</b>
                <ul>
                    <li>Orders over $29.95.</li>
                    <li>
                        Sign orders over $100 ship UPS/Expedited 2nd Day for
                        free. Get your signs on Friday!
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row no-gutters my-3 mx-1 mobile-only" id="free-shipping">
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
    <div v-if="categoryProducts.length > 0" class="my-2 mx-3">
        <h4 class="text-left">@{{ category.name }} - Best Sellers</h4>
        <div class="row">
            <div
                v-for="product in categoryProducts"
                class="col-md-2 col-4 col-xs-6"
            >
                <a :href="'/product/' + product.slug">
                    <div class="card" style="width: 100%">
                        <img
                            stlye="width:100%"
                            class="card-img-top"
                            alt="Card image cap"
                            src="https://images.mysafetysign.com/img/dp/md/danger-signs-custom.jpg"
                        />
                        <!-- :src="'/images/backend_images/product/small/' + product.image" -->
                        <div class="card-body">
                            <p class="card-text">@{{ product.id }}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div v-else>
        <h5 class="text-center">
            No Products on Sale Currently for @{{ category.name }}
        </h5>
        <h6 class="text-center">Vist Later :)</h6>
    </div>
    <div id="accordion">
        <h4>Frequently Asked Questions</h4>
        <div class="card text-left">
            <div class="card-header text-left">
                <a class="card-link" data-toggle="collapse" href="#collapseOne">
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
                    We offer danger signs in a variety of material options to
                    suit different preferences and requirements. While our
                    quality plastic danger signs fall in the more economic
                    range, the aluminum signs, reflective aluminum in
                    particular, are designed to withstand abrasions, chemicals,
                    and abuse. These can be used indoors or outdoors and have a
                    lifespan spanning several years. When it comes to danger
                    labels, our engineer grade labels are a more durable option
                    and created to last over seven years outdoors. Glow vinyl
                    danger signs are available as well that glow-in-the-dark and
                    last outdoors for over five years at least.
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
                    <b class="question">Q.</b> Can messages written on blank
                    danger signs be erased?
                </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    The dry-erase laminated blank danger signs and labels
                    feature a special erasable surface that makes these signs
                    and labels reusable 100s of times. Write your messages with
                    a dry erase pen and use a cloth to erase the writing.
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
                    <b class="question">Q.</b> Do you offer any Spanish custom
                    danger signs?
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Yes we do. Our custom danger sign templates are available in
                    Spanish as well as in English and Spanish bilingual formats.
                    The custom Bilingual danger sign templates are available in
                    ANSI design as well. You may also personalize a bilingual
                    danger sign book to convey your message to a larger
                    audience.
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
            categoryProducts:{}
        },
        mounted(){
            this.categoryProducts = products
            console.log(products)
        }
    })
</script>

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
