@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Editar Cliente</h5>
    <div class="card-body">
      <form method="post" action="{{route('customer.update', $customer->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputNombre" class="col-form-label">Nombre <span class="text-danger">*</span></label>
          <input id="inputNombre" type="text" name="nombre" placeholder="Ingrese nombre" value="{{$customer->nombre}}" class="form-control">
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputApellido" class="col-form-label">Apellido <span class="text-danger">*</span></label>
          <input id="inputApellido" type="text" name="apellido" placeholder="Ingrese apellido" value="{{$customer->apellido}}" class="form-control">
          @error('apellido')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputCuit" class="col-form-label">CUIT <span class="text-danger">*</span></label>
          <input id="inputCuit" type="text" name="cuit" placeholder="Ingrese CUIT" value="{{$customer->cuit}}" class="form-control">
          @error('cuit')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputProvincia" class="col-form-label">Provincia <span class="text-danger">*</span></label>
          <input id="inputProvincia" type="text" name="provincia" placeholder="Ingrese provincia" value="{{$customer->provincia}}" class="form-control">
          @error('provincia')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputTipoPersona" class="col-form-label">Tipo de Persona <span class="text-danger">*</span></label>
          <select name="tipo_persona" class="form-control">
              <option value="">--Seleccionar tipo de persona--</option>
              <option value="fisica" {{$customer->tipo_persona == 'fisica' ? 'selected' : ''}}>Física</option>
              <option value="juridica" {{$customer->tipo_persona == 'juridica' ? 'selected' : ''}}>Jurídica</option>
          </select>
          @error('tipo_persona')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputSexo" class="col-form-label">Sexo <span class="text-danger">*</span></label>
          <select name="sexo" class="form-control">
              <option value="">--Seleccionar sexo--</option>
              <option value="masculino" {{$customer->sexo == 'masculino' ? 'selected' : ''}}>Masculino</option>
              <option value="femenino" {{$customer->sexo == 'femenino' ? 'selected' : ''}}>Femenino</option>
              <option value="otro" {{$customer->sexo == 'otro' ? 'selected' : ''}}>Otro</option>
          </select>
          @error('sexo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputDomicilio" class="col-form-label">Domicilio <span class="text-danger">*</span></label>
          <input id="inputDomicilio" type="text" name="domicilio" placeholder="Ingrese domicilio" value="{{$customer->domicilio}}" class="form-control">
          @error('domicilio')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="inputFechaNacimiento" class="col-form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
          <input id="inputFechaNacimiento" type="date" name="fecha_nacimiento" value="{{$customer->fecha_nacimiento}}" class="form-control">
          @error('fecha_nacimiento')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Actualizar</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
</script>
@endpush
