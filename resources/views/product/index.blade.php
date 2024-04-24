@extends('layout.base')
@section('main-container')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Products </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('products/create') }}">ADD Product</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                        @include('layout.status_message')
                        </p>
                        {{-- <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th>Category Name</th>
                                    <th> Product Name </th>
                                    <th>Image</th>
                                    <th> Quantity </th>
                                    <th> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }} </td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td class="py-1"><img
                                                src="{{ Storage::disk('public')->url('upload/' . $item->image) }}"
                                                width="50px" height="50px" /></td>
                                        <td>{{ $item->quantity }}</td>
                                        <td><a class="btn btn-primary"
                                                href="{{ route('products.edit', ['product' => $item->id]) }}">Edit</a>
                                            <button class="btn btn-danger ">delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        <table class="table table-striped" id="producttable">
                            <thead>
                                <tr>
                                    <th> Id </th>
                                    <th>Category Name</th>
                                    <th> Product Name </th>
                                    <th>Image</th>
                                    <th> Price </th>
                                    <th> Color </th>
                                    <th> Quantity </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                        </table>
                        {{-- {{ $dataTable->table() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script type="text/javascript">
        $(function () {
              var table = $('#producttable').DataTable({
                  processing: true,
                  serverSide: true,
                  columnDefs: [{
                    targets: [7],
                    orderable: false,
                    searchable: false,
                   }],
                  ajax: "{{ route('products.index') }}",
                  columns: [
                      {data: 'id', name: 'id'},
                      {data: 'category.category_name', name: 'category.category_name'},
                      {data: 'product_name', name: 'product_name'},
                      {data: 'image', name: 'image',render:function(data,type,row,meta){
                        return `<img src="{{ Storage::disk('public')->url('upload/' . `+data+`) }}" width="50px" height="50px" />`;
                      }},
                      {data: 'price', name: 'price'},
                      {data: 'color', name: 'color'},
                      {data: 'quantity', name: 'quantity'},
                      {data: 'action', name: 'action',render:function(data,type,row,meta){
                        return actionBtn = `<a href="{{url('/')}}/products/${row['id']}/edit" class="edit btn btn-success btn-sm">Edit</a>
                                            <form action="{{url('/')}}/products /${row['id']}" method="POST">
                                                @csrf
                                                @method("Delete")
                                              <button class="btn btn-danger" type="Submit">Delete</button>
                                             </form>`;
                      }},
                  ]
              });
            });
    </script>
@endpush
