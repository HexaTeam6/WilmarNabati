<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
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
                            <i class="icon-dashboard2"></i>
                            Dashboard
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="form" class="needs-validation" novalidate>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2 || $_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="tanggal" class="col-form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required>
                                <div class="invalid-feedback">
                                    Harus di isi.
                                </div>
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2 || $_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="id_produk" class="control-label">Produk</label>
                                <select class="selectpicker form-control required"
                                        name="id_produk" id="id_produk" required>
                                    <?php foreach ($produk as $row): ?>
                                        <option value="<?= $row->id_produk ?>"><?= $row->nama_produk ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="id_satuan" class="control-label">Satuan</label>
                                <select class="selectpicker form-control"
                                        name="id_satuan" id="id_satuan">
                                    <?php foreach ($satuan as $row): ?>
                                        <option value="<?= $row->id_satuan ?>"><?= $row->nama_satuan ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 2) ? '' : 'd-none'?>">
                                <label for="stock" class="col-form-label">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="line" class="col-form-label">Line</label>
                                <input type="text" class="form-control" name="line" id="line" placeholder="Line">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="target_produksi" class="col-form-label">Target Produksi</label>
                                <input type="text" class="form-control" name="target_produksi" id="target_produksi" placeholder="Target Produksi">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="t_shift1" class="col-form-label">Target Produksi Shift 1</label>
                                <input type="text" class="form-control" name="t_shift1" id="t_shift1" placeholder="Target Produksi Shift 1">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="t_shift2" class="col-form-label">Target Produksi Shift 2</label>
                                <input type="text" class="form-control" name="t_shift2" id="t_shift2" placeholder="Target Produksi Shift 2">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 4) ? '' : 'd-none'?>">
                                <label for="t_shift3" class="col-form-label">Target Produksi Shift 3</label>
                                <input type="text" class="form-control" name="t_shift3" id="t_shift3" placeholder="Target Produksi Shift 3">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 1) ? '' : 'd-none'?>">
                                <label for="total_produksi" class="col-form-label">Total Produksi</label>
                                <input type="text" class="form-control" name="total_produksi" id="total_produksi" placeholder="Total Produksi">
                            </div>
<!--                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 3) ? '' : 'd-none'?>">-->
<!--                                <label for="total_reject" class="col-form-label">Total Reject</label>-->
<!--                                <input type="text" class="form-control" name="total_reject" id="total_reject" placeholder="Total Reject">-->
<!--                            </div>-->
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 3) ? '' : 'd-none'?>">
                                <label for="r_shift1" class="col-form-label">Reject Shift 1</label>
                                <input type="text" class="form-control" name="r_shift1" id="r_shift1" placeholder="Reject Shift 1">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 3) ? '' : 'd-none'?>">
                                <label for="r_shift2" class="col-form-label">Reject Shift 2</label>
                                <input type="text" class="form-control" name="r_shift2" id="r_shift2" placeholder="Reject Shift 2">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 3) ? '' : 'd-none'?>">
                                <label for="r_shift3" class="col-form-label">Reject Shift 3</label>
                                <input type="text" class="form-control" name="r_shift3" id="r_shift3" placeholder="Reject Shift 3">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 1) ? '' : 'd-none'?>">
                                <label for="received" class="col-form-label">Received</label>
                                <input type="text" class="form-control" name="received" id="received" placeholder="Received">
                            </div>
                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 2) ? '' : 'd-none'?>">
                                <label for="outgoing" class="col-form-label">Outgoing</label>
                                <input type="text" class="form-control" name="outgoing" id="outgoing" placeholder="Outgoing">
                            </div>
<!--                            <div class="form-group <?php echo ($_SESSION['kode_akses'] == 2) ? '' : 'd-none'?>">-->
<!--                                <label for="end_stock" class="col-form-label">End Stock</label>-->
<!--                                <input type="text" class="form-control" name="end_stock" id="end_stock" placeholder="End Stock">-->
<!--                            </div>-->
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_plan" name="id_plan">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label"><b>Target Produksi Shift 1 : </b></label>
                            <label class="col-form-label" id="t_shift1_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Target Produksi Shift 2 : </b></label>
                            <label class="col-form-label" id="t_shift2_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Target Produksi Shift 3 : </b></label>
                            <label class="col-form-label" id="t_shift3_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Total Produksi : </b></label>
                            <label class="col-form-label" id="total_produksi_label"></label>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-form-label"><b>Reject Shift 1 : </b></label>
                            <label class="col-form-label" id="r_shift1_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Reject Shift 2 : </b></label>
                            <label class="col-form-label" id="r_shift2_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Reject Shift 3 : </b></label>
                            <label class="col-form-label" id="r_shift3_label"></label>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><b>Total Reject : </b></label>
                            <label class="col-form-label" id="total_reject_label"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid relative animatedParent animateOnce">
            <div class="card my-3 no-b">
                <div class="card-body">
                    <div class="col-sm-12"style="margin-bottom: 15px">
                        <div class="row col-md-12" style="margin-bottom: 15px;">
                            <label for="datepicker_from" class="col-form-label">Dari : </label>
                            <input type="text" class="form-control col-md-4" id="datepicker_from">
                            <label for="datepicker_to" class="col-form-label offset-1">Sampai : </label>
                            <input type="text" class="form-control col-md-4" id="datepicker_to">
                        </div>
                        <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2 || $_SESSION['kode_akses'] == 4) {?>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="btnAdd">
                            <i class="icon-add"></i>
                            Tambah data
                        </button>
                        <?php }?>
                    </div>
                    <table class="table table-bordered table-hover data-tables"
                           data-options='{"searching":true}' id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>Produk</th>
                            <th>Satuan</th>
                            <th>Stock</th>
                            <th>Line</th>
                            <th>Target Produksi</th>
<!--                            <th>Shift 1</th>-->
<!--                            <th>Shift 2</th>-->
<!--                            <th>Shift 3</th>-->
                            <th>Total Produksi</th>
                            <th>Total Reject</th>
<!--                            <th>Shift 1</th>-->
<!--                            <th>Shift 2</th>-->
<!--                            <th>Shift 3</th>-->
                            <th>Received</th>
                            <th>Outgoing</th>
                            <th>End Stock</th>
                            <th>Last Update</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $row):
                            ?>
                            <tr>
                                <input type="hidden" id="id_plan" value="<?= $row->id_plan; ?>">
                                <input type="hidden" id="id_produk" value="<?= $row->id_produk; ?>">
                                <input type="hidden" id="id_satuan" value="<?= $row->id_satuan; ?>">
                                <td><?= $no; ?></td>
                                <td class="tanggal"><?= date("Y-m-d", strtotime($row->tanggal)); ?></td>
                                <td class="nama_jenis"><span class="badge badge-secondary"><?= $row->nama_jenis; ?></span></td>
                                <td class="nama_produk"><span class="badge badge-warning"><?= $row->nama_produk; ?></span></td>
                                <td class="nama_satuan"><?= $row->nama_satuan; ?></td>
                                <td class="stock"><?= $row->stock; ?></td>
                                <td class="line"><?= $row->line; ?></td>
                                <td class="target_produksi"><?= $row->target_produksi; ?></td>
                                <input type="hidden" id="t_shift1" value="<?= $row->t_shift1; ?>">
                                <input type="hidden" id="t_shift2" value="<?= $row->t_shift2; ?>">
                                <input type="hidden" id="t_shift3" value="<?= $row->t_shift3; ?>">
                                <td class="total_produksi"><?= $row->total_produksi; ?></td>
                                <td class="total_reject"><?= $row->total_reject; ?></td>
                                <input type="hidden" id="r_shift1" value="<?= $row->r_shift1; ?>">
                                <input type="hidden" id="r_shift2" value="<?= $row->r_shift2; ?>">
                                <input type="hidden" id="r_shift3" value="<?= $row->r_shift3; ?>">
                                <td class="received"><?= $row->received; ?></td>
                                <td class="outgoing"><?= $row->outgoing; ?></td>
                                <td class="end_stock"><?= $row->end_stock; ?></td>
                                <td class="update_at"><?= $row->updated_at.' ('.$row->nama.')'; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" id="btnInfo" data-toggle="modal" data-target="#infoModal">
                                        <i class="icon-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <?php if ($_SESSION['kode_akses'] == 0 || $_SESSION['kode_akses'] == 1 || $_SESSION['kode_akses'] == 2){?>
                                    <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                        <i class="icon-trash"></i>
                                    </button>
                                    <?php }?>
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


        var oTable = $('#datatable').DataTable();

        $("#datepicker_from").datetimepicker({
            format:'Y/m/d',
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#datepicker_to').val()?jQuery('#datepicker_to').val():false
                })
            },
            timepicker:false
        }).change(function() {
            minDateFilter = new Date(this.value).getTime();
            oTable.draw();
        });

        $("#datepicker_to").datetimepicker({
            format:'Y/m/d',
            onShow:function( ct ){
                this.setOptions({
                    minDate:jQuery('#datepicker_from').val()?jQuery('#datepicker_from').val():false
                })
            },
            timepicker:false
        }).change(function() {
            maxDateFilter = new Date(this.value).getTime();
            oTable.draw();
        });


        // Date range filter
        minDateFilter = "";
        maxDateFilter = "";

        $.fn.dataTableExt.afnFiltering.push(
            function(oSettings, aData, iDataIndex) {
                if (typeof aData._date == 'undefined') {
                    aData._date = new Date(aData[1]).getTime();
                }

                if (minDateFilter && !isNaN(minDateFilter)) {
                    if (aData._date < minDateFilter) {
                        return false;
                    }
                }

                if (maxDateFilter && !isNaN(maxDateFilter)) {
                    if (aData._date > maxDateFilter) {
                        return false;
                    }
                }

                return true;
            }
        );


        $("#stock").inputmask("9{1,11}");
        $("#line").inputmask("9{1,11}");
        $("#target_produksi").inputmask("9{1,11}");
        $("#t_shift1").inputmask("9{1,11}");
        $("#t_shift2").inputmask("9{1,11}");
        $("#t_shift3").inputmask("9{1,11}");
        $("#total_produksi").inputmask("9{1,11}");
//        $("#total_reject").inputmask("9{1,11}");
        $("#r_shift1").inputmask("9{1,11}");
        $("#r_shift2").inputmask("9{1,11}");
        $("#r_shift3").inputmask("9{1,11}");
        $("#received").inputmask("9{1,11}");
        $("#outgoing").inputmask("9{1,11}");
//        $("#end_stock").inputmask("9{1,11}");

        $('#btnAdd').click(function () {
            $('#form').attr('action', "<?php echo site_url('/Home/insert')?>");
            $("#id_plan").val('');
            $("#tanggal").val('');
            $("#id_produk").val('');
            $("#id_satuan").val('');
            $("#stock").val('');
            $("#line").val('');
            $("#target_produksi").val('');
            $("#t_shift1").val('');
            $("#t_shift2").val('');
            $("#t_shift3").val('');
            $("#total_produksi").val('');
//            $("#total_reject").val('');
            $("#r_shift1").val('');
            $("#r_shift2").val('');
            $("#r_shift3").val('');
            $("#received").val('');
            $("#outgoing").val('');
//            $("#end_stock").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Home/update')?>");
            var $item = $(this).closest("tr");

            $('#id_plan').val($item.find("input[id$='id_plan']:hidden:first").val());
//            console.log($.trim($item.find(".tanggal").text()));
            $("#tanggal").val($.trim($item.find(".tanggal").text()));
            $('#id_produk').val($item.find("input[id$='id_produk']:hidden:first").val());
            $("#id_satuan").val($item.find("input[id$='id_satuan']:hidden:first").val());
            $("#stock").val($.trim($item.find(".stock").text()));
            $("#line").val($.trim($item.find(".line").text()));
            $("#target_produksi").val($.trim($item.find(".target_produksi").text()));
            $("#t_shift1").val($item.find("input[id$='t_shift1']:hidden:first").val());
            $("#t_shift2").val($item.find("input[id$='t_shift2']:hidden:first").val());
            $("#t_shift3").val($item.find("input[id$='t_shift3']:hidden:first").val());
            $("#total_produksi").val($.trim($item.find(".total_produksi").text()));
//            $("#total_reject").val('');
            $("#r_shift1").val($item.find("input[id$='r_shift1']:hidden:first").val());
            $("#r_shift2").val($item.find("input[id$='r_shift2']:hidden:first").val());
            $("#r_shift3").val($item.find("input[id$='r_shift3']:hidden:first").val());
            $("#received").val($.trim($item.find(".received").text()));
            $("#outgoing").val($.trim($item.find(".outgoing").text()));
//            $("#end_stock").val('');
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnInfo]', function() {
            $('#form').attr('action', "<?php echo site_url('/Home/update')?>");
            var $item = $(this).closest("tr");
            $("#t_shift1_label").text($item.find("input[id$='t_shift1']:hidden:first").val());
            $("#t_shift2_label").text($item.find("input[id$='t_shift2']:hidden:first").val());
            $("#t_shift3_label").text($item.find("input[id$='t_shift3']:hidden:first").val());
            $("#total_produksi_label").text($.trim($item.find(".total_produksi").text()));
            $("#r_shift1_label").text($item.find("input[id$='r_shift1']:hidden:first").val());
            $("#r_shift2_label").text($item.find("input[id$='r_shift2']:hidden:first").val());
            $("#r_shift3_label").text($item.find("input[id$='r_shift3']:hidden:first").val());
            $("#total_reject_label").text($.trim($item.find(".total_reject").text()));
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var nama = $.trim($item.find(".nama_produk").text());
            var tanggal = $.trim($item.find(".tanggal").text());
            var id_plan = $.trim($item.find("input[id$='id_plan']:hidden:first").val());

            swal({
                    title: "Apakah yakin akan dihapus?",
                    text: "Data dengan produk " + nama + " pada tanggal "+ tanggal +" akan dihapus",
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
                            url: "<?php echo site_url("/Home/delete/");?>" + id_plan,
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