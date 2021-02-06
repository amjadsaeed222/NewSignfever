<div id="nav-el" class="">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a>-->
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"
                            >Home <span class="sr-only">(current)</span></a
                        >
                    </li>
                    <li
                        class="nav-item dropdown"
                        v-for="category in categories"
                    >
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownMenuLink"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            @{{ category.name }}
                        </a>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <a
                                class="dropdown-item"
                                :href="'/category/' + category.slug"
                                >All @{{ category.name }}</a
                            >
                            <a
                                class="dropdown-item"
                                v-for="subCat in category.sub_category"
                                :href="'/index/' + subCat.slug"
                                >@{{ subCat.title }}</a
                            >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="learn-more text-center">
    <i><u>Social Distancing Signs</u> – Learn More</i>
</div>

<script>
    new Vue({
        el: "#nav-el",
        data: {
            categories: [],
            parentCats: [],
            subCats: [],
        },
        mounted() {},
        beforeCreate() {
            fetch("/all", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((res) => res.json())
                .then((newRes) => {
                    this.categories = newRes;
                    console.log(this.categories);
                });
        },
    });
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

    .custom-nav {
        background-color: green;
        /* display:flex; */
        align-items: center;
        padding: 10px;
    }

    .custom-nav a {
        text-decoration: none;
        color: white;
    }

    .custom-nav a:hover {
        color: white;
        background-color: blue;
    }

    ul {
    }

    .nav-item {
        background-color: #6f9501;
        /* border-left: 1px solid black; */
    }

    nav {
        background-color: #6f9501;
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
