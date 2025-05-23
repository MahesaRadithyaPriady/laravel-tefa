<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa - Dashboard</title>
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
      <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-indigo-900 tracking-tight sm:text-4xl">
          Detail Siswa
        </h1>
        <p class="mt-2 text-sm text-gray-500">Informasi lengkap tentang data dan akun siswa</p>
      </div>

      <!-- Student Profile Card -->
      <div class="bg-white shadow overflow-hidden rounded-lg">
        <!-- Profile Photo Section -->
        <div class="bg-indigo-700 px-4 py-8 sm:px-6 flex flex-col items-center">
          <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-lg mb-4">
            <img src="{{ asset('storage/siswas/'.$siswa->image) }}" alt="{{ $siswa->name }}" class="w-full h-full object-cover">
          </div>
          <h2 class="text-xl font-bold text-white">{{ $siswa->name }}</h2>
          <p class="text-indigo-200 mt-1">{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</p>
          
          <!-- Status Badge -->
          @if($siswa->status == 1)
            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
              <span class="h-2 w-2 rounded-full bg-green-500 mr-1"></span>
              Aktif
            </span>
          @else
            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
              <span class="h-2 w-2 rounded-full bg-red-500 mr-1"></span>
              Tidak Aktif
            </span>
          @endif
        </div>

        <!-- Info Content -->
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <i class="fas fa-id-card mr-2 text-indigo-500"></i>
                NIS
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $siswa->nis }}
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                Email
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $siswa->email }}
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <i class="fas fa-graduation-cap mr-2 text-indigo-500"></i>
                Kelas
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                <i class="fas fa-phone-alt mr-2 text-indigo-500"></i>
                No. HP
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                {{ $siswa->hp }}
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="mt-8 flex justify-center space-x-4">
        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <i class="fas fa-edit mr-2"></i> Edit Data
        </a>
        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
          <i class="fas fa-print mr-2"></i> Cetak Data
        </a>
      </div>
    </div>
  </div>
</body>
</html>