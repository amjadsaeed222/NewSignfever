@extends('layouts.adminLayout.admin_design') @section('content')
<div id="content">
    <div class="container text-center" id="add-product-page">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/api/admin/add-product') }}" name="add_product" id="add_product">{{ csrf_field() }}
            <div>
                <div class="single-section">
                    <h5>Product Basic Information</h5>
                    <div class="form-row align-items-center">
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

                        <div class="form-row align-items-center">
                            <label for="product_category">Category</label>
                            <select
                                class="form-control"
                                name="product_category"
                                id="product_category"
                            >
                                <option v-for="cat in allCats" key="cat.id" :value="cat.id">
                                    @{{ cat.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="product_price"
                                >Price</label
                            >
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
                            <label class="sr-only" for="product_shape"
                                >Shape</label
                            >
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
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="product_part"
                                >Part#</label
                            >
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
                        <div class="col-sm-3 my-1">
                            <label class="sr-only" for="product_description"
                                >Description</label
                            >
                            <div class="input-group">
                                <input
                                    name="product_description"
                                    type="text"
                                    class="form-control"
                                    id="description"
                                    placeholder="Product Description"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-section" v-for="divs,index in size_divs">
                    <h5>Product Size @{{ index + 1 }}</h5>
                    <input type="file" id="images"  multiple="multiple" name="images[]">
                     

                    <div class="col-sm-3 my-1">
                        <label class="sr-only" for="size_title"
                            >Size Title</label
                        >
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
                        <label class="sr-only" for="SPN"
                            >SPN#</label
                        >
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
  </script>
<style>
    .single-section {
        background-color: white;
        margin: 20px 0px;
        width: 100%;
    }
</style>

@endsection
