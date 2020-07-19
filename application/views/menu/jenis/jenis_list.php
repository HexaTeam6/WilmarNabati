<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Jenis</title>
    <!-- CSS -->
    <?php $this->load->view('partials/_css'); ?>
</head>
<body class="light">
<!-- Pre loader -->
<?php $this->load->view('partials/_preloader'); ?>
<div id="app">
    <?php $this->load->view('partials/_sidebar'); ?>
    <!--Sidebar End-->
    <?php $this->load->view('partials/_header'); ?>
    <div class="page has-sidebar-left height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4>
                            <i class="icon-document-checked"></i>
                            Data Jenis
                        </h4>
                    </div>
                </div>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="nama_jenis" class="col-form-label">Nama Jenis</label>
                                <input type="text" class="form-control" name="nama_jenis" id="nama_jenis" placeholder="Nama Jenis" required>
                                <div class="invalid-feedback">
                                    Harus di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-form-label">Keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_jenis" name="id_jenis">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                            <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid relative animatedParent animateOnce">
            <div class="card my-3 no-b">
                <div class="card-body">
                    <div class="col-sm-12"style="margin-bottom: 15px">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="btnAdd">
                            <i class="icon-add"></i>
                            Tambah data
                        </button>
                    </div>
                    <table class="table table-bordered table-hover data-tables"
                           data-options='{"searching":true}' id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenis</th>
                            <th>Keterangan</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row):
                        ?>
                            <tr>
                                <input type="hidden" id="id_jenis" value="<?= $row->id_jenis; ?>">
                                <td><?= $no; ?></td>
                                <td class="nama_jenis"><span class="badge badge-secondary"><?= $row->nama_jenis; ?></span></td>
                                <td class="keterangan"><?= $row->keterangan; ?></td>
                                <td class="update_at"><?= $row->updated_at; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                        <i class="icon-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        $no+=1;
                        endforeach
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/#app -->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(document).ready(function() {

        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });


        $('#btnAdd').click(function () {
            $('#form').attr('action', "<?php echo site_url('/Jenis/insert')?>");
            $("#id_jenis").val('');
            $("#nama_jenis").val('');
            $("#keterangan").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Jenis/update')?>");
            var $item = $(this).closest("tr");
            $('#id_jenis').val($item.find("input[id$='id_jenis']:hidden:first").val());
            $("#nama_jenis").val($.trim($item.find(".nama_jenis").text()));
            $("#keterangan").text($.trim($item.find(".keterangan").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var nama = $.trim($item.find(".nama_jenis").text());
            var id_jenis = $.trim($item.find("input[id$='id_jenis']:hidden:first").val());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Jenis dengan nama " + nama + " akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#26C6DA",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url("/Jenis/delete/");?>" + id_jenis,
                        success: function (result) {
                            window.location.href = result;
                        }
                    });
                } else {
                    swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                }
            });
        });
    });
</script>
</body>
</html>