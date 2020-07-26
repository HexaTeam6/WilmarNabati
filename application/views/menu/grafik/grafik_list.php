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
                            <i class="icon-line-chart"></i>
                            Grafik
                        </h4>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid relative animatedParent animateOnce">
            <div class="card no-b my-3 p-3">
                <center><h2><b>PETA KENDALI</b></h2></center>
                <div class="col-md-8 offset-2">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>

            <div class="card my-3 no-b">
                <div class="card-body">
                    <div class="col-sm-12"style="margin-bottom: 15px">
                        <form action="<?php echo site_url('/Grafik')?>" method="post">
                        <div class="row col-md-12" style="margin-bottom: 15px;">
                            <label for="datepicker_from" class="col-form-label">Dari : </label>
                            <input type="text" class="form-control col-md-4" name="tgl_dari" id="datepicker_from" required autocomplete="false" value="<?= @$_POST['tgl_dari']?>">
                            <label for="datepicker_to" class="col-form-label offset-1">Sampai : </label>
                            <input type="text" class="form-control col-md-4" name="tgl_sampai" id="datepicker_to" required autocomplete="false" value="<?= @$_POST['tgl_sampai']?>">
                        </div>
                        <div class="row col-md-4">
                            <label for="id_produk" class="control-label">Produk</label>
                            <select class="selectpicker form-control required"
                                    name="id_produk" id="id_produk" required>
                                <option value=""></option>
                                <?php foreach ($produk as $row): ?>
                                    <option value="<?= $row->id_produk ?>" <?php echo ($row->id_produk==@$_POST['id_produk'])? "selected" : "" ?> ><?= $row->nama_produk ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="Tampilkan">
                        </form>
                    </div>
                    <table class="table table-bordered table-hover data-tables"
                           data-options='{"searching":false}' id="datatable">
                        <thead>
                        <tr>
                            <th>Sample Number</th>
                            <th>Tanggal</th>
                            <th>Reject Produksi</th>
                            <th>Total Pemakaian</th>
                            <th>BKA</th>
                            <th>BKB</th>
                            <th>GT</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $tangal = [];
                        $CL = [];
                        $UCL = [];
                        $LCL = [];
                        $AVRG = [];
                        if (isset($data))
                        foreach ($data as $row):
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= date("Y-m-d", strtotime($row->tanggal)); ?></td>
                                <td><?= $row->error; ?></td>
                                <td><?= $row->size; ?></td>
                                <td><?= $row->UCL; ?></td>
                                <td><?= $row->LCL; ?></td>
                                <td><?= $row->CL; ?></td>
                            </tr>
                            <?php
                            $no+=1;
                            array_push($tangal, $row->tanggal);
                            array_push($CL, $row->CL);
                            array_push($UCL, $row->UCL);
                            array_push($LCL, $row->LCL);
                            array_push($AVRG, $row->average);
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

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($tangal)?>,
                datasets: [{
                    label: 'BKA',
                    fill: 0,
                    lineTension: 0,
                    backgroundColor: 'rgba(0,172,255, 0.1)',
                    borderWidth: 2,
                    borderColor: '#5dff83',
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0,
                    borderJoinStyle: 'miter',
                    pointRadius: 4,
                    pointBorderColor: '#5dff83',
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#5dff83',
                    pointHoverBorderWidth: 2,
                    data: <?= json_encode($UCL)?>,
                    spanGaps: !1
                },{
                    label: 'GT',
                    fill: 0,
                    lineTension: 0,
                    backgroundColor: 'rgba(163,136,227, 0.1)',
                    borderWidth: 2,
                    borderColor: '#fff35d',
                    pointRadius: 4,
                    pointBorderColor: '#fff35d',
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#fff35d',
                    pointHoverBorderWidth: 2,
                    data: <?= json_encode($CL)?>,
                    spanGaps: !1
                },{
                    label: 'BKB',
                    fill: 0,
                    lineTension: 0,
                    backgroundColor: 'rgba(163,136,227, 0.1)',
                    borderWidth: 2,
                    borderColor: '#ff4343',
                    pointRadius: 4,
                    pointBorderColor: '#ff4343',
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#ff4343',
                    pointHoverBorderWidth: 2,
                    data: <?= json_encode($LCL)?>,
                    spanGaps: !1
                },{
                    label: 'Ui',
                    fill: 0,
                    lineTension: 0,
                    backgroundColor: 'rgba(163,136,227, 0.1)',
                    borderWidth: 2,
                    borderColor: '#886CE6',
                    pointRadius: 4,
                    pointBorderColor: '#886CE6',
                    pointBackgroundColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: '#886CE6',
                    pointHoverBorderWidth: 2,
                    data: <?= json_encode($AVRG)?>,
                    spanGaps: !1
                }]
            },
            options: {
                legend: {
                    display: !0,
                    labels: {
                        fontColor: '#7F8FA4',
                        fontFamily: 'Source Sans Pro, sans-serif',
                        boxRadius: 4,
                        usePointStyle: !0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        display: !0,
                        ticks: {
                            fontSize: '11',
                            fontColor: '#969da5'
                        },
                        gridLines: {
                            color: 'rgba(0,0,0,0.0)',
                            zeroLineColor: 'rgba(0,0,0,0.0)'
                        }
                    }],
                    yAxes: [{
                        display: !0,
                        gridLines: {
                            color: 'rgba(223,226,229,0.45)',
                            zeroLineColor: 'rgba(0,0,0,0.0)'
                        },

                    }]
                }
            }
        });

        $("#datepicker_from").datetimepicker({
            format:'Y/m/d',
            onShow:function( ct ){
                this.setOptions({
                    maxDate:jQuery('#datepicker_to').val()?jQuery('#datepicker_to').val():false
                })
            },
            timepicker:false
        });

        $("#datepicker_to").datetimepicker({
            format:'Y/m/d',
            onShow:function( ct ){
                this.setOptions({
                    minDate:jQuery('#datepicker_from').val()?jQuery('#datepicker_from').val():false
                })
            },
            timepicker:false
        });
    });
</script>
</body>
</html>