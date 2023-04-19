@extends('index')
@section('title','Dashboard - ActPlan')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Selamat Datang {{auth()->user()->namapegawai}}
    </h2>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Rencana Kegiatan
                </p>
                <p>
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-sm font-semibold">
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu: 8
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima: 10
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak: 5
                            </span>
                        </td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 border-2">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Total Rencana Belanja Barang
                </p>
                <p>
                <table class="w-full whitespace-no-wrap">
                    <tr class="text-sm font-semibold">
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu: 8
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima: 10
                            </span>
                        </td>
                        <td class="px-4">
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak: 5
                            </span>
                        </td>
                    </tr>
                </table>
                </p>
            </div>
        </div>
    </div>
    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs pb-16">
        <div class="w-full overflow-x-auto border-2">
            <h3 class="my-6 text-center text-xl font-semibold text-gray-700 dark:text-gray-200">
                Tabel Rencana Kegiatan
            </h3>
            <table class="w-full whitespace-no-wrap text-center">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">NO</th>
                        <th class="px-4 py-3">Nama Kegiatan</th>
                        <th class="px-4 py-3">Diajukan oleh</th>
                        <th class="px-4 py-3">Tanggal Pengajuan</th>
                        <th class="px-4 py-3">Status Validasi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($kegiatan as $index=>$keg)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">{{ $index + $kegiatan->firstItem() }}</td>
                        <td class="px-4 py-3">{{$keg->namakegiatan}}</td>
                        <td class="px-4 py-3">Pak Agus Suratna</td>
                        <td class="px-4 py-3">{{$keg->created_at}}</td>
                        <td class="px-4 py-3">
                            @if($keg->status=='menunggu')
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu
                            </span>
                            @elseif($keg->status=='diterima')
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima
                            </span>
                            @else
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <button href="/detail-rencana-kegiatan/{{$keg->idkegiatan}}"><u>Detail</u></button> <br>
                            <a target="_blank" href="/cetak-kegiatan/{{$keg->idkegiatan}}"><u>Cetak</u></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs pb-16">
        <div class="w-full overflow-x-auto border-2">
    <h3 class="my-6 text-center text-xl font-semibold text-gray-700 dark:text-gray-200">
        Tabel Rencana Belanja Barang
    </h3>
            <table class="w-full whitespace-no-wrap text-center">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">NO</th>
                        <th class="px-4 py-3">Nama Kegiatan</th>
                        <th class="px-4 py-3">Diajukan oleh</th>
                        <th class="px-4 py-3">Tanggal Pengajuan</th>
                        <th class="px-4 py-3">Status Validasi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($belanja as $index=>$bel)
                    <tr class="text-gray-700 dark:text-gray-400 text-sm">
                        <td class="px-4 py-3">{{ $index + $belanja->firstItem() }}</td>
                        <td class="px-4 py-3">{{$bel->namakegiatanbb}}</td>
                        <td class="px-4 py-3">Pak Agus Suratna</td>
                        <td class="px-4 py-3">{{$bel->created_at}}</td>
                        <td class="px-4 py-3">
                            @if($bel->status=='menunggu')
                            <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:bg-orange-500 dark:text-orange-100">
                                Menunggu
                            </span>
                            @elseif($bel->status=='diterima')
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Diterima
                            </span>
                            @else
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                Ditolak
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <button href="/detail-rencana-kegiatan/{{$keg->idkegiatan}}"><u>Detail</u></button> <br>
                            <a target="_blank" href="/cetak-kegiatan/{{$keg->idkegiatan}}"><u>Cetak</u></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
             
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                            <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                1
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                2
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                3
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                4
                            </button>
                        </li>
                        <li>
                            <span class="px-3 py-1">...</span>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                8
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                9
                            </button>
                        </li>
                        <li>
                            <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                        </li>
                    </ul>
                </nav>
            </span>
        </div> -->
    </div>
</div>
@endsection