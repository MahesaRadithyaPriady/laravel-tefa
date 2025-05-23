<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
                        <h2 class="text-3xl font-bold text-indigo-800 mb-2">Pilih Data Pelanggar</h2>
                        <p class="text-gray-600">Pilih siswa yang akan ditambahkan sebagai pelanggar</p>
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

            <!-- Search Bar -->
            <div class="mb-6">
                <form action="" method="get" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="cari" id="cari" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 p-2.5" placeholder="Cari berdasarkan nama atau NIS...">
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                        Cari Siswa
                    </button>
                </form>
            </div>

            <!-- Cards Grid (Mobile View) -->
            <div class="grid grid-cols-1 gap-4 sm:hidden">
                @forelse ($siswas as $siswa)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center">
                            <img src="{{ asset('storage/siswas/' . $siswa->image) }}" class="w-20 h-20 object-cover rounded-md mr-4" alt="{{ $siswa->name }}">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $siswa->name }}</h3>
                                <p class="text-sm text-gray-600">NIS: {{ $siswa->nis }}</p>
                                <p class="text-sm text-gray-600">Kelas: {{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600">Email: {{ $siswa->email }}</p>
                            <p class="text-sm text-gray-600">Telp/HP: {{ $siswa->hp }}</p>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('pelanggar.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Tambah Sebagai Pelanggar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-lg font-medium text-gray-500 mb-2">Data tidak ditemukan</p>
                    <p class="text-gray-500 mb-4">Silahkan cek pada data pelanggar</p>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('pelanggar.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                            Data Pelanggar
                        </a>
                        <a href="{{ route('pelanggar.create') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                            Kembali
                        </a>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Table (Desktop View) -->
            <div class="hidden sm:block overflow-x-auto rounded-lg shadow">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase bg-indigo-600">
                        <tr>
                            <th scope="col" class="px-6 py-3">Foto</th>
                            <th scope="col" class="px-6 py-3">NIS</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Kelas</th>
                            <th scope="col" class="px-6 py-3">Telp/HP</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $siswa)
                        <tr class="bg-white border-b hover:bg-indigo-50">
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/siswas/' . $siswa->image) }}" class="w-16 h-16 object-cover rounded-md" alt="{{ $siswa->name }}">
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $siswa->nis }}</td>
                            <td class="px-6 py-4">{{ $siswa->name }}</td>
                            <td class="px-6 py-4">{{ $siswa->email }}</td>
                            <td class="px-6 py-4">{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                            <td class="px-6 py-4">{{ $siswa->hp }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('pelanggar.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Tambah Pelanggar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white">
                            <td colspan="7" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium text-gray-500 mb-2">Data tidak ditemukan</p>
                                    <p class="text-gray-500 mb-4">Silahkan cek pada data pelanggar</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination & Action Buttons -->
            <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                <div class="pagination">
                    {{ $siswas->links() }}
                </div>
                <div class="mt-4 sm:mt-0 flex items-center space-x-4">
                    <a href="{{ route('pelanggar.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Data Pelanggar
                    </a>
                   
                </div>
            </div>
        </main>

       
    </div>
</body>
</html>