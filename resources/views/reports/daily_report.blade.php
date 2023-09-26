@extends('layouts.dash')
@section('content')
    <style>
        path {
            display: none;
        }

        svg {
            display: none;
        }

    </style>
    <!--wrapper-->
    <div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Product</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                @include('inc.msg')
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span
                            class="position-absolute top-50 product-show translate-middle-y"><i
                                class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="grid"
                        class="btn btn-primary radius-30 mt-2 mt-lg-0 add_more" ><i class="bx bxs-plus-square add_more" ></i>Grid Mode</a>
                    </div>
                  
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Description</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Supplier Price</th>
                                        <th>Quantity</th>
                                        <th>Form</th>
                                        <th>Expire Date</th>
                                        <th>Stock Alert</th>
                                        <th> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td><img src="/storage/products/{{ $product->product_img }}" class="user-img"
                                                    alt=""></td>
                                            <td><a href="#" class="btn btn-info btn-sm text-light" data-bs-toggle="modal"
                                                    data-bs-target="#description{{ $product->id }}"><i
                                                        class="bx bxs-search text-light"></i>View</a></td>
                                            <td>{{ $product->brand }}</td>
                                            <td>#{{ number_format($product->price, 2) }}</td>
                                            <td>#{{ number_format($product->supplierprice, 2) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->form }}</td>
                                            <td>{{ $product->expiredate }}</td>
                                            <td>
                                                @if ($product->stock_alert >= $product->quantity)
                                                    <span class="badge bg-danger">Low Stock > {{ $product->stock_alert }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">{{ $product->stock_alert }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editProduct{{ $product->id }}"><i
                                                        class="bx bxs-edit"></i>Edit</a>
                                                <input type="hidden" name="DELETE" id="DELETE">
                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteProduct{{ $product->id }}"><i
                                                        class="bx bxs-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                        <!--Edit Product Modal -->
                                        <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDIT PRODUCT</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                        {{ $product->id }}
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border-top border-0 border-4 border-primary">
                                                            <div class="card-body p-5">

                                                                <form
                                                                    action="{{ route('products.update', $product->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-body mt-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="border border-3 p-4 rounded">
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">
                                                                                            Medicine Name</label>
                                                                                        <input type="name"
                                                                                            class="form-control"
                                                                                            id="product_name"
                                                                                            name="product_name"
                                                                                            placeholder="Enter Medicine Name"
                                                                                            required
                                                                                            value="{{ $product->product_name }}" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductDescription"
                                                                                            class="form-label">Description</label>
                                                                                        <textarea class="form-control"
                                                                                            id="inputProductDescription"
                                                                                            rows="6"
                                                                                            name="description">{{ $product->description }}</textarea>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductDescription"
                                                                                            class="form-label">Product
                                                                                            Image</label>
                                                                                        <input id="image-uploadify"
                                                                                            type="file" class="form-control"
                                                                                            multiple="" name="product_img">
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="border border-3 p-4 rounded">
                                                                                    <div class="row g-3">
                                                                                        <div class="col-12">
                                                                                            <label for="brand"
                                                                                                class="form-label">Product
                                                                                                Brand</label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="brand"
                                                                                                placeholder="Enter Product Brand"
                                                                                                value="{{ $product->brand }}"
                                                                                                name="brand">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="inputPrice"
                                                                                                class="form-label">Selling
                                                                                                Price</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                id="Price"
                                                                                                value="{{ $product->price }}"
                                                                                                name="price"
                                                                                                placeholder="00.00">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="inputCompareatprice"
                                                                                                class="form-label">Supplier
                                                                                                Price</label>
                                                                                            <input type="number"
                                                                                                class="form-control"
                                                                                                value="{{ $product->supplierprice }}"
                                                                                                id="inputCompareatprice"
                                                                                                name="supplierprice"
                                                                                                placeholder="00.00">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="quantity"
                                                                                                class="form-label">Quantity</label>
                                                                                            <input type="number"
                                                                                                name="quantity"
                                                                                                class="form-control"
                                                                                                id="quantity"
                                                                                                value="{{ $product->quantity }}"
                                                                                                placeholder="00.00">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="stock_alert"
                                                                                                class="form-label">Stock</label>
                                                                                            <input type="number"
                                                                                                name="stock_alert"
                                                                                                class="form-control"
                                                                                                id="stock_alert"
                                                                                                value="{{ $product->stock_alert }}"
                                                                                                placeholder="00.00">
                                                                                        </div>

                                                                                        <div class="col-md-6">
                                                                                            <label for="expiredate"
                                                                                                class="form-label">Expire
                                                                                                Date</label>
                                                                                            <input type="date"
                                                                                                name="expiredate"
                                                                                                class="form-control"
                                                                                                id="expiredate"
                                                                                                placeholder="00/00/00"
                                                                                                value="{{ $product->expiredate }}">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="form"
                                                                                                class="form-label">Form</label>
                                                                                            <select name="form" id=""
                                                                                                class="form-select">
                                                                                                <option>Select Form Type
                                                                                                </option>
                                                                                                <option value="Tablet">
                                                                                                    Tablet</option>
                                                                                                <option value="Capsules">
                                                                                                    Capsule</option>
                                                                                                <option value="Injection">
                                                                                                    Injection</option>
                                                                                                <option value="Eye Drop">Eye
                                                                                                    Drop</option>
                                                                                                <option value="Suspension">
                                                                                                    Suspension</option>
                                                                                                <option value="Cream">Cream
                                                                                                </option>
                                                                                                <option value="Saline">
                                                                                                    Saline</option>
                                                                                                <option value="Inhaler">
                                                                                                    Inhaler</option>
                                                                                                <option value="Powder">
                                                                                                    Powder</option>
                                                                                                <option value="Spray">Spray
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Paediatric Drop">
                                                                                                    Paediatric Drop</option>
                                                                                                <option
                                                                                                    value="Nebuliser Solution">
                                                                                                    Nebuliser Solution
                                                                                                </option>
                                                                                                <option
                                                                                                    value="Powder for Suspension">
                                                                                                    Powder for Suspension
                                                                                                </option>
                                                                                                <option value="Nasal Drops">
                                                                                                    Nasal Drops</option>
                                                                                                <option
                                                                                                    value="Eye Ointment">Eye
                                                                                                    Ointment</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div class="d-grid">
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary px-5">Update</button>
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
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Edit Product Model -->


                                        <!--Delete Product Modal -->
                                        <div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                        {{ $product->id }}
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border-top border-0 border-4 border-danger">
                                                            <div class="card-body p-5">
                                                                <div class="card-title d-flex align-items-center">
                                                                    <div><i
                                                                            class="bx bxs-user me-1 font-22 text-danger"></i>
                                                                    </div>
                                                                    <h5 class="mb-0 text-danger">Delete User</h5>
                                                                </div>
                                                                <hr>
                                                                <form
                                                                    action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="row g-3">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <br>
                                                                    <div class="container">
                                                                        <h6 class="text-center">Are you sure you want to
                                                                            delete <br><br> <span class="text-danger">
                                                                                {{ $product->product_name }}</span>
                                                                        </h6>
                                                                    </div>
                                                                    <hr>
                                                                    <button type="submit" class="btn btn-default px-5"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger px-5">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Delete User Model -->
                                        <div class="row">
                                            <div class="col col-lg-9 mx-auto">
                                                <div class="card">
                                                    <div class="row row-cols-auto g-3">
                                                        <div class="col">

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="description{{ $product->id }}"
                                                                tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Description</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {{ $product->description }}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="..." class="py-5 float-right">
                            <ul class="pagination">
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
