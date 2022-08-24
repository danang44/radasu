
 @extends('master.admin_layout')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Dashboard</div>
                    
                 

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    HALLO ADMIN SEWAIN ID SELAMAT DATANG
                    <BR></BR>
                    HAVE A NICE DAY 
                </div>
            </div>
        </div>
        <img src="{{ asset('../images/vyruss.png') }}" width = 500px;>
    </div>
</div>
@endsection