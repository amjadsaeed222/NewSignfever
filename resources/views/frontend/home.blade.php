@extends('layouts.frontendLayout.frontend_design')
@section('content')
    <div id="home-page" class='row my-5 mx-3'>
    <div class="col-12">
    <h5>Categories You Might Like:</h5>
    </div>
        <div class='col-2'>
            <a href="/category/medical-safety"><div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('/images/frontend_images/home/medical_safety.png')  }}" alt="Card image cap" stlye="width:100%">
                <div class="card-body">
                    <p class="card-text">
                   Medical Safety
                    </p>
                </div>
            </div></a>
        </div>
        <div class='col-2'>
            <a href="/category/social-distances"><div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('/images/frontend_images/home/social_distancing.jpg')  }}" alt="Card image cap" stlye="width:100%">
                <div class="card-body">
                    <p class="card-text">
                   Social Distancing
                    </p>
                </div>
            </div></a>
        </div>
        <div class="col-12">
        <h4>Product you might like:</h4>
        </div>
        <div class='col-2' v-for="product in allProducts"> 
            <a :href="'/product/' + product.slug "><div class="card" style="width: 100%;">
                <img class="card-img-top" :src="'/images/backend_images/product/small/' + product.image " :alt="product.product_name" stlye="width:100%">
                <div class="card-body">
                    <p class="card-text">
                   @{{product.product_name}}
                    </p>
                </div>
            </div></a>
        </div>


    </div>
<script>
var products = {!! $products !!}
new Vue({

    el:'#home-page',
    data:{
        allProducts:{}
    },
    mounted(){
        this.allProducts = products;
        console.log(this.allProducts)

    }

})

</script>
<style>
.card-img-top{
    width:100%;
}
</style>
@endsection