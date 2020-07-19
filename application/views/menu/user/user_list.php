<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Users</title>
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
                            <i class="icon-user"></i>
                            Data Users
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
                                <label for="kode_akses" class="control-label">Akses</label>
                                <select class="selectpicker form-control required"
                                        name="kode_akses" id="kode_akses" required>
                                    <option value="1">PLANT</option>
                                    <option value="2">WH</option>
                                    <option value="3">QC</option>
                                    <option value="4">PPIC</option>
                                </select>
                            </div>
                            <div class="form-group" id="formGroupUsername">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                <small id="msg_username" class="d-none text-red">Username sudah digunakan</small>
                                <div class="invalid-feedback">
                                    Harus di isi.
                                </div>
                            </div>
                            <div id="passwordGroup">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    <div class="invalid-feedback">
                                        Harus di isi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="id_login" name="id_login">
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
                            <th>Akses</th>
                            <th>Username</th>
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
                                <input type="hidden" id="id_login" value="<?= $row->id; ?>">
                                <input type="hidden" id="kode_akses" value="<?= $row->kode_akses; ?>">
                                <td><?= $no; ?></td>
                                <td class="akses"><span class="badge badge-primary">
                                        <?php

                                        if ($row->kode_akses == 1) echo 'PLAN';
                                        else if ($row->kode_akses == 2) echo 'WH';
                                        else if ($row->kode_akses == 3) echo 'QC';
                                        else if ($row->kode_akses == 4) echo 'PPIC';

                                        ?></span></td>
                                <td class="username"><span class="badge badge-secondary"><?= $row->username; ?></span></td>
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


        $('#username').blur(function () {
            var username = $('#username').val();
            console.log(username);
            if (!username==""){
                $.ajax({
                    url: "<?php echo site_url("/Auth/checkUserInfo/");?>" + username,
                    success: function (result) {
                        console.log(result);
                        if (result == "true"){
//                            console.log("200 OK");
                            $('#username').val('');
                            $('#msg_username').removeClass('d-none');
                        }else {
                            $('#msg_username').addClass('d-none');
                        }
                    }
                });
            }else {
                $('#msg_username').addClass('d-none');
            }
        });

        $('#btnAdd').click(function () {
            $('#form').attr('action', "<?php echo site_url('/Users/insert')?>");
            $("#username").val('');
            $("#password").val('');
//            $("#repassword").val('');
            $("#id_login").val('');
            $("#kode_akses").val('');
            $("#passwordGroup").removeClass('d-none');
            $("#formGroupUsername").removeClass('d-none');
            $("#password").prop('required', true);
            $("#rePassword").prop('required', true);
            $("#username").prop('required', true);
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Users/update')?>");
            var $item = $(this).closest("tr");
            $('#id_login').val($item.find("input[id$='id_login']:hidden:first").val());
            $('#kode_akses').val($item.find("input[id$='kode_akses']:hidden:first").val());
            $("#username").val($.trim($item.find(".username").text()));
            $("#passwordGroup").addClass('d-none');
            $("#formGroupUsername").addClass('d-none');
            $("#password").prop('required', false);
            $("#username").prop('required', false);
//            $("#rePassword").prop('required', false);
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var akses = $.trim($item.find(".akses").text());
            var username = $.trim($item.find(".username").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data User dengan akses " + akses + " akan dihapus",
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
                        url: "<?php echo site_url("/Users/delete/");?>" + username,
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