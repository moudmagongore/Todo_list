@extends('layouts.app')

@section('content')
	<div class="container card shadow mb-4 col-md-5">                  
	    <div class="card-body">
	        <div class="card-header py-3 mb-4">
	            <h6 class="m-0 font-weight-bold text-primary">Ajout d'une tâche</h6>
	        </div> 

	        <div class="row">
                <div class="col-sm-12 col-sm-offset-2">
                    <form action="{{ route('post.tache') }}" method="post">

                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control {{$errors->has('tache') ? 'is-invalid' : '' }}" value="{{old('tache')}}" name="tache" placeholder="tache">

                            {!!$errors->first('tache', '<div class="invalid-feedback">:message</div>')!!}

                        </div>

                        <div class="form-group">
                            <textarea class="form-control {{$errors->has('description') ? 'is-invalid' : '' }}" value="{{old('description')}}" rows="5" cols="5"  name="description" placeholder="Description">{{old('description')}}</textarea>

                            {!!$errors->first('description', '<div class="invalid-feedback">:message</div>')!!}
                        </div>

                        
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>

	        
	    </div>
	</div>
@stop