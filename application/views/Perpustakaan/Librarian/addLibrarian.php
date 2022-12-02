<div class="card my-4">
    <div class="card-header">
        <h4>Tambah Data Product</h4>
    </div>
    <form action="<?= base_url(); ?>Librarian/Librarian/addLibrarian" method="POST" enctype="multipart/form-data">
        <?php
        if (validation_errors() != false) {
        ?>
            <div class="alert alert-danger m-4" role="alert">
                <?php echo validation_errors(); ?>
            </div>
        <?php
        }
        ?>
        <div class="card-body">
            <div class="form-group">
                <label for="">USERNAME</label>
                <input name="username" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">NAME</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">EMAIL</label>
                <input name="email" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">PASSWORD</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">AVATAR</label>
                <input name="avatar" type="file" class="form-control">
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="<?= base_url('Librarian/') ?>" class="btn btn-secondary">Batal</a>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

    </form>
</div>