@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-0">
            <h1>Minuman</h1>
            <div class="panel panel-default">
                @foreach($produk as $list)
                 <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                    <img src="{{ asset('images/produk/' . $list->gambar) }}" style="width: 100%; height: auto;" class="img-responsive">
                    <div class="col-md-6">
                        <p>{{ $list->nama_produk}}</p>
                        <p>Rp. {{ $list->harga}}</p>
                    </div>
                    @if(Auth::check())
                    <div class="col-md-6">
                        <a onclick="editForm({{ $list->id }})" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-cricle"></i>Pesan</a>
                    </div>
                    @else
                    <div class="col-md-6">
                        <a href="#" class="btn btn-success" disabled><i class="fa fa-plus-cricle"></i>Pesan</a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('minuman.add')
@endsection

@section('script')

<script type="text/javascript">
    var save_method;
    $(function(){
        //Menyimpan data form tambah/edit beserta validasinya
        $('#modal-form form').validator().on('submit', function(e) {
            if(!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if(save_method == "add") url = "{{ route('minuman.store') }}";
                else url = "minuman/"+id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#modal-form form').serialize(),
                    dataType: 'JSON',
                    success : function(data) {
                        $('#modal-form').modal('hide');
                        url = "{{ route('minuman.index') }}";
                    },
                    error : function() {
                        alert("Tidak dapat menyimpan data!");
                    }
                });
                return false;
            }
        });
        });

    //menampilkan form edit dan meampilkan data pada form tersebut
    function editForm(id){
        save_method ="edit";
        $('input[name=_method]').val('POST');
        $('#modal-form form')[0].reset();
        $.ajax({
            url : "minuman/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modal-form').modal('show');
                $('.modal-title').text("Pesan "+data.nama_produk);

                $('#id').val(data.id);
                $('#harga_awal').val(data.harga);

                $('#jumlah').on('input', function() { 
                    var jumlah = $('#jumlah').val();
                    var total = jumlah * data.harga;

                    $('#harga').val(total);
                });
            },
            error : function(){
                alert("Tidak dapat menampilkan data!");
            }
        });
    }
</script>

@yield('js')

@endsection