
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Travel Add</h3>
            </div>
            <div class="card-body">
                <div class="form">
                    <form action="" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Starting Place</label>
                                    <input type="text" class="form-control" name="startPlace" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Destination</label>
                                    <select name="destination" id="" class="form-control select2">
                                        <?php foreach ($use->getDestinantion() as $destination ): ?>
                                            <option value="<?=$destination['id_destination']?>"><?=$destination['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Bus</label>
                                    <select name="bus" id="" class="form-control select2">
                                        <?php foreach ($use->getBus() as $bus ): ?>
                                            <option value="<?=$bus['id_bus']?>"><?=$bus['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" class="form-control" name="date" required placeholder="dd/mm/yyyy">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control select2">
                                        <option value="1">Active</option>
                                        <option value="0">Non active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control" name="price" required>
                                </div>
                            </div>
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
    $use->storeTravel($_POST['startPlace'],$_POST['destination'],$_POST['bus'],$_POST['date'],$_POST['status'],$_POST['price']);
    echo "<script>location='./?page=travel'</script>";
}
?>