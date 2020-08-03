<?php
if (isset($_GET['delete'])){
    $use->destroyUser($_GET['id']);
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Users Data </h3>
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="10">#</th>
                            <th width="40">Name</th>
                            <th width="">Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($use->getUsers() as $key => $val): ?>
                            <tr>
                                <td><?= $key += 1 ?></td>
                                <td><?= $val['username'] ?></td>
                                <td><?= $val['email'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
