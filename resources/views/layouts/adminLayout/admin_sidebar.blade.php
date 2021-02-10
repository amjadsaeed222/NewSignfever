<!-- <div class="my-2">
    <h5 class="text-center">Sign Fever</h5>
    <h6 class="text-center">Admin Panel</h6>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button
                        class="btn btn-link collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                    >
                        Products
                    </button>
                </h2>
            </div>

            <div
                id="collapseOne"
                class="collapse"
                aria-labelledby="headingOne"
                data-parent="#accordionExample"
            >
                <ul>
                    <li>
                        <a href="/admin/add-product">Add Product</a>
                    </li>
                    <li>
                        <a href="/admin/view-products" class="">View Product</a>
                    </li>
                    <li>
                        <a href="/admin/add-index" class="">Add Index</a>
                    </li>
                    <li>
                        <a href="/admin/view-index" class="">View Index</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button
                        class="btn btn-link collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                    >
                        Attributes
                    </button>
                </h2>
            </div>
            <div
                id="collapseTwo"
                class="collapse"
                aria-labelledby="headingTwo"
                data-parent="#accordionExample"
            >
                <div class="card-body">
                    <ul>
                        <li>
                            <p>Product Size</p>
                        </li>
                        <li>
                            <a href="/admin/add-size">Add Size</a>
                        </li>
                        <li>
                            <a href="/admin/view-size">View Size</a>
                        </li>
                        <li>
                            <p>Product Material</p>
                        </li>
                        <li>
                            <a href="/admin/add-material">Add Material</a>
                        </li>
                        <li>
                            <a href="/admin/view-material">View Material</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button
                        class="btn btn-link collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                    >
                        Category
                    </button>
                </h2>
            </div>
            <div
                id="collapseThree"
                class="collapse"
                aria-labelledby="headingThree"
                data-parent="#accordionExample"
            >
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="/admin/add-category">Add Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="sidenav">
    <div class="admin-headers ">
        <h3 class="text-center">Sign Fever</h3>
        <h5 class="text-center">Admin Panel</h5>
        <a href="/" target="_blank"  class="text-center">Visit Site</a>
    </div>
    <div class="sidebar-links">
        <button class="products-dropdown dropdown-btn">
            Manage Products
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/admin/add-product">Add Product</a>
            <a href="/admin/view-products" class="">View Product</a>
            <a href="/admin/add-index" class="">Add Index</a>
            <a href="/admin/view-index" class="">View Index</a>
        </div>

        <button class="attributes-dropdown dropdown-btn">
            Manage Attributes
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/admin/add-size">Add Size</a>

            <a href="/admin/view-size">View Size</a>
            <a href="/admin/add-material">Add Material</a>
            <a href="/admin/view-material">View Material</a>
        </div>

        <button class="category-dropdown dropdown-btn">
            Manage Category
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="/admin/add-category">Add Category</a>
        </div>
        <a
            class="logout-btn btn btn-danger"
            href="{{ url('/logout') }}"
            onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
            ><i class="icon icon-share-alt"></i>
            <span class="text">Logout</span></a
        >
        <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
            class="d-none"
        >
            @csrf
        </form>
    </div>
</div>

<!-- <style>
    h5 {
        color: black;
    }
    ul {
        margin: 0;
        padding-inline-start: 0px !important;
    }
    ul li {
        list-style: none;
    }
    .card-header {
    }
</style> -->

<style>
    .sidenav{
      
    }
    .admin-headers {
        color: white;
    }
    .sidenav {
        height: 100%;
        width: 220px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #0083c1;
        overflow-x: hidden;
        padding-top: 20px;
        border-right: 2px solid #636363;
    }
    .sidebar-links {
        border-top: 1px solid black;
        margin-top: 20px;
    }
    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #111;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover {
        color: white;
    }
    .logout-btn a:hover{
        color:black;
    }
    .dropdown-btn:hover {
        background-color: #1d50c7;
    }

    /* Main content */
    .main {
        margin-left: 200px; /* Same as the width of the sidenav */
        font-size: 20px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
        background-color: #1d50c7;
        color: white;
    }
    .dropdown-container {
       
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
        display: none;
        background-color: #f1f1f1;
        padding-left: 8px;
        
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
        float: right;
        padding-right: 8px;
    }
</style>

<script>
    var dropdown = document.getElementsByClassName("products-dropdown");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
           
       
                
            } else {
                dropdownContent.style.display = "block";
   
  
            }
        });
    }

    var dropdown = document.getElementsByClassName("attributes-dropdown");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }

    var dropdown = document.getElementsByClassName("category-dropdown");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
