@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="product-details" class="mt-5 mx-2">
    <div class="desktop-only">
        <div class="row no-gutters">
            <!-- Image -->
            <div class="col-3">
                <div class="row">
                    <!-- More Images -->
                    <div class="col-3">
                        <!-- <div class="col-12"> -->
                        <img
                            v-for="image in product.images"
                            :src="'/images/backend_images/product/large/' + image.image"
                            :alt="product.product_name"
                            style="width: 100%"
                            class="d-block my-2 border cursor-pointer"
                            v-on:click="handleImage(image)"
                        />

                        <!-- </div> -->
                    </div>

                    <!-- Main Image -->
                    <div class="col-9">
                        <img
                            :src="'/images/backend_images/product/large/' + selectedImage.image  "
                            :alt="product.product_name"
                            class="d-block w-100 cursor-pointer"
                            data-toggle="modal"
                            data-target="#exampleModal"
                        />

                        <table class="table table-bordered my-2">
                            <tbody>
                                <tr>
                                    <td>Part#</td>
                                    <td>@{{ product.partNo }}</td>
                                </tr>
                                <tr>
                                    <td>SPN#</td>
                                    <td>@{{ selectedSize.SPN }}</td>
                                </tr>
                                <tr>
                                    <td>Shape</td>
                                    <td>@{{ product.shape }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="">
                            <h4>Product Description</h4>
                            <div
                                class="product-description"
                                v-html="product.description"
                            ></div>
                        </div>
                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="exampleModal"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img
                                            :src="'/images/backend_images/product/large/' + selectedImage.image  "
                                            :alt="product.product_name"
                                            class="d-block w-100"
                                            data-toggle="modal"
                                            data-target="#exampleModal"
                                        />
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12"></div>
                </div>
            </div>
            <!-- Product Details -->
            <div class="col-9">
                <div class="col-12 bb-1">
                    <h3 class="main-text">
                        {!! $product->index_title !!}: @{{
                            product.product_name
                        }}
                    </h3>
                </div>
                <div class="col-12 rating no-gutters">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span>based on 244 customer reviws</span>
                    <div class="rating__border"></div>
                </div>
                <div class="col-12 my-4">
                    <h4>Select A Design:</h4>
                    <div class="col-12 mx-1">
                        <div class="slider">
                            <div
                                class="slide"
                                v-for="product in product.index_products"
                                style="border: 1px solid rgb(146, 146, 146)"
                            >
                                <!-- src="/images/frontend_images/home/quick-turnaround-time-icon.svg" -->
                                <img
                                    :src="'/images/backend_images/product/large/' + product.image.image"
                                    alt="product-designs"
                                    width="70%"
                                    height=""
                                    class="d-block mx-auto cursor-pointer"
                                    v-on:click="handleDesign(product.slug)"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 my-4">
                    <h4>
                        Select Size:
                        <span class="main-text">@{{ selectedSize.title }}</span>
                    </h4>
                    <div class="col-12">
                        <div class="row">
                            <div
                                class="col-sm-auto mx-2 desktop-sizes cursor-pointer"
                                v-for="size in product.sizes"
                                v-on:click="handleSize(size)"
                            >
                                @{{ size.title }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-4">
                    <h4>
                        Select Material:
                        <!-- <span class="main-text">Quantity/Price</span> -->
                    </h4>
                    <div class="col-12 row">
                        <div class="col-6">
                            <div class="materials_row">
                                <p>
                                    For Size: <b>@{{ selectedSize.title }}</b>
                                </p>
                                <b>1-4</b>
                            </div>
                            <div
                                class="materials_row"
                                v-for="material in product.materials"
                                v-on:click="handleMaterial(material)"
                            >
                                <p>@{{ material.title }}</p>
                                <p>$@{{ material.price }}</p>
                            </div>
                        </div>
                        <div
                            class="col-6 border material-description"
                            v-if="materialDescription"
                        >
                            <p style="font-weight: 700">Material Description</p>
                            <div v-html="materialDescription"></div>
                        </div>
                    </div>
                </div>
                <!-- <form method="POST" action="/admin/add-to-cart/product.id/selectedSize.id/selectedMaterial.id" enctype="multipart/form-data"> -->
                <!-- @csrf -->
                <input type="hidden" name="product_id" :value=" product.id" />
                <input
                    type="hidden"
                    name="product_name"
                    :value="product.product_name"
                />

                <div class="col-12 my-4 no-gutters">
                    <h4>Order Quantity</h4>
                    <div class="col-12 no-gutters">
                        <!-- Order Row -->
                        <div class="d-flex order-info no-gutters">
                            <div class="col-sm-auto">
                                <div class="col-12">
                                    <p>Size:</p>
                                </div>
                                <div class="col-12">
                                    <p>Material:</p>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="col-12">
                                    <p>
                                        <b>@{{ selectedSize.title }}</b>
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p v-if="selectedMaterial.title">
                                        <b>@{{ selectedMaterial.title }}</b>
                                    </p>
                                    <p v-else>
                                        <small>Please Select A Material</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="col-12 my-auto">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button
                                                class="input-group-text"
                                                id="inputGroupPrepend"
                                                v-on:click="{qty > 1 ? qty -- : qty }"
                                            >
                                                <b style="font-size: 1rem">
                                                    -
                                                </b>
                                            </button>
                                            <input
                                                type="number"
                                                name="product_quantity"
                                                :value="qty"
                                                required
                                                minlength="1"
                                                class="d-block w-100 text-center"
                                            />
                                            <!-- class="form-control" -->
                                            <button
                                                class="input-group-text"
                                                id="inputGroupPostpend"
                                                v-on:click="{qty ++}"
                                            >
                                                <b style="font-size: 1rem">
                                                    +
                                                </b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="col-12">
                                    <p><b>Total Price</b></p>
                                </div>
                                <div class="col-12">
                                    <p><small>Per Sign</small></p>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="col-12">
                                    <p>
                                        <b>$@{{ variationPrice(qty) }}</b>
                                    </p>
                                    <input
                                        type="hidden"
                                        name="product_price"
                                        value="@{{ variationPrice(qty) }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <p>
                                        <small
                                            ><b
                                                >$@{{ variationPrice() }}</b
                                            ></small
                                        >
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="col-12">
                                    <button
                                        v-on:click="addToCart()"
                                        class="btn btn-success"
                                        type="submit"
                                    >
                                        Add To Cart
                                    </button>
                                </div>
                            </div>
                            <!-- Total Price = $ @{{}} -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
            <div class="col-12">
                <h4>Related Departments</h4>
            </div>
            <div class="col-12 my-3">
                <div class="row cards_row">
                    <div class="col-2 mx-1 custom_card">
                        <a href="/index/custom-danger-signs">
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
                    <div class="col-2 mx-1 custom_card">
                        <a href="/index/social-distancing">
                            <div class="custom_header">
                                <h5 class="">Social Distances</h5>
                            </div>
                            <img
                                src="/images/frontend/home/custom_templates/social_distancing.jpg"
                                alt=""
                                class="d-block mx-auto"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-only">
        <div class="row no-gutters">
            <h4>
                {!! $product->index_title !!}: {!!$product->product_name !!}
            </h4>
            <img
                :src="'/images/backend_images/product/large/' + selectedImage.image"
                :alt="product.slug"
                style="width: 250px; height: 100%"
                class="mx-auto d-block p-2"
            />
            <div class="row container no-gutters border px-2 py-2">
                <!-- <div class="col-md-12"> -->
                <img
                    v-for="image in product.images"
                    :src="'/images/backend_images/product/large/' + image.image"
                    :alt="product.product_name"
                    style="width: 50px; height: 50px"
                    class="d-block my-2 mx-auto border cursor-pointer"
                    v-on:click="handleImage(image)"
                />
                <!-- </div> -->
            </div>

            <!-- Free Shipping -->
            <div
                class="col-md-12 no-gutters my-3 mx-1 mobile-only"
                id="free-shipping"
            >
                <div class="row">
                    <div class="col-3">
                        <img
                            src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                            alt="free-shipping-man"
                            width="100%"
                            class="d-block mx-auto"
                        />
                    </div>
                    <div class="col-7">
                        <b>Ships Today. </b>
                        <br />Order within: <b>38 mins 55 secs</b>
                        <!-- <span class="highlighted-text">1 day 7 hrs</span> Get your signs
                on Wednesday. Free shipping for orders over $29.95. Orders over
                $100 ship <b>UPS/Expendited 2nd Day</b> for free. Details: -->
                    </div>
                </div>
            </div>
            <div class="col-12 my-2">
                <h4>Select A Design:</h4>
                <div class="col-12">
                    <div class="slider">
                        <div
                            class="slide row"
                            v-for="product in product.index_products"
                        >
                            <div class="col-12">
                                <!-- :src="'/images/backend_images/product/large/' + designImage(product[].images[0].image) " -->
                                <!-- src="/images/frontend_images/home/quick-turnaround-time-icon.svg" -->
                                <img
                                    :src="'/images/backend_images/product/large/' + product.image.image"
                                    alt="product-designs"
                                    width="80%"
                                    height=""
                                    class="d-block mx-auto"
                                    v-on:click="handleDesign(product.slug)"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 my-4">
                <h4>
                    Select Size:
                    <span class="main-text"> {{ selectedSize.title }} </span>
                </h4>
                <div class="col-12">
                    <div class="row">
                        <div
                            class="col-auto mx-2 sizes cursor-pointer"
                            v-for="size in product.sizes"
                            v-on:click="handleSize(size)"
                        >
                            @{{ size.title }}
                        </div>
                    </div>
                </div>
            </div>
            <h4>
                Select Material:
                <span class="main-text"> @{{ selectedMaterial.title }} </span>
            </h4>
            <div class="col-md-12 mx-2">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <h6>For size @{{ selectedSize.title }}</h6>
                    </div>
                    <!-- <div class="row">
                        <div
                            v-for="material in selectedSize.materials"
                            class="col-12"
                        >
                            <div class="col-auto">
                                <img
                                    src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                                    alt=""
                                    width="25%"
                                />
                            </div>
                            <div class="col-auto">
                                <a
                                    v-on:click="handleMaterial(material)"
                                    class=""
                                    >@{{ material.title }}</a
                                >
                            </div>
                            <div class="col-auto">$@{{ product.price }}</div>
                        </div>
                    </div> -->
                    <div
                        class="row mobile-material-row no-gutters my-2 cursor-pointer"
                        v-for="material in product.materials"
                        v-on:click="handleMaterial(material)"
                    >
                        <img
                            src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                            alt=""
                            class="col-2 d-block w-100 no-gutters"
                        />
                        <p class="col-auto mx-auto">@{{ material.title }}</p>
                        <p class="col-auto mx-auto">$@{{ material.price }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 no-gutters">
                <div class="col-12">
                    <h4>Order Quantity:</h4>
                </div>
                <div class="col-12 order-info">
                    <div class="col-auto">
                        <div class="col-12">
                            <p class="mx-auto">
                                Size: <b>@{{ selectedSize.title }}</b>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="mx-auto">
                                Material:
                                <b v-if="selectedMaterial.title">
                                    @{{ selectedMaterial.title }}
                                </b>
                                <b v-else>
                                    <small>Please Select A Material</small>
                                </b>
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="row qty-row">
                                <div class="col-6 my-2">
                                    <h6 class="text-center">Quantity</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button
                                                class="input-group-text"
                                                id="inputGroupPrepend"
                                                v-on:click="{qty > 1 ? qty -- : qty }"
                                            >
                                                <b style="font-size: 1rem">
                                                    -
                                                </b>
                                            </button>
                                            <input
                                                type="number"
                                                :value="qty"
                                                required
                                                minlength="1"
                                                class="d-block w-100 text-center"
                                            />
                                            <!-- class="form-control" -->
                                            <button
                                                class="input-group-text"
                                                id="inputGroupPostpend"
                                                v-on:click="{qty ++}"
                                            >
                                                <b style="font-size: 1rem">
                                                    +
                                                </b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 my-2">
                                    <div class="col-auto">
                                        <div class="col-12">
                                            <p class="mx-auto">
                                                Total Price:
                                                <b
                                                    >$@{{
                                                        variationPrice(qty)
                                                    }}</b
                                                >
                                            </p>
                                            <input
                                                type="hidden"
                                                name="product_price"
                                                value="@{{
                                                    variationPrice(qty)
                                                }}"
                                            />
                                        </div>
                                        <div class="col-12">
                                            <p class="mx-auto">
                                                Per Sign:
                                                <b>
                                                    $@{{ variationPrice() }}
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a
                                        href="/shopping-cart"
                                        class="btn btn-success w-100"
                                    >
                                        Add To Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-auto"></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // var dbProduct = {!! $product !!}


    var dbProduct = {!! $product !!}
    // console.log(dbProduct)
    new Vue({
        el: "#product-details",
        data: {
            product: dbProduct,
            selectedSize: {},
            selectedMaterial: {},
            selectedImage:{},
            qty:1,
            designImage:null,
            cartProduct:{},
            materialDescription:''
        },
        computed: {
            index_title() {
                return this.product.index_title;
            }
        },
        mounted() {
            this.selectedSize = this.product.sizes[0];
            // this.selectedMaterial = this.selectedSize.materials[0];

            this.selectedMaterial = this.product.materials[0]
            // console.log(this.selected)
            // console.log(this.selectedMaterial)
            // console.log(this.selectedSize.images[0].image);
            // this.selectedImage = this.selectedSize.images[0];
            this.selectedImage = this.product.images[0];
            console.log(this.selectedSize)

        },
        methods: {
            handleSize(size) {
                this.selectedSize = size;
            // .lenght > 1 ? this.selectedMaterial = size.materials[0] : this.selectedMaterial = "None"

            },
            handleMaterial(material) {
                this.selectedMaterial = material;
                this.materialDescription = material.description;
                console.log()
            },
            handleImage(image) {
                this.selectedImage = image;

            },
            handleDesignImage(image) {
                this.designImage = image
            },
            addToCart() {
                cartProduct:{
                    // localStorage.setItem('cartProducts',)
                    window.location.href = "/shopping-cart"
                    window.location.href = `/add-to-cart/${this.product.id}/${this.selectedSize.id}/${this.selectedMaterial.id}/${this.selectedImage.id}/${this.qty}`
                }
            },
            handleDesign(slug){
                window.location.href = `/product/${slug}`

            },
            variationPrice(qty=1) {
                var finalPrice = (this.product.price + this.selectedSize.price + this.selectedMaterial.price) * qty;
                 finalPrice = finalPrice.toFixed(2);

                return finalPrice;
            }
        },
    });
</script>

<!-- Template GLOBALs -->
<style>
    .rating {
        font-size: 1rem;
    }
    .rating__border {
        border-bottom: 1px solid #cccccc;
        margin: 2px 5px;
    }
    .material-description {
        padding: 20px;
    }
    .product-description ul {
        list-style: disc;
        margin-left: 2px;
        padding-inline-start: 10px;
        display: unset;
    }
</style>

<!-- Desktop -->
<style>
    .materials_row {
        display: flex;
        height: 30px;
        width: 350px;
        padding: 0 10px;
        background-color: #ededed;
        /* align-items: center; */
        justify-content: space-between;
    }

    .materials_row ul {
        list-style: disc;
        margin-left: 2px;
        padding-inline-start: 10px;
        display: unset !important;
    }

    .materials_row:first-child {
        background-color: #cccccc;
    }
    .materials_row:hover {
        background-color: #cccccc;
        cursor: pointer;
    }
    .checked {
        color: orange;
    }

    /* Sizes Div */

    .desktop-sizes {
        border: 2px solid gray !important;
        padding: 2px 15px;
    }
    .desktop-sizes:hover {
        border: 2px solid #d43900 !important;
    }
    .order-info {
        border: 1px solid #cccccc;
        padding: 10px 10px;
        width: 890px;
    }

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
        margin: 2px 5px;
        /* justify-content: ; */
    }
</style>

<!-- Mobile -->
<style>
    .qty-row {
        border-top: #cccccc 1px solid;
    }

    .mobile-only {
        display: none;
    }
    .sizes {
        border: 2px solid gray !important;
        padding: 2px 3px;
    }
    .sizes:hover {
        border: 2px solid #d43900 !important;
    }
    .materials {
        display: grid;
        grid-template-columns: 1fr 4fr 1fr;
        background-color: rgb(185, 185, 185);
        align-items: center;
        justify-content: space-around;
        margin: 2px 0;
    }

    .mobile-material-row {
        background-color: rgb(185, 185, 185);
        align-items: center;
        align-content: center;
    }

    .mobile-material-row:hover {
        background-color: #cccccc;
        align-items: center;
        align-content: center;
    }

    h3 {
        color: #0057a6;
    }

    h4 {
        font-size: 1.2rem;
        color: #d43900;
    }
    .main-text {
        font-size: 1.3rem;
        color: black;
    }
    #free-shipping {
        font-size: 0.9rem;
        border: #b6d498 2px solid;
        padding: 5px;
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

<!-- Slider -->

<style>
    .slider {
        width: 100%;
        height: 200px;
        display: flex;
        overflow-x: auto;
    }
    .slide {
        width: 250px;
        flex-shrink: 0;
        height: 100%;
    }

    .slide:hover {
        border: 2px solid red;
    }
</style>
@endsection
