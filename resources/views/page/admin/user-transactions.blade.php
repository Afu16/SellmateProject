@extends('layouts.admin')

@section('content')
<div id="transaction-detail" class="w-full">
    <div class="flex items-center gap-4">
        <h1 class="text-2xl font-pilcrow font-pilcrow-rounded font-bold text-black">Detail Transaksi {{ $username }}</h1>
        <img src="/storage/{{ $profile_picture }}" alt="avatar" class="w-10 h-10 rounded-full border-2 border-black object-cover">
        <div class="ml-auto flex items-center gap-3">
            <div class="flex items-center gap-2 bg-secondary border-2 border-black rounded-xl px-4 py-2">
                <span class="text-black text-sm">Total Omzet</span>
                <span id="totalOmzet" class="text-black text-sm font-bold"></span>
            </div>
            <div class="relative">
                <input type="search" id="searchInput" placeholder="Search" class="w-[18vw] h-[4.2vh] border-2 border-black shadow-black rounded-md px-3 py-1 pr-8 text-[10px] focus:outline-none focus:ring-2 focus:ring-primary" />
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 -translate-y-1/2 h-3 w-3 text-black cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <button id="filterBtn" class="text-nowrap flex items-center gap-2 px-4 h-[4.2vh] border-2 border-black shadow-black rounded-md text-[10px] bg-white">
                <img width="10" src="/assets/svg/filter-icon.svg" alt="filter-icon">
                Bulan ini
            </button>
        </div>
    </div>

    <div class="w-full mt-5">
        <div class="text-[10px] grid grid-cols-[60px,100px,120px,100px,140px,40px] items-center bg-gray-300 rounded-xl px-4 py-2 text-black border-2 border-black">
            <div class="text-center">Username</div>
            <div class="text-center">School</div>
            <div class="text-center">Department</div>
            <div class="text-center">Product</div>
            <div class="text-center">Price</div>
            <div class="text-center text-nowrap">Transaction Date</div>
            <div></div>
        </div>

        <div id="listContainer" class="mt-3 rounded-xl border-2 border-black p-2">
            <div id="loading" class="p-6 text-center text-sm">Loading...</div>
            <div id="error" class="p-6 text-center text-sm text-red-600 hidden">Gagal memuat data</div>
            <div id="items" class="space-y-2"></div>
        </div>

        <div id="pagination" class="flex items-center justify-center gap-3 mt-4"></div>
    </div>
</div>

<script>
(() => {
    const userId = @json($userId);
    const username = @json($username);
    const listEl = document.getElementById('items');
    const loadingEl = document.getElementById('loading');
    const errorEl = document.getElementById('error');
    const totalOmzetEl = document.getElementById('totalOmzet');
    const paginationEl = document.getElementById('pagination');
    const searchInput = document.getElementById('searchInput');

    let page = 1;
    let perPage = 10;
    let currentData = [];

    async function fetchData() {
        loadingEl.classList.remove('hidden');
        errorEl.classList.add('hidden');
        listEl.innerHTML = '';
        try {
            const res = await fetch(`/admin/usermana/${encodeURIComponent(userId)}/data?page=${page}&per_page=${perPage}`);
            if (!res.ok) throw new Error('Network');
            const json = await res.json();
            totalOmzetEl.textContent = new Intl.NumberFormat('id-ID').format(json.total_omzet);
            currentData = json.transactions;
            renderList();
            renderPagination(json.pagination);
        } catch (e) {
            errorEl.classList.remove('hidden');
        } finally {
            loadingEl.classList.add('hidden');
        }
    }

    function renderList() {
        const q = (searchInput.value || '').toLowerCase();
        const filtered = currentData.filter(item =>
            item.product.toLowerCase().includes(q) ||
            item.department.toLowerCase().includes(q) ||
            item.school.toLowerCase().includes(q)
        );
        listEl.innerHTML = filtered.map(item => `
            <div class="text-[10px] grid grid-cols-[60px,100px,120px,100px,140px,40px] items-center bg-white rounded-xl border-2 border-black px-4 py-3 shadow-black">
                <div class="flex items-center gap-3">
                    <span class="font-pilcrow font-pilcrow-rounded text-black">${username}</span>
                </div>
                <div class="text-center">${item.school}</div>
                <div class="text-center">${item.department}</div>
                <div class="text-center">${item.product}</div>
                <div class="text-center">Rp ${new Intl.NumberFormat('id-ID').format(item.price)}</div>
                <div class="text-center text-nowrap">${new Date(item.transaction_date).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</div>
            </div>
        `).join('');
    }

    function renderPagination(p) {
        paginationEl.innerHTML = '';
        for (let i = 1; i <= p.pages; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            btn.className = `w-8 h-8 border-2 border-black rounded-md text-sm ${i === p.page ? 'bg-secondary' : 'bg-white'}`;
            btn.addEventListener('click', () => { page = i; fetchData(); });
            paginationEl.appendChild(btn);
        }
    }

    searchInput.addEventListener('input', () => renderList());

    fetchData();
})();
</script>
@endsection
