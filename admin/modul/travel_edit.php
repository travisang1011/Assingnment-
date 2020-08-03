<?php $travel = $use->getTravel($_GET['id']); ?>
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
                                        <input type="text" class="form-control" name="startPlace" required value="<?=$travel['start'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Destination</label>
                                        <select name="destination" id="" class="form-control select2">
                                            <?php foreach ($use->getDestinantion() as $destination): ?>
                                                <option <?php if ($travel['destination_id'] == $destination['id_destination']) echo "selected"; ?> value="<?= $destination['id_destination'] ?>"><?= $destination['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Bus</label>
                                        <select name="bus" id="" class="form-control select2">
                                            <?php foreach ($use->getBus() as $bus): ?>
                                                <option <?php if ($travel['bus_id'] == $bus['id_bus']) echo "selected"; ?> value="<?= $bus['id_bus'] ?>"><?= $bus['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="text" class="form-control" name="date" required
                                               placeholder="dd/mm/yyyy" value="<?=$travel['date'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control select2">
                                            <option <?php if ($travel['status'] == '1') echo "selected"; ?> value="1">Active</option>
                                            <option <?php if ($travel['status'] == '0') echo "selected"; ?> value="0">Non active</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" class="form-control" name="price" required value="<?=$travel['price'] ?>">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" name="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['submit'])) {
    $use->updateTravel($_POST['startPlace'], $_POST['destination'], $_POST['bus'], $_POST['date'], $_POST['status'], $_POST['price'],$_GET['id']);
    echo "<script>location='./?page=travel'</script>";
}
?>