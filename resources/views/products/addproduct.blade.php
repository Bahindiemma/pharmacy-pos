@extends('layouts.dash')
@section('content')
<div class="wrapper">
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Add Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Add New Product</h5>
                    <hr>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Medicine Name</label>
                                            <input type="name" class="form-control" id="product_name" name="product_name"
                                                placeholder="Enter Medicine Name" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="inputProductDescription" rows="6" name="description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Product Image</label>
                                            <input id="image-uploadify" type="file" class="form-control"
                                                
                                                multiple="" name="product_img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="brand" class="form-label">Product Brand</label>
                                                <input type="text" class="form-control" id="brand"
                                                    placeholder="Enter Product Brand" name="brand">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPrice" class="form-label">Selling Price</label>
                                                <input type="number" class="form-control" id="Price" name="price"
                                                    placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCompareatprice" class="form-label">Supplier Price</label>
                                                <input type="number" class="form-control" id="inputCompareatprice"
                                                  name="supplierprice"  placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control" id="quantity"
                                                    placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="stock_alert" class="form-label">Stock</label>
                                                <input type="number" name="stock_alert" class="form-control" id="stock_alert"
                                                    placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="expiredate" class="form-label">Expire Date</label>
                                                <input type="date" name="expiredate" class="form-control" id="expiredate"
                                                    placeholder="00/00/00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="form" class="form-label">Form</label>
                                                <select name="form" id="" class="form-select">
                                                    <option>Select Form Type</option>
                                                    <option value="Tablet">Tablet</option>
                                                    <option value="Capsules">Capsule</option>
                                                    <option value="Injection">Injection</option>
                                                    <option value="Eye Drop">Eye Drop</option>
                                                    <option value="Suspension">Suspension</option>
                                                    <option value="Cream">Cream</option>
                                                    <option value="Saline">Saline</option>
                                                    <option value="Inhaler">Inhaler</option>
                                                    <option value="Powder">Powder</option>
                                                    <option value="Spray">Spray</option>
                                                    <option value="Paediatric Drop">Paediatric Drop</option>
                                                    <option value="Nebuliser Solution">Nebuliser Solution</option>
                                                    <option value="Powder for Suspension">Powder for Suspension</option>
                                                    <option value="Nasal Drops">Nasal Drops</option>
                                                    <option value="Eye Ointment">Eye Ointment</option>
                                                </select>
                                            </div>
                                            {{-- <div class="col-12">
                                                <label for="inputProductType" class="form-label">Product Type</label>
                                                <select class="form-select" id="inputProductType">
                                                    <option></option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Vendor</label>
                                                <select class="form-select" id="inputVendor">
                                                    <option></option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">Collection</label>
                                                <select class="form-select" id="inputCollection">
                                                    <option></option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div> --}}
                                            
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                    class="btn btn-primary px-5">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
    <!--end page wrapper -->
@endsection
