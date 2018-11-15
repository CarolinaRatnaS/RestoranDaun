@extends('layouts.app')

@section('menu')
<div class="panel-heading" style="text-align: center;">
    <h1>Produk</h1>
    <a onclick="addForm()" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus-cricle"></i>Tambah Produk</a>
</div>
@include('produk.add')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <table class="table table-striped table-dark">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Produk</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Gambar</th>
                    </tr>
                  </thead>
                  <tbody>
                  {{ $no = 0 }}
                  @foreach($produk as $list)
                    {{ $no++ }}
                    <tr>
                      <th scope="row">{{ $no }}</th>
                      <td>{{ $list->nama_produk}}</td>
                      <td>{{ $list->kategori}}</td>
                      <td>{{ $list->stok}}</td>
                      <td><img src="{{ asset('images/produk/' . $list->gambar) }}" width="50px" height="50px"></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    var table, save_method;
    $(function(){
        //Menyimpan data form tambah/edit beserta validasinya
        $('#modal-form form').validator().on('submit', function(e) {
            if(!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if(save_method == "add") url = "{{ route('produk.store') }}";
                else url = "produk/"+id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : new FormData($('#modal-form form')[0]),
                        contentType : false,
                        processData : false,
                    success : function(data) {
                        $('#modal-form').modal('hide');
                        url = "{{ route('produk.index') }}";
                    },
                    error : function() {
                        alert("Tidak dapat menyimpan data!");
                    }
                });
                return false;
            }
        });
        });
    //menampilkan form tambah
    function addForm(){
        save_method = "add";
        $('input[name=_method]').val("POST");
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Produk');
    }

    //menampilkan form edit dan meampilkan data pada form tersebut
    function editForm(id){
        save_method ="edit";
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url : "produk/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data){
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Produk');

                $('#id').val(data.id);
                $('#nama_department').val(data.nama_department);
            },
            error : function(){
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    //menghapus data
    function deleteData(id){
        if(confirm("Apakah yakin data akan dihapus?")){
            $.ajax({
                url : "produk/"+id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token': $('meta[name=csrf-token]').attr('content')},
                success : function(){
                    window.ajax.reload();
                },
                error : function(){
                    alert("Tidak dapat mengahpus data!");
                }
            });
        }
    }
</script>

@yield('js')

@endsection