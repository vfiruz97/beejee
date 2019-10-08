<div class="container">
    <nav class='navbar navbar-toggleable navbar-light bg-faded'>
        <a class="btn btn-primary" href="/todo/create">Добавить</a>
    </nav>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>имя</th>
                        <th>задача</th>
                        <th>email</th>
                        <th>статус</th>
                        <th>
                            <?php if(checkAuth()) echo 'ред.'; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data[0] as $column => $row) : ?>
                        <tr>
                            <td><?=$row['name']?></td>
                            <td><textarea><?=$row['text']?></textarea></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['status'] ? 'отредактировано администратором' : ''?></td>
                            <td>
                                <?php if(checkAuth()): ?>
                                    <a href='/todo/edit/?id=<?=$row["id"]?>' >edit</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<?php if($data[1]) : ?>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <nav aria-label="Page navigation example">
                        <?=$data[1];?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

