<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-School Arch - Mendidik Generasi Unggul</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-slate-800">

    <header x-data="{ mobileMenuOpen: false, scrolled: false }" 
            @scroll.window="scrolled = (window.pageYOffset > 20)"
            :class="scrolled ? 'bg-white shadow-md py-2' : 'bg-white/95 backdrop-blur-md py-4'"
            class="fixed w-full z-50 top-0 transition-all duration-300 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                
                <div class="flex items-center gap-3">
                    <div class="bg-blue-800 text-white p-2 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-blue-900 leading-tight">E-School Arch</h1>
                        <p class="text-xs text-gray-500 font-medium tracking-wide">EXCELLENCE IN EDUCATION</p>
                    </div>
                </div>

                <nav class="hidden md:flex items-center space-x-6">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-blue-800 transition">Beranda</a>
                    
                    <div class="relative group" x-data="{ open: false }">
                        <button @click="open = !open" @click.outside="open = false" class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-800 transition">
                            Profil <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" x-transition class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                            <a href="#sejarah" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Sejarah</a>
                            <a href="#visi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Visi & Misi</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Staf Pengajar</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-800 transition">
                            Akademik <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                            <a href="#jurusan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Program Studi</a>
                            <a href="#kalender" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Kalender Akademik</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">E-Library</a>
                        </div>
                    </div>

                    <a href="#fasilitas" class="text-sm font-medium text-gray-700 hover:text-blue-800 transition">Fasilitas</a>
                    
                    <button class="text-gray-500 hover:text-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </nav>

                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <a href="/admin" class="px-5 py-2.5 bg-blue-800 text-white text-sm font-semibold rounded-full hover:bg-blue-900 transition shadow-lg shadow-blue-800/30">Dashboard</a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.outside="open = false" class="px-5 py-2.5 bg-yellow-500 text-white text-sm font-semibold rounded-full hover:bg-yellow-600 transition shadow-lg shadow-yellow-500/30 flex items-center">
                                Login Portal <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 ring-1 ring-black ring-opacity-5 z-50">
                                <div class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pilih Akses</div>
                                <a href="/student/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700"> Portal Siswa</a>
                                <a href="/teacher/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700"> Portal Guru</a>
                                <div class="border-t my-1"></div>
                                <a href="/admin/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700"> Administrator</a>
                            </div>
                        </div>
                    @endauth
                </div>

                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="mobileMenuOpen" class="md:hidden bg-white border-t border-gray-100 shadow-xl">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-800 hover:bg-blue-50">Beranda</a>
                <a href="#profil" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-800 hover:bg-blue-50">Profil</a>
                <a href="#jurusan" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-800 hover:bg-blue-50">Akademik</a>
                <a href="/student/login" class="block px-3 py-2 mt-4 text-center rounded-md text-base font-medium bg-blue-50 text-blue-700 border border-blue-100">Login Siswa</a>
                <a href="/teacher/login" class="block px-3 py-2 text-center rounded-md text-base font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">Login Guru</a>
            </div>
        </div>
    </header>

    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-blue-900">
        <div class="absolute inset-0 z-0">
            <img class="w-full h-full object-cover opacity-20" src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Kampus Background">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-blue-900/90 to-blue-800/70"></div>
            <div class="absolute inset-0 hero-pattern"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center lg:text-left flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2">
                <div class="inline-flex items-center px-3 py-1 rounded-full border border-blue-400 bg-blue-800/50 text-blue-100 text-xs font-medium mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-green-400 mr-2"></span>
                    Penerimaan Siswa Baru Tahun 2026 Dibuka
                </div>
                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl mb-6">
                    Mendidik Generasi <br>
                    <span class="text-yellow-400">Unggul & Berkarakter</span>
                </h1>
                <p class="mt-4 max-w-lg mx-auto lg:mx-0 text-lg text-blue-100 leading-relaxed">
                    Bergabunglah dengan E-School Arch. Kami mengintegrasikan teknologi terkini dengan nilai-nilai moral untuk mencetak pemimpin masa depan.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="#" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-semibold rounded-lg text-blue-900 bg-white hover:bg-gray-50 transition md:text-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transform duration-200">
                        Virtual Tour
                    </a>
                    <a href="#" class="flex items-center justify-center px-8 py-3 border border-white text-base font-semibold rounded-lg text-white hover:bg-white/10 transition md:text-lg">
                        Info PPDB
                    </a>
                </div>
                
                <div class="mt-10 grid grid-cols-3 gap-4 border-t border-blue-700 pt-8 text-blue-200">
                    <div>
                        <span class="block text-2xl font-bold text-white">A</span>
                        <span class="text-sm">Terakreditasi</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-white">1998</span>
                        <span class="text-sm">Didirikan</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-white">50+</span>
                        <span class="text-sm">Ekstrakurikuler</span>
                    </div>
                </div>
            </div>
            
            <div class="lg:w-1/2 mt-12 lg:mt-0 lg:pl-10 hidden lg:block">
                <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white/20 transform rotate-2 hover:rotate-0 transition duration-500">
                    <img class="w-full object-cover" src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Students">
                </div>
            </div>
        </div>
    </section>

    <div class="bg-yellow-50 border-b border-yellow-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 py-3 flex items-center">
            <span class="bg-yellow-500 text-white text-xs font-bold px-2 py-1 rounded mr-3 uppercase shrink-0">Info Terbaru</span>
            <div class="overflow-hidden relative w-full h-6">
                <div class="animate-marquee whitespace-nowrap absolute top-0 text-sm font-medium text-yellow-800 flex items-center gap-8">
                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Jadwal Ujian Akhir Semester Genap dimulai tanggal 15 Juni 2026.</span>
                    <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg> Selamat kepada Tim Robotik yang meraih Juara 1 Nasional!</span>
                </div>
            </div>
        </div>
    </div>

    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-yellow-100 rounded-full z-0"></div>
                    <img class="relative rounded-2xl shadow-xl z-10 w-full" src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Gedung Sekolah">
                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-xl shadow-lg z-20 hidden md:block border-l-4 border-blue-800">
                        <p class="text-sm text-gray-500">Total Siswa</p>
                        <p class="text-3xl font-bold text-blue-900">1,250+</p>
                    </div>
                </div>
                <div class="mt-12 lg:mt-0">
                    <h2 class="text-blue-600 font-semibold tracking-wide uppercase text-sm">Tentang Kami</h2>
                    <h3 class="mt-2 text-3xl font-bold text-gray-900 sm:text-4xl">Tempat Belajar yang Nyaman & Inspiratif</h3>
                    <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                        E-School Arch berdiri sejak 1998 dengan komitmen mencerdaskan kehidupan bangsa. Kami memiliki lingkungan belajar yang asri, kondusif, dan didukung teknologi modern berbasis Cloud & Open Source.
                    </p>
                    
                    <div class="mt-8 space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Akreditasi A Unggul</h4>
                                <p class="text-gray-500 text-sm">Diakui secara nasional dengan standar pendidikan tertinggi.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-gray-900">Kurikulum Berbasis STEAM</h4>
                                <p class="text-gray-500 text-sm">Science, Technology, Engineering, Arts, Mathematics.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="jurusan" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Program Pendidikan Kami</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Pilih jalur pendidikan yang sesuai dengan minat dan bakat siswa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 transform hover:-translate-y-2 group">
                    <div class="h-48 bg-blue-600 relative overflow-hidden">
                        <img class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="RPL">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Rekayasa Perangkat Lunak</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm mb-4">Fokus pada pengembangan web, aplikasi mobile, dan cloud computing menggunakan teknologi terbaru.</p>
                        <a href="#" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800">
                            Detail Jurusan <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 transform hover:-translate-y-2 group">
                    <div class="h-48 bg-green-600 relative overflow-hidden">
                        <img class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="TKJ">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Teknik Komputer Jaringan</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm mb-4">Mempelajari infrastruktur jaringan, server administration, dan cybersecurity.</p>
                        <a href="#" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800">
                            Detail Jurusan <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 transform hover:-translate-y-2 group">
                    <div class="h-48 bg-purple-600 relative overflow-hidden">
                        <img class="w-full h-full object-cover opacity-80 group-hover:scale-110 transition duration-500" src="https://images.unsplash.com/photo-1626785774573-4b799312c535?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Multimedia">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Desain Komunikasi Visual</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 text-sm mb-4">Mengembangkan kreativitas digital, fotografi, videografi, dan desain grafis.</p>
                        <a href="#" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800">
                            Detail Jurusan <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fasilitas" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Fasilitas Penunjang</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4 rounded"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Lab Komputer Modern</h3>
                    <p class="text-sm text-gray-500 mt-2">Spesifikasi tinggi untuk praktik coding & desain.</p>
                </div>
                
                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center text-green-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Perpustakaan Digital</h3>
                    <p class="text-sm text-gray-500 mt-2">Akses ribuan e-book dan jurnal online.</p>
                </div>

                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Lab Sains</h3>
                    <p class="text-sm text-gray-500 mt-2">Peralatan lengkap untuk eksperimen Fisika & Kimia.</p>
                </div>

                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center text-red-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Lapangan Olahraga</h3>
                    <p class="text-sm text-gray-500 mt-2">Lapangan Futsal, Basket, dan Voli indoor.</p>
                </div>
                
                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Free Wi-Fi Area</h3>
                    <p class="text-sm text-gray-500 mt-2">Koneksi internet cepat di seluruh area kampus.</p>
                </div>
                
                <div class="p-6 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                    <div class="w-16 h-16 mx-auto bg-teal-100 rounded-full flex items-center justify-center text-teal-600 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">Kantin Sehat</h3>
                    <p class="text-sm text-gray-500 mt-2">Makanan higienis dan bergizi terjamin.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50" id="kalender">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/3">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Agenda Terdekat
                    </h2>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="divide-y divide-gray-100">
                            <div class="p-4 flex gap-4 hover:bg-gray-50 transition">
                                <div class="flex-shrink-0 w-14 h-14 bg-blue-100 text-blue-600 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-xs font-bold uppercase">Feb</span>
                                    <span class="text-xl font-bold">14</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Ujian Tengah Semester</h4>
                                    <p class="text-xs text-gray-500 mt-1">08:00 - 14:00 WITA</p>
                                </div>
                            </div>
                            <div class="p-4 flex gap-4 hover:bg-gray-50 transition">
                                <div class="flex-shrink-0 w-14 h-14 bg-red-100 text-red-600 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-xs font-bold uppercase">Feb</span>
                                    <span class="text-xl font-bold">20</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Pentas Seni Tahunan</h4>
                                    <p class="text-xs text-gray-500 mt-1">Aula Utama</p>
                                </div>
                            </div>
                            <div class="p-4 flex gap-4 hover:bg-gray-50 transition">
                                <div class="flex-shrink-0 w-14 h-14 bg-green-100 text-green-600 rounded-lg flex flex-col items-center justify-center">
                                    <span class="text-xs font-bold uppercase">Mar</span>
                                    <span class="text-xl font-bold">01</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Penerimaan Siswa Baru</h4>
                                    <p class="text-xs text-gray-500 mt-1">Gelombang 1</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 text-center border-t border-gray-100">
                            <button class="text-sm font-medium text-blue-600 hover:text-blue-800">Unduh Kalender Lengkap</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="lg:w-2/3">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        Prestasi Terbaru
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex">
                            <div class="w-1/3 bg-gray-200">
                                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1567168544813-cc03465b4fa8?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=60" alt="Juara">
                            </div>
                            <div class="w-2/3 p-4">
                                <span class="text-xs font-bold text-yellow-600 bg-yellow-100 px-2 py-1 rounded">Nasional</span>
                                <h3 class="font-bold text-gray-900 mt-2">Juara 1 LKS Web Tech</h3>
                                <p class="text-xs text-gray-500 mt-1">Januari 2026 - Jakarta</p>
                                <p class="text-sm text-gray-600 mt-2">Ananda Rizky berhasil memenangkan...</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex">
                            <div class="w-1/3 bg-gray-200">
                                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=60" alt="Juara">
                            </div>
                            <div class="w-2/3 p-4">
                                <span class="text-xs font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded">Provinsi</span>
                                <h3 class="font-bold text-gray-900 mt-2">Gold Medal Debat Bahasa</h3>
                                <p class="text-xs text-gray-500 mt-1">Desember 2025 - Banjarmasin</p>
                                <p class="text-sm text-gray-600 mt-2">Tim debat sekolah kembali menorehkan...</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <section class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="h-80 bg-gray-200 rounded-xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.3333!2d114.8333!3d-3.4500!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM8KwMjcnMDAuMCJTIDExNMKwNTAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1600000000000!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="ml-3 text-base text-gray-500">
                                <p class="font-medium text-gray-900">Alamat Kampus:</p>
                                <p>Jl. Jend. A. Yani Km 33, Banjarbaru, Kalimantan Selatan</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="ml-3 text-base text-gray-500">
                                <p class="font-medium text-gray-900">Telepon:</p>
                                <p>(0511) 477-XXXX</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-3 text-base text-gray-500">
                                <p class="font-medium text-gray-900">Email:</p>
                                <p>info@eschool-arch.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">E-School Arch</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">
                        Membangun karakter, menguasai teknologi, dan meraih prestasi global. Sekolah modern berbasis digital di Kalimantan Selatan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Facebook</span>FB</a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">Instagram</span>IG</a>
                        <a href="#" class="text-gray-400 hover:text-white"><span class="sr-only">YouTube</span>YT</a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-blue-400 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Info Pendaftaran</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">E-Raport</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Perpustakaan Digital</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Karir</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Program Keahlian</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-blue-400 transition">Rekayasa Perangkat Lunak</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Teknik Komputer Jaringan</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Multimedia/DKV</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Sistem Informasi</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Newsletter</h3>
                    <p class="text-gray-400 text-sm mb-4">Dapatkan berita terbaru sekolah kami.</p>
                    <form class="flex flex-col gap-2">
                        <input type="email" placeholder="Alamat Email" class="px-4 py-2 bg-gray-800 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500 border border-gray-700">
                        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-sm font-medium transition">Berlangganan</button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm text-center md:text-left">&copy; 2026 E-School Arch. All rights reserved.</p>
                <p class="text-gray-600 text-sm mt-2 md:mt-0">Developed by <span class="text-gray-500">Norizna</span></p>
            </div>
        </div>
    </footer>

</body>
</html>