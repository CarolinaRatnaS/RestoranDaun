@extends('layouts.app')

@section('menu')
@include('layouts.menu')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-0">
            <h1>Pesanan Saya</h1>
            <div class="panel panel-default">
                <div class="col-md-12">
                    <form action="#">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="30">No</th>
                                                <th>Menu Pesanan</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                                <th width="100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{ $no = 0 }}
                                            @foreach($pesanandetail as $list)
                                            {{ $no++ }}
                                            <tr>
                                              <th scope="row">{{ $no }}</th>
                                              <td>{{ $list->nama_produk}}</td>
                                              <td>Rp{{ $list->harga}}</td>
                                              <td>{{ $list->jumlah}}</td>
                                              <td>Rp{{ $list->sub_total }}</td>
                                              <td><a onclick="deleteData({{ $list->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>x</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3"></th>
                                                <th>Total</th>
                                                <th>Rp{{ $total }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>    
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('makanan.add')
@endsection

@section('script')

<script type="text/javascript">
    var save_method;
    $(function(){

        //Menyimpan data form tambah/edit beserta validasinya
        $('#modal-form form').validator().on('submit', function(e) {
            if(!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if(save_method == "add") url = "{{ route('makanan.store') }}";
                else url = "makanan/"+id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#modal-form form').serialize(),
                    dataType: 'JSON',
                    success : function(data) {
                        $('#modal-form').modal('hide');
                        url = "{{ route('makanan.index') }}";
                    },
                    error : function() {
                        alert("Oops! Data pesanan kamu ga bisa disimpan.");
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
            url : "makanan/"+id+"/edit",
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
                alert("Oops! Menunya ga bisa ditampilin!");
            }
        });
    }

    //menghapus data
    function deleteData(id){
        if(confirm("Yakin nih mau hapus menunya?")){
            $.ajax({
                url : "pesanan/"+id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token': $('meta[name=csrf-token]').attr('content')},
                success : function(){
                    url = "{{ route('pesanan.index') }}";
                },
                error : function(){
                    alert("Sorry! Datanya ga bisa di hapus.");
                }
            });
        }
    }
</script>

@yield('js')

@endsection

