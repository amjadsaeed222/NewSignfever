@extends('layouts.adminLayout.admin_design') @section('content')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<div id="content">
    <div class="container">
        <h5 class="text-center">Add A New Material</h5>
        <div class="my-5" id="form">
            <form
                enctype="multipart/form-data"
                class="form-horizontal"
                method="post"
                action="{{ url('/admin/add-material') }}"
                name="add_material"
                id="add_material"
                class=""
            >
                {{ csrf_field() }}
                <div id="basic_info">
                    <div class="form-group row">
                        <label
                            for="material_title"
                            class="col-sm-3 col-form-label"
                            >Material Title</label
                        >
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="material_title"
                                name="material_title"
                                placeholder="Material Title"
                            />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="material_description"
                            class="col-sm-3 col-form-label"
                            >Material Description</label
                        >
                        <div class="col-sm-9">
                            <textarea
                                class=" ckeditor form-control"
                                id="description"
                                name="description"
                                ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Config Image</div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    name="material_config_image"
                                    class="custom-file-input"
                                    id="material_config_image"
                                />
                                <label
                                    class="custom-file-label"
                                    for="material_config_image"
                                    >Choose A Config Image For Material</label
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">
                            Add Material
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
