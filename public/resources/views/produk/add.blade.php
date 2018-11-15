@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop

<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" class="form-horizontal" data-toggle="validator" method="post">
                {{ csrf_field() }} {{ method_field('POST') }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Produk</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama Produk</label>
                                <div class="col-md-9">
                                    <div class="form-action">
                                        <input id="nama_produk" type="text" class="form-control" name="nama_produk" autofocus required>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="kategori" class="col-md-3 control-label"> Kategori</label> 
                                    <div class="col-md-6">
                                        <select id="kategori" type="text" class="form-control" name="kategori" required>
                                            <option value=" "> -- Pilih Kategori-- </option>
                                            <option value="makanan">Makanan</option>
                                            <option value="minuman">Minuman</option>
                                         </select>
                                            <span class="help-block with-errors"></span> 
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Stok</label>
                                <div class="col-md-9">
                                    <div class="form-action">
                                        <input id="stok" type="text" class="form-control" name="stok" autofocus required>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Harga</label>
                                <div class="col-md-9">
                                    <div class="form-action">
                                        <input id="harga" type="text" class="form-control" name="harga" autofocus required>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Gambar</label>
                                <div class="col-md-6">
                                <img src="http://placehold.it/50x50" id="showgambar" style="max-width:100px;max-height:100px;float:left;" />
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group input-large">
                                            <input id="inputgambar" type="file" name="inputgambar" class="validate" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div> 
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primay btn-save"><i class="fa fa-floopy-o"></i> Save </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancel </button>
                </div>
                    </form>
            </form>
        </div>
    </div>
</div>