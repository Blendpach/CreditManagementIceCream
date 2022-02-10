<!-- Content Wrapper. Contains page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Credit Summary</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Credit Summary</li>
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

    <?php if (isset($_GET['credit_id'])) {
        $select_id = $_GET['credit_id'];
    } else {
        $select_id = 0;
    } ?>

    <?php

    $credit_amount = 0;
    $credit_shop = "";
    foreach ($get_credit as $row) {
        if ($row->credit_id == $select_id) {

            $credit_amount = $row->credit_amount;
            $credit_shop = $row->credit_shop;
        }
    }

    ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default" id="summarycard">
                <div class="card-header">
                    <h3 class="card-title">View Credit Summary</h3>

                    <input class="btn btn-primary" style="float: right;" type="button" value="Print" onclick="printDiv()">

                </div>

                <script>
                    function printDiv() {
                        var divContents = document.getElementById("summarycard").innerHTML;
                        window.print();
                    }
                </script>
                <?php $i = 1;
                $total = 0;
                foreach ($retrieveCreditDetails as $row) {
                    if ($row->cp_inv_id == $select_id) {
                        $total = $total + $row->cp_amount;
                    }
                }
                ?>

                <div class="card text-center">
                    <div class="card-header">Inovice Credit ID : <?php echo $_GET['credit_id']; ?></div>
                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info">Credit Shop : <?php echo $credit_shop; ?></li>

                            <li class="list-group-item list-group-item-danger">Credit Amount : Rs. <?php echo number_format($credit_amount, 2); ?> </li>
                            <li class="list-group-item list-group-item-warning">Collected Amount : Rs. <?php echo number_format($total, 2); ?> </li>
                            <li class="list-group-item list-group-item-success ">Remining Amount : Rs. <?php echo number_format($credit_amount - $total, 2); ?> </li>

                        </ul>

                    </div>
                </div>


                <!-- /.card-header -->
                <!-- <form method="post" action="<?php echo base_url('portal/setup/update_lorry'); ?>"> -->

                <div class="card-body">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Employee Name</th>
                                <th>Lorry Name</th>
                                <th>Collect Type</th>
                                <th> Amount (Rs)</th>
                                <?php if (isset($_SESSION['admin'])) { ?> <th>Action</th> <?php } ?>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1;
                            foreach ($retrieveCreditDetails as $row) {
                                if ($row->cp_inv_id == $select_id) {

                            ?>
                                    <tr>

                                        <td> <?php echo $i; ?></td>

                                        <td><?php echo $row->cp_date; ?></td>
                                        <td><?php echo $row->emp_name; ?></td>
                                        <td><?php echo $row->lor_name; ?></td>
                                        <td><?php if ($row->cp_type == 'cash') {
                                                echo "Cash Payment";
                                            } else if ($row->cp_type == 'check') {
                                                echo "Cheque Payment";
                                            }
                                            ?></td>
                                        <td align="right"><?php echo number_format($row->cp_amount, 2); ?></td>

                                        <?php if (isset($_SESSION['admin'])) { ?> <td>
                                                <div class="col">

                                                    <form id="myFrom" method="post" action="<?php echo base_url('portal/credit/delete_col_credit'); ?>">

                                                        <input type="hidden" value=" <?php echo $row->cp_id; ?>" id="cp_id" name="cp_id">
                                                        <!-- <button type="submit" name="delete_cp_id" id="delete_cp_id" class="btn btn btn-danger ">
                                                            Delete
                                                        </button> -->

                                                        <a href="#myModal" class="btn btn btn-danger " data-toggle="modal">
                                                        Delete
                                                         </a>

                                                    </form>

                                                </div>
                                            </td><?php } ?>
                                    </tr>
                            <?php
                                    $i++;
                                }
                            }

                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Employee Name</th>
                                <th>Lorry Name</th>
                                <th>Collect Type</th>
                                <th>CP Amount</th>
                                <?php if (isset($_SESSION['admin'])) { ?> <th>Action</th> <?php } ?>

                            </tr>
                        </tfoot>
                    </table>



                </div>

                <!-- </form> -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
</div>
<!-- /.card-body -->

</div>
<!-- /.card -->
</div>
</section>
</div>



<!-- Modal HTML -->
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
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger" id="confirmDelete" >Delete</button>
			</div>
		</div>
	</div>
</div>



<script>
  
  $('#confirmDelete').click(function(){
     $('#myFrom').submit();
    });

</script>