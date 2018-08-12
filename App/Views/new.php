<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>новая запись</title>
</head>



<body>


    <div class="container form"  style="margin-top: 200px; margin-bottom: 25px">




        <form method="post"  style="width: 30%; margin: 0px auto">

            <h2 style="text-align: center; margin-bottom: 20px">Добавить ученика</h2>


            <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <?=$error?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <?php endif; ?>

            <div class="form-group">

                <input name="lastname" class="form-control" value="<?php if (!empty($error)) echo $_POST['lastname'];?>"  placeholder="Фамилия">

            </div>

            <div class="form-group">

                <input name="firstname"  class="form-control" value="<?php if (!empty($error)) echo $_POST['firstname'];?>"  placeholder="Имя">

            </div>

            <div class="form-group">

                <input name="patronymic" class="form-control" value="<?php if (!empty($error)) echo $_POST['patronymic'];?>"  placeholder="Отчество">

            </div>

            <div class="form-group">

                <input name="date_of_birth"  class="form-control" value="<?php if (!empty($error)) echo $_POST['date_of_birth'];?>"  placeholder="Дата рождения">
                <small class="form-text text-muted">вводить в формате дд.мм.гггг</small>
            </div>

            <div class="form-group" style="margin-top: 25px">
            <button name="cancel" type="submit" class="btn btn-danger" >Отменить</button>
            <button name="save" type="submit" class="btn btn-success" style="float: right">Сохранить</button>
            </div>
        </form>


    </div>



</body>
</html>
