<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Tabel_kebun</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>nama_tanaman</label>
            <input type="text" name="nama_tanaman" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>cara_menanam</label>
            <input type="text" name="cara_menanam" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>gambar_tanaman</label>
            <input type="text" name="gambar_tanaman" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>jenis_tanaman</label>
            <input type="text" name="jenis_tanaman" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>harga_bibit</label>
            <input type="text" name="harga_bibit" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_kebun" /> 
	
                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
