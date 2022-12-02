<div class="card mt-4">
    <div class="card-header">
        <h4>Table Data Product</h4>
    </div>
    <div class="card-body m-0 table">
        <div class="text-right mb-2"><a class="btn btn-primary" href="<?= base_url('Librarian/Librarian/addDirect') ?>">Tambah</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="100">AVATAR</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>CREATED AT</th>
                    <th width="150">Option</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($lib as $key => $lib) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td class="avatar">
                            <img src="<?= base_url("assets/imgAvatar/$lib->avatar");?>" alt="">
                        </td>
                        <td><?= $lib->username ?></td>
                        <td><?= $lib->email ?></td>
                        <td><?= $lib->created_at ?></td>
                        <td class="d-flex">
                            <a href="<?= base_url("Librarian/Librarian/editDirect/$lib->id") ?>" class="btn btn-sm btn-info">Edit</a>
                            <form action="<?= base_url("Librarian/Librarian/deleteData/$lib->id") ?>" onsubmit="return confirm('Apakah anda yakin?')" method="post" enctype="multipart/form-data">
                                <button type="submit" class="btn ml-2 btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>