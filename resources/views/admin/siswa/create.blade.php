<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa - SMKN 4 TASIKMALAYA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .form-group {
      @apply mb-4;
    }
    .form-label {
      @apply block text-sm font-medium text-gray-700 mb-1;
    }
    .form-input {
      @apply mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50;
    }
    .form-select {
      @apply mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md;
    }
    .btn-primary {
      @apply px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200;
    }
    .btn-secondary {
      @apply px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200;
    }
  </style>
</head>

<body class="bg-gray-50">
  <div class="min-h-screen">
    <!-- Header -->
   

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-indigo-600">
          <h2 class="text-xl font-bold text-white">Tambah Siswa</h2>
        </div>
        
        <div class="p-6">
          <!-- Back button -->
          <div class="mb-6">
            <a href="{{ route('siswa.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
              </svg>
              Kembali ke Daftar Siswa
            </a>
          </div>

          <!-- Validation Errors -->
          @if ($errors->any())
          <div class="mb-6 bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Terjadi kesalahan!</strong>
            <ul class="mt-1 list-disc list-inside text-sm">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <!-- Form -->
          <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Akun Siswa Section -->
            <div class="bg-indigo-50 p-4 rounded-lg mb-6">
              <h3 class="text-lg font-medium text-indigo-800 mb-4 pb-2 border-b border-indigo-200">Akun Siswa</h3>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                  <label for="name" class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="form-group">
                  <label for="email" class="form-label">Email Address <span class="text-red-500">*</span></label>
                  <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="form-group">
                  <label for="password" class="form-label">Password <span class="text-red-500">*</span></label>
                  <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="form-group">
                  <label for="password_confirmation" class="form-label">Confirm Password <span class="text-red-500">*</span></label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
              </div>
            </div>

            <!-- Data Siswa Section -->
            <div class="bg-indigo-50 p-4 rounded-lg">
              <h3 class="text-lg font-medium text-indigo-800 mb-4 pb-2 border-b border-indigo-200">Data Siswa</h3>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group col-span-1 md:col-span-2">
                  <label for="image" class="form-label">Foto Siswa <span class="text-red-500">*</span></label>
                  <div class="mt-1 flex items-center">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                      </svg>
                    </span>
                    <input type="file" name="image" id="image" accept="image/*" class="ml-4 py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nis" class="form-label">NIS Siswa <span class="text-red-500">*</span></label>
                  <input type="text" id="nis" name="nis" value="{{ old('nis') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="form-group">
                  <label for="hp" class="form-label">No. HP <span class="text-red-500">*</span></label>
                  <input type="text" id="hp" name="hp" value="{{ old('hp') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="form-group">
                  <label for="tingkatan" class="form-label">Tingkatan <span class="text-red-500">*</span></label>
                  <select id="tingkatan" name="tingkatan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Pilih Tingkatan</option>
                    <option value="X" {{ old('tingkatan') == 'X' ? 'selected' : '' }}>X</option>
                    <option value="XI" {{ old('tingkatan') == 'XI' ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ old('tingkatan') == 'XII' ? 'selected' : '' }}>XII</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="jurusan" class="form-label">Jurusan <span class="text-red-500">*</span></label>
                  <select id="jurusan" name="jurusan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="TBSM" {{ old('jurusan') == 'TBSM' ? 'selected' : '' }}>TBSM</option>
                    <option value="TJKT" {{ old('jurusan') == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                    <option value="PPLG" {{ old('jurusan') == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                    <option value="DKV" {{ old('jurusan') == 'DKV' ? 'selected' : '' }}>DKV</option>
                    <option value="TOI" {{ old('jurusan') == 'TOI' ? 'selected' : '' }}>TOI</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="kelas" class="form-label">Kelas <span class="text-red-500">*</span></label>
                  <select id="kelas" name="kelas" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Pilih Kelas</option>
                    <option value="1" {{ old('kelas') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('kelas') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('kelas') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('kelas') == '4' ? 'selected' : '' }}>4</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Form Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
              <button type="reset" class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                Reset Form
              </button>
              <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                Simpan Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

   
  </div>

  <script>
    // Preview image before upload
    document.getElementById('image').onchange = function(evt) {
      const [file] = this.files;
      if (file) {
        const parent = this.parentNode;
        const imgPreview = parent.querySelector('span');
        if (imgPreview) {
          imgPreview.innerHTML = '';
          const img = document.createElement('img');
          img.src = URL.createObjectURL(file);
          img.className = 'h-full w-full object-cover';
          imgPreview.appendChild(img);
        }
      }
    };
  </script>
</body>
</html>