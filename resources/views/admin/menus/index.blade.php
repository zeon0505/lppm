@extends('admin.layouts.app')

@section('title', 'Kelola Menu Navbar')

@section('content')
<div class="space-y-8">

  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl font-bold text-[#074e50]">Kelola Menu Navbar</h1>
      <p class="text-xs text-slate-500 mt-1">Tambah, edit nama menu (seperti Pusat Studi A/B/C/D), atau ubah urutan menu navbar.</p>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <!-- List Menu -->
    <div class="lg:col-span-2 space-y-4">
      @foreach($menus as $menu)
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-center justify-between pb-3 border-b border-slate-100">
            <div class="flex items-center gap-3">
              <span class="w-7 h-7 bg-[#074e50] text-white rounded-lg flex items-center justify-center text-xs font-bold">{{ $menu->order_position }}</span>
              <div>
                <h3 class="text-sm font-extrabold text-slate-800">{{ $menu->title }}</h3>
                <span class="text-[10px] text-slate-400 font-mono">{{ $menu->url }}</span>
              </div>
            </div>

            <!-- Edit Form Drawer/Inline -->
            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" class="flex items-center gap-2">
              @csrf
              @method('PUT')
              <input type="text" name="title" value="{{ $menu->title }}" class="px-2.5 py-1 text-xs border border-slate-200 rounded-lg w-40 focus:outline-none focus:ring-1 focus:ring-[#074e50]">
              <input type="hidden" name="url" value="{{ $menu->url }}">
              <input type="number" name="order_position" value="{{ $menu->order_position }}" class="px-2 py-1 text-xs border border-slate-200 rounded-lg w-14 focus:outline-none">
              <button type="submit" class="bg-teal-700 text-white px-2.5 py-1 rounded-lg text-xs font-bold hover:bg-teal-800">Simpan</button>
            </form>
          </div>

          <!-- Submenus -->
          @if($menu->children->count() > 0)
            <div class="mt-3 pl-4 space-y-2 border-l-2 border-amber-300">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Submenu (Dropdown):</span>
              @foreach($menu->children as $child)
                <div class="bg-slate-50 p-2.5 rounded-xl border border-slate-100 flex items-center justify-between">
                  <form action="{{ route('admin.menus.update', $child->id) }}" method="POST" class="flex items-center gap-2 flex-grow">
                    @csrf
                    @method('PUT')
                    <span class="text-xs font-semibold text-slate-700 w-24 truncate">• {{ $child->title }}</span>
                    <input type="text" name="title" value="{{ $child->title }}" class="px-2.5 py-1 text-xs border border-slate-200 rounded-lg flex-grow focus:outline-none focus:ring-1 focus:ring-[#074e50]" placeholder="Nama Submenu">
                    <input type="hidden" name="url" value="{{ $child->url }}">
                    <input type="number" name="order_position" value="{{ $child->order_position }}" class="px-2 py-1 text-xs border border-slate-200 rounded-lg w-12 text-center">
                    <button type="submit" class="bg-emerald-600 text-white px-2.5 py-1 rounded-lg text-xs font-bold hover:bg-emerald-700">Update</button>
                  </form>
                  <form action="{{ route('admin.menus.delete', $child->id) }}" method="POST" onsubmit="return confirm('Hapus submenu ini?')" class="ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-rose-500 hover:text-rose-700 p-1 text-xs"><i class="fas fa-trash"></i></button>
                  </form>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      @endforeach
    </div>

    <!-- Form Tambah Menu/Submenu -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm h-fit">
      <h3 class="text-sm font-bold text-[#074e50] mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
        <i class="fas fa-plus-circle text-amber-500"></i> Tambah Menu Baru
      </h3>

      <form action="{{ route('admin.menus.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Judul Menu / Submenu</label>
          <input type="text" name="title" required class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#074e50]" placeholder="Contoh: Pusat Studi Kebijakan">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Parent (Kategori Induk)</label>
          <select name="parent_id" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#074e50]">
            <option value="">-- Tidak ada (Menu Utama Top Level) --</option>
            @foreach($menus as $m)
              <option value="{{ $m->id }}">{{ $m->title }}</option>
            @endforeach
          </select>
          <span class="text-[10px] text-slate-400 mt-1 block">Pilih "Pusat Studi dan Unit" untuk menambah sub-pusat studi baru.</span>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">URL / Link Target</label>
          <input type="text" name="url" required class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#074e50]" value="/pusat-studi/baru" placeholder="/pusat-studi/nama">
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 mb-1">Urutan (Posisi)</label>
          <input type="number" name="order_position" value="5" class="w-full px-3 py-2 text-xs border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#074e50]">
        </div>

        <button type="submit" class="w-full py-2.5 bg-[#074e50] text-white text-xs font-bold rounded-xl hover:bg-[#053c3e] transition-colors shadow-sm">
          + Tambahkan Menu
        </button>
      </form>
    </div>

  </div>
</div>
@endsection