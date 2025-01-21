<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data User</title>
</head>
<body>
  <h1>Data User</h1>
  <a href="{{ route('admin.dashboard') }}">Menu Utama</a>
  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
  <form action="{{ route('logout') }}" id="logout-form" method="POST">
    @csrf
  </form>
  <br>
  <br>
  <a href="{{ route('akun.create') }}">Tambah User</a>

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
  </div>
  @endif

  <table>
    <thead>
      <tr>
    
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->usertype }}</td>
        <td>
          <form action="{{ route('akun.destroy', $user->id) }}" onsubmit="return confirm('Anda Yakin ?')" method="POST">
            <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>