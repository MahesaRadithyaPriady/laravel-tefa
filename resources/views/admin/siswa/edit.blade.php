<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa - Dashboard</title>
 <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-50">
  <div class="min-h-screen bg-gray-100">
    <!-- Main Content -->
    <div class="py-10 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
      <!-- Back Button -->
      <div class="mb-6">
        <a href="{{ route('siswa.index')}}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
          <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
      </div>

      <!-- Header -->
      <div class="text-center mb-8">
        <h1 class="text-3xl font-extrabold text-indigo-900 tracking-tight sm:text-4xl">
          Edit Siswa
        </h1>
        <p class="mt-2 text-sm text-gray-500">Ubah informasi data siswa</p>
      </div>

      <!-- Error Messages -->
      @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded shadow">
          <div class="flex">
            <div class="flex-shrink-0">
              <i class="fas fa-exclamation-circle text-red-500"></i>
            </div>
            <div class="ml-3">
              <h3 class="text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
              <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      @endif

      <!-- Form Card -->
      <div class="bg-white shadow overflow-hidden rounded-lg">
        <div class="px-4 py-5 sm:px-6 bg-indigo-700">
          <h2 class="text-lg font-medium text-white">Data Siswa</h2>
          <p class="mt-1 max-w-2xl text-sm text-indigo-200">Informasi personal dan akademis siswa</p>
        </div>

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
          @csrf
          @method('PUT')

          <div class="space-y-6">
            <!-- Photo Upload Section -->
            <div class="flex flex-col items-center">
              <label class="block text-sm font-medium text-gray-700 mb-3">Foto Siswa</label>
              <div class="w-32 h-32 mb-4 rounded-full overflow-hidden border-4 border-indigo-100 shadow">
                <img src="{{ asset('storage/siswas/' . $siswa->image) }}" class="w-full h-full object-cover" alt="Foto Siswa">
              </div>
              <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-indigo-100 border-dashed rounded-md w-full max-w-md">
                <div class="space-y-1 text-center">
                  <i class="fas fa-cloud-upload-alt text-indigo-500 text-3xl mb-3"></i>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                      <span>Upload foto baru</span>
                      <input id="file-upload" name="image" type="file" class="sr-only" accept="image/*">
                    </label>
                    <p class="pl-1">atau drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
              <!-- NIS -->
              <div>
                <label for="nis" class="block text-sm font-medium text-gray-700">NIS Siswa</label>
                <div class="mt-1">
                  <input type="text" name="nis" id="nis" value="{{ old('nis', $siswa->nis) }}" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                </div>
              </div>

              <!-- Nama -->
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <div class="mt-1">
                  <input type="text" name="name" id="name" value="{{ old('name', $siswa->name) }}" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                </div>
              </div>

              <!-- Tingkatan -->
              <div>
                <label for="tingkatan" class="block text-sm font-medium text-gray-700">Tingkatan</label>
                <div class="mt-1">
                  <select id="tingkatan" name="tingkatan" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                    <option {{ 'X' == $siswa->tingkatan ? 'selected' : '' }} value="X">X</option>
                    <option {{ 'XI' == $siswa->tingkatan ? 'selected' : '' }} value="XI">XI</option>
                    <option {{ 'XII' == $siswa->tingkatan ? 'selected' : '' }} value="XII">XII</option>
                  </select>
                </div>
              </div>

              <!-- Jurusan -->
              <div>
                <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                <div class="mt-1">
                  <select id="jurusan" name="jurusan" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                    <option {{ 'TBSM' == $siswa->jurusan ? 'selected' : '' }} value="TBSM">TBSM</option>
                    <option {{ 'TJKT' == $siswa->jurusan ? 'selected' : '' }} value="TJKT">TJKT</option>
                    <option {{ 'PPLG' == $siswa->jurusan ? 'selected' : '' }} value="PPLG">PPLG</option>
                    <option {{ 'DKV' == $siswa->jurusan ? 'selected' : '' }} value="DKV">DKV</option>
                    <option {{ 'TOI' == $siswa->jurusan ? 'selected' : '' }} value="TOI">TOI</option>
                  </select>
                </div>
              </div>

              <!-- Kelas -->
              <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <div class="mt-1">
                  <select id="kelas" name="kelas" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                    <option {{ '1' == $siswa->kelas ? 'selected' : '' }} value="1">1</option>
                    <option {{ '2' == $siswa->kelas ? 'selected' : '' }} value="2">2</option>
                    <option {{ '3' == $siswa->kelas ? 'selected' : '' }} value="3">3</option>
                    <option {{ '4' == $siswa->kelas ? 'selected' : '' }} value="4">4</option>
                  </select>
                </div>
              </div>

              <!-- No HP -->
              <div>
                <label for="hp" class="block text-sm font-medium text-gray-700">No HP</label>
                <div class="mt-1">
                  <input type="text" name="hp" id="hp" value="{{ old('hp', $siswa->hp) }}" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                </div>
              </div>

              <!-- Status -->
              <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                  <select id="status" name="status" required class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border">
                    <option {{ '1' == $siswa->status ? 'selected' : '' }} value="1">Aktif</option>
                    <option {{ '0' == $siswa->status ? 'selected' : '' }} value="0">Tidak Aktif</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="mt-10 pt-5 border-t border-gray-200 flex justify-end space-x-3">
            <button type="reset" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <i class="fas fa-undo mr-2"></i> RESET FORM
            </button>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <i class="fas fa-save mr-2"></i> SIMPAN DATA
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Simple file upload preview script -->
  <script>
    document.getElementById('file-upload').onchange = function() {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('img').src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
    };
  </script>
</body>
</html>