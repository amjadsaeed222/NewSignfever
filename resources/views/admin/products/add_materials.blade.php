@extends('layouts.adminLayout.admin_design') @section('content')
<div id="content">
    <div class="container text-center" id="add-materials-page">
        <form
            enctype="multipart/form-data"
            class="form-horizontal"
            method="post"
            action="{{ url('/api/admin/add-material') }}"
            name="add_material"
            id="add_material"
        >
            {{ csrf_field() }}
            <div>
                <div class="single-section">
                    <h5>Product Material</h5>
                    <div class="form-row align-items-center">
                        <!-- <div class="col-sm-3 my-1">
                            <label class="sr-only" for="product_name"
                                >Product Name</label
                            >
                            <input
                                name="product_name"
                                type="text"
                                class="form-control"
                                id="product_name"
                                placeholder="OSHA Sign"
                            />
                        </div> -->

                        <div class="form-row align-items-center">
                            <label for="product_category">Category</label>
                            <select
                                class="form-control"
                                name="product_category"
                                id="product_name"
                            >
                                <option
                                    v-for="product in allProducts"
                                    key="product.id"
                                    v-bind:value="product.id"
                                >
                                    @{{ product.product_name }}
                                </option>
                            </select>
                            <a
                                v-on:click="findProduct()"
                                class="btn btn-outline-primary"
                                >Find Product</a
                            >
                        </div>
                        <div v-if="productFound">
                            <div class="form-row align-items-center">
                                <label for="product_size">Select Size</label>
                                <select
                                    class="form-control"
                                    name="product_size"
                                    id="product_size"
                                >
                                    <option
                                        v-for="size in allSizes"
                                        key="size.id"
                                        v-bind:value="size.id"
                                    >
                                        @{{ size.title }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-3 my-1">
                                <label class="sr-only" for="material_title"
                                    >Material Title</label
                                >
                                <div class="input-group">
                                    <input
                                        name="material_title"
                                        type="text"
                                        class="form-control"
                                        id="material_title"
                                        placeholder="Vertical"
                                    />
                                </div>
                            </div>
                            <div class="col-sm-3 my-1">
                                <label
                                    class="sr-only"
                                    for="material_description"
                                    >Material Description</label
                                >
                                <div class="input-group">
                                    <input
                                        name="material_description"
                                        type="text"
                                        class="form-control"
                                        id="description"
                                        placeholder="Part#"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-auto my-1">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="product_status"
                        />
                        <label class="form-check-label" for="product_status">
                            Status
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-auto my-1">
                <!-- <div> -->
                <a v-on:click="addSize()" class="btn btn-success"> Add Size </a>
                <a v-on:click="removeSize()" class="btn btn-danger">
                    Remove Size
                </a>

                <!-- </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    var products = {!! $products !!}
    // selectedProduct.addEventListener('change', () => {
    //    console.log("haha")
    //     })
    new Vue({
        el: "#add-materials-page",
        data: {
            allProducts:{},
            selectedProduct:'',
            allSizes:[],
            selected:'',
            productFound:false,
        },
        mounted() {
            this.allProducts = products;
        },
        methods: {
             findProduct(){
                console.log(this.selected)
                this.selectedProduct = document.getElementById('product_name').value
                fetch(`/get-size/${this.selectedProduct}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((res) => res.json())
                .then((newRes) => {
                    this.allSizes = newRes;
                    console.log(this.allSizes)
                    this.productFound = true;
                    // Rich Text Editor
                    ClassicEditor
                    .create( document.querySelector( '#description' ) )
                    .catch( error => {
                    console.error( error );
                    } );
                    //
                });
            }
        },
    });
</script>

<style>
    .single-section {
        background-color: white;
        margin: 20px 0px;
        width: 100%;
    }
</style>

@endsection
