<!-- Upper Nav -->

<div class="upper-nav">
    <ul>
      <li><a href="#">My Account</a></li>
      <li><a href="#">Customer Service</a></li>
      <li>
        <a href="#"
          ><b>Free Shipping</b> for order of $29.95 and more.
          <b>Free 2nd Day UPS</b> for order of $100 or more</a
        >
      </li>
    </ul>
  </div>

  <!-- Middle Nav -->
  
      <div class="middle-nav">
    <div class="row">
      <div class="col-1">
        <img class="logo" src="{{ asset('/images/frontend_images/nav/logo-sf.svg')}}" alt="logo" />
      </div>
      <div class="search col-5">
      <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="What messages do you want on your sign?" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
  </div>
</div>
        <!-- <b-input-group class="mt-2">
          <b-form-input
            placeholder="What messages do you want on your sign?"
          ></b-form-input>
          <b-input-group-append>
            <button class="main-green">X</button>
          </b-input-group-append>
        </b-input-group> -->
      </div>
      <div class="col-2 mt-2">
          <div class="row">
            <div>
              <button class="btn btn-success main-green"><i class="fas fa-comment-dots"></i></button>
            </div>
          <div class="ml-2 header-helpers">
            <h6>Chat Now!</h6>
            <small class="">Get help from a real person</small>
            </div>
          </div>
      </div>
      <div class="col-2 mt-2">
          <div class="row">
            <div>
              <button class="btn btn-success main-green"><i class="fas fa-comment-dots"></i></button>
            </div>
          <div class="ml-2 header-helpers">
            <h6>(800) 123-4567 </h6>
            <small class="">Mon - Fri 8:00am to 7:00pm EST</small>
            </div>
          </div>
      </div>
      <div class="col-2 mt-2">
          <div class="row">
            <div>
              <button class="btn btn-success main-green"><i class="fas fa-comment-dots"></i></button>
            </div>
          <div class="ml-2 header-helpers">
            <h6>Shopping Cart</h6>
            <small class="">0 items, $0.00</small>
            <div>
              <small class="v-sm">$29.95 until free shipping</small>
            </div>
            </div>
          </div>
      </div>
    </div>
  </div>
<style >

.middle-nav {
  background-color: #f3f3f3;
  padding: 10px 10px;
}
.main-green {
  background-color:white;;
  color:green;
}
.upper-nav {
  font-size: 0.8rem;
  padding-top: 5px;
  border-bottom: 1px solid #636363;
  color: #636363;
  
}

ul 
{
    list-style: none;
    display: flex;
}
ul > * {
        margin: 0px 6px;
}
a 
{
    text-decoration: none;
    color: black;
}

.header-helpers{
  width:110px;
}
.header-helpers small{
  margin:0;
  font-size:12px;
}

.header-helpers h6{
  font-size:15px;
  margin:0;
}

.v-sm {
  margin:0;
  font-size:9px !important;
}
</style>
