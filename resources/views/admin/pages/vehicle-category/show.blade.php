{{-- resources/views/admin/pages/vehicle-category/show.blade.php --}}
<x-app-layout>
<div class="flex flex-col-reverse lg:!flex-row justify-between items-start lg:items-center w-full mb-6 gap-4 lg:gap-0">
    <div class="ml-1">
        <h2 class="text-3xl font-bold text-gray-800 mb-1">
            Pricing — {{ $category->name }}
        </h2>
        <p class="text-gray-500 text-sm">Search, filter, and edit prices for all routes</p>
    </div>
</div>


<script>
    window.PRICING_DATA = @json($pricingData);
    window.SAVE_URL = "{{ route('vehicle-category.save-price-bulk') }}";
    window.CSRF    = "{{ csrf_token() }}";
</script>

{{-- Toolbar --}}
<div class="flex flex-wrap gap-3 items-center mb-4">
    <div class="relative flex-1 min-w-[200px]">
        <svg class="absolute left-3 !top-1/2 !-translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/></svg>
        <input id="searchInput" type="text" placeholder="Search location..." class="w-full !pl-9 !pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#c9982b]/40 focus:border-[#c9982b]" />
    </div>
    <select id="filterFrom" class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#c9982b]/40">
        <option value="">All origins</option>
    </select>
    <select id="filterTo" class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#c9982b]/40">
        <option value="">All destinations</option>
    </select>
    <select id="filterPrice" class="py-2 px-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#c9982b]/40">
        <option value="">Any price</option>
        <option value="zero">Not set (0)</option>
        <option value="low">Below 500</option>
        <option value="mid">500–2000</option>
        <option value="high">Above 2000</option>
    </select>
</div>

{{-- Stats --}}
<div class="flex gap-3 mb-4">
    <div class="bg-gray-50 rounded-lg px-4 py-2 text-xs text-gray-500">Total <span id="statTotal" class="block text-base font-semibold text-gray-800">0</span></div>
    <div class="bg-gray-50 rounded-lg px-4 py-2 text-xs text-gray-500">Showing <span id="statShowing" class="block text-base font-semibold text-gray-800">0</span></div>
    <div class="bg-gray-50 rounded-lg px-4 py-2 text-xs text-gray-500">Unsaved <span id="statUnsaved" class="block text-base font-semibold text-gray-800">0</span></div>
</div>

{{-- Save bar --}}
<div id="saveBar" class="hidden mb-4 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3 flex items-center justify-between gap-3">
    <span class="text-sm text-amber-700"><span id="unsavedCount">0</span> unsaved changes</span>
    <div class="flex gap-2">
        <button id="discardBtn" class="text-sm px-4 py-1.5 border !border-amber-300 rounded-lg text-amber-700 hover:!bg-amber-100 transition">Discard</button>
        <button id="saveAllBtn" class="text-sm px-4 py-1.5 !bg-[#c9982b] text-white rounded-lg hover:!bg-[#b5871f] transition font-medium">Save all</button>
    </div>
</div>

{{-- Table --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold text-gray-600 uppercase tracking-wide">
                    <th class="px-4 py-3 text-left w-10">#</th>
                    <th class="px-4 py-3 text-left">Route</th>
                    <th class="px-4 py-3 text-right w-36">Price</th>
                    <th class="px-4 py-3 text-center w-24">Action</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>
    <div class="border-t border-gray-200 px-4 py-3 flex items-center justify-between text-sm text-gray-500" id="paginationBar">
        <span id="pgInfo"></span>
        <div id="pgBtns" class="flex gap-1"></div>
    </div>
</div>

<script>
const PER_PAGE = 20;
let allRoutes = window.PRICING_DATA || [];
let filtered  = [...allRoutes];
let dirty     = {};
let savedIds  = new Set();
let page      = 1;

function populateFilters() {
    const froms = [...new Set(allRoutes.map(r => r.from))].sort();
    const tos   = [...new Set(allRoutes.map(r => r.to))].sort();
    const fFrom = document.getElementById('filterFrom');
    const fTo   = document.getElementById('filterTo');
    froms.forEach(l => { const o = document.createElement('option'); o.value = l; o.textContent = l; fFrom.appendChild(o); });
    tos.forEach(l   => { const o = document.createElement('option'); o.value = l; o.textContent = l; fTo.appendChild(o); });
}

function applyFilters() {
    const q     = document.getElementById('searchInput').value.toLowerCase();
    const from  = document.getElementById('filterFrom').value;
    const to    = document.getElementById('filterTo').value;
    const price = document.getElementById('filterPrice').value;
    filtered = allRoutes.filter(r => {
        if (q && !r.from.toLowerCase().includes(q) && !r.to.toLowerCase().includes(q)) return false;
        if (from && r.from !== from) return false;
        if (to   && r.to   !== to)   return false;
        const p = dirty[r.id] !== undefined ? dirty[r.id] : r.price;
        if (price === 'zero' && p !== 0)        return false;
        if (price === 'low'  && p >= 500)       return false;
        if (price === 'mid'  && (p < 500 || p > 2000)) return false;
        if (price === 'high' && p <= 2000)      return false;
        return true;
    });
    page = 1;
    render();
}

function render() {
    const tbody = document.getElementById('tbody');
    tbody.innerHTML = '';
    const total  = filtered.length;
    const pages  = Math.ceil(total / PER_PAGE);
    const start  = (page - 1) * PER_PAGE;
    const slice  = filtered.slice(start, start + PER_PAGE);

    document.getElementById('statTotal').textContent   = allRoutes.length;
    document.getElementById('statShowing').textContent = total;
    document.getElementById('statUnsaved').textContent = Object.keys(dirty).length;

    if (!slice.length) {
        tbody.innerHTML = '<tr><td colspan="4" class="text-center py-12 text-gray-400">No routes found</td></tr>';
    } else {
        slice.forEach((r, idx) => {
            const curPrice  = dirty[r.id] !== undefined ? dirty[r.id] : r.price;
            const isChanged = dirty[r.id] !== undefined;
            const isSaved   = savedIds.has(r.id) && !isChanged;
            const tr = document.createElement('tr');
            tr.className = 'border-b border-gray-100 hover:bg-gray-50 transition' + (isChanged ? ' bg-amber-50' : '');
            tr.innerHTML = `
                <td class="px-4 py-3 text-gray-400 text-xs">${start + idx + 1}</td>
                <td class="px-4 py-3">
                    <span class="font-medium text-gray-800">${r.from}</span>
                    <span class="text-gray-400 mx-1">→</span>
                    <span class="text-gray-700">${r.to}</span>
                </td>
                <td class="px-4 py-3 text-right">
                    <input type="number" step="50" min="0"
                        class="w-28 px-3 py-1.5 text-right border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#c9982b]/40 focus:border-[#c9982b] transition ${isChanged ? 'border-[#c9982b] bg-amber-50' : 'border-gray-300'}"
                        value="${curPrice}"
                        data-id="${r.id}" data-orig="${r.price}" />
                </td>
                <td class="px-4 py-3 text-center">
                    ${isChanged
                        ? `<button class="save-row-btn text-xs !px-3 py-1.5 !bg-[#c9982b] text-white rounded-lg hover:!bg-[#b5871f] transition" data-id="${r.id}">Save</button>`
                        : isSaved
                            ? `<span class="text-xs text-green-600 bg-green-50 px-2 py-1 rounded-lg">✓ Saved</span>`
                            : ''
                    }
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    renderPagination(total, pages);
    updateSaveBar();
    attachRowEvents();
}

function renderPagination(total, pages) {
    const start = (page - 1) * PER_PAGE + 1;
    const end   = Math.min(page * PER_PAGE, total);
    document.getElementById('pgInfo').textContent = total > 0 ? `${start}–${end} of ${total}` : 'No results';
    const btns = document.getElementById('pgBtns');
    btns.innerHTML = '';
    const prev = document.createElement('button');
    prev.className = '!px-3 !py-1 !border border-gray-200 rounded-lg text-xs hover:!bg-gray-50 disabled:opacity-40';
    prev.textContent = '← Prev'; prev.disabled = page <= 1;
    prev.onclick = () => { page--; render(); };
    btns.appendChild(prev);
    for (let i = 1; i <= Math.min(pages, 7); i++) {
        const b = document.createElement('button');
        b.className = `!px-3 !py-1 !border border-gray-200 rounded-lg text-xs transition ${i === page ? '!bg-[#c9982b] text-white !border-[#c9982b]' : 'border-gray-200 hover:!bg-gray-50'}`;
        b.textContent = i; b.onclick = (e) => { page = parseInt(e.target.textContent); render(); };
        btns.appendChild(b);
    }
    const next = document.createElement('button');
    next.className = '!px-3 !py-1 !border border-gray-200 rounded-lg text-xs hover:!bg-gray-50 disabled:opacity-40';
    next.textContent = 'Next →'; next.disabled = page >= pages;
    next.onclick = () => { page++; render(); };
    btns.appendChild(next);
}

function updateSaveBar() {
    const count = Object.keys(dirty).length;
    document.getElementById('saveBar').classList.toggle('hidden', count === 0);
    document.getElementById('unsavedCount').textContent = count;
}

function attachRowEvents() {
    document.querySelectorAll('input[data-id]').forEach(inp => {
        inp.addEventListener('input', () => {
            const id   = parseInt(inp.dataset.id);
            const orig = parseFloat(inp.dataset.orig);
            const val  = parseFloat(inp.value);
            if (!isNaN(val) && val !== orig) dirty[id] = val;
            else delete dirty[id];
            render(); // <-- yeh add karo, baaki sab hata do
        });
    });
    document.querySelectorAll('.save-row-btn').forEach(btn => {
        btn.addEventListener('click', () => savePrices([parseInt(btn.dataset.id)]));
    });
}

async function savePrices(ids) {
    const payload = ids.map(id => ({ id, price: dirty[id] })).filter(x => x.price !== undefined);
    if (!payload.length) return;
    try {
        const res = await fetch(window.SAVE_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': window.CSRF },
            body: JSON.stringify({ prices: payload })
        });
        if (res.ok) {
            payload.forEach(({ id, price }) => {
                const r = allRoutes.find(x => x.id === id);
                if (r) r.price = price;
                delete dirty[id];
                savedIds.add(id);
            });
            render();
        }
    } catch (e) { alert('Save failed, please try again.'); }
}

document.getElementById('saveAllBtn').addEventListener('click', () => savePrices(Object.keys(dirty).map(Number)));
document.getElementById('discardBtn').addEventListener('click', () => { dirty = {}; render(); });
['searchInput','filterFrom','filterTo','filterPrice'].forEach(id => {
    document.getElementById(id).addEventListener('input',  applyFilters);
    document.getElementById(id).addEventListener('change', applyFilters);
});

populateFilters();
render();
</script>
</x-app-layout>