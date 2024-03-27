<div class="form-group">
    {!! Form::label('Name', 'Category Name', array('class' =>'form-label'))!!}
    {!! Form::text($name="category_name", $value = isset($data)? $data->category_name:null, $attributes = array('class' =>'form-control')) !!}
    @error('category_name')
    <div class="text text-danger">{{  $errors->first('category_name') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('File upload', 'image', array('class' =>'form-label')) !!}
    {!! Form::file('image', $attributes = array('class' =>'form-control file-upload-info','id'=>'exampleInputPassword1')) !!}
    @isset($data)
    <img src="{{Storage::disk('public')->url('upload/'.$data->image)}}" width="50px" height="50px" />
    @else
    <img src="{{Storage::disk('public')->url('/img/default.jpeg')}}" width="50px" height="50px" />
    @endisset
    @error('image')
    <div class="text text-danger">{{  $errors->first('image') }}</div>
    @enderror
  </div>
  {!! Form::submit('Submit', $attributes = array('class' =>'btn btn-gradient-primary me-2'))!!}
  @push('scripts')
  <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\CategoryRequest','form') !!}
  @endpush

