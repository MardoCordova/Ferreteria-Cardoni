@extends('layouts.app')

@section('titulo','Modificacionv de Productos')

@section('alert')
<div class="container">
      @if (session('datos'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
    {{session('datos')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@endsection

@section('content')
	<!DOCTYPE html>
		<html>
			<head>
				<title></title>
			</head>
			<body>
				@if ($errors->any())
					<div class="alert alert-danger">
					<center><h5>Hay errores en en formulario, favor revisar</H2></center>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					</div>
				@endif
				
        <form method="POST" action="">
					@csrf
				  <div class="form-row">
				  	<div class="form-group col-md-1">
				      <label>ID</label>
				      <input type="text" disabled="true" class="form-control" maxlength="6" minlength="6" name="idproducto" id="idproducto" placeholder="Nº" value="{{ $productos->cod_producto}}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>
				    
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Martillo" value="{{ $productos->nombre}}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>

          		 <div class="form-group col-md-5">
      					<label>Proveedor</label>
      						<select name="idproveedor" id="idproveedor" class="custom-select">
	        					<option value="" selected>No seleccionado</option>
	        					@foreach($proveedor as $pro)
	        					<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
	        					@endforeach
     						</select>
               				 <span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
    			</div>

    			
				 </div>

				  <div class="form-row">
				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input type="textarea" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="Martillo de Acero" value="{{ $productos->presentacion}}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>

					<center>{{$productos->nombre_marca}}</center>
				    <div class="form-group col-md-2">
    				<label class="mb-2">Marca</label>
    					<select class='mi-selector' name='idmarca[]' id="idmarca" multiple='multiple'>
						    <option disabled="true">Seleccione la marca</option>
						    @foreach($marca as $marcaiten)
						    <option value='{{$marcaiten->cod_marca}}'

						    		@if($marcaiten->nombre_marca==$productos->marcas)
                                               		 selected
                                                @endif
						    	>{{$marcaiten->nombre_marca}}</option>
						    @endforeach
						</select>
						<span id="msgidmarca" name="msgidmarca" class="AlertaMsg"></span>
    				</div>

				 </div> <br>
				  <div class="form-group">
				    <label>Descripción</label>
					  <textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="Martillo doble con mango de goma" value="{{ $productos->descripcion}}"></textarea>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				  <button type="submit" class="btn btn-primary">Modificar Producto</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
			</body>
		</html>
@endsection



