@extends('layout.base')
   @section('main-container')
   <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Login</h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           @include('layout.status_message')
              {!! Form::open(array(
                  'route' => 'login.login',
                  'method'=>'post',
                  ))
                  !!}

            @include('login.form')

            {!! Form::close() !!}
        </div>
    </div>
   </div>
</div>
</div>
@endsection
