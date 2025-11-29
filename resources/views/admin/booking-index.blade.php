@extends('layouts.admin-navbar')

@section('title', 'Daftar Booking')

@section('content')

{{-- HEADER & BACK BUTTON --}}
<div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-200 mb-2">Daftar Booking Masuk</h1>
        <p class="text-slate-400">Kelola jadwal dan data peminjaman auditorium</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 border border-white/10 rounded-lg 
              text-slate-300 hover:bg-white/10 hover:text-white transition-all group">
        <span class="group-hover:-translate-x-1 transition-transform">←</span>
        Kembali ke Dashboard
    </a>
</div>

{{-- LAYOUT CONTAINER (VERTICAL) --}}
<div class="space-y-8">
    
    {{-- CALENDAR SECTION (TOP) --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <h2 class="text-xl font-bold text-slate-200 flex items-center gap-2">
                Kalender Booking
            </h2>
            
            {{-- Status Legend --}}
            <div class="flex gap-4 flex-wrap">
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <span class="w-3 h-3 rounded-full bg-green-500"></span>
                    <span>Disetujui</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                    <span>Pending</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-400">
                    <span class="w-3 h-3 rounded-full bg-red-500"></span>
                    <span>Ditolak</span>
                </div>
            </div>
        </div>
        
        {{-- Calendar Container --}}
        <div id="calendar" class="bg-white/5 rounded-lg p-4 min-h-[600px]"></div>
        
        {{-- Show All Button --}}
        <button id="showAllBtn" 
                class="hidden w-full mt-4 px-4 py-3 bg-gradient-to-r from-orange-500 to-orange-600 
                       text-white rounded-lg font-semibold text-sm uppercase tracking-wide
                       hover:from-orange-600 hover:to-orange-700 transition-all duration-200
                       flex items-center justify-center gap-2">
            <span>Tampilkan Semua Booking</span>
        </button>
    </div>

    {{-- TABLE SECTION (BOTTOM) --}}
    <div class="bg-white/5 backdrop-blur-md rounded-2xl p-6 border border-white/10">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div class="flex items-center gap-3">
                <h2 class="text-xl font-bold text-slate-200 flex items-center gap-2">
                    Daftar Booking
                </h2>
                <span id="dateFilter" class="hidden px-3 py-1 bg-yellow-400/20 text-yellow-400 rounded-full text-xs font-semibold"></span>
            </div>
            
            {{-- Search Bar --}}
            <div class="flex gap-2 w-full sm:w-auto">
                <input type="text" 
                       id="searchInput" 
                       placeholder="Cari booking..." 
                       class="px-4 py-2 bg-white/10 border border-white/20 rounded-lg text-slate-200 
                              placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500
                              w-full sm:w-64">
                <button id="searchBtn" 
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors"
                        title="Cari">
                    🔍
                </button>
                <button id="resetBtn" 
                        class="hidden px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors"
                        title="Reset">
                    Reset
                </button>
            </div>
        </div>

        {{-- Booking Count --}}
        <div id="bookingCount" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-500/20 rounded-full mb-4">
            <span class="count-number text-xl font-bold text-indigo-400">{{ $bookings->total() }}</span>
            <span class="text-sm text-slate-400">Total Booking</span>
        </div>
        
        {{-- Table Wrapper --}}
        <div class="overflow-hidden rounded-lg border border-white/10">
            <table class="w-full text-left border-collapse" id="bookingTable">
                <thead class="bg-white/10">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[20%]">Organisasi</th>
                        <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[25%]">Kegiatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[20%]">Waktu</th>
                        <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[15%]">Status</th>
                        <th class="px-4 py-3 text-sm font-semibold text-slate-200 border-b border-white/10 w-[10%] text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody id="bookingTableBody">
                    @forelse ($bookings as $b)
                    <tr class="hover:bg-white/5 transition-colors border-b border-white/5 last:border-0">
                        <td class="px-4 py-4 align-top">
                            <strong class="text-slate-200 block mb-1">{{ $b->peminjam }}</strong>
                            <span class="text-xs text-slate-500">{{ $b->pic_name }}</span>
                        </td>
                        <td class="px-4 py-4 align-top text-slate-400">
                            {{ $b->nama_kegiatan }}
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1">
                                <span class="text-sm text-slate-300">
                                    {{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}
                                </span>
                                <span class="text-sm text-slate-400">
                                    {{ $b->jam_mulai }} - {{ $b->jam_selesai }}
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            @if($b->status == 'pending')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                             bg-yellow-500/10 text-yellow-400 border border-yellow-500/20">
                                    Pending
                                </span>
                            @elseif($b->status == 'approved')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                             bg-green-500/10 text-green-400 border border-green-500/20">
                                    Disetujui
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                             bg-red-500/10 text-red-400 border border-red-500/20">
                                    Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <a href="{{ route('admin.booking.detail', $b->id) }}" 
                               class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-sm font-medium
                                      bg-white/5 text-slate-300 hover:bg-indigo-500 hover:text-white 
                                      transition-all" title="Lihat Detail">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-16 text-center">
                            <div class="text-slate-500">Belum ada data booking</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        @if($bookings->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>

    {{-- EXPORT BUTTONS --}}
    <div class="mt-6">
        <a href="{{ route('admin.booking.export.pdf') }}" 
           class="inline-flex items-center gap-2 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors shadow-lg">
            📄 Export PDF
        </a>
    </div>

</div>

{{-- Loading Overlay --}}
<div id="loadingOverlay" class="fixed inset-0 bg-slate-900/90 backdrop-blur-md flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="flex flex-col items-center gap-6">
        <div class="relative">
            <div class="w-20 h-20 border-4 border-transparent border-t-indigo-500 border-r-purple-500 rounded-full animate-spin absolute"></div>
            <div class="w-16 h-16 border-4 border-transparent border-t-purple-500 border-r-pink-400 rounded-full animate-spin absolute top-2 left-2" style="animation-duration: 1.5s; animation-direction: reverse;"></div>
            <div class="w-12 h-12 border-4 border-transparent border-t-pink-400 border-r-indigo-300 rounded-full animate-spin absolute top-4 left-4" style="animation-duration: 2s;"></div>
        </div>
        <div class="text-indigo-200 font-semibold tracking-widest mt-24">Memuat data...</div>
    </div>
</div>

{{-- FullCalendar CSS --}}
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />

{{-- FullCalendar JS --}}
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

{{-- Custom Styles for FullCalendar --}}
<style>
/* Calendar Container */
.fc {
    font-family: 'Poppins', sans-serif;
}

/* Toolbar Buttons (Month, Week, Today, Arrows) */
.fc .fc-button-primary {
    background-color: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    color: #e2e8f0 !important;
    text-transform: capitalize;
    font-weight: 500;
    padding: 8px 16px;
    transition: all 0.2s;
    outline: none !important;
    box-shadow: none !important;
}

.fc .fc-button-primary:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
    border-color: rgba(255, 255, 255, 0.2) !important;
}

.fc .fc-button-primary:not(:disabled).fc-button-active, 
.fc .fc-button-primary:not(:disabled):active {
    background-color: #4f46e5 !important; /* Indigo 600 */
    border-color: #4f46e5 !important;
    color: white !important;
}

.fc .fc-button-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

/* Toolbar Title */
.fc .fc-toolbar-title {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #f1f5f9 !important;
}

/* Calendar Header Cells */
.fc .fc-col-header-cell {
    background-color: rgba(255, 255, 255, 0.05);
    padding: 12px 0;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.fc .fc-col-header-cell-cushion {
    color: #94a3b8; /* Slate 400 */
    font-weight: 600;
    text-decoration: none;
}

/* Calendar Grid */
.fc .fc-daygrid-day {
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.fc .fc-daygrid-day-number {
    color: #cbd5e1;
    padding: 8px;
    font-weight: 500;
    text-decoration: none;
}

.fc .fc-day-today {
    background-color: rgba(99, 102, 241, 0.1) !important; /* Indigo tint */
}

/* Events */
.fc-event {
    border: none !important;
    border-radius: 4px;
    padding: 2px 4px;
    margin-bottom: 2px;
    cursor: pointer;
    transition: transform 0.1s;
}

.fc-event:hover {
    transform: scale(1.02);
}

.fc-event-title {
    font-weight: 500;
    font-size: 0.85rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* List View Fixes */
.fc-list {
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.fc-list-day-cushion {
    background-color: rgba(255, 255, 255, 0.05) !important;
}

.fc-list-event:hover td {
    background-color: rgba(255, 255, 255, 0.05) !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const dateFilterEl = document.getElementById('dateFilter');
    const showAllBtn = document.getElementById('showAllBtn');
    const tableBody = document.getElementById('bookingTableBody');
    const bookingCount = document.querySelector('.count-number');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const resetBtn = document.getElementById('resetBtn');
    
    let currentDate = null;
    let currentSearch = '';

    function showLoading() {
        loadingOverlay.classList.remove('opacity-0', 'pointer-events-none');
    }

    function hideLoading() {
        loadingOverlay.classList.add('opacity-0', 'pointer-events-none');
    }

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek'
        },
        buttonText: {
            today: 'Hari Ini',
            month: 'Bulan',
            week: 'Minggu',
            day: 'Hari'
        },
        events: function(info, successCallback, failureCallback) {
            fetch('/admin/calendar/data')
                .then(response => response.json())
                .then(data => {
                    const coloredEvents = data.map(event => {
                        return {
                            ...event,
                            backgroundColor: getEventColor(event.title),
                            borderColor: 'transparent'
                        };
                    });
                    successCallback(coloredEvents);
                })
                .catch(error => {
                    console.error('Error loading events:', error);
                    failureCallback(error);
                });
        },
        themeSystem: 'standard',
        height: 'auto',
        dateClick: function(info) {
            currentDate = info.dateStr;
            calendar.select(currentDate);
            fetchBookings();
        },
        eventClick: function(info) {
            const bookingId = info.event.id;
            if (bookingId) {
                window.location.href = `/admin/booking/detail-booking/${bookingId}`;
            }
        },
        eventDidMount: function(info) {
            info.el.title = info.event.title;
        }
    });

    calendar.render();

    function getEventColor(title) {
        const colors = ['#6366f1', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];
        const hash = title.split('').reduce((acc, char) => acc + char.charCodeAt(0), 0);
        return colors[hash % colors.length];
    }

    function fetchBookings() {
        showLoading();
        let url = `/admin/booking/filter?`;
        if (currentDate) url += `date=${currentDate}&`;
        if (currentSearch) url += `search=${currentSearch}`;

        fetch(url)
            .then(response => response.json())
            .then(bookings => {
                setTimeout(() => {
                    updateTable(bookings, currentDate);
                    hideLoading();
                }, 300);
            })
            .catch(error => {
                console.error('Error fetching bookings:', error);
                hideLoading();
            });
    }

    searchBtn.addEventListener('click', function() {
        currentSearch = searchInput.value;
        fetchBookings();
        updateResetButton();
    });

    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            currentSearch = this.value;
            fetchBookings();
            updateResetButton();
        }
    });

    resetBtn.addEventListener('click', function() {
        searchInput.value = '';
        currentSearch = '';
        fetchBookings();
        updateResetButton();
    });

    function updateResetButton() {
        if (currentSearch) {
            resetBtn.classList.remove('hidden');
        } else {
            resetBtn.classList.add('hidden');
        }
    }

    function updateTable(bookings, date = null) {
        tableBody.innerHTML = '';

        if (date) {
            const formattedDate = new Date(date).toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            dateFilterEl.innerHTML = `${formattedDate}`;
            dateFilterEl.classList.remove('hidden');
            showAllBtn.classList.remove('hidden');
        } else {
            dateFilterEl.innerHTML = '';
            dateFilterEl.classList.add('hidden');
            showAllBtn.classList.add('hidden');
        }

        bookingCount.textContent = bookings.length;

        if (bookings.length === 0) {
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="px-4 py-16 text-center">
                        <div class="text-slate-500">${date ? 'Tidak ada booking untuk tanggal ini' : 'Belum ada data booking'}</div>
                    </td>
                </tr>
            `;
            return;
        }

        bookings.forEach((b) => {
            let statusBadge = '';
            let statusIcon = '';
            let statusText = '';
            
            if (b.status === 'pending') {
                statusBadge = 'bg-yellow-500/10 text-yellow-400 border border-yellow-500/20';
                statusText = 'Pending';
            } else if (b.status === 'approved') {
                statusBadge = 'bg-green-500/10 text-green-400 border border-green-500/20';
                statusText = 'Disetujui';
            } else {
                statusBadge = 'bg-red-500/10 text-red-400 border border-red-500/20';
                statusText = 'Ditolak';
            }

            const startDate = new Date(b.tanggal).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });

            const row = document.createElement('tr');
            row.className = 'hover:bg-white/5 transition-colors border-b border-white/5 last:border-0';
            row.innerHTML = `
                <td class="px-4 py-4 align-top">
                    <strong class="text-slate-200 block mb-1">${b.peminjam}</strong>
                    <span class="text-xs text-slate-500">${b.pic_name}</span>
                </td>
                <td class="px-4 py-4 align-top text-slate-400">${b.nama_kegiatan}</td>
                <td class="px-4 py-4 align-top">
                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-300">${startDate}</span>
                        <span class="text-sm text-slate-400">${b.jam_mulai} - ${b.jam_selesai}</span>
                    </div>
                </td>
                <td class="px-4 py-4 align-top">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold ${statusBadge}">
                        ${statusText}
                    </span>
                </td>
                <td class="px-4 py-4 align-top text-center">
                    <a href="/admin/booking/detail-booking/${b.id}" 
                       class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-sm font-medium
                              bg-white/5 text-slate-300 hover:bg-indigo-500 hover:text-white 
                              transition-all" title="Lihat Detail">
                        Detail
                    </a>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    showAllBtn.addEventListener('click', function() {
        currentDate = null;
        currentSearch = '';
        searchInput.value = '';
        updateResetButton();
        if (calendar) calendar.unselect();
        fetchBookings();
    });
});
</script>

@endsection
