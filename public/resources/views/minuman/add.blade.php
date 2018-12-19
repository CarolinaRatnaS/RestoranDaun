<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" class="form-horizontal" data-toggle="validator" method="post">
                {{ csrf_field() }} {{ method_field('POST') }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="harga_awal" name="harga_awal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Jumlah</label>
                                <div class="col-md-9">
                                    <div class="form-action">
                                        <input id="jumlah" type="text" class="form-control" name="jumlah" autofocus required>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Harga</label>
                                <div class="col-md-9">
                                    <div class="form-action">
                                        <input id="harga" type="text" class="form-control" name="harga" autofocus required readonly="true">
                                        <span class="help-block with-errors"></span>
                                    </div>
                                </div>
                            </div>
                        
                    </div> 
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primay btn-save"><i class="fa fa-floopy-o"></i> Pesan </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancel </button>
                </div>
                    </form>
            </form>
        </div>
    </div>
</div>