@extends('layouts.app')

@section('content')

	<div class="container card shadow mb-4 col-md-6">                  
	    <div class="card-body">
	        <div class="card-header py-3 mb-4">
	            <h6 class="m-0 font-weight-bold text-primary">Modification mot de passe</h6>
	        </div> 

	        <div class="row">
                <div class="col-sm-12 col-sm-offset-2">
                    <form action="{{ route('modification-mot-de-passe') }} " method="post">

                        @csrf

                        <div class="form-group">
                            <input type="password" name="password" placeholder="Nouveau mot de passe" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}">

                            {!!$errors->first('password', '<div class="invalid-feedback">:message</div>')!!}

                        </div>  

                        <div class="form-group">
                            <input type="password" name="password_confirmation" placeholder="Mot de passe de (confirmation)" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}">

                            {!!$errors->first('password_confirmation', '<div class="invalid-feedback">:message</div>')!!}
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Modifier mon mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>     	    
	</div>
@stop