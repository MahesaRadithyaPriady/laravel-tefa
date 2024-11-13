@extends ('auth.layouts')
@section('content')
<div class="bg-slate-200 h-screen justify-center items-center flex flex-col ">
    <div class="card w-80 bg-slate-300 flex flex-col rounded-lg shadow-lg shadow-slate-500 p-8">
<h1 class="text-4xl bg-clip-text text-transparent bg-gradient-to-tr from-slate-700 via-slate-500 to-s-900 text-center font-extrabold ">Login</h1>
<br>
<div class="flex flex-col justify-center items-center">

<div class="error bg-slate-200 w-60 rounded-md text-center ">
    <h1 class="text-red-500">{{$errors->first('email') ? $errors->first('email') : $errors->first('password')}}</h1>
</div>
    

<form  action="{{ route ('authenticate') }}" method="post">
    @csrf
    <label class="label text-lg font-bold ">Email</label>
    <input class="input input-rounded" placeholder="Masukan Email" type="email" name="email" id="email" value=" {{old ('email') }}">

    <label class="label text-lg font-bold ">Password</label>

    <input  class="input input-rounded mb-4" type="password" name="password" placeholder="Masukan Password" id="password">

    <button class="bg-slate-700 hover:bg-slate-800 text-white font-bold py-[6px] px-4 rounded mx-2" type="submit">Login</button>
    <a class="bg-slate-700 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded" href="{{ route('register') }}">Daftar</a>
</form>
</div>
</div>
</div>
