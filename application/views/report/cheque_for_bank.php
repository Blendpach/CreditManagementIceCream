<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cheque Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cheque Payment</li>
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
                                <!-- <th>Given Date</th>
                                <th>Given Employee Name </th> -->
                                <th>Cheque Statues</th>
                                <th>Invoice No</th>
                                <th>Shop Name</th>
                                <th>Collect Date</th>

                                <th>Collect Employee Name</th>
                                <th>Cheque Date</th>
                                <th>Collected Credit (Rs)</th>
                                <?php if (isset($_SESSION['admin'])) { ?> <th>Action</th> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0;
                            $total2 = 0;
                            $get_filter_data = $this->session->userdata('cheque_list');
                            if (isset($get_filter_data)) {
                                foreach ($get_filter_data as $row) {
                                    if($get_filter_data[$i]['cheque_payments_statues'] == 1){

                            ?>
                                    <tr>

                                        <td> <?php echo $i + 1; ?></td>
                                        <!-- <td> <?php echo $get_filter_data[$i]['cheque_payments_credit_given_date']; ?></td>
                                    <td> <?php echo $get_filter_data[$i]['cheque_payments_emp_name_givent']; ?></td> -->
                                        <td> <?php if ($get_filter_data[$i]['cheque_payments_statues'] == 0) { ?>
                                                <span class="badge badge-success">Complete</span> <?php } else { ?>
                                                <span class="badge badge-warning">Pending</span> <?php } ?>

                                        </td>
                                        <td> <?php echo $get_filter_data[$i]['cheque_payments_credit_invoice']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['cheque_payments_credit_shop']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['cheque_payments_credit_date']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['cheque_payments_emp_name_collect']; ?></td>
                                        <td> <?php echo $get_filter_data[$i]['cheque_payments_due_date']; ?></td>


                                        <td align="right"> <?php
                                                            if ($get_filter_data[$i]['cheque_payments_isFromCredit'] == "2") {
                                                                echo number_format($get_filter_data[$i]['cheque_payments_credit_amount'], 2);
                                                                $total2 = $total2 + $get_filter_data[$i]['cheque_payments_credit_amount'];
                                                            }; ?>
                                        </td>
                                        <?php if (isset($_SESSION['admin'])) { ?> <td>
                                                <div class="col">

                                                    <form id="myFrom" method="post" action="<?php echo base_url('portal/report/change_cheque'); ?>">

                                                        <input type="hidden" value=" <?php echo $get_filter_data[$i]['cheque_payments_id']; ?>" id="cheque_id" name="cheque_id">
                                                        <input type="hidden" value=" <?php echo $get_filter_data[$i]['cheque_payments_statues']; ?>" id="cheque_status" name="cheque_status">
                                                        <!-- <button type="submit" name="delete_cp_id" id="delete_cp_id" class="btn btn btn-danger ">
                                                            Delete
                                                        </button> -->

                                                        <!-- <a href="#myModal" class="btn btn btn-secondary " data-toggle="modal">
                                                            Change
                                                        </a> -->
                                                        <button  class="btn btn btn-secondary " type="submit">Change </button>
                                                    </form>

                                                </div>
                                            </td><?php } ?>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            }
                            }

                            ?>


                            <tr>

                                <td> <?php echo $i + 1 ?></td>
                                <td>
                                    <h3><b>Total</b> </h3>
                                </td>
                                <!-- <td> </td>
                                <td></td> -->
                                <td> </td>
                                <td> </td>
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
                                <?php if (isset($_SESSION['admin'])) { ?> <th></th> <?php } ?>
                            </tr>











                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <!-- <th>Given Date</th>
                                <th>Given Employee Name </th> -->
                                <th>Cheque Statues</th>
                                <th>Invoice No</th>
                                <th>Shop Name</th>
                                <th>Collect Date</th>

                                <th>Collect Employee Name</th>
                                <th>Cheque Date</th>
                                <th>Collected Credit (Rs)</th>
                                <?php if (isset($_SESSION['admin'])) { ?> <th>Action</th> <?php } ?>
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
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to change these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Process</button>
            </div>
        </div>
    </div>
</div>



<script>
    $('#confirmDelete').click(function() {
        $('#myFrom').submit();
    });
</script>