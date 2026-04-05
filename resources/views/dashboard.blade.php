<x-app-layout>
    <div class="py-12 bg-rose-50 min-h-screen font-sans">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 px-4">

            {{-- 1. Card Prediksi --}}
            @if ($prediction)
                <div
                    class="relative overflow-hidden mb-6 bg-gradient-to-r from-pink-400 to-rose-400 p-6 rounded-3xl shadow-lg text-white text-center transform hover:scale-105 transition">
                    <i class="fa-solid fa-cloud-moon absolute -right-4 -top-2 text-6xl opacity-20 rotate-12"></i>
                    <p class="text-xs uppercase font-bold opacity-80 text-pink-100">Estimasi Datang Bulan</p>
                    <h2 class="text-3xl font-black mt-1">{{ $prediction->format('d M Y') }}</h2>
                    <p class="text-sm mt-2 font-medium italic opacity-90">Siapkan amunisi ya! <i
                            class="fa-solid fa-box-tissue ml-1"></i></p>
                </div>
            @endif

            {{-- 2. Form Input (Panggil dari folder periods) --}}
            @include('periods.form')

            {{-- 3. Riwayat Siklus (Panggil dari folder periods) --}}
            @include('periods.history')

        </div>
    </div>

    {{-- 4. Panggil Navigasi (Pindah ke layout kalau mau muncul di semua halaman) --}}
    @include('layouts.navigation')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('flow-slider');
            const container = document.getElementById('flow-icons-container');
            const textLabel = document.getElementById('flow-text');

            const labels = {
                1: 'Sedikit',
                2: 'Ringan',
                3: 'Sedang',
                4: 'Banyak',
                5: 'Sangat Banyak'
            };
            const colors = {
                1: 'text-pink-300',
                2: 'text-pink-400',
                3: 'text-rose-400',
                4: 'text-rose-500',
                5: 'text-rose-700'
            };

            function updateFlow() {
                const val = slider.value;
                container.innerHTML = ''; // Reset kontainer

                // Gambar ulang ikon droplet sesuai angka slider
                for (let i = 0; i < val; i++) {
                    const icon = document.createElement('i');
                    // Pastikan Font Awesome terpanggil dengan class fa-solid fa-droplet
                    icon.className = `fa-solid fa-droplet ${colors[val]} transition-all duration-300`;
                    container.appendChild(icon);
                }
                textLabel.innerText = labels[val];
            }

            if (slider) {
                slider.addEventListener('input', updateFlow);
                updateFlow(); // Jalankan sekali saat halaman terbuka
            }
            // 2. Alert Sukses (Hanya muncul jika ada session success)
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil! ✨',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'Oke Cantik!',
                    confirmButtonColor: '#f472b6',
                    background: '#fff1f2',
                    borderRadius: '20px'
                });
            @endif
        });

        function confirmDelete(button) {
            Swal.fire({
                title: 'Hapus data ini?',
                text: "Data yang dihapus nggak bisa balik lagi lho!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f472b6',
                cancelButtonColor: '#d1d5db',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                borderRadius: '20px'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.nextElementSibling.submit();
                }
            })
        }
    </script>
</x-app-layout>
