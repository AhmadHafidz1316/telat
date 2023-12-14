@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('rombel.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="rombel" class="block text-gray-700 text-sm font-bold mb-2">Rombel:</label>
                <input type="text" id="rombel" name="rombel"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan rombel" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
            </div>
        </form>
    </div>
@endsection
