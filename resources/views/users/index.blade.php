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
                    <div class="breadcrumb-title pe-3">Employee</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                @include('inc.msg')
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary">User Registration</h5>
                                    </div>
                                    <hr>
                                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data"
                                        class="row g-3">
                                        @csrf
                                        <div class="col-6">
                                            <label for="inputLastName1" class="form-label">
                                                Name</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="name"
                                                    class="form-control border-start-0 @error('name') is-invalid @enderror"
                                                    id="inputLastName1" name="name" value="{{old('name')}}" placeholder="Enter Name" required />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="inputPhoneNo" class="form-label">Phone
                                                No</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-mobile'></i></span>
                                                <input type="number"
                                                    class="form-control border-start-0 @error('mobile') is-invalid @enderror"
                                                    name="mobile" id="inputPhoneNo" value="{{old('mobile')}}" placeholder="Phone No" required />
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="inputAddress" class="form-label">Email Address</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-envelope'></i></span>
                                                <input type="text"
                                                    class="form-control border-start-0 @error('email') is-invalid @enderror"
                                                    id="inputEmailAddress" name="email" value="{{old('email')}}" placeholder="Email Address"
                                                    required />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="Address" class="form-label">Address</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-map'></i></span>
                                                <input type="text"
                                                    class="form-control border-start-0 @error('address') is-invalid @enderror"
                                                    id="address" name="address" value="{{old('address')}}" placeholder="Address" required />
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputChoosePassword" class="form-label">Choose Password</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-lock-open'></i></span>
                                                <input type="password"
                                                    class="form-control border-start-0 @error('password') is-invalid @enderror"
                                                    id="inputChoosePassword" name="password" value="{{old('password')}}" placeholder="Choose Password"
                                                    required />
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-lock'></i></span>
                                                <input type="password"
                                                    class="form-control border-start-0 @error('confirm_password') is-invalid @enderror"
                                                    id="inputConfirmPassword" value="{{old('confirm_password')}}" name="confirm_password"
                                                    placeholder="Confirm Password" required />
                                                @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="inputChoosePassword" class="form-label">Employee Role
                                            </label>
                                            <select name="is_admin" id="" class="form-select" required>
                                                <option>Select User Type</option>
                                                <option value="1" {{old('is_admin') == "1" ? 'selected' : ''}}>Admin</option>
                                                <option value="2" {{old('is_admin') == "2" ? 'selected' : ''}}>Cashier</option>
                                                <option value="3" {{old('is_admin') == "3" ? 'selected' : ''}}>Manager</option>
                                            </select>

                                        </div>
                                        <div class="col-6">
                                            <label for="inputChoosePassword" class="form-label">Employee Status
                                            </label>
                                            <select name="status" id="" class="form-select" required>
                                                <option>Select Status Type</option>
                                                <option value="1" {{old('status') == "1" ? 'selected' : ''}}>Active</option>
                                                <option value="2" {{old('status') == "2" ? 'selected' : ''}}>Inactive</option>
                                            </select>

                                        </div>

                                        <div class="col-12">
                                            <label for="inputPhoneNo" class="form-label">User
                                                Image</label>
                                            <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                                        class='bx bxs-user-circle'></i></span>
                                                <input type="file"
                                                    class="form-control border-start-0 @error('user_img') is-invalid @enderror"
                                                    name="user_img" placeholder="Choose Image"  />
                                                @error('user_img')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-5">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>




    {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-xl-2">


                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary mb-3 mb-lg-0" data-bs-toggle="modal"
                                            data-bs-target="#exampleScrollableModal"><i class='bx bxs-plus-square'></i>Add
                                            User</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleScrollableModal" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">ADD USER</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border-top border-0 border-4 border-primary">
                                                            <div class="card-body p-5">
                                                                <div class="card-title d-flex align-items-center">
                                                                    <div><i
                                                                            class="bx bxs-user me-1 font-22 text-primary"></i>
                                                                    </div>
                                                                    <h5 class="mb-0 text-primary">User Registration</h5>
                                                                </div>
                                                                <hr>
                                                                <form action="{{ route('users.store') }}" method="POST"
                                                                    enctype="multipart/form-data" class="row g-3">
                                                                    @csrf
                                                                    <div class="col-6">
                                                                        <label for="inputLastName1" class="form-label">
                                                                            Name</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-user'></i></span>
                                                                            <input type="name"
                                                                                class="form-control border-start-0 @error('name') is-invalid @enderror"
                                                                                id="inputLastName1" name="name"
                                                                                placeholder="Enter Name" required />
                                                                                @error('name')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputPhoneNo" class="form-label">Phone
                                                                            No</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-mobile'></i></span>
                                                                            <input type="number"
                                                                                class="form-control border-start-0 @error('mobile') is-invalid @enderror"
                                                                                name="mobile" id="inputPhoneNo"
                                                                                placeholder="Phone No" required />
                                                                                @error('mobile')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputAddress"
                                                                            class="form-label">Email Address</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-envelope'></i></span>
                                                                            <input type="text"
                                                                                class="form-control border-start-0 @error('email') is-invalid @enderror"
                                                                                id="inputEmailAddress" name="email"
                                                                                placeholder="Email Address" required />
                                                                                @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="Address"
                                                                            class="form-label">Address</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-envelope'></i></span>
                                                                            <input type="text"
                                                                                class="form-control border-start-0 @error('address') is-invalid @enderror"
                                                                                id="address" name="address"
                                                                                placeholder="Address" required />
                                                                                @error('address')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Choose Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock-open'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0 @error('password') is-invalid @enderror"
                                                                                id="inputChoosePassword" name="password"
                                                                                placeholder="Choose Password" required />
                                                                                @error('password')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="inputConfirmPassword"
                                                                            class="form-label">Confirm Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0 @error('confirm_password') is-invalid @enderror"
                                                                                id="inputConfirmPassword"
                                                                                name="confirm_password"
                                                                                placeholder="Confirm Password" required />
                                                                                @error('confirm_password')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Employee Role
                                                                        </label>
                                                                        <select name="is_admin" id="" class="form-select">
                                                                            <option>Select User Type</option>
                                                                            <option value="1">Admin</option>
                                                                            <option value="2">Cashier</option>
                                                                            <option value="3">Manager</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Employee Status
                                                                        </label>
                                                                        <select name="status" id="" class="form-select">
                                                                            <option>Select Status Type</option>
                                                                            <option value="1">Active</option>
                                                                            <option value="2">Inactive</option>
                                                                        </select>

                                                                    </div>
                                                                   
                                                                    <div class="col-12">
                                                                        <label for="inputPhoneNo" class="form-label">User
                                                                            Image</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-user-circle'></i></span>
                                                                            <input type="file"
                                                                                class="form-control border-start-0 @error('user_img') is-invalid @enderror"
                                                                                name="user_img" placeholder="Choose Image"
                                                                                required />
                                                                                @error('user_img')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-primary px-5">Register</button>
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

                                    </div>
                                    <div class="col-lg-9 col-xl-10">
                                        <form class="float-lg-end">
                                            <div class="row row-cols-lg-auto g-2">
                                                <div class="col-12">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control ps-5"
                                                            placeholder="Search User..."> <span
                                                            class="position-absolute top-50 product-show translate-middle-y"><i
                                                                class="bx bx-search"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
    <!--end breadcrumb-->
    {{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6>
                <hr />
                @include('inc.msg')
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>User Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="/storage/users/{{ $user->user_img }}" width="70px" alt=""></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>
                                                @if ($user->is_admin == 1) Admin
                                                @elseif ($user->is_admin == 2) Cashier
                                                @else Manager
                                                @endif

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editUser{{ $user->id }}"><i
                                                        class="bx bxs-edit"></i>Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUser{{ $user->id }}"><i
                                                        class="bx bxs-trash"></i>Delete</a>
                                            </td>

                                        </tr>
                                        <!--Edit User Modal -->
                                        <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDIT USER</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                        {{ $user->id }}
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card border-top border-0 border-4 border-primary">
                                                            <div class="card-body p-5">
                                                                <div class="card-title d-flex align-items-center">
                                                                    <div><i
                                                                            class="bx bxs-user me-1 font-22 text-primary"></i>
                                                                    </div>
                                                                    <h5 class="mb-0 text-primary">Edit User</h5>
                                                                </div>
                                                                <hr>
                                                                <form action="{{ route('users.update', $user->id) }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="row g-3">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="col-12">
                                                                        <label for="inputLastName1" class="form-label">
                                                                            Name</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-user'></i></span>
                                                                            <input type="name"
                                                                                class="form-control border-start-0"
                                                                                id="inputLastName1" name="name"
                                                                                placeholder="Enter Name"
                                                                                value="{{ $user->name }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="inputPhoneNo" class="form-label">Phone
                                                                            No</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-mobile'></i></span>
                                                                            <input type="number"
                                                                                class="form-control border-start-0"
                                                                                name="mobile" id="inputPhoneNo"
                                                                                placeholder="Phone No"
                                                                                value="{{ $user->mobile }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="inputEmailAddress"
                                                                            class="form-label">Email Address</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-envelope'></i></span>
                                                                            <input type="text"
                                                                                class="form-control border-start-0"
                                                                                id="inputEmailAddress" name="email"
                                                                                placeholder="Email Address"
                                                                                value="{{ $user->email }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Role
                                                                        </label>
                                                                        <select name="is_admin" id="" class="form-control">
                                                                            <option value="1" @if ($user->is_admin == 1) selected @endif>Admin
                                                                            </option>
                                                                            <option value="2" @if ($user->is_admin == 2) selected @endif>
                                                                                Cashier</option>
                                                                                <option value="2" @if ($user->is_admin == 3) selected @endif>
                                                                                    Manager</option>
                                                                        </select>



                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Choose Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock-open'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0"
                                                                                id="inputChoosePassword" name="password"
                                                                                placeholder="Choose Password"
                                                                                value="{{ $user->password }}" required />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="inputConfirmPassword"
                                                                            class="form-label">Confirm Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0"
                                                                                id="inputConfirmPassword"
                                                                                name="confirm_password"
                                                                                placeholder="Confirm Password" value="{{ $user->password }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="inputPhoneNo" class="form-label">User
                                                                            Image</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-user-circle'></i></span>
                                                                            <input type="file"
                                                                                class="form-control border-start-0"
                                                                                name="user_img" placeholder="Choose Image"
                                                                                value="{{ $user->user_img }}" required />
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="col-12">
                                                                        <button type="submit"
                                                                            class="btn btn-primary px-5">Update</button>
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
                                        <!--End Edit User Model -->


                                        <!--Edit Delete Modal -->
                                        <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                        {{ $user->id }}
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
                                                                <form action="{{ route('users.destroy', $user->id) }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    class="row g-3">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <br>
                                                                    <div class="container">
                                                                        <h6 class="text-center">Are you sure you want to
                                                                            delete {{ $user->name }}
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
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                               
                            </table>
                        </div>
                        <nav aria-label="..." class="py-5">
							<ul class="pagination">
								{{$users->links()}}
								
								
								
							</ul>
						</nav>
                    </div>
                </div> --}}







@endsection
