<?php
if (isset($_GET['delete'])){
    $use->destroyDestination($_GET['id']);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Destination Data | <a href="./?page=destination_add" class="btn btn-sm btn-primary">Add </a></h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="40">Name</th>
                            <th width="50">Image</th>
                            <th width="">Address</th>
                            <th width="10">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getDestinantion() as $key => $val): ?>
                            <tr>
                                <td><?= $key += 1 ?></td>
                                <td><?= $val['name'] ?></td>
                                <td><img src="../img/travel/<?= $val['image'] ?>" alt="" style="width: 150px"></td>
                                <td><?= $val['address'] ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="./?page=destination&id=<?=$val['id_destination']?>&delete"><i class="fa fa-trash-o"></i></a>
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
