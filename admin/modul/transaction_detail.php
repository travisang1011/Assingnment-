
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Transactions Detail </h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="25px">#</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Bus</th>
                            <th>Seat</th>
                            <th>Date</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;
                        foreach ($use->getTransactionDetail($_GET['id']) as $item):
                            ?>
                            <tr>
                                <td><?= $no += 1; ?></td>
                                <td><?= $item['start'] ?></td>
                                <td><?= $item['destination_name'] ?></td>
                                <td><?= $item['bus_name'] ?></td>
                                <td><?= $item['td_seat'] ?></td>
                                <td><?= $item['date'] ?></td>
                                <td>$ <?= number_format($item['price'] * $item['seat']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
