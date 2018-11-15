<div class="panel-heading" style="text-align: center;">
    <a href="{{ route('makanan.index') }}" style="margin-right: 20px; font-size: 25px;">Makanan</a>
    <a href="" style="margin-right: 20px; font-size: 25px;">Minuman</a>
    @if(Auth::check())
    <a href="" style="margin-right: 20px; font-size: 25px;">Pesanan Saya</a>
    @else
    @endif
</div>