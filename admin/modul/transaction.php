
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Transactions Data </h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="25px">#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Pick up place</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;
                        foreach ($use->getTransaction() as $item):
                            ?>
                            <tr>
                                <td><?= $no += 1; ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['address'] ?></td>
                                <td><?= $item['pickup_place'] ?></td>
                                <td>
                                    <a href="./?page=transaction_detail&id=<?=$item['id_trans'] ?>" title="Detail history" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
