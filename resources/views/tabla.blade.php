@extends('adminlte::page')

@section('title', 'Tabla')
@section('plugins.Sweetalert2',true)






@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Swal.fire(
  'buen trabajo!',
  'You clicked the button!',
  'exito'
)
    </script>
@stop