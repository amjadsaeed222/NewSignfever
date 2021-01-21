<!-- <nav class="navbar navbar-expand ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Pricing</a>
      </li>
    </ul>
  </div>
</nav> -->
<!-- <div class="custom-nav" id="nav-el">
      <div>
      <ul class="">
        <li class="">
          <a class="" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li v-for="cat in categories" key="cat.slug">
          <a class="" :href="'/category/' + cat.slug"  >@{{cat.name}}</a>
        </li>
      </ul>
    </div>
</div> -->
<div class="learn-more text-center">
      <i><u>Social Distancing Signs</u> – Learn More</i>
</div>


<script>
new Vue({
      el:'#nav-el',
      data:{
            categories:[]
      },
      beforeCreate(){
            fetch('/all', {
                  method:'GET',
                  headers: {
                  'Content-Type': 'application/json'
            },
            }).then(res => res.json()).then(newRes => {
                  this.categories = newRes
            })
      },
})
</script>

<style>
.menu-navbar {
  background-color: var(--main-green);
  & > * > * {
    color: white;
    margin-right: 30px;
  }
  & > * {
    border-right: 1px solid rgb(56, 56, 56);
  }
  & > *:hover {
    background-color: #355588;
    border-right: 1px solid rgb(56, 56, 56);
  }
}

.custom-nav{
      background-color:green;
      /* display:flex; */
      align-items:center;
      padding:10px;
}

.custom-nav a {
      text-decoration:none;
      color:white;
}


.custom-nav a:hover {
      color:white;
      background-color:blue;
}

ul{
}

.nav-item{
      background-color:green;
}

.learn-more {
  background-color: #ffffcc;
  color: #cc0000;
  font-size: 0.9rem;
  font-weight: 500;
  padding: 5px 0px;
  border-bottom: 2px solid black;
}
</style>