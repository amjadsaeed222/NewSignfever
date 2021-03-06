@extends('layouts.adminLayout.admin_design') @section('content')
<div id="content">
    <div class="container-fluid text-center" id="add-product-page">
        <form
            enctype="multipart/form-data"
            class="form-horizontal"
            method="post"
            action="{{ url('/api/admin/add-product') }}"
            name="add_product"
            id="add_product"
            class="form"
        >
            {{ csrf_field() }}
            <div class="single-section">
                <h3 class="display-3">Product Basic Information</h3>
                <div class="form-group">
                    <div class="col-sm-3 my-1">
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_category">Category</label>
                    <select
                        class="form-control"
                        name="product_category"
                        id="product_category"
                        class="d-block w-100"
                    >
                        <option
                            v-for="cat in allCats"
                            key="cat.id"
                            :value="cat.id"
                        >
                            @{{ cat.name }}
                        </option>
                    </select>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="product_price">Price</label>
                    <div class="input-group">
                        <input
                            name="product_price"
                            type="number"
                            class="form-control"
                            id="product_price"
                            placeholder="50"
                        />
                    </div>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="product_shape">Shape</label>
                    <div class="input-group">
                        <input
                            name="product_shape"
                            type="text"
                            class="form-control"
                            id="product_shape"
                            placeholder="Vertical"
                        />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 my-1">
                        <label class="sr-only" for="product_part">Part#</label>
                        <div class="input-group">
                            <input
                                name="product_part"
                                type="text"
                                class="form-control"
                                id="product_part"
                                placeholder="Part#"
                            />
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="product_description"
                        >Description</label
                    >
                    <div class="input-group">
                        <textarea
                            name="product_description"
                            class="form-control d-block w-100"
                            id="description"
                        ></textarea>
                    </div>
                </div>
            </div>

            <h3 class="display-3">Product Basic Information</h3>

            <p class="lead">You may add multiple sizes for a product</p>
            <select name="size" id="size" onchange="SetImageName();">
                <option disabled selected value> -- select an option -- </option>
                @foreach ($sizes as $size) 
                <option value="{{$size->id}}">{{$size->title}}</option>    
            @endforeach
            </select> 
            <div class="single-section" id="size_container"v-for="divs,index in size_divs">
                <h5>Product Size @{{ index + 1 }}</h5>
                <input type="file" id="images" name="images" multiple="multiple" />
                <!-- :name="'images_' + + '[]'" -->

                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="size_title">Size Title</label>
                    <div class="input-group">
                        <input
                            name="size_title[]"
                            type="text"
                            class="form-control"
                            id="size_title"
                            placeholder="2x2"
                        />
                    </div>
                </div>
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="SPN">SPN#</label>
                    <div class="input-group">
                        <input
                            name="size_SPN[]"
                            type="text"
                            class="form-control"
                            id="size_SPN"
                            placeholder="GA-356"
                        />
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
            <div class="col-auto my-1">
                <!-- <div> -->
                <a v-on:click="addSize()" class="btn btn-success"> Add Size </a>
                <a
                    v-on:click="removeSize()"
                    v-if="size_divs != 1"
                    class="btn btn-danger"
                >
                    Remove Size
                </a>

                <!-- </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    new Vue({
        el: "#add-product-page",
        data: {
            // sizes: [{}],
            size_divs: 1,
            allSizes: [],
            allCats: [],
        },
        mounted() {
            fetch("/all", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((res) => res.json())
                .then((newRes) => {
                    this.allCats = newRes;
                    console.log(this.allCats);
                });

            fetch("/all-sizes", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((res) => res.json())
                .then((newRes) => {
                    this.allSizes = newRes;
                    console.log(this.allSizes);
                });
        },
        beforeCreate() {},
        methods: {
            addSize() {
                this.size_divs = this.size_divs + 1;
                console.log(this.size_divs);
            },
            removeSize() {
                if (this.size_divs == 1) return;
                this.size_divs = this.size_divs - 1;
            },
        },
    });
</script>
<script>
    FilePond.parse(document.body);
    
    function SetImageName()
    {
        //alert("hello");
        var sizeId=document.getElementById("size").value;
        var imageId=document.getElementById("images");
        imageId.name="image_".concat(sizeId);
        
    }
</script>
<style>
    .single-section {
        background-color: white;
        margin: 20px 0px;
        width: 100%;
    }
    .form {
        display: flex;
    }
    .form-group {
        /* display: inline-block; */
    }
</style>

@endsection
