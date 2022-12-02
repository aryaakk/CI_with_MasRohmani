<div class="card my-4">
    <div class="card-header">
        <h4>Tambah Data Product</h4>
    </div>
    <form action="<?= base_url(); ?>Librarian/Librarian/editLibrarian" method="POST" enctype="multipart/form-data">
        <div class="card-body cb">
            <div class="form-group">
                <label for="">USERNAME</label>
                <input name="id" type="hidden" class="form-control" value="<?= $lib->id ?>">
                <input name="username" type="text" class="form-control" value="<?= $lib->username ?>">
            </div>
            <div class="form-group">
                <label for="">NAME</label>
                <input name="name" type="text" class="form-control" value="<?= $lib->name ?>">
            </div>
            <div class="form-group">
                <label for="">EMAIL</label>
                <input name="email" type="email" class="form-control" value="<?= $lib->email ?>">
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input name="password" type="text" class="form-control" value="<?= $lib->password ?>">
            </div>
            <div class="form-group fg">
                <label for="">AVATAR</label>
                <div class="img">
                    <img src="<?= base_url("/assets/imgAvatar/$lib->avatar") ?>" alt="">
                    <p>ALERT : ABAIKAN JIKA TIDAK INGIN DIRUBAH</p>
                </div>
                <input name="avatar" type="file" class="form-control" value="<?= $lib->avatar ?>">
                <input name="updated" type="hidden" class="form-control" value="<?= $date ?>">
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?= base_url('Librarian/') ?>" class="btn btn-secondary">Batal</a>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>