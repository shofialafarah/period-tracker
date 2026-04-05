<x-app-layout>
    {{-- Container utama dengan background Rose halus --}}
    <div class="py-12 bg-rose-50 min-h-screen font-sans pb-32">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 px-4 space-y-6">
            
            {{-- Judul Halaman --}}
            <h2 class="text-2xl font-black text-rose-600 mb-2 flex items-center px-2">
                <i class="fa-solid fa-user-heart mr-2"></i> Pengaturan Profil
            </h2>

            {{-- 1. Kotak Update Informasi Profil --}}
            <div class="p-6 bg-white border-2 border-pink-50 shadow-xl rounded-[2rem]">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-rose-400 uppercase tracking-widest mb-4">Informasi Akun</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- 2. Kotak Ganti Password --}}
            <div class="p-6 bg-white border-2 border-pink-50 shadow-xl rounded-[2rem]">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-rose-400 uppercase tracking-widest mb-4">Keamanan</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- 3. Kotak Hapus Akun (Zona Bahaya) --}}
            <div class="p-6 bg-rose-50 border-2 border-red-100 shadow-sm rounded-[2rem]">
                <div class="max-w-xl">
                    <h3 class="text-xs font-bold text-red-400 uppercase tracking-widest mb-4 font-black">Zona Bahaya</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    {{-- MEMANGGIL NAVIGASI BAWAH --}}
    @include('layouts.navigation')
</x-app-layout>