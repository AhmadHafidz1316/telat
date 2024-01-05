@extends('layouts.sideBar')

@section('content')
    <h2 class="text-2xl font-bold text-black mb-4">Daftar Keterlambatan</h2>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <a href="{{ route('excelPs') }}">
            <button type="submit"
                class="text-white focus:outline-none focus:bg-teal-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-teal-500 hover:bg-teal-600 :focus:ring-teal-600">
                Export Data
            </button>
        </a>

        <div x-data="{ openTab: 1 }" class="p-8">
            <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md w-96 h-14">
                <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                    Keseluruhan Data
                </button>
                <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                    class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                    Rekapitulasi Data
                </button>
            </div>

            {{-- Keseluruhan data --}}
            <div class="flex flex-col transition-all duration-300" x-show="openTab === 1">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th class="py-2 px-4 border-b">No</th>
                                        <th class="py-2 px-4 border-b">Nama</th>
                                        <th class="py-2 px-4 border-b">Tanggal</th>
                                        <th class="py-2 px-4 border-b">Informasi</th>
                                    </tr>
                                </thead>

                                <tbody class="text-gray-800">
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($late as $item)
                                        <tr class="border-b dark:border-neutral-500">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium text-center">
                                                {{ $no++ }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-center">{{ $item->student->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-center">
                                                {{ $item['date_time_late'] }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-center">{{ $item['information'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            <div class="mt-4">
                                {{ $late->onEachSide(1)->withQueryString()->links('pagination::simple-default', ['currentPage' => 6]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Pagination Links -->


            {{-- Rekapitulasi Data --}}
            <div class="flex flex-col transition-all duration-300" x-show="openTab === 2">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                                <thead class="bg-gray-100 text-gray-700">
                                    <tr>
                                        <th class="py-2 px-4 border-b">No</th>
                                        <th class="py-2 px-4 border-b">Nis</th>
                                        <th class="py-2 px-4 border-b">Nama</th>
                                        <th class="py-2 px-4 border-b">Keterlambatan</th>
                                        <th class="py-2 px-4 border-b">Bukti</th>
                                        <th class="py-2 px-4 border-b"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $no = 1 @endphp
                                    @php $processedStudentIds = [] @endphp
                                    @foreach ($late as $item)
                                        @if (!in_array($item->student->id, $processedStudentIds))
                                            <tr>
                                                <td class="whitespace-nowrap px-6 py-4 text-center text-black">
                                                    {{ $no++ }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-center text-black">
                                                    {{ $item->student->nis }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-center text-black">
                                                    {{ $item->student->name }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-center text-black">
                                                    {{ $item->student->late->count() }}</td>

                                                <td class="whitespace-nowrap px-6 py-4 text-center">
                                                    <a href="{{ route('show', $item['id']) }}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                                        Bukti</a>
                                                </td>
                                                @if ($item->student->late->count() >= 3)
                                                    <td>
                                                        <a href="{{ route('telat.download', $item['id']) }}">
                                                            <button type="submit"
                                                                class="ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                Cetak Surat Pernyataan
                                                            </button>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
                                                </td>
                                            </tr>
                                            @php $processedStudentIds[] = $item->student->id @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
@endsection
