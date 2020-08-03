<?php
    if (isset($_GET['delete'])){
        $use->destroyBus($_GET['id']);
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Bus Data | <a href="./?page=bus_add" class="btn btn-sm btn-primary">Add </a></h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th>Name</th>
                            <th width="10">Seat</th>
                            <th width="10">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getBus() as $key => $val): ?>
                            <tr>
                                <td><?= $key += 1 ?></td>
                                <td><?= $val['name'] ?></td>
                                <td><?= $val['seat'] ?></td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="./?page=bus&id=<?=$val['id_bus']?>&delete"><i class="fa fa-trash-o"></i></a>
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
