@extends('layouts.frontendLayout.frontend_design')
@section('content')

<div id="category-page" class="mx-5 my-5">
    <h4>@{{category.name}}</h4>
    <div class="row">
        <div class="col-3">
            <img src="https://via.placeholder.com/250" style="width:100%;">
        </div>
        <div class="col-5">
            <p>
                @{{category.description}}
            </p>
        </div>
    </div>
    <div v-if="categoryProducts.length > 0" class="my-5">
        <h4>@{{category.name}} - Best Sellers</h4>
        <div class="row">
            <div v-for="product in categoryProducts" class="col-2">
            <a :href="'/product/' + product.slug"><div class="card" style="width: 100%;">
                <img stlye="width:100%" class="card-img-top" :src="'/images/backend_images/product/small/' + product.image" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">
                   @{{product.product_name}}
                    </p>
                </div>
            </div></a>
            </div>
        </div>
    </div>
    <div v-else>
        <h5 class="text-center">No Products on Sale Currently for @{{category.name}}</h5>
        <h6 class="text-center">Vist Later :)</h6>

    </div>
</div>

<script>

var category = {!! $category !!}
var products = {!! $products !!}

new Vue({
    el:'#category-page',
    data:{
        categoryProducts:{}
    },
    mounted(){
        this.categoryProducts = products
        console.log(products)
    }
})
</script>

@endsection
