@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Agregar Cliente</h5>
    <div class="card-body">
      <form method="post" action="{{route('customer.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="nombre" class="col-form-label">Nombre <span class="text-danger">*</span></label>
          <input id="nombre" type="text" name="nombre" placeholder="Ingrese nombre" value="{{old('nombre')}}" class="form-control">
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="apellido" class="col-form-label">Apellido <span class="text-danger">*</span></label>
          <input id="apellido" type="text" name="apellido" placeholder="Ingrese apellido" value="{{old('apellido')}}" class="form-control">
          @error('apellido')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="cuit" class="col-form-label">CUIT <span class="text-danger">*</span></label>
          <input id="cuit" type="text" name="cuit" placeholder="Ingrese CUIT" value="{{old('cuit')}}" class="form-control">
          @error('cuit')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="provincia" class="col-form-label">Provincia <span class="text-danger">*</span></label>
          <input id="provincia" type="text" name="provincia" placeholder="Ingrese provincia" value="{{old('provincia')}}" class="form-control">
          @error('provincia')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="tipo_persona" class="col-form-label">Tipo de Persona <span class="text-danger">*</span></label>
          <select id="tipo_persona" name="tipo_persona" class="form-control">
            <option value="Fisica" {{old('tipo_persona') == 'Fisica' ? 'selected' : ''}}>Física</option>
            <option value="Juridica" {{old('tipo_persona') == 'Juridica' ? 'selected' : ''}}>Jurídica</option>
          </select>
          @error('tipo_persona')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="sexo" class="col-form-label">Sexo <span class="text-danger">*</span></label>
          <select id="sexo" name="sexo" class="form-control">
            <option value="Masculino" {{old('sexo') == 'Masculino' ? 'selected' : ''}}>Masculino</option>
            <option value="Femenino" {{old('sexo') == 'Femenino' ? 'selected' : ''}}>Femenino</option>
            <option value="Otro" {{old('sexo') == 'Otro' ? 'selected' : ''}}>Otro</option>
          </select>
          @error('sexo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="domicilio" class="col-form-label">Domicilio <span class="text-danger">*</span></label>
          <input id="domicilio" type="text" name="domicilio" placeholder="Ingrese domicilio" value="{{old('domicilio')}}" class="form-control">
          @error('domicilio')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
          <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control">
          @error('fecha_nacimiento')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group mb-3">
          <button class="btn btn-success" type="submit">Enviar</button>
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
    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    if(cat_id !=null){
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
          } else {
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
  })
</script>
@endpush
