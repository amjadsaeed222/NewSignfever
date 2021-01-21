@extends('layouts.frontendLayout.frontend_design') @section('content')

<div id="product-details" class="mt-5 mx-2">
    <div class="row no-gutters">
        <h5>@{{ product.product_name }}</h5>
        <img
            :src="product.sizes[0].images[0]"
            alt=""
            style="width: 75%"
            class="mx-auto d-block"
        />
        <div
            class="col-md-12 no-gutters my-3 mx-1 mobile-only"
            id="free-shipping"
        >
            <div class="row">
                <div class="col-5">
                    <img
                        src="/images/frontend_images/home/quick-turnaround-time-icon.svg"
                        alt=""
                        width="100%"
                        class=""
                    />
                </div>
                <div class="col-10">
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
                    <a v-on:click="handleMaterial(material)" class="material"
                        >@{{ material.title }}</a
                    >
                    <p>$@{{ material.price }}</p>
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
        product_description:
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
    new Vue({
        el: "#product-details",
        data: {
            product: dbProduct,
            selectedSize: {},
            selectedMaterial: {},
        },
        mounted() {
            console.log(this.product.sizes[0].materials[0]);
            this.selectedSize = this.product.sizes[0];
            this.selectedMaterial = this.selectedSize.materials[0];
        },
        methods: {
            handleSize(size) {
                this.selectedSize = size;
            },
            handleMaterial(material) {
                this.selectedMaterial = material;
            },
        },
    });
</script>

<style>
    .cursor-pointer:hover {
        cursor: pointer;
    }
    .mobile-only {
        display: none;
    }
    .sizes {
        border: 1px solid gray !important;
        padding: 2px 15px;
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
