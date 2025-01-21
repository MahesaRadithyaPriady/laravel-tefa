<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akun</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Edit Akun</h1>
    <a href="{{ route('admin.akun') }}">Kembali</a>
    <br><br>

    <!-- Menampilkan Error -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Menampilkan Pesan Sukses -->
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <!-- Form untuk Mengupdate Data Akun -->
    <form action="{{ route('update', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>Data Akun</h2>
        <label>Nama Lengkap</label><br>
        <input type="text" id="name" name="name" value="{{ $akun->name }}">
        <br><br>

        <label>Hak Akses</label><br>
        <select name="usertype" required>
            <option {{ 'admin' == $akun->usertype ? 'selected' : '' }} value="admin">Admin</option>
            <option {{ 'ptk' == $akun->usertype ? 'selected' : '' }} value="ptk">PTK</option>
        </select>
        <br><br>

        <button type="submit">Simpan Data</button>
        <br><br>
    </form>

    <!-- Form untuk Mengupdate Email -->
    <form action="{{ route('UpdateEmail', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Email Address</label><br>
        <input type="email" id="email" name="email" value="{{ $akun->email }}">
        <br><br>

        <button type="submit">Simpan Email</button>
        <br><br>
    </form>

    <!-- Form untuk Mengupdate Password -->
    <form action="{{ route('updatePassword', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Password</label><br>
        <input type="password" id="password" name="password">
        <br><br>

        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
        <div class="col-md-6">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <br><br>

        <button type="submit">Simpan Password</button>
        <br><br>
    </form>
</body>
</html>
