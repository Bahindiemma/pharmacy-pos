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
                
              
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Start_date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            {{-- <td>{{ $key + 1 }}</td> --}}
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>#{{ number_format($product->price, 2) }}</td>
                                            <td>#{{ number_format($product->supplierprice, 2) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{$product->created_at}}</td>
                                            </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        {{-- <nav aria-label="..." class="py-5 float-right">
                            <-- class="pagination">
                                {{-- {{ $products->links() }} --}}
                        
                        </nav>
                    </div>
                </div>
            </div>

           
        </div>
      
    </div>
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
                
              
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Start_date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            {{-- <td>{{ $key + 1 }}</td> --}}
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>#{{ number_format($product->price, 2) }}</td>
                                            <td>#{{ number_format($product->supplierprice, 2) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{$product->created_at}}</td>
                                            </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        {{-- <nav aria-label="..." class="py-5 float-right">
                            <-- class="pagination">
                                {{-- {{ $products->links() }} --}}
                        
                        </nav>
                    </div>
                </div>
            </div>

           
        </div>
      
    </div>
@endsection
