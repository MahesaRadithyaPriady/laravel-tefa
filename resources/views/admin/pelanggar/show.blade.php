<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Header Bar -->
        <header class="bg-indigo-600 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">Sistem Manajemen Pelanggaran</h1>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Page Header -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-indigo-800 mb-2">Detail Pelanggar</h2>
                        <p class="text-gray-600">Informasi detail siswa pelanggar</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <a href="{{ route('pelanggar.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Data Pelanggar
                        </a>
                    </div>
                </div>
            </div>

            <!-- Detail Pelanggar Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="p-6">
                    <div class="flex flex-col items-center sm:flex-row sm:items-start">
                        <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-6">
                            <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" class="w-32 h-32 object-cover rounded-lg shadow" alt="{{ $pelanggar->name }}">
                        </div>
                        <div class="flex-grow grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
                            <div class="bg-indigo-50 p-4 rounded-lg">
                                <h3 class="text-lg font-semibold text-indigo-800 mb-3 border-b border-indigo-100 pb-2">Akun Pelanggar</h3>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">Nama:</span>
                                        <span class="text-gray-800">{{ $pelanggar->name }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">Email:</span>
                                        <span class="text-gray-800">{{ $pelanggar->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-indigo-50 p-4 rounded-lg">
                                <h3 class="text-lg font-semibold text-indigo-800 mb-3 border-b border-indigo-100 pb-2">Data Pelanggar</h3>
                                <div class="space-y-2">
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">NIS:</span>
                                        <span class="text-gray-800">{{ $pelanggar->nis }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">Kelas:</span>
                                        <span class="text-gray-800">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">No HP:</span>
                                        <span class="text-gray-800">{{ $pelanggar->hp }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="font-medium text-gray-700 w-20">Status:</span>
                                        <span class="text-gray-800">
                                            @if($pelanggar->status == 1)
                                                <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Aktif</span>
                                            @else
                                                <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Tidak Aktif</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pilih Pelanggaran Section -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-indigo-800 mb-2">Pilih Pelanggaran</h2>
                        <p class="text-gray-600">Pilih jenis pelanggaran yang dilakukan oleh siswa</p>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="mb-6">
                <form action="" method="get" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="cari" id="cari" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5" placeholder="Cari jenis pelanggaran...">
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                        Cari
                    </button>
                </form>
            </div>

            <!-- Alert Box (Success Message) -->
            @if(Session::has('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-md shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            {{ Session::get('success') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Table for Mobile & Desktop -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-indigo-600">
                        <tr>
                            <th scope="col" class="px-6 py-3">Jenis</th>
                            <th scope="col" class="px-6 py-3">Konsekuensi</th>
                            <th scope="col" class="px-6 py-3">Poin</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggarans as $pelanggaran)
                        <tr class="bg-white border-b hover:bg-indigo-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pelanggaran->jenis }}</td>
                            <td class="px-6 py-4">{{ $pelanggaran->konsekuensi }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-0.5 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">
                                    {{ $pelanggaran->poin }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('pelanggar.storePelanggaran') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_pelanggar" value="{{ $pelanggar->id }}">
                                    <input type="hidden" name="id_user" value="{{ $idUser }}">
                                    <input type="hidden" name="id_pelanggaran" value="{{ $pelanggaran->id }}">
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded-md text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Tambah Pelanggaran
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white">
                            <td colspan="4" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium text-gray-500 mb-2">Data tidak ditemukan</p>
                                    <p class="text-gray-500 mb-4">Silahkan kembali ke data pelanggaran</p>
                                    <a href="{{ route('pelanggaran.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                        Data Pelanggaran
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $pelanggarans->links() }}
            </div>
        </main>

      
    </div>
</body>
</html>