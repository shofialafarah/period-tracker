<x-app-layout>
    <div class="py-12 bg-rose-50 min-h-screen font-sans pb-32">
        <div class="max-w-md mx-auto px-4">
            <h2 class="text-2xl font-black text-rose-600 mb-6 flex items-center">
                <i class="fa-solid fa-pen-nib mr-2"></i> Diary Cantik
            </h2>

            {{-- Form Input Diary --}}
            <div class="bg-white p-6 rounded-[2.5rem] shadow-xl border-2 border-pink-100 mb-8">
                <form action="{{ route('diaries.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="date" name="date" value="{{ date('Y-m-d') }}"
                        class="w-full border-none bg-rose-50 rounded-2xl text-rose-900 font-bold focus:ring-pink-400">

                    <textarea name="body" placeholder="Apa yang kamu rasakan hari ini?" rows="4"
                        class="w-full border-none bg-rose-50 rounded-2xl p-4 text-sm text-rose-800 placeholder-rose-300 focus:ring-pink-400"
                        required></textarea>

                    <button type="submit"
                        class="w-full bg-pink-400 hover:bg-pink-500 text-white font-black py-3 rounded-2xl shadow-lg transition transform active:scale-95 uppercase tracking-widest text-xs">
                        Simpan Cerita <i class="fa-solid fa-heart ml-1"></i>
                    </button>
                </form>
            </div>

            {{-- Daftar Catatan --}}
            <div class="grid gap-6">
                @foreach ($diaries as $diary)
                    <div
                        class="bg-white p-6 rounded-[2rem] shadow-sm border-b-4 border-r-4 border-pink-100 relative group hover:rotate-1 transition-transform">
                        <div
                            class="absolute -top-2 -right-2 bg-rose-400 text-white text-[10px] px-3 py-1 rounded-full shadow-sm font-bold rotate-12 group-hover:rotate-0 transition-all">
                            <i class="fa-solid fa-wand-magic-sparkles ml-1 hover:text-yellow-300"></i> Ceritaku
                        </div>

                        <div class="flex items-center gap-2 mb-3">
                            <div
                                class="w-8 h-8 bg-pink-100 rounded-full flex items-center justify-center text-pink-500">
                                <i class="fa-solid fa-heart text-xs"></i>
                            </div>
                            <p class="text-[11px] font-black text-rose-300 uppercase tracking-widest">
                                {{ \Carbon\Carbon::parse($diary->date)->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <div class="pl-2 border-l-2 border-pink-50">
                            <p class="text-rose-900 text-sm leading-relaxed italic font-medium">
                                "{{ $diary->body }}"
                            </p>
                        </div>

                        {{-- Tombol Hapus Kecil --}}
                        <form action="{{ route('diaries.destroy', $diary) }}" method="POST"
                            class="mt-4 flex justify-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-200 hover:text-rose-500 transition-colors"
                                onclick="return confirm('Hapus kenangan ini?')">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            {{-- Jika tidak ada catatan --}}
            @if ($diaries->isEmpty())
                <div class="text-center text-rose-300 mt-10">
                    <i class="fa-solid fa-face-smile-wink text-4xl mb-4"></i>
                    <p class="text-sm font-medium">Belum ada cerita yang disimpan. Ayo buat cerita pertamamu!</p>
                </div>
            @endif
        </div>
    </div>

    @include('layouts.navigation')
</x-app-layout>
