<!-- component -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/dist/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <style>
        body {
            background-color: #1a202c;
            /* Warna latar belakang body */
        }

        nav {
            background-color: #2d3748;
            /* Warna latar belakang navbar */
            margin-bottom: 20px;
            /* Tambahkan margin di bagian bawah navbar */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }

        .navbar-right span {
            margin-right: 10px;
            color: #cbd5e0;
            cursor: pointer;
        }

        .navbar-right .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2d3748;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
        }

        .navbar-right .dropdown-content a {
            color: #cbd5e0;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .navbar-right .dropdown-content a:hover {
            background-color: #4299e1;
        }

        .navbar-right:hover .dropdown-content {
            display: block;
        }

        .sidebar {
            background-color: #2d3748;
            /* Warna latar belakang sidebar */
            border-right: 1px solid #4a5568;
            /* Warna border sidebar */
        }

        .sidebar h1 {
            color: #cbd5e0;
            /* Warna teks judul sidebar */
        }

        .sidebar i {
            color: #4299e1;
            /* Warna ikon sidebar */
        }

        .sidebar input {
            color: #cbd5e0;
            /* Warna teks input di sidebar */
        }

        .sidebar .bg-gray-600 {
            background-color: #4a5568;
            /* Warna latar belakang item di sidebar */
        }

        .sidebar .bg-blue-600 {
            background-color: #4299e1;
            /* Warna latar belakang item hover di sidebar */
        }

        .main-content {
            color: #cbd5e0;
            /* Warna teks konten utama */
        }
    </style>
</head>

<body class="bg-white">
    <nav class="bg-gray-800 p-4 text-white">
        <span class="text-white text-4xl cursor-pointer">
            <i class="bi bi-filter-left"></i>
        </span>
        <div class="navbar-right">
            <span class="text-white font-bold">{{ Auth::user()->name }}</span>
            <!-- Tambahkan ikon dropdown -->
            <div class="dropdown-content">
                <!-- Gaya untuk tautan logout -->
                <a href="{{ route('logout') }}"
                    class="text-white hover:bg-gray-600 px-4 py-2 block transition duration-300">
                    Logout
                </a>
            </div>
        </div>

    </nav>
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <h1 class="font-bold text-gray-200 text-[28px] ml-3">Rekam Keterlambatan</h1>
                <i class="bi bi-x cursor-pointer ml-28 lg:hidden"></i>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-house-door-fill"></i>
                    <a href="{{ route('admin.index') }}"><span
                            class="text-[15px] ml-4 text-gray-200 font-bold">Home</span></a>
                </div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
                    onclick="dropdown()">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Data Master</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>
                </div>

                <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
                    <a href="{{ route('rombel.index') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                            Data Rombel
                        </h1>
                    </a>
                    <a href="{{ route('rayon.index') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                            Data Rayon
                        </h1>
                    </a>
                    <a href="{{ route('siswa.index') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                            Data Siswa
                        </h1>
                    </a>
                    <a href="{{ route('user.data') }}">
                        <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                            Data User
                        </h1>
                    </a>
                </div>
                <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-box-arrow-in-right"></i>
                <a href="{{ route('telat.index') }}"><span class="text-[15px] ml-4 text-gray-200 font-bold">Data
                        Keterlambatan</span></a>
            </div>
            @else
                <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-house-door-fill"></i>
                    <a href="{{ route('ps.index') }}"><span
                            class="text-[15px] ml-4 text-gray-200 font-bold">Home</span></a>
                </div>
                <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-chat-left-text-fill"></i>
                    <a href="{{ route('ps.siswa') }}"><span class="text-[15px] ml-4 text-gray-200 font-bold">Data
                            Siswa</span></a>
                </div>
                <div
                class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <i class="bi bi-box-arrow-in-right"></i>
                <a href="{{ route('ps.telat') }}"><span class="text-[15px] ml-4 text-gray-200 font-bold">Data
                        Keterlambatan</span></a>
            </div>
            @endif  
    </div>

    <div class="main-content ml-[300px] p-10">
        @yield('content')
    </div>
    @endif

    <script type="text/javascript">
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropdown();

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }
    </script>
    @stack('script')
</body>

</html>
