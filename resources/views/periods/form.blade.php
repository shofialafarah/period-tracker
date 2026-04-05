<div class="bg-white border-2 border-pink-100 rounded-3xl shadow-xl overflow-hidden mb-8">
    <div class="bg-pink-400 p-6 text-center">
        <h1 class="text-2xl font-bold text-white uppercase tracking-wider">
            Halo, Cantik! <i class="fa-solid fa-wand-magic-sparkles ml-1"></i>
        </h1>
        <p class="text-pink-100 text-xs mt-1 font-medium italic">Catat siklusmu hari ini biar nggak lupa~</p>
    </div>

    <form action="{{ route('periods.store') }}" method="POST" class="p-6 space-y-5">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest">
                    <i class="fa-regular fa-calendar mr-1"></i> Mulai
                </label>
                <input type="date" name="start_date" required
                    class="mt-1 block w-full border-pink-100 bg-rose-50 rounded-xl focus:ring-pink-400 focus:border-pink-400 text-rose-900 text-sm">
            </div>
            <div>
                <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest">
                    <i class="fa-regular fa-calendar mr-1"></i> Selesai
                </label>
                <input type="date" name="end_date"
                    class="mt-1 block w-full border-pink-100 bg-rose-50 rounded-xl focus:ring-pink-400 focus:border-pink-400 text-rose-900 text-sm">
            </div>
        </div>

        <div>
            <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest mb-2">Mood Hari Ini</label>
            <div class="flex justify-between bg-rose-50 p-2 rounded-2xl border border-pink-50">
                @foreach (['😊', '😔', '😡', '😴', '😭'] as $emoji)
                    <label class="cursor-pointer hover:scale-125 transition">
                        <input type="radio" name="mood" value="{{ $emoji }}" class="hidden peer">
                        <span class="text-2xl peer-checked:bg-pink-200 p-2 rounded-lg block transition-all">{{ $emoji }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div>
            <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest mb-1">Intensitas Aliran (Flow)</label>
            <div class="flex flex-col gap-2 bg-rose-50 p-4 rounded-2xl border border-pink-50">
                <div id="flow-icons-container" class="flex gap-1 h-6 items-center"></div>
                <div class="flex items-center gap-4">
                    <input type="range" name="flow_intensity" id="flow-slider" min="1" max="5" value="3"
                        class="w-full h-2 bg-pink-200 rounded-lg appearance-none cursor-pointer accent-pink-500">
                    <span id="flow-text" class="text-xs text-pink-600 font-bold min-w-[50px]">Sedang</span>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest mb-2">Gejala Terasa</label>
            <div class="flex flex-wrap gap-2 text-[11px]">
                @foreach (['Kram', 'Pusing', 'Jerawat', 'Lelah', 'Nyeri Payudara'] as $symp)
                    <label class="bg-rose-100 px-3 py-1.5 rounded-full text-rose-700 cursor-pointer hover:bg-rose-200 transition">
                        <input type="checkbox" name="symptoms[]" value="{{ $symp }}" class="hidden peer">
                        <span class="peer-checked:font-black peer-checked:text-pink-600 text-xs">✨ {{ $symp }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit"
            class="w-full bg-pink-400 hover:bg-pink-500 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-200 transition transform active:scale-95 uppercase tracking-widest text-xs">
            Simpan Siklus <i class="fa-solid fa-heart-pulse ml-1"></i>
        </button>
    </form>
</div>