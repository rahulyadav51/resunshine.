@extends('layout.base')
   @section('main-container')
   <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">Sign Up</h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
           @include('layout.status_message')


             {!! Form::open(array(
                 'route' => 'signup.create',
                 'method'=>'post',
                 'id'=>'signupForm'
                 ))
                 !!}

              @include('signup.form')

             {!! Form::close() !!}
           </div>
        </div>
       </div>
    </div>
    </div>
    @endsection
@push('style')
<style>
	#signupForm {
		width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	</style>
@endpush
@push('scripts')
<script src="{{url("lib/jquery.js")}}"></script>
<script src="{{url("dist/jquery.validate.js")}}"></script>
<script>
//      $("#signupForm").validate({
//   submitHandler: function(form) {
//     // some other code
//     // maybe disabling submit button
//     // then:
//     $(form).submit();
//   }
//  });
	$().ready(function() {
		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				name: "required",
				email: "required",
                password: "required",
				name: {
					required: true,

				},
                email: {
                    required: true,
                    email: true
                },
				password: {
					required: true,
					minlength: 5
				},
			messages: {
				name: "Please enter your name",
                email: "Please enter a valid email address",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},

			}
        }
		});

	});
	</script>
@endpush


