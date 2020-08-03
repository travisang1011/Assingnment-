
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Bus Add</h3>
            </div>
            <div class="card-body">
                <div class="form">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Total Seat</label>
                            <input type="number" min="0" class="form-control" name="seat" required>
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
        $use->storeBus($_POST['name'],$_POST['seat']);
        echo "<script>location='./?page=bus'</script>";
    }
?>