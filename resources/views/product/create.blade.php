@extends('layout.base')
   @section('main-container')
   <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Create Category</h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
        {!! Form::open(array(
            'route' => 'products.index',
            'method'=>'post',
            'files'=>true,
            ))
            !!}

      @include('product.form')

      {!! Form::close() !!}
    </div>
</div>
</div>
</div>
</div>
@endsection
