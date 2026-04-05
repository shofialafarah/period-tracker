<div class="space-y-4 pb-24">
    <h3 class="text-rose-600 font-black text-sm uppercase tracking-widest px-2 flex items-center">
        <i class="fa-solid fa-book-medical mr-2"></i> Riwayat Siklus
    </h3>

    <div class="mt-4 flex justify-center">
        <span class="bg-pink-100 text-pink-700 text-[10px] px-3 py-1 rounded-full font-bold uppercase tracking-wider shadow-sm border border-pink-200">
            Rata-rata siklusmu: {{ $averageCycle }} hari
        </span>
    </div>

    @foreach ($periods as $period)
        <div class="relative bg-white border-2 border-pink-50 rounded-2xl p-4 shadow-sm flex justify-between items-center group hover:border-pink-200 transition-all">
            @if ($period->duration)
                <span class="absolute -top-2 -left-2 bg-pink-400 text-white text-[8px] font-bold px-2 py-1 rounded-full shadow-sm">
                    {{ $period->duration }} Hari
                </span>
            @endif

            <div>
                <p class="text-[10px] text-rose-300 font-bold uppercase tracking-tighter">Tanggal</p>
                <p class="text-rose-900 font-bold text-sm">
                    {{ \Carbon\Carbon::parse($period->start_date)->format('d M') }}
                    @if ($period->end_date) - {{ \Carbon\Carbon::parse($period->end_date)->format('d M') }} @endif
                </p>
            </div>

            <div class="flex gap-0.5">
                @for ($i = 0; $i < $period->flow_intensity; $i++)
                    <i class="fa-solid fa-droplet text-[10px] text-pink-400"></i>
                @endfor
            </div>

            <div class="flex items-center gap-3">
                <span class="text-xl drop-shadow-sm">{{ $period->mood }}</span>
                <button type="button" onclick="confirmDelete(this)" class="text-rose-100 hover:text-rose-500 transition-colors">
                    <i class="fa-solid fa-trash-can text-sm"></i>
                </button>
                <form action="{{ route('periods.destroy', $period) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @endforeach
</div>