@extends('admin.layout.sidebar')
@section('admin_layout')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>{{ @$title }}</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ url('admin/save_product') }}" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control parsley-success"
                                        required="" data-parsley-id="29">
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Product Type</label>
                                            <select name="product_type" class="form-control parsley-success" required="">
                                                <option value="1">SWEET & SAVORY</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">

                                        <div class="form-group">
                                            <label>Size</label>
                                            <input type="text" name="size" class="form-control parsley-success"
                                                required="" data-parsley-id="29">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control parsley-error" name="short_desc" rows="5" cols="30" required=""
                                        data-parsley-id="33"></textarea>
                                    <ul class="parsley-errors-list filled" id="parsley-id-33">
                                        <li class="parsley-required">This value is required.</li>
                                    </ul>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <b>1 Pack Price</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                            </div>
                                            <input type="number" name="price_1" class="form-control date"
                                                placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <b>3 Pack Price</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                            </div>
                                            <input type="number" name="price_3" class="form-control date"
                                                placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <b>6 Pack Price</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                                            </div>
                                            <input type="number" name="price_6" class="form-control date"
                                                placeholder="Ex: 30/07/2016">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <b>Select Thumbnail Image</b>

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="thumb_images">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                            <b>Select Images (multiple) </b>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="images[]"  multiple="multiple">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>


                                    {{-- <p id="error-multiselect">
                                    <ul class="parsley-errors-list filled" id="parsley-id-multiple-food[]">
                                        <li class="parsley-required">This value is required.</li>
                                    </ul>
                                    </p> --}}
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
