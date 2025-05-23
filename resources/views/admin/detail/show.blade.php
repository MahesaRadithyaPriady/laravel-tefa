<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Detail Pelanggaran</title>
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
                        <h2 class="text-3xl font-bold text-indigo-800 mb-2">Data Pelanggar</h2>
                        <p class="text-gray-600">Detail data siswa pelanggar dan catatan pelanggaran</p>
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

            <!-- Student Detail Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row">
                        <div class="flex flex-col items-center mb-6 sm:mb-0 sm:mr-8">
                            <img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" class="w-32 h-32 object-cover rounded-lg shadow" alt="{{ $pelanggar->name }}">
                            <div class="mt-6 w-full">
                                <div class="bg-indigo-50 rounded-lg p-4 text-center">
                                    <p class="text-gray-700 text-sm font-medium mb-1">Total Poin Pelanggaran</p>
                                    <h3 class="text-3xl font-bold text-indigo-800">{{ $pelanggar->poin_pelanggar }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="bg-indigo-50 p-4 rounded-lg mb-4">
                                <h3 class="text-lg font-semibold text-indigo-800 mb-3 border-b border-indigo-100 pb-2">Akun Pelanggar</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-3">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">Nama</span>
                                            <span class="text-gray-800 font-medium">{{ $pelanggar->name }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">NIS</span>
                                            <span class="text-gray-800 font-medium">{{ $pelanggar->nis }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">Email</span>
                                            <span class="text-gray-800 font-medium">{{ $pelanggar->email }}</span>
                                        </div>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">Kelas</span>
                                            <span class="text-gray-800 font-medium">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">No HP</span>
                                            <span class="text-gray-800 font-medium">{{ $pelanggar->hp }}</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-medium text-gray-500">Status</span>
                                            <span>
                                                @if ($pelanggar->status == 0)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        Belum Ditindak
                                                    </span>
                                                @elseif ($pelanggar->status == 1)
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        Perlu Ditindak
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                        Sudah Ditindak
                                                    </span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pelanggaran Section -->
            <div class="mb-6">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-indigo-800 mb-2">Pelanggaran Yang Dilakukan</h2>
                        <p class="text-gray-600">Daftar pelanggaran yang telah dilakukan oleh siswa</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        @if ($pelanggar->status == 0 || $pelanggar->status == 1)
                            <button onclick="myFunction()" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-medium text-gray-700 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Pelanggaran
                            </button>
                            <script>
                                function myFunction() {
                                    alert("Poin Pelanggar Sudah Mencapai {{ $pelanggar->poin_pelanggar }} Poin, Pelanggar Perlu Ditindak!");
                                }
                            </script>
                        @else
                            <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Pelanggaran
                            </a>
                        @endif
                    </div>
                </div>
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
                            <th scope="col" class="px-4 py-3">PK</th>
                            <th scope="col" class="px-4 py-3">Tanggal</th>
                            <th scope="col" class="px-4 py-3">Jenis</th>
                            <th scope="col" class="px-4 py-3">Konsekuensi</th>
                            <th scope="col" class="px-4 py-3">Poin</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $detail)
                        <tr class="bg-white border-b hover:bg-indigo-50">
                            <td class="px-4 py-4 font-medium text-gray-900">{{ $detail->name }}</td>
                            <td class="px-4 py-4">{{ $detail->created_at }}</td>
                            <td class="px-4 py-4">{{ $detail->jenis }}</td>
                            <td class="px-4 py-4">{{ $detail->konsekuensi }}</td>
                            <td class="px-4 py-4">
                                <span class="px-2.5 py-0.5 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">
                                    {{ $detail->poin }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                @if ($detail->status == 0)
                                    <form onsubmit="return confirm('Apakah {{ $pelanggar->name }} Sudah Diberikan Sanksi ?');" action="{{ route('detailPelanggar.update', $detail->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-yellow-500 border border-transparent rounded text-xs font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition">
                                            Beri Sanksi
                                        </button>
                                    </form>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Sudah Diberikan Sanksi
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-4">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('detailPelanggar.destroy', $detail->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                                    <input type="hidden" name="PoinPelanggaran" value="{{ $detail->poin }}">
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded text-xs font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Hapus
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
                                    <p class="text-gray-500 mb-4">Silahkan Tambah Pelanggaran</p>
                                    <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Tambah Pelanggaran
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
                {{ $details->links() }}
            </div>
        </main>

        
    </div>
</body>
</html>