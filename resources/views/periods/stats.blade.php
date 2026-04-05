<x-app-layout>
    <div class="py-12 bg-rose-50 min-h-screen font-sans pb-32">
        <div class="max-w-md mx-auto px-4">
            <h2 class="text-2xl font-black text-rose-600 mb-6 flex items-center">
                <i class="fa-solid fa-chart-line-up mr-2"></i> Analisis Siklusmu
            </h2>

            <div class="bg-white p-6 rounded-3xl shadow-xl border border-pink-100 mb-6">
                <h3 class="text-xs font-bold text-rose-400 uppercase tracking-widest mb-4 text-center">Durasi Haid (Hari)</h3>
                <canvas id="durationChart"></canvas>
            </div>

            <div class="bg-gradient-to-br from-pink-400 to-rose-400 p-6 rounded-3xl shadow-lg text-white">
                <h4 class="font-bold mb-2 flex items-center">
                    <i class="fa-solid fa-lightbulb-on mr-2"></i> Tips Hari Ini
                </h4>
                <p class="text-xs leading-relaxed opacity-90">
                    Berdasarkan datamu, rata-rata durasi haidmu stabil. Jangan lupa perbanyak minum air putih dan istirahat cukup ya, Cantik! <i class="fa-solid fa-wand-magic-sparkles ml-1"></i>
                </p>
            </div>
        </div>
    </div>

    @include('layouts.navigation')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('durationChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dates) !!},
                datasets: [{
                    label: 'Hari',
                    data: {!! json_encode($durations) !!},
                    borderColor: '#f472b6',
                    backgroundColor: 'rgba(244, 114, 182, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#fb7185',
                    pointBorderColor: '#fff',
                    pointRadius: 5
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { display: false } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
</x-app-layout>