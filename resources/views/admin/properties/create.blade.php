@extends('layouts.app')

@section('meta-title', 'VeaInmuebles')
@section('meta-description')
VeaInmuebles - propiedades de usuario
@endsection

@section('content')
<!-- Modal Create Post -->
<div class="modal fade" id="createPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="POST" id="formCreateProperty" action="{{ route('admin.propiedad.store')}}">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Propiedad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <!--titulo  required -->
            <div class="form-group">
              <label for="title">Titulo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"  value="{{ old('title') }}" placeholder="Titulo" required >
              @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Crear</button>
        </div>
      </div>
    </div>
   </form> 
</div>
@endsection


@section('modals')
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush

@push('load-plugin')
@endpush
