<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Add Product
          </h1>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="#">Home</a></li><li class="breadcrumb-item active">DataTables</li></ol> -->
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <?php
  date_default_timezone_set("Asia/Colombo");
  // Return current date from the remote server
  $date = date('d-m-y h:i:s');

  ?>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card-header -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Add Product
              </h3>
              <div align="right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                  Add New Product
                </button>

              </div>
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="<?php echo base_url('portal/services/add_product'); ?>">
                      <div class="modal-body">


                        <div class="row">

                          <div class="form-group">
                            <label for="user_eno">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                          </div>


                          <div class="form-group">
                            <label for="user_eno">Product Category</label>
                            <select id="product_cat" name="product_cat"  class="form-control select2" style="width: 100%;">
                              <option  selected disabled>Select Choice</option>
                              <?php $i = 0;

                              foreach ($get_product_cat as $get_product_cats) { ?>
                                <option value=" <?php echo $get_product_cats->product_cat_id; ?>"> <?php echo $get_product_cats->product_cat_name; ?></option>
                              <?php
                              }

                              ?>


                            </select>
                          </div>

                          <div class="form-group">
                            <label for="user_tpno">Product Description</label>
                            <textarea type="textarea" row="5" class="form-control" id="product_desc" name="product_desc" rows="3" placeholder="Description"> </textarea>
                          </div>

                          <input type="hidden" class="form-control" id="product_date" value="<?php echo $date; ?>" name="product_date" placeholder="Seat Type">
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="product_add" id="product_add" value="<?php echo $date ?>;" class="btn btn-primary">Save changes</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>
                      #
                    </th>
                    <th>
                      Product Name
                    </th>
                    <th>
                      Categories
                    </th>
                    <th>
                      Description
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 0;

                  foreach ($get_product as $get_products) { ?>
                    <tr>
                      <td><?php echo $i + 1 ?></td>
                      <td> <?php echo  $get_products->product_name; ?></td>
                      <td> <?php echo  $get_products->product_cat; ?></td>
                      <td> <?php echo  $get_products->product_desc; ?></td>
                      <td> <?php echo  $get_products->product_date; ?></td>




                      <td align="center">
                        <form method="post" action="<?php echo base_url('portal/services/delete_product'); ?>">

                          <input type="hidden" value=" <?php echo  $get_products->product_id; ?>" id="product_id" name="product_id">
                          <button class="btn btn btn-danger " id="product_delete" name="product_delete">

                            Delete
                          </button>
                        </form>
                      </td>
                    </tr>


                  <?php $i++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>