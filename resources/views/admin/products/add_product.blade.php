@extends('layouts.adminLayout.admin_design') @section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<div id="add-product-page" >
    <div class="container">
        <div class="my-5" id="form content"  >
            <h5 class="text-center">Add A New Product</h5>

            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/admin/add-product') }}"
                name="add_product"
                id="add_product"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label
                            for="product_name"
                            class="col-sm-3 col-form-label"
                            >Product Name</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="product_name"
                                name="product_name"
                                placeholder="Product Name"
                            />
                            @error('product_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_index"
                            class="col-sm-3 col-form-label"
                            >Product Index</label
                        >
                        <div class="col-sm-9">
                            <select
                                name="product_index"
                                id="product_index"
                                class="form-control"
                            >
                                <option disabled selected>
                                    Select An Index
                                </option>
                                @foreach ($indexes as $index)
                                <option value="{{$index->id}}">{{$index->title}}</option>    
                                @endforeach
                                
                            </select>
                                @error('product_index')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_description"
                            class="col-sm-3 col-form-label"
                            >Product Description</label
                        >
                        <div class="col-sm-9">
                            <textarea
                                
                                class="ckeditor form-control"
                                id="description"
                                name="description"
                                placeholder="Product Description"
                            ></textarea>
                                @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_price"
                            class="col-sm-3 col-form-label"
                            >Product Price</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="number"
                                class="form-control"
                                id="product_price"
                                name="product_price"
                                placeholder="Product Price"
                            />
                                @error('product_price')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_shape"
                            class="col-sm-3 col-form-label"
                            >Product Shape</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="product_shape"
                                name="product_shape"
                                placeholder="Product Shape"
                            />
                                @error('product_shape')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_part_no"
                            class="col-sm-3 col-form-label"
                            >Product Part#</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="product_part_no"
                                name="product_part_no"
                                placeholder="Product Part#"
                            />
                                @error('product_part_no')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Status</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="gridCheck1"
                                    name="product_status"
                                />
                                <label
                                    class="form-check-label"
                                    for="gridCheck1"
                                >
                                    Make Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Featured</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="product_feature"
                                    name="product_feature"
                                />
                                <label
                                    class="form-check-label"
                                    for="product_feature"
                                >
                                    Make featured Product
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Choose Images</div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    multiple
                                    name="product_images[]"
                                    class="custom-file-input"
                                    id="product_images"
                                />
                                <label
                                    class="custom-file-label"
                                    for="product_images"
                                    >Choose Multiple Images</label
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div id="product_attribute_sizes">
                    <div class="form-group row" v-for="size,index in size_divs">
                        <label
                            for="product_size"
                            class="col-sm-3 col-form-label"
                            >Size @{{ index + 1 }}</label
                        >
                        <div class="col-sm-9">
                            <select
                                name="product_sizes[]"
                                id="product_size"
                                class="form-control"
                            >
                                <option disabled selected>Select A Size</option>
                                @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->title}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10"></div>
                    </div>
                </div>
                <div id="product_attribute_materials">
                    <div
                        class="form-group row"
                        v-for="material,index in material_divs"
                    >
                        <label
                            for="product_material"
                            class="col-sm-3 col-form-label"
                            >Material @{{ index + 1 }}</label
                        >
                        <div class="col-sm-9">
                            <select
                                name="product_materials[]"
                                id="product_material"
                                class="form-control"
                            >
                                <option disabled selected>
                                    Select A Material
                                </option>
                                @foreach ($materials as $material)
                                <option value="{{$material->id}}">{{$material->title}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <div class="my-1">
                            <div
                                class="btn btn-primary"
                                v-on:click="addMaterial()"
                            >
                                Add Material
                            </div>
                            <div
                                class="btn btn-danger"
                                v-if="material_divs > 1"
                                v-on:click="removeMaterial()"
                            >
                                Remove Material
                            </div>
                        </div>
                        <div class="my-1">
                            <div class="btn btn-primary" v-on:click="addSize()">
                                Add Size
                            </div>
                            <div
                                class="btn btn-danger"
                                v-if="size_divs > 1"
                                v-on:click="removeSize()"
                            >
                                Remove Size
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
            material_divs: 1,

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
                // this.size_inputs.push(
                //     {
                //         size_id:this.selectedSize
                //     }
                // )
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
            addMaterial() {
                this.material_divs = this.material_divs + 1;
                // console.log(this.size_divs);
                // this.size_inputs.push(
                //     {
                //         size_id:this.selectedSize
                //     }
                // )
            },
            removeMaterial() {
                if (this.material_divs == 1) return;
                this.material_divs = this.material_divs - 1;
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
    .form-group {
        /* display: inline-block; */
    }
</style>

@endsection
