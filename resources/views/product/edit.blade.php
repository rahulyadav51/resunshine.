@extends('layout.base')
@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Edit product</h3>
        </div>
        <div class="row">
            @include('layout.status_message')
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => ['products.update', $data->id], 'method' => 'post', 'files' => true]) !!}

                        {{-- @method('PUT') --}}
                        <input type="hidden" name="_method" value="put">
                        @include('product.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
