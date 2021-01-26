@extends('layouts.adminLayout.admin_design') @section('content')

<div id="content">
    <div class="container">
        <h5 class="text-center">Add A New Product Index</h5>
        <div class="my-5" id="form">
            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/api/admin/add-index') }}"
                name="add_index"
                id="add_index"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label for="index_title" class="col-sm-3 col-form-label"
                            >Index Title</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="index_title"
                                placeholder="Index Title"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="index_description"
                            class="col-sm-3 col-form-label"
                            >Index Description</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="index_description"
                                placeholder="Index Description"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Image</div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    name="index_image"
                                    class="custom-file-input"
                                    id="Index_image"
                                />
                                <label
                                    class="custom-file-label"
                                    for="index_image"
                                    >Choose An Image</label
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add index
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
