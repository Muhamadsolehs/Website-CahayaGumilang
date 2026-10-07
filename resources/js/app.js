require('./bootstrap');
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

// Inisialisasi Kalender
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar'); // Pastikan ada elemen dengan ID "calendar"

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        events: '/api/events', // API endpoint untuk mengambil jadwal
    });

    calendar.render();
});

