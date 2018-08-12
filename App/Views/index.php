<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>школьный журнал</title>
</head>
<body>


    <div class="container" style="margin-top: 100px">


        <div class="row">
            <div class="col-md-4">
                <h2>Школьный журнал</h2>
            </div>

            <div class="col-md-4 offset-md-4">
                <form action="/journal/new" method="post">
                <button class="btn btn-success" type="submit" style="float: right">Добавить ученика</button>
                </form>
            </div>
        </div>



        <table class="table table-bordered" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">День рождения</th>
                <th scope="col">Возраст</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>

            <tbody>


            <?php $i = 1; foreach ($users as $user): ?>

                <tr >
                    <th scope="row"><?=$i?></th>
                    <td ><?= $user['lastname'] . ' ' . $user['firstname'] . ' ' . $user['patronymic'] ?></td>
                    <td><?=$user['dateofbirth']?></td>
                    <td><?=$user['old']?></td>
                    <td>



                        <form  action="/journal/edit" method="post">
                        <button name="edit" type="submit" class="btn btn-secondary" value="<?=$user['id'] ?>" >редактировать</button>
                        </form>
                    </td>
                    <td>
                        <form  method="post" >
                        <button name="delete" type="submit" class="btn btn-secondary" value="<?=$user['id'] ?>">удалить</button>
                        </form>
                    </td>
                </tr>

            <?php $i++; endforeach; ?>


            </tbody>


        </table>

    </div>

</body>
</html>

