
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Destination Add</h3>
            </div>
            <div class="card-body">
                <div class="form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <button class="btn btn-success" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])){
    $use->storeDestination($_POST['name'],$_POST['address'],$_FILES['image']);
    echo "<script>location='./?page=destination'</script>";
}
?>