@extends('admin.layouts')
@section('content')
    @if($message = Session::get('success'))
    <p>{{$message}}</p>
    @else
    <p class="text-2xl text-center font-bold">Kamu Telah Login</p>
    @endif
@endsection
 
