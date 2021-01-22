@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="product-details" class="mt-5 mx-2">
    <div class="desktop-only">
        <div class="row no-gutters">
            <div class="col-2">
                <div class="row">
                    <div class="col-3">
                        <!-- <div class="col-12"> -->
                        <img
                            v-for="image in selectedSize.images"
                            :src="'/images/backend_images/product/large/' + image.image"
                            :alt="product.product_name"
                            style="width: 100%"
                            class="d-block my-2 border cursor-pointer"
                            v-on:click="handleImage(image)"
                        />

                        <!-- </div> -->
                    </div>
                    <div class="col-9">
                        <img
                            :src="'/images/backend_images/product/large/' + selectedImage.image  "
                            :alt="product.product_name"
                            class="d-block w-100"
                        />
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="col-12 bb-1">
                    <h3 class="main-text">@{{ product.product_name }}</h3>
                </div>
                <div class="col-12">
                    <h4>
                        Select Size:
                        <span class="main-text">@{{ selectedSize.title }}</span>
                    </h4>
                    <div class="col-12">
                        <div class="row">
                            <div
                                class="col-1 mx-2 sizes"
                                v-for="size in product.sizes"
                                v-on:click="handleSize(size)"
                            >
                                @{{ size.title }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h4>
                        Select Material:
                        <!-- <span class="main-text">Quantity/Price</span> -->
                    </h4>
                    <div class="col-12">
                        <div class="col-3">
                            <div class="materials_row">
                                <p>
                                    For Size: <b>@{{ selectedSize.title }}</b>
                                </p>
                                <b>1-4</b>
                            </div>
                            <div
                                class="materials_row"
                                v-for="material in selectedSize.materials"
                                v-on:click="handleMaterial(material)"
                            >
                                <p>@{{ material.title }}</p>
                                <p>$20</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <h4>Order Quantity</h4>
                    </div>
                    <div class="col-12">
                        <!-- Order Row -->
                        <div class="d-flex">
                            @{{ selectedMaterial.title }} @{{
                                selectedSize.title
                            }}
                            @{{ product.product_name }}
                            <!-- Total Price = $ @{{}} -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-only">
        <div class="row no-gutters">
            <h4>{{ product.product_name }}</h4>
            <img
                :src="'/images/backend_images/product/large/' + selectedImage.image"
                :alt="product.slug"
                style="width: 75%"
                class="mx-auto d-block p-2"
            />
            <div class="row container no-gutters border px-2 py-2">
                <!-- <div class="col-md-12"> -->
                <img
                    v-for="image in selectedSize.images"
                    :src="'/images/backend_images/product/large/' + image.image"
                    :alt="product.product_name"
                    style="width: 15%"
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
                    <div class="col-4">
                        <img
                            src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                            alt="free-shipping-man"
                            width="100%"
                            class=""
                        />
                    </div>
                    <div class="col-8">
                        <b>Ships Today. </b>
                        <br />Order within: <b>38 mins 55 secs</b>
                        <!-- <span class="highlighted-text">1 day 7 hrs</span> Get your signs
                on Wednesday. Free shipping for orders over $29.95. Orders over
                $100 ship <b>UPS/Expendited 2nd Day</b> for free. Details: -->
                    </div>
                </div>
            </div>
            <h4>
                Select Size:
                <span class="main-text">@{{ selectedSize.title }}</span>
            </h4>
            <div class="col-md-12">
                <div class="row">
                    <div
                        v-for="size in product.sizes"
                        class="col-3"
                        :key="size.id"
                        class="sizes"
                    >
                        <a v-on:click="handleSize(size)" class="sizes"
                            >@{{ size.title }}</a
                        >
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
                    <div
                        v-for="material in selectedSize.materials"
                        class="grid materials"
                        class="sizes"
                    >
                        <img
                            src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                            alt=""
                            width="70%"
                            class=""
                        />
                        <a
                            v-on:click="handleMaterial(material)"
                            class="material"
                            >@{{ material.title }}</a
                        >
                        <p>$@{{ material.price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // var dbProduct = {!! $product !!}

    dbProduct = {
        product_name: "Pool Chemical",
        shape: "Vertical",
        partNo: "PART-34",
        description:
            "A custom danger sign indicates information about specific hazardous conditions that a standard sign cannot always relay. Add your choice of text to this template to create a unique safety sign. For immediate use of your customized design, download a free PDF and print on your inkjet or laser printer.",
        sizes: [
            {
                title: "2x6",
                SPN: "GA-235",
                materials: [
                    {
                        title: "Plastic",
                        description: "",
                        price: 50,
                    },
                    {
                        title: "Alimunium",
                        description: "",
                        price: 80,
                    },
                    {
                        title: "Plastic",
                        description: "",
                        price: 700,
                    },
                ],
                images: [
                    "https://images.mysafetysign.com/img/lg/S/Warning-Custom-ANSI-Danger-Sign-S-3035.gif",
                ],
            },
            {
                title: "5x4",
                SPN: "GA-3566",
            },
            {
                title: "5x4",
                SPN: "GA-3566",
            },
            {
                title: "5x4",
                SPN: "GA-3566",
            },
            {
                title: "5x4",
                SPN: "GA-3566",
            },
        ],
    };

    realDBProduct = {!! $product !!}
    new Vue({
        el: "#product-details",
        data: {
            product: realDBProduct,
            selectedSize: {},
            selectedMaterial: {},
            selectedImage:{}
        },
        mounted() {
            // console.log(this.product.sizes[0].materials[0]);
            this.selectedSize = this.product.sizes[0];

            this.selectedMaterial = this.selectedSize.materials[0];
            console.log(this.selectedMaterial)
            // console.log(this.selectedSize.images[0].image);
            this.selectedImage = this.selectedSize.images[0];
        },
        methods: {
            handleSize(size) {
                this.selectedSize = size;
            },
            handleMaterial(material) {
                this.selectedMaterial = material;
            },
            handleImage(image) {
                this.selectedImage = image;

            }
        },
    });
</script>

<!-- Desktop -->
<style>
    .materials_row {
        display: flex;
        height: 30px;
        width: 250px;
        padding: 0 10px;
        background-color: #ededed;
        /* align-items: center; */
        justify-content: space-between;
    }
    .materials_row:first-child {
        background-color: #cccccc;
    }
    .materials_row:hover {
        background-color: #cccccc;
        cursor: pointer;
    }
</style>

<!-- Mobile -->
<style>
    .cursor-pointer:hover {
        cursor: pointer;
    }
    .mobile-only {
        display: none;
    }
    .sizes {
        border: 2px solid gray !important;
        padding: 2px 15px;
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

    h3 {
        color: #0057a6;
    }

    h4 {
        font-size: 1.3rem;
        color: #d43900;
    }
    .main-text {
        font-size: 1.5rem;
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

@endsection
