<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>редактирование</title>
</head>



<body>


<div class="container form"  style="margin-top: 200px; margin-bottom: 25px">

    <form method="post"  action="<?=$redirect?>" style="width: 40%; margin: 0px auto">

        <h2 style="text-align: center; margin-bottom: 20px">Редактировать ученика</h2>
        <h3 style="text-align: center; margin-bottom: 20px"><?php if (empty($error)) echo $edit['lastname'] . ' ' . $edit['firstname'] . ' ' . $edit['patronymic'] ; else echo $_POST['edit_lastname'] . ' ' . $_POST['edit_firstname'] . ' ' . $_POST['edit_patronymic']?></h3>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                <?=$error?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

        <?php endif; ?>

        <div class="form-group">

            <input name="edit_lastname" class="form-control" value="<?php if (empty($error)) echo $edit['lastname']; else echo  $_POST['edit_lastname'] ; ?>" placeholder="Фамилия">

        </div>

        <div class="form-group">

            <input name="edit_firstname"  class="form-control" value="<?php if (empty($error)) echo $edit['firstname']; else echo  $_POST['edit_firstname'] ; ?>" placeholder="Имя">

        </div>

        <div class="form-group">

            <input name="edit_patronymic" class="form-control" value="<?php if (empty($error)) echo $edit['patronymic']; else echo  $_POST['edit_patronymic'] ; ?>"  placeholder="Отчество">

        </div>

        <div class="form-group">

            <input name="edit_date_of_birth"  class="form-control" value="<?php if (empty($error)) echo $edit['dateofbirth']; else echo  $_POST['edit_date_of_birth'] ; ?>"  placeholder="Дата рождения">
            <small class="form-text text-muted">вводить в формате дд.мм.гггг</small>
        </div>

        <div class="form-group" style="margin-top: 25px">
            <button name="edit_cancel" type="submit" class="btn btn-danger" >Отменить</button>
            <button name="edit_save" type="submit" class="btn btn-success" value="<?php if (empty($error)) echo $edit['id']; else echo  $_POST['edit_save'] ; ?>" style="float: right">Сохранить</button>
        </div>
    </form>


</div>



</body>
</html>
