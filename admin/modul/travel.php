<?php
if (isset($_GET['delete'])){
    $use->destroyTravel($_GET['id']);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Travel Data | <a href="./?page=travel_add" class="btn btn-sm btn-primary">Add </a></h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="">Bus</th>
                            <th>Seat</th>
                            <th>Seat Available</th>
                            <th width="">From</th>
                            <th width="">Destination</th>
                            <th width="">Date</th>
                            <th width="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getTravel() as $key => $val): ?>
                            <tr>
                                <td><?= $key += 1 ?></td>
                                <td><?= $val['bus_name'] ?></td>
                                <td><?= $val['seat'] ?></td>
                                <td><?= $val['seat_available'] ?></td>
                                <td><?= $val['start'] ?></td>
                                <td><?= $val['destination_name'] ?></td>
                                <td><?= $val['date'] ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="./?page=travel&id=<?=$val['id_travel']?>&delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="./?page=travel_edit&id=<?=$val['id_travel']?>"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
