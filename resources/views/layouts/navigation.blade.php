<div id="bottom-nav" class="fixed bottom-4 left-1/2 -translate-x-1/2 w-[90%] max-w-md z-50">
    <div class="bg-white/80 backdrop-blur-xl border border-pink-100 rounded-3xl p-3 shadow-2xl flex justify-around items-center">
        
        {{-- Menu Home / Dashboard --}}
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('dashboard') ? 'bg-pink-400 text-white shadow-lg shadow-pink-200' : 'text-rose-300 group-hover:text-pink-400' }} transition-all">
                <i class="fa-solid fa-home text-xl w-6 h-6 flex items-center justify-center"></i>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase {{ request()->routeIs('dashboard') ? 'text-pink-500' : 'text-rose-300' }}">Beranda</span>
        </a>

        {{-- Menu Kalender --}}
        <a href="{{ route('calendar') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('calendar') ? 'bg-pink-400 text-white' : 'text-rose-300 group-hover:text-pink-400' }} transition-all">
                <i class="fa-solid fa-calendar-days text-xl w-6 h-6 flex items-center justify-center"></i>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase text-rose-300">Kalender</span>
        </a>

        {{-- Menu Diary --}}
    <a href="{{ route('diaries.index') }}" class="flex flex-col items-center group">
        <div class="p-2 rounded-2xl {{ request()->routeIs('diaries.*') ? 'bg-pink-400 text-white' : 'text-rose-300' }}">
            <i class="fa-solid fa-book-open-reader text-xl"></i>
        </div>
        <span class="text-[9px] mt-1 font-bold uppercase {{ request()->routeIs('diaries.*') ? 'text-pink-500' : 'text-rose-300' }}">Diary</span>
    </a>

        {{-- Menu Statistik --}}
        <a href="{{ route('stats') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('stats') ? 'bg-pink-400 text-white' : 'text-rose-300 group-hover:text-pink-400' }} transition-all">
                <i class="fa-solid fa-chart-line text-xl w-6 h-6 flex items-center justify-center"></i>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase text-rose-300">Tren</span>
        </a>

        {{-- Menu Profil --}}
        <a href="{{ route('profile.edit') }}" class="flex flex-col items-center group">
            <div class="p-2 rounded-2xl {{ request()->routeIs('profile.edit') ? 'bg-pink-400 text-white shadow-lg shadow-pink-200' : 'text-rose-300 group-hover:text-pink-400' }} transition-all">
                <i class="fa-solid fa-user text-xl w-6 h-6 flex items-center justify-center"></i>
            </div>
            <span class="text-[9px] mt-1 font-bold uppercase {{ request()->routeIs('profile.edit') ? 'text-pink-500' : 'text-rose-300' }}">Profil</span>
        </a>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="flex flex-col items-center group">
            @csrf
            <button type="submit" class="p-2 rounded-2xl text-rose-200 hover:text-red-400 transition-all">
                <i class="fa-solid fa-power-off text-xl w-6 h-6 flex items-center justify-center"></i>
            </button>
            <span class="text-[9px] mt-1 font-bold uppercase text-rose-200">Keluar</span>
        </form>
    </div>

    {{-- Credit line --}}
    <div class="text-center mt-3">
        <p class="text-[8px] text-rose-300/50 uppercase tracking-[0.2em] font-medium">
            Developed by <span class="text-pink-400/50"><a href="https://portfolio-laravel-shofialafarah.vercel.app" target="_blank" rel="noopener noreferrer">Shofia Nabila Elfa Rahma</a></span> &copy; 2026
        </p>
    </div>
</div>