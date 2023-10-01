@extends('layouts.dash')
@section('content')
<style>
    path{
        display: none;
    }
    svg{
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
                   

                </div>
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
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="/storage/users/{{ $user->user_img }}" class="user-img" alt=""></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>
                                                @if ($user->is_admin == 1) 
                                                <span class="badge bg-success">Admin</span>
                                                @elseif ($user->is_admin == 2) 
                                                <span class="badge bg-secondary">Cashier</span>
                                                @else 
                                                <span class="badge bg-info">Manager</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($user->status == 1)
                                                <span class="badge bg-primary">ACTIVE</span> 
                                                
                                                @else 
                                                <span class="badge bg-danger">INACTIVE</span> 
                                                
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
                                          <!-- Modal -->
                                          <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                          <div class="modal-dialog modal-xl">
                                              <div class="modal-content ">
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
                                                                class="row g-3 pt-4">
                                                                @csrf
                                                                @method('put')
                                                                  <div class="row">
                                                                 <div class="col-6">
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
                                                                    <div class="col-6">
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
                                                                    <div class="col-6">
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
                                                                    <div class="col-6">
                                                                        <label for="inputAddress"
                                                                            class="form-label">Address</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-map'></i></span>
                                                                            <input type="text"
                                                                                class="form-control border-start-0"
                                                                                id="inputEmailAddress" name="address"
                                                                                placeholder="Address"
                                                                                value="{{ $user->address }}"  required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Role
                                                                        </label>
                                                                        <select name="is_admin" id="" class="form-select">
                                                                            <option value="1" @if ($user->is_admin == 1) selected @endif>Admin
                                                                            </option>
                                                                            <option value="2" @if ($user->is_admin == 2) selected @endif>
                                                                                Cashier</option>
                                                                                <option value="3" @if ($user->is_admin == 3) selected @endif>
                                                                                    Manager</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Status
                                                                        </label>
                                                                        <select name="status" id="" class="form-select">
                                                                            <option value="1" @if ($user->status == 1) selected @endif>ACTIVE
                                                                            </option>
                                                                            <option value="2" @if ($user->status == 2) selected @endif>
                                                                                INACTIVE</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="inputChoosePassword"
                                                                            class="form-label">Choose Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock-open'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0"
                                                                                id="inputChoosePassword" name="password"
                                                                                placeholder="Choose Password"
                                                                                value="{{ $user->password }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="inputConfirmPassword"
                                                                            class="form-label">Confirm Password</label>
                                                                        <div class="input-group"> <span
                                                                                class="input-group-text bg-transparent"><i
                                                                                    class='bx bxs-lock'></i></span>
                                                                            <input type="password"
                                                                                class="form-control border-start-0"
                                                                                id="inputConfirmPassword"
                                                                                name="confirm_password"
                                                                                placeholder="Confirm Password" value="{{ $user->confirm_password }}"  />
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
                                                                                value="{{ $user->user_img }}" />
                                                                        </div>
                                                                    </div>
                                                                  
                                                                  <div class="col-12 pt-5">
                                                                      <button type="submit"
                                                                          class="btn btn-primary px-5">Update</button>
                                                                  </div>
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

                                        <!--Edit Delete Modal -->
                                        <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">DELETE USER</h5>
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
                                                                            delete <br><br> <span class="text-danger"> {{ $user->name }} </span>
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
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> --}}
                               
                            </table>
                        </div>
                        <nav aria-label="..." class="py-5">
							<ul class="pagination">
								{{$users->links()}}
								
								
								
							</ul>
						</nav>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection