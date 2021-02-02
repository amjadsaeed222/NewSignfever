@extends('layouts.adminLayout.admin_design') @section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<div id="content">
    <div class="container" id="edit-product-page">
        <div class="my-5" id="form">
            <h5 class="text-center">Edit Product</h5>

            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/admin/edit-product/'.$productDetails->slug) }}"
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
                            <input required
                                type="text"
                                class="form-control"
                                id="product_name"
                                name="product_name"
                                value="{{$productDetails->product_name}}"
                                placeholder="Product Name"
                            />
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
                                @foreach ($productIndexes as $index)
                                <option value="{{$index->id}}"
                                    @if ($index->id==$productDetails->index_Id)
                                            selected
                                        @endif
                                    >{{$index->title}}</option>    
                                @endforeach
                                
                            </select>
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
                                id="product_description"
                                name="product_description"
                                placeholder="Product Description"
                            >{{$productDetails->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_price"
                            class="col-sm-3 col-form-label"
                            >Product Price</label
                        >
                        <div class="col-sm-9">
                            <input required
                                type="number"
                                class="form-control"
                                id="product_price"
                                name="product_price"
                                value="{{$productDetails->price}}"
                                placeholder="Product Price"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_shape"
                            class="col-sm-3 col-form-label"
                            >Product Shape</label
                        >
                        <div class="col-sm-9">
                        <select
                                name="product_shape"
                                id="product_shape"
                                class="form-control"
                                required
                            >
                                <option disabled selected value="None">
                                    Select A Shape
                                </option>
                                <option value="Vertical">Vertical</option>
                                <option value="Horizontal">Horizontal</option>
                                <option value="Octagon">Octagon</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="product_part_no"
                            class="col-sm-3 col-form-label"
                            >Product Part#</label
                        >
                        <div class="col-sm-9">
                            <input required
                                type="text"
                                class="form-control"
                                id="product_part_no"
                                name="product_part_no"
                                value="{{$productDetails->partNo}}"
                                placeholder="Product Part#"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Status</div>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input required
                                    class="form-check-input"
                                    type="checkbox"
                                    id="gridCheck1"
                                    
                                    <?php if($productDetails->status==1) echo "checked";?> 
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
                                <input required
                                    class="form-check-input"
                                    type="checkbox"
                                    id="product_feature"
                                    name="product_feature"
                                    <?php if($productDetails->feature) echo "checked";?>
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
                                <input required
                                    type="file"
                                    multiple
                                    name="product_images[]"
                                    class="custom-file-input"
                                    id="product_images"
                                />
                            @foreach ($productImages as $image)
                                <input required
                                type="hidden"
                                multiple
                                name="current_images[]"
                                id="current_images"
                                value="{{$image->image}}"
                                />
                            @endforeach    
                                <label
                                    class="custom-file-label"
                                    for="product_images"
                                    >Choose Multiple Images</label
                                >
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($productAttributes as $attribute)
                    @if ($attribute->attribute_type==1)
                    <div id="product_attribute_sizes">
                        <div class="form-group row" v-for="size,index in size_divs">
                            <label
                                for="product_size"
                                class="col-sm-3 col-form-label"
                                >Size</label
                            >
                            <div class="col-sm-9">
                                <select
                                    name="product_sizes[]"
                                    id="product_size"
                                    class="form-control"
                                >
                                    
                                    @foreach ($productSizes as $size)
                                    <option value="{{$size->id}}"
                                        @if ($size->id==$attribute->attribute_value)
                                            selected
                                        @endif
                                        >{{$size->title}}
                                    
                                    </option>    
                                    @endforeach
                                </select>
                                <div class="">
                                <small>
                                    <a
                                        class="cursor-pointer"
                                        data-toggle="modal"
                                        data-target="#sizeModal"
                                        >Size not available? Click here to add
                                        new size.</a
                                    ></small
                                >
                                <div
                                    class="modal fade"
                                    id="sizeModal"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5
                                                    class="modal-title"
                                                    id="exampleModalLabel"
                                                >
                                                    Add A New
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close"
                                                >
                                                    <span aria-hidden="true"
                                                        >&times;</span
                                                    >
                                                </button>
                                            </div>
                                            <!-- SIZE MODAL -->
                                            <div class="modal-body">
                                                <!-- <form
                                                    enctype="multipart/form-data"
                                                    class="form-horizontal"
                                                    name="add_size"
                                                    id="add_size"
                                                    class=""
                                                > -->
                                                {{ csrf_field() }}
                                                <div id="basic_info">
                                                    <div class="form-group row">
                                                        <label
                                                            for="size_title"
                                                            class="col-sm-3 col-form-label"
                                                            >Size Title</label
                                                        >
                                                        <div class="col-sm-9">
                                                            <input required
                                                                type="text"
                                                                class="form-control"
                                                                id="size_title"
                                                                name="size_title"
                                                                placeholder="Size Title"
                                                                v-model="newSizeTitle"
                                                            />
                                                            @error('size_title')
                                                            <div
                                                                class="alert alert-danger"
                                                            >
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="size_spn"
                                                            class="col-sm-3 col-form-label"
                                                            >Size SPN</label
                                                        >
                                                        <div class="col-sm-9">
                                                            <input required
                                                                type="text"
                                                                class="form-control"
                                                                id="size_spn"
                                                                name="size_spn"
                                                                placeholder="Size SPN"
                                                                v-model="newSizeSPN"
                                                            />@error('size_spn')
                                                            <div
                                                                class="alert alert-danger"
                                                            >
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <a
                                                            v-on:click="newSizeAJAX()"
                                                            class="btn btn-success"
                                                        >
                                                            Add Size
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10"></div>
                        </div>
                    </div>
                                
                    @else
                    <div id="product_attribute_materials">
                        <div
                            class="form-group row"
                            v-for="material,index in material_divs"
                        >
                            <label
                                for="product_material"
                                class="col-sm-3 col-form-label"
                                >Material</label
                            >
                            <div class="col-sm-9">
                                <select
                                    name="product_materials[]"
                                    id="product_material"
                                    class="form-control"
                                >
                                    
                                    @foreach ($productMaterials as $material)
                                    <option value="{{$material->id}}"
                                        @if ($material->id==$attribute->attribute_value)
                                            selected
                                        @endif
                                        >
                                        {{$material->title}}
                                    </option>    
                                    @endforeach
                                </select>
                                <div class="">
                                <small
                                    ><a
                                        data-toggle="modal"
                                        data-target="#materialModal"
                                        class="cursor-pointer"
                                        >Material not availalbe? Click Here to
                                        add new Material</a
                                    ></small
                                >
                                <div
                                    class="modal fade"
                                    id="materialModal"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="materialModalLabel"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5
                                                    class="modal-title"
                                                    id="materialModalLabel"
                                                >
                                                    Add A New Material
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="close"
                                                    id="material_modal_btn"
                                                    data-dismiss="modal"
                                                    aria-label="Close"
                                                >
                                                    <span aria-hidden="true"
                                                        >&times;</span
                                                    >
                                                </button>
                                            </div>
                                            <!-- SIZE MODAL -->
                                            <div class="modal-body">
                                                <!-- <form
                                                    enctype="multipart/form-data"
                                                    class="form-horizontal"
                                                    name="add_material"
                                                    id="add_material"
                                                    class=""
                                                > -->
                                                {{ csrf_field() }}
                                                <div id="basic_info">
                                                    <div class="form-group row">
                                                        <label
                                                            for="material_title"
                                                            class="col-sm-3 col-form-label"
                                                            >Material
                                                            Title</label
                                                        >
                                                        <div class="col-sm-9">
                                                            <input required
                                                                type="text"
                                                                class="form-control"
                                                                id="material_title"
                                                                name="material_title"
                                                                v-model="material_title"
                                                                placeholder="Material Title"
                                                            />
                                                            @error('material_title')
                                                            <div
                                                                class="alert alert-danger"
                                                            >
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            for="material_description"
                                                            class="col-sm-3 col-form-label"
                                                            >Material
                                                            Description</label
                                                        >
                                                        <div class="col-sm-9">
                                                            <textarea
                                                                class="ckeditor form-control"
                                                                id="description"
                                                                name="description"
                                                                v-model="material_description"
                                                            ></textarea>
                                                            @error('description')
                                                            <div
                                                                class="alert alert-danger"
                                                            >
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- <div
                                                            class="form-group row"
                                                        >
                                                            <div
                                                                class="col-sm-3"
                                                            >
                                                                Config Image
                                                            </div>
                                                            <div
                                                                class="col-sm-9"
                                                            >
                                                                <div
                                                                    class="custom-file"
                                                                >
                                                                    <input required
                                                                        type="file"
                                                                        name="material_config_image"
                                                                        class="custom-file-input"
                                                                        id="material_config_image"
                                                                    />
                                                                    <label
                                                                        class="custom-file-label"
                                                                        for="material_config_image"
                                                                        >Choose
                                                                        A Config
                                                                        Image
                                                                        For
                                                                        Material</label
                                                                    >
                                                                    @error('material_config_image')
                                                                    <div
                                                                        class="alert alert-danger"
                                                                    >
                                                                        {{
                                                                            $message
                                                                        }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <a
                                                            v-on:click="newMaterialAJAX()"
                                                            class="btn btn-success"
                                                        >
                                                            Add Material
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10"></div>
                        </div>
                    </div>        
                    @endif
                @endforeach
                
                
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
                    <input
                            type="submit"
                            value="Add Product"
                            class="btn btn-success"
                        />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var sizes = {!! $productSizes !!}

    var materials = {!! $productMaterials !!}



    new Vue({
        el: "#edit-product-page",
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

            newSizeSPN:'',
            newSizeTitle:'',

            material_title:'',
            material_description:''
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
                   
                });

                this.allSizes = sizes

                this.selectedSize = this.allSizes[0].id

                this.size_inputs.push(
                    {
                        size_id: this.selectedSize
                    }
                )

                //Materials
                this.allMaterials = materials

                this.selectedMaterial = this.allMaterials[0].id

                this.material_inputs.push(
                    {
                        material_id: this.selectedMaterial
                    }
                )



        },
        methods: {
            addSize() {
                this.size_divs = this.size_divs + 1;

                // this.size_inputs.push(
                //     {
                //         size_id:this.selectedSize
                //     }
                // )
            },
            addMaterial() {
                this.material_divs = this.material_divs + 1;
                

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

            },
            async newSizeAJAX() {

var postData = {
    size_title:this.newSizeTitle,
    size_spn: this.newSizeSPN
}

var addedSize = await fetch('/admin/add-size-ajax', {
method: 'post',
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
'Content-Type': 'application/json'
},
body:JSON.stringify(postData),
}).then((response) => {



    this.newSizeTitle = ''

    this.newSizeSPN = ''


return response.json();
}).then((data) => {

  $("#sizeModal .close").click()

  return data;
}).catch(() => {

  Swal.fire(
  'Error Occured!',
  'Please try again!',
  'error'
  )
    return "Error"
})
if(addedSize != "Error") {
    this.allSizes.push(addedSize);

    Swal.fire(
  'Added!',
  "Size has been added successfully, don't forget to select it!",
  'success'
  )
}


}, async newMaterialAJAX() {
                var desc = CKEDITOR.instances.description.getData()
                  var postData = {
                      material_title:this.material_title,
                      description: desc
                  }
                var addedMaterial = await fetch('/admin/add-material-ajax', {
                  method: 'post',
                  headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  'Content-Type': 'application/json'
                  },
                  body:JSON.stringify(postData),
                  }).then(function(response) {
                  return response.json();
                  }).then(function(data) {

                    this.material_title=''
            this.material_description=''
                    $("#materialModal .close").click()
                  return data;
                  }).catch(() => {

                    Swal.fire(
                    'Error Occured!',
                    'Please try again!',
                    'error'
                    )
                      return "Error"})
                  if(addedMaterial != "Error")
                  {

                      this.allMaterials.push(addedMaterial);
                       
                      Swal.fire(
                    'Added!',
                    "Material has been added successfully, don't forget to select it!",
                    'success'
                    )
                  }
                  else {
                      console.log("error in adding materials")
                  }

            },

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
    #form {
        background-color: #cccccc;
        padding: 25px;
        border-radius: 5px;
    }
    .form-group {
        /* display: inline-block; */
    }
</style>

@endsection
