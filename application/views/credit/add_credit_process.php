<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Credit From CSV</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Credit From CSV</li>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <div align="right">
                        <a class="button" href="<?php echo base_url() ?>assets/data.csv" download="">
                            <button type="button" class="btn btn-info">Download Demo File</button>
                        </a>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    <form method="post" action="<?php echo base_url('portal/credit/uploadExcel'); ?>" name="upload_excel" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="row">

                                <div class="form-group">
                                    <label for="user_eno">Date</label>
                                    <input type="date" class="form-control" id="credit_date" name="credit_date" placeholder="Product Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Select Lorry</label>
                                    <select class="form-control select2 select2" data-dropdown-css-class="select2" id="emp_lorry" name="emp_lorry" style="width: 100%;" onchange="loadEmp()" required>
                                        <option disabled selected="selected">Select Lorry</option>
                                        <?php $i = 0;

                                        foreach ($get_lorry as $get_lorrys) {
                                            if ($get_lorrys->lor_active == 1) {

                                        ?>

                                                <option value="<?php echo $get_lorrys->lor_id; ?>"><?php echo $get_lorrys->lor_name; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="user_eno">Collector / Sales Rep</label>
                                    <select class="form-control select2 select2" data-dropdown-css-class="select2" id="credit_collect" name="credit_collect" style="width: 100%;" required>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="credit_cid" name="credit_cid" value="<?php echo $_SESSION['passed_user_national']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="user_eno">Upload File</label>
                                    <input type="file" class="form-control" name="file" id="file" accept=".csv" required>
                                </div>



                            </div>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <button type="submit" id="submit" name="Import" class="btn btn-primary" data-loading-text="Loading...">Save Changes</button>


                    </form>


                </div>

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


<script type="text/javascript">
    function loadEmp() {


        var emp_lorry = document.getElementById('emp_lorry').value;

        var credit_collect = document.getElementById('credit_collect');


        // console.log(emp_lorry);

        var url = '<?php echo base_url('portal/credit/retrievesEmp'); ?>';

        $.post(url, {
                emp_lorry: emp_lorry
            },
            function(data) {
                if (data != 'no') {

                    var obj = JSON.parse(data);

                    //alert(obj[0]["emp_name"]);

                    $('#credit_collect').empty();
                    var i = 0;
                    $.each(obj, function(key, value) {
                        $('#credit_collect').append('<option value="' + obj[i]["emp_id"] + '">' + (obj[i]["emp_role_id"] == 1 ? "Sales Rep" : "Collector") + " - " + obj[i]["emp_name"] + '</option>');
                        i++;
                    })

                } else if (data == 'no') {
                    console.log("NOT SAVED");
                }
            });

    }

    
</script>