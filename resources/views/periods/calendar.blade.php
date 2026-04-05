<x-app-layout>
    <div class="py-12 bg-rose-50 min-h-screen font-sans pb-32">
        <div class="max-w-md mx-auto px-4">
            <h2 class="text-2xl font-black text-rose-600 mb-6 flex items-center">
                <i class="fa-solid fa-calendar-heart mr-2"></i> Kalender Siklus
            </h2>

            <div class="bg-white p-4 rounded-3xl shadow-xl border border-pink-100">
                <div id="calendar"></div>
            </div>

            <div class="mt-6 flex gap-3 items-center bg-pink-100 p-4 rounded-2xl border border-pink-200">
                <div class="w-4 h-4 bg-pink-400 rounded-full"></div>
                <p class="text-xs font-bold text-pink-700 uppercase tracking-widest">Periode Menstruasi</p>
            </div>
        </div>
    </div>

    @include('layouts.navigation')

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <style>
        /* Kustomisasi agar kalender terlihat lebih 'soft' */
        .fc {
            --fc-border-color: #ffe4e6;
            --fc-button-bg-color: #f472b6;
            --fc-button-border-color: #f472b6;
            --fc-button-hover-bg-color: #db2777;
        }

        .fc .fc-toolbar-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: #e11d48;
            text-transform: uppercase;
        }

        .fc .fc-col-header-cell-cushion {
            font-size: 0.7rem;
            text-transform: uppercase;
            color: #fb7185;
        }

        .fc-daygrid-day-number {
            font-size: 0.8rem;
            font-weight: 600;
            color: #4c0519;
        }

        .fc .fc-button-primary:disabled {
            background-color: #fbcfe8;
            border-color: #fbcfe8;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                locale: 'id',
                events: {!! json_encode($events) !!},
                height: 'auto',
                contentHeight: 400,
            });
            calendar.render();
        });
    </script>
</x-app-layout>
