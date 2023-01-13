<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Lists</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <h3>Vendor Lists</h3>
    <button type="button" class="btn btn-success mb-2 btn-add"  data-toggle="modal" data-target="#addModal">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th> SNO </th>
                    <th> Name</th>
                    <th> GST</th>
                    <th> Address </th>
                    <th> Phone </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($vendor as $row):?>
                <tr>
                    <td><?= $row->name;?></td>
                    <td><?= $row->gst;?></td>
                    <td><?= $row->address;?></td>
                    <td><?= $row->phone;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 
    </div>
     
    <!-- Modal Add Vendor-->
    <form action="/vendor/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Vendor Name">
                </div>
                 
                <div class="form-group">
                    <label>GST</label>
                    <input type="text" class="form-control" name="gst" placeholder="GST">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Vendor-->
 
    <!-- Modal Edit Vendor-->
    <form action="/vendor/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control vendor_name" name="name" placeholder="Vendor Name">
                </div>

                <div class="form-group">
                    <label>GST</label>
                    <input type="text" class="form-control gst" name="gst" placeholder="GST">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control address" name="address" placeholder="Address">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control phone" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Vendor-->
 
    <!-- Modal Delete Vendor-->
    <form action="/vendor/" method="delete" class="deleteForm">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this vendor?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="vendorID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Vendor-->
 
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){

        $('.btn-add').on('click',function(){
            $('#addModal').modal('show');
        });

        // get Edit Vendor
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = $(this).data('price');
            const category = $(this).data('category_id');
            // Set data to Form Edit
            $('.product_id').val(id);
            $('.product_name').val(name);
            $('.product_price').val(price);
            $('.product_category').val(category).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Vendor
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            var action = $('.deleteForm').attr('action');
            action += id;
            $('.vendorID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
</body>
</html>