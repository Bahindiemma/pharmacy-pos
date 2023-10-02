@extends('layouts.dash')
@section('content')
    <style>
        path {
            display: none;
        }

        svg {
            display: none;
        }

        .form {
            display: flex;
            justify-content: center;
            align-items: center
                /* background-color: green; */
                /* justify-content: space-evenly; */
        }

        .formsearch {
            /* background-color: green; */
            /* padding:10px; */
            /* margin-top: 1rem; */
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

                <form action="{{ route('report.index') }}">
                    <div class="row">
                        <span class="col-md-3">
                            Start Date:
                            <input type="date" value="{{ request('start_date') }}" class="form-control"
                                name="start_date" />
                        </span>

                        <span class="col-md-3">
                            End Date:
                            <input type="date" value="{{ request('end_date') }}" class="form-control" name="end_date" />
                        </span>
                        <span class="col-md-3">
                            <br>
                            <input type="submit" class="btn btn-block btn-primary" value="Search">
                        </span>
                    </div>
                </form>
                <br />

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ordername</th>
                                        <th>Productname</th>
                                        <th>Batch Number</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            {{-- <td>{{ $value->pdt->id }}</td> --}}
                                            <td>{{ $value->order->name }}</td>
                                            <td>{{ $value->pdt->product_name }}</td>
                                            <td>{{ $value->pdt->batch_number }}</td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>{{ number_format($value->unit_price, 2) }}</td>
                                            <td>{{ number_format($value->amount, 2) }}</td>
                                            <td>{{ number_format($value->discount, 2) }}</td>
                                            {{-- <td>{{ $value->pdt->quantity }}</td> --}}
                                            <td>{{ $value->order->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
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
