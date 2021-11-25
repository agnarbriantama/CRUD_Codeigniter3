<div class="container">
	<h1 class="text-center"> Edit Data </h1>
	<form method="post" action="<?= base_url('home/edit_data/'.$item->id_mahasiswa) ?>" enctype="multipart/form-data" autocomplete="off">

		<div class="form-group">
			<label>Nama Mahasiswa</label>
			<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa" value="<?= $item->nama_mahasiswa ?>">
		</div>
		<div class="form-group">
			<label>NIM</label>
			<input type="text" name="nim" class="form-control" placeholder=" NIM" value="<?= $item->nim ?>" >
		</div>
		<div class="form-group">
			<label>Prodi</label><br>
		 <select name="prodi" class="form-control"  >
		 	<option selected="true" disabled="disabled"><?= $item->prodi ?></option>
          <option value="Teknik Informatika">Teknik Informatika</option>
          <option value="Akuntansi">Akuntansi</option>
          <option value="THP">Teknologi Hasil Pertanian</option>
        </select>
    </div>
		<div class="form-group">
			<label>E-mail</label>
			<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $item->email ?>"  >
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?= $item->password ?>"> 
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" class="form-control" value="<?= $item->tanggal_lahir ?>" >
		</div>
		<div class="form-group" required="">
			<label>Jenis Kelamin</label><br>
			<input type="radio" name="jenis_kelamin"  value="Laki-Laki" required>Laki-Laki &emsp;
        	<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
		</div>
		<div class="form-group">
			<label>Foto</label>
			<input type="file" name="gambar" class="form-control"  required="">
		</div>
		<div class="form-group">
			<label>Catatan</label>
			<textarea id="deskripsi" name="deskripsi"><?= $item->deskripsi ?></textarea><br>
			<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
			<script >
				CKEDITOR.replace('deskripsi');
			</script>
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
		
	</form>
</div>