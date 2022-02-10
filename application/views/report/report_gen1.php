<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reports</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php
    date_default_timezone_set("Asia/Colombo");
    // Return current date from the remote server
    $date = date('d-m-y h:i:s');

    ?>

    <?php if (isset($_POST['credit_date_st']) && isset($_POST['credit_date_en'])) {
        $select_st_date = $_POST['credit_date_st'];
        $select_en_date = $_POST['credit_date_en'];
    } else {
        $select_en_date = $date;
        $select_st_date = $date;
    }

    // echo $select_st_date;
    // echo $select_en_date;

    ?>

    <?php ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">




                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example540" class="table scroll-thead table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Given Date</th>
                                <th>Given Employee Name </th>

                                <th>Invoice No</th>
                                <th>Shop Name</th>
                                <th>Collect Date</th>

                                <th>Collect Employee Name</th>

                                <th>Collected Credit (Rs)</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0;
                            $total1 = 0;
                            $total2 = 0;
                            $get_filter_data = $this->session->flashdata('filtrerddata');
                            if (isset($get_filter_data)) {
                                foreach ($get_filter_data as $row) {

                            ?>
                                    <tr>

                                        <td> <?php echo $i + 1; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['credit_given_date']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['emp_name_givent']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['credit_invoice']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['credit_shop']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['credit_date']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['emp_name_collect']; ?></td>



                                        <td align="right"> <?php
                                                            if ($get_filter_data[$i]['isFromCredit'] == "2") {
                                                                echo number_format($get_filter_data[$i]['credit_amount'], 2);
                                                                $total2 = $total2 + $get_filter_data[$i]['credit_amount'];
                                                            }; ?>
                                        </td>

                                    </tr>
                            <?php
                                    $i++;
                                }
                            }
                            ?>


                            <tr>

                                <td> <?php echo $i + 1 ?></td>
                                <td>
                                    <h3><b>Total</b> </h3>
                                </td>
                                <td> </td>
                                <td></td>
                                <td> </td>
                                <td> </td>
                                <td> </td>

                                <td align="right">
                                    <h3><b><?php
                                            if (isset($get_filter_data)) {
                                                if ($total2) {
                                                    echo number_format($total2, 2);
                                                }
                                            }
                                            ?></b></h3>
                                </td>

                            </tr>











                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Given Date</th>
                                <th>Given Employee Name </th>

                                <th>Invoice No</th>
                                <th>Shop Name</th>
                                <th>Collect Date</th>

                                <th>Collect Employee Name</th>

                                <th>Collected Credit (Rs)</th>


                            </tr>
                        </tfoot>
                    </table>


                </div>

            </div>



            <div class="modal-body" id="bottomsec">

                <div class="modal-footer">

                </div>


            </div>



        </div>
</div>

</div>

</section>

</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>