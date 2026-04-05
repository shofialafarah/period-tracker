<x-app-layout>
    <div class="py-12 bg-rose-50 min-h-screen font-sans">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl text-center text-sm shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($prediction)
                <div class="mb-6 bg-gradient-to-r from-pink-400 to-rose-400 p-6 rounded-3xl shadow-lg text-white text-center transform hover:scale-105 transition">
                    <p class="text-xs uppercase font-bold opacity-80">Estimasi Datang Bulan Berikutnya</p>
                    <h2 class="text-3xl font-black mt-1">{{ $prediction->format('d M Y') }}</h2>
                    <p class="text-sm mt-2 font-medium italic">
                        Jangan lupa sedia pembalut ya! 🌸
                    </p>
                </div>
            @endif

            <div class="bg-white border-2 border-pink-100 rounded-3xl shadow-xl overflow-hidden mb-8">
                <div class="bg-pink-400 p-6 text-center">
                    <h1 class="text-2xl font-bold text-white uppercase tracking-wider">Halo, Cantik! 🌸</h1>
                    <p class="text-pink-100 text-xs mt-1 font-medium italic">Catat siklusmu hari ini biar nggak lupa~</p>
                </div>

                <form action="{{ route('periods.store') }}" method="POST" class="p-6 space-y-5">
                    @csrf
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest">Mulai</label>
                            <input type="date" name="start_date" required
                                class="mt-1 block w-full border-pink-100 bg-rose-50 rounded-xl focus:ring-pink-400 focus:border-pink-400 text-rose-900 text-sm">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest">Selesai</label>
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
                        <label class="block text-[10px] font-bold text-rose-400 uppercase tracking-widest mb-2">Gejala Terasa</label>
                        <div class="flex flex-wrap gap-2 text-[11px]">
                            @foreach(['Kram', 'Pusing', 'Jerawat', 'Lelah', 'Nyeri Payudara'] as $symp)
                                <label class="bg-rose-100 px-3 py-1.5 rounded-full text-rose-700 cursor-pointer hover:bg-rose-200 transition">
                                    <input type="checkbox" name="symptoms[]" value="{{ $symp }}" class="hidden peer">
                                    <span class="peer-checked:font-black peer-checked:text-pink-600">✨ {{ $symp }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-pink-400 hover:bg-pink-500 text-white font-black py-4 rounded-2xl shadow-lg shadow-pink-200 transition transform active:scale-95 uppercase tracking-widest text-xs">
                        Simpan Siklus ✨
                    </button>
                </form>
            </div>

            <div class="space-y-4 pb-12">
                <h3 class="text-rose-600 font-black text-sm uppercase tracking-widest px-2 flex items-center">
                    <span class="mr-2">📖</span> Riwayat Siklus
                </h3>

                @forelse ($periods as $period)
                    <div class="bg-white border-2 border-pink-50 rounded-2xl p-4 shadow-sm flex justify-between items-center hover:border-pink-200 transition">
                        <div>
                            <p class="text-[10px] text-rose-300 font-bold uppercase tracking-tighter">Tanggal Mulai</p>
                            <p class="text-rose-900 font-bold text-sm">
                                {{ \Carbon\Carbon::parse($period->start_date)->translatedFormat('d M Y') }}
                            </p>
                        </div>

                        <div class="text-center">
                            <span class="text-2xl bg-rose-50 w-12 h-12 flex items-center justify-center rounded-full">{{ $period->mood ?? '😶' }}</span>
                        </div>

                        <div class="text-right max-w-[40%]">
                            <p class="text-[10px] text-rose-300 font-bold uppercase tracking-tighter">Gejala</p>
                            <div class="flex flex-wrap gap-1 justify-end mt-1">
                                @if ($period->symptoms)
                                    @foreach ($period->symptoms as $symptom)
                                        <span class="bg-rose-50 text-[9px] px-2 py-0.5 rounded-md text-rose-600 border border-pink-100 font-medium">
                                            {{ $symptom }}
                                        </span>
                                    @endforeach
                                @else
                                    <span class="text-[9px] text-gray-400 italic">Tidak ada catatan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-rose-300 text-sm italic italic">Belum ada riwayat tercatat. Yuk mulai isi! ✨</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>