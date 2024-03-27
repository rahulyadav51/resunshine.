<div class="form-group">
    {!! Form::label('name', 'Name', array('class' =>'form-label'))!!}
    {{ Form::text($name="name", $value = null, $attributes = array('class' =>'form-control','id'=>'name'))}}
    @error('name')
    <div class="text text-danger">{{  $errors->first('name') }}</div>
    @enderror
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email', array('class' =>'form-label'))!!}
    {!! Form::text($name="email", $value = null, $attributes = array('class' =>'form-control','id'=>'email')) !!}
    @error('email')
   <div class="text text-danger">{{  $errors->first('email') }}</div>
   @enderror
  </div>

  <div class="form-group">
    {!! Form::label('password', 'Password', array('class' =>'form-label'))!!}
    {!! Form::text($name="password", $value = null, $attributes = array('class' =>'form-control','id'=>'password')) !!}
    @error('password')
    <div class="text text-danger">{{  $errors->first('password') }}</div>
    @enderror
  </div>

  {!! Form::submit('Submit', $attributes = array('class' =>'submit'))!!}
