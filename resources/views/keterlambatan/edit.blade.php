@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('telat.update', $late['student_id']) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <select name="student_id" id="student_id" class="form-control appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $late['student_id'] == $student->id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan:</label>
                <textarea id="information" name="information"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan keterangan" required>{{ $late->information }}</textarea>
            </div>

            <div class="mb-4">
                <label for="bukti" class="block text-gray-700 text-sm font-bold mb-2 ">Bukti:</label>
                <input type="file" name="bukti" id="bukti"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan bukti" onchange="displayFile()">
                <div id="file-preview" class="mt-2">
                    @if ($late->bukti)
                        <img src="{{ asset('storage/' . $late->bukti) }}" alt="Bukti" class="max-w-full h-auto">
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
            </div>
        </form>

        <script>
            function displayFile() {
                const fileInput = document.getElementById('bukti');
                const filePreview = document.getElementById('file-preview');

                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'File Preview';
                        img.className = 'max-w-full h-auto';

                        // Clear previous content
                        filePreview.innerHTML = '';

                        // Append the new content
                        filePreview.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                } else {
                    filePreview.innerHTML = '';
                }
            }
        </script>
    </div>
@endsection
