<div class="panel-heading" style="text-align: center;">
    <a href="{{ route('makanan.index') }}" style="margin-right: 20px; font-size: 25px;">Makanan</a>
    <a href="{{ route('minuman.index') }}" style="margin-right: 20px; font-size: 25px;">Minuman</a>
    @if(Auth::check())
    <a href="{{ route('pesanan.index') }}" style="margin-right: 20px; font-size: 25px;">Pesanan Saya</a>
    @else
    @endif
</div>