@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
       
        <div class="text-center text-danger">
            <strong>{{$error}} </strong>
        </div>
       
    @endforeach
@endif

@if (session('success'))
    
        <div class="text-center text-success">
            <strong>{{session('success')}}</strong>
        </div>
   
@endif

@if (session('error'))
   
        <div class="text-center text-danger">
            <strong>{{session('error')}}</strong>
        </div>
    
    
@endif