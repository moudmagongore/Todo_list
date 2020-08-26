@extends('layouts.master')

@include('layouts.header')

@section('content')

	<div class="card shadow mb-4 mt-5">                  
	    <div class="card-body">
	        <div class="card-header py-3">
	            <div class="row">
	            	<div class="col-md-10">
	            		<h6 class="m-0 font-weight-bold text-primary">Liste des tâches</h6>
	            	</div>

	            	<div class="col-md-2">
	            		<a href="" class="m-0 font-weight-bold text-primary" data-toggle="modal" data-target="#addtache">Ajouter</a>
	            	</div>
	            </div>
	        </div> 

	      
			<table class="table">
				<thead>
					<th>Nom</th>
					<th>Description</th>
					<th>ACTIONS</th>
				</thead>

				<tbody>
					@foreach ($taches as $tache)
						
						@if ($tache->count() > 0)
							<tr>
							<td>
								@if($tache->statut == 'complete')
									<i style="color: red;" class="fa fa-times" aria-hidden="true"></i>
								@endif

								{{$tache->nom}}
							</td>
							<td>{{$tache->description}}</td>

							<td>

								<form action="{{ route('complete.tache.destroy', $tache->id) }}" method="POST" 
										onsubmit = "return confirm('Êtes-vous sûr de vouloir supprimer cette tâchr?');"
									>
										{{csrf_field()}}
										
										@if ($tache->statut == 'nonComplete')
											<a href="" class="btn btn-primary" data-toggle="modal" data-target="#addcompleter{{$tache->id}}"><i class=""></i>completer</a>
										@elseif($tache->statut == 'complete')
											<!-- <a href="{{ route('terminer', $tache->id) }}" name="terminer" value="terminer" class="btn btn-danger">Terminer<i class="f="></i></a> -->
										@endif

										@if ($tache->statut == 'nonComplete')
											<a class="btn btn-warning"><i class="fa fa-pencil-square-o" data-toggle="modal" data-target="#edittache{{$tache->id}}"></i></a>

											<button type="submit" name="Supprimer" value="Supprimer" class="btn btn-danger"><i class="fa fa-trash"></i></button>
										@endif

										
								</form>
							</td>
						</tr>
						@else
							<p>Aucune tâche</p>
						@endif
					
					@endforeach
				</tbody>
	 		</table>
		</div>
	</div>

	

	@foreach ($taches as $tache)
			<!--  Modal pour ajouter une tache -->
   <div class="modal fade" id="addcompleter{{$tache->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Attention</h3>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{ route('complete.tache', $tache->id) }}" method="POST">

                            @csrf 

                            <p>Voulez-vous terminez cette tâche ?</p>
                            
                            <div class="row">  
                                <div class="col-md-9">
                                	<button type="submit" class="btn btn-primary" style="margin-left: 275px; width: 70px;">Ok</button>
                                </div>



                                <div class="col-md-3">
                                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    

                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour modifier la tache -->





   <!--  Modal pour ajout d'une tache -->
   <div class="modal fade" id="addtache" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ajout d'une tâche</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        
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

                    

                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour ajout d'une tache -->





   <!--  Modal pour editer une tache -->
   <div class="modal fade" id="edittache{{$tache->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Modification d'une tâche</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid">
                        
                        <div class="row">
							<div class="col-sm-12 col-sm-offset-2">
								<form action="{{ route('edit.tache', $tache->id) }}" method="post">

									@csrf

									<div class="form-group">
										<input type="text" class="form-control {{$errors->has('tache') ? 'is-invalid' : '' }}" value="{{old('tache') ?: $tache->nom}}" name="tache" placeholder="tache">

										{!!$errors->first('tache', '<div class="invalid-feedback">:message</div>')!!}

									</div>

									<div class="form-group">
										<textarea class="form-control {{$errors->has('description') ? 'is-invalid' : '' }}" value="{{old('description')}}" rows="5" cols="5"  name="description" placeholder="Description">{{old('description') ?: $tache->description}}</textarea>

										{!!$errors->first('description', '<div class="invalid-feedback">:message</div>')!!}
									</div>

									
									<button type="submit" class="btn btn-primary">Modifier</button>
								</form>
							</div>
						</div>
                                 
                     </div>      
                </div>

                </div>
                
            </div>
        </div>
    </div>
   <!--  End Modal pour editer une tache -->
	@endforeach
@endsection