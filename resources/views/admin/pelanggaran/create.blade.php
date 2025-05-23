<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pelanggaran - SMKN 4 TASIKMALAYA</title>
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
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-indigo-600">
          <h2 class="text-xl font-bold text-white">Tambah Pelanggaran</h2>
        </div>
        
        <div class="p-6">
          <!-- Back button -->
          <div class="mb-6">
            <a href="{{ route('pelanggaran.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
              </svg>
              Kembali
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
          <form action="{{ route('pelanggaran.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Pelanggaran Section -->
            <div class="bg-indigo-50 p-4 rounded-lg mb-6">
              <h3 class="text-lg font-medium text-indigo-800 mb-4 pb-2 border-b border-indigo-200">Data Pelanggaran</h3>
              
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group md:col-span-2">
                  <label for="jenis" class="form-label">Jenis Pelanggaran <span class="text-red-500">*</span></label>
                  <textarea id="jenis" name="jenis" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('jenis') }}</textarea>
                </div>

                <div class="form-group md:col-span-2">
                  <label for="konsekuensi" class="form-label">Konsekuensi <span class="text-red-500">*</span></label>
                  <textarea id="konsekuensi" name="konsekuensi" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('konsekuensi') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="poin" class="form-label">Poin <span class="text-red-500">*</span></label>
                  <input type="text" id="poin" name="poin" value="{{ old('poin') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
              </div>
            </div>

            <!-- Form Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
              <button type="reset" class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                RESET FORM
              </button>
              <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                SIMPAN DATA
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>