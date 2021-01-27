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
            
                <!-- :name="'images_' + + '[]'" -->

                
            
            <div class="single-section" id="size_container"v-for="divs,index in size_divs">
                <h5>Product Size @{{ index + 1 }}</h5>
                
                <div class="form-group">
                    
                    <label for="product_size">Product Size</label>
                    <select
                        class="form-control"
                        name="product_sizes[]"
                        id="product_size"
                        class="d-block w-100"
                        v-on:change="changeSize(event, index)"
                    >
                        <option
                            v-for="size in allSizes"
                            key="size.id"
                            :value="size.id"
                        >
                            @{{ size.title }}
                        </option>
                    </select>
                    <div id="material_container" class="single-section" v-for="divs,index in material_divs">
                        <label for="product_material">Material Type @{{index+1}}</label>
                        <select class="form-control" :name="'materials_' + size_inputs[index].size_id + '[]'" id="product_material">
                        
                            <option v-for="material in allMaterials"
                            key="material.id"
                            :value="material.id">
                            @{{material.title}}</option>
                        </select>
                    </div>
                    <a v-on:click="addMaterial()" class="btn btn-success"> Add Material </a>
                <a v-on:click="removeMaterial()" v-if="material_divs != 1" class="btn btn-danger">Remove Material
                </a>
                    <input
                        type="file"
                        multiple
                        :name="'image_' + size_inputs[index].size_id + '[]'"
                        id=""
                    />
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
                <a v-on:click="removeSize()" v-if="size_divs != 1" class="btn btn-danger">Remove Size
                </a>
                
                <!-- </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    var sizes = {!! $sizes !!}
    console.log(sizes)
    var materials = {!! $materials !!}
    console.log(materials)


    new Vue({
        el: "#add-product-page",
        data: {
            size_inputs: [],
            size_divs: 1,
            allSizes: [],
            allCats: [],
            selectedSize:0,
            material_inputs:[],
            material_divs:1,
            allMaterials:[],
            selectedMaterial:0,
        },
        beforeCreate(){

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
                    // console.log(this.allCats);
                });

                this.allSizes = sizes
                // console.log(this.allSizes)
                this.selectedSize = this.allSizes[0].id

                this.size_inputs.push(
                    {
                        size_id: this.selectedSize
                    }
                )
                console.log(this.size_inputs)
                //Materials
                this.allMaterials = materials
                // console.log(this.allSizes)
                this.selectedMaterial = this.allMaterials[0].id

                this.material_inputs.push(
                    {
                        material_id: this.selectedMaterial
                    }
                )
                console.log(this.material_inputs)


        },
        methods: {
            addSize() {
                this.size_divs = this.size_divs + 1;
                // console.log(this.size_divs);
                this.size_inputs.push(
                    {
                        size_id:this.selectedSize
                    }
                )
            },
            addMaterial() {
                this.material_divs = this.material_divs + 1;
                
                // console.log(this.size_divs);
                this.material_inputs.push(
                    {
                        size_material:this.selectedMaterial
                    }
                )
            },
            removeMaterial() {
                if (this.material_divs == 1) return;
                this.material_divs = this.material_divs - 1;
            },
            removeSize() {
                if (this.size_divs == 1) return;
                this.size_divs = this.size_divs - 1;
            },
            changeSize(e,i){
                // this.selectedSize = e.target.value
                this.size_inputs[i].size_id = e.target.value
                console.log(this.size_inputs[i])
            }

        },
    });
</script>
<script>
    FilePond.parse(document.body);
    
    
    function SetImageName()
    {
        var sizeId=document.getElementById("size_title").value;
        
        var imageId=document.getElementById("images");
        imageId.name="image_".concat(sizeId).concat('[]');
        //alert(sizeId);
        
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
