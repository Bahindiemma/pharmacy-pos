@if(count($errors) > 0)
    @foreach ($errors->all() as $error)

    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-white">{{$error}}</h6>
               
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


        {{-- <div class="alert alert-danger">
            <div class="text-center">
                <strong>{{$error}}</strong>
            </div>
        </div> --}}
    @endforeach
@endif

@if (session('success'))

<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">{{session('success')}}</h6>
           
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


    {{-- <div class="alert alert-success">
        <div class="text-center">
            <strong>{{session('success')}}</strong>
        </div>
    </div> --}}
@endif

@if (session('error'))


<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">{{session('error')}}</h6>
           
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

{{-- 
    <div class="alert alert-danger">
        <div class="text-center">
            <strong>{{session('error')}}</strong>
        </div>
    </div> --}}
    
@endif