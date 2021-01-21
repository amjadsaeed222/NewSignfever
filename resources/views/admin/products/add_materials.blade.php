@extends('layouts.adminLayout.admin_design') @section('content')
<div id="add-materials-page">
    <select>
        <option
            v-on:change="changeIt()"
            v-for="product in allProducts"
            :key="product.id"
        >
            @{{ product.product_name }}
        </option>
    </select>
</div>
<div id="content">
    <div class="container text-center">
        <form
            enctype="multipart/form-data"
            class="form-horizontal"
            method="post"
            action="{{ url('/api/admin/add-product') }}"
            name="add_materials"
        >
            {{ csrf_field() }}
            <select>
                <option
                    v-on:change="changeIt()"
                    v-for="product in allProducts"
                    :key="product.id"
                >
                    @{{ product.product_name }}
                </option>
            </select>
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
            allProducts:{}
        },
        mounted() {
            this.allProducts = products;
        },
        methods: {
            changeIt(){
                console.log('helo')
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
