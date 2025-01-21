<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create - User </title>
</head>
<body>
  <h1>Tambah User</h1>
  <a href="{{ route('admin.dashboard') }}">Menu Utama</a>
  <a href="{{ route('admin.akun') }}">Kembali</a>
  <br>
  <br>

  @if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <form action="{{ route('akun.create') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <label>Nama Lengkap</label>
  <br>
  <input type="text" name="name" id="name" value="{{ old('name') }}">
  <br><br>
  <label>Email Address</label>
  <br>
  <input type="email" name="email" id="email" value="{{ old('email') }}">
  <br><br>
  <label>Password</label>
  <br>
  <input type="password" name="password" id="password">
  <br><br>
  <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
  <br>
      <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
  <br><br>
  <label>Role</label>
  <select name="usertype">
      <option value="admin">Admin</option>
      <option value="ptk">PTK</option>
  </select>
  <br><br>
  <button type="submit">Tambah</button>
  </form>
</body>
</html>