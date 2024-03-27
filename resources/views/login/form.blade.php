  <div class="form-group">
    {!! Form::label('Name', 'Email', array('class' =>'form-label'))!!}
    {!! Form::text($name="email", $value = null, $attributes = array('class' =>'form-control')) !!}
    @error('email')
   <div class="text text-danger">{{  $errors->first('email') }}</div>
   @enderror
  </div>

  <div class="form-group">
    {!! Form::label('Name', 'Password', array('class' =>'form-label'))!!}
    {!! Form::text($name="password", $value = null, $attributes = array('class' =>'form-control')) !!}
    @error('password')
    <div class="text text-danger">{{  $errors->first('password') }}</div>
    @enderror
  </div>

  {!! Form::submit('Submit', $attributes = array('class' =>'btn btn-primary'))!!}
