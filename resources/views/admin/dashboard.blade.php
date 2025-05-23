@extends('mainLayouts')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="bg-indigo-700 text-white rounded-lg shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold text-center">SELAMAT DATANG DI E-POINT SISWA</h1>
            <h1 class="text-2xl font-semibold text-center mt-2">SMKN 4 TASIKMALAYA</h1>
            
            <!-- Success Message -->
            <div class="mt-4 text-center">
                @if (Session::get('success'))
                    <p class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-md inline-block">{{ Session::get('success') }}</p>
                @else
                    <p class="bg-indigo-100 text-indigo-800 px-4 py-2 rounded-md inline-block">You are logged in!</p>
                @endif
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
                <h3 class="text-xl font-semibold text-gray-800">Jumlah Siswa</h3>
                <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $jmlSiswas }}</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
                <h3 class="text-xl font-semibold text-gray-800">Jumlah Pelanggaran</h3>
                <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $jmlPelanggars }}</p>
            </div>
        </div>

        <!-- Top 10 Students Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h1 class="text-2xl font-bold text-indigo-800 mb-4">Top 10 Siswa Dengan Poin Tertinggi</h1>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <th class="py-3 px-4 text-left">Foto</th>
                            <th class="py-3 px-4 text-left">NIS</th>
                            <th class="py-3 px-4 text-left">Nama</th>
                            <th class="py-3 px-4 text-left">Kelas</th>
                            <th class="py-3 px-4 text-left">No HP</th>
                            <th class="py-3 px-4 text-left">Poin</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggars as $pelanggar)
                            <tr class="border-b hover:bg-indigo-50">
                                <td class="py-3 px-4">
                                    <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto" class="w-20 h-20 object-cover rounded-md">
                                </td>
                                <td class="py-3 px-4 font-medium">{{ $pelanggar->nis }}</td>
                                <td class="py-3 px-4 font-medium">{{ $pelanggar->name }}</td>
                                <td class="py-3 px-4">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                                <td class="py-3 px-4">{{ $pelanggar->hp }}</td>
                                <td class="py-3 px-4 font-bold text-indigo-700">{{ $pelanggar->poin_pelanggar }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                                        @if($pelanggar->status == 'Peringatan') bg-yellow-100 text-yellow-800
                                        @elseif($pelanggar->status == 'Bahaya') bg-red-100 text-red-800
                                        @else bg-green-100 text-green-800
                                        @endif">
                                        {{ $pelanggar->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-1 px-3 rounded-md text-sm">
                                        Show More
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-6 text-center text-gray-500">Belum Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top 10 Violations Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-indigo-800 mb-4">Top 10 Pelanggaran Yang Sering Di Lakukan</h1>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <th class="py-3 px-4 text-left">Nama Pelanggaran</th>
                            <th class="py-3 px-4 text-left">Konsekuensi</th>
                            <th class="py-3 px-4 text-left">Poin</th>
                            <th class="py-3 px-4 text-left">Total Pelanggaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hitung as $hit)
                            <tr class="border-b hover:bg-indigo-50">
                                <td class="py-3 px-4 font-medium">{{ $hit->jenis }}</td>
                                <td class="py-3 px-4">{{ $hit->konsekuensi }}</td>
                                <td class="py-3 px-4 font-bold text-indigo-700">{{ $hit->poin }}</td>
                                <td class="py-3 px-4 font-bold">{{ $hit->totals }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">Data Tidak Di Temukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection