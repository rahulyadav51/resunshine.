<div class="form-group">
    {!! Form::label('category_id', 'Category', array('class' =>'form-label'))!!}
    {{ Form::select('category_id', $categories, isset($data)? $data->category_id:null, ['class'=>'form-control', 'id'=>'category_id']) }}
    @error('category_id')
    <div class="text text-danger">{{  $errors->first('category_id') }}</div>
    @enderror
 </div>

  <div class="form-group">
    {!! Form::label('product_name', 'Product Name', array('class' =>'form-label'))!!}
    {!! Form::text($name="product_name", $value = isset($data)? $data->product_name:null, $attributes = array('class' =>'form-control')) !!}
    @error('product_name')
    <div class="text text-danger">{{  $errors->first('product_name') }}</div>
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

  <div class="form-group">
    {!! Form::label('price', 'Price', array('class' =>'form-label'))!!}
    {!! Form::text($name="price", $value = isset($data)? $data->price:null, $attributes = array('class' =>'form-control')) !!}
    @error('price')
    <div class="text text-danger">{{  $errors->first('price') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('color', 'Color', array('class' =>'form-label'))!!}
    {!! Form::text($name="color", $value = isset($data)? $data->color:null, $attributes = array('class' =>'form-control')) !!}
    @error('color')
    <div class="text text-danger">{{  $errors->first('color') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('quantity', 'Quantity', array('class' =>'form-label'))!!}
    {!! Form::text($name="quantity", $value = isset($data)? $data->quantity:null, $attributes = array('class' =>'form-control')) !!}
    @error('quantity')
    <div class="text text-danger">{{  $errors->first('quantity') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('short_description', 'Short Description', array('class' =>'form-label'))!!}
    {!! Form::text($name="short_description", $value = isset($data)? $data->short_description:null, $attributes = array('class' =>'form-control')) !!}
    @error('short_description')
    <div class="text text-danger">{{  $errors->first('short_description') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Short Description', array('class' =>'form-label'))!!}
    {!! Form::text($name="description", $value = isset($data)? $data->description:null, $attributes = array('class' =>'form-control')) !!}
    @error('description')
    <div class="text text-danger">{{  $errors->first('description') }}</div>
    @enderror
  </div>

  {!! Form::submit('Submit', $attributes = array('class' =>'btn btn-gradient-primary me-2'))!!}
