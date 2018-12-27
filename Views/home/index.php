<div class="div-table">
    <div class="div-tr">
        <div class="div-td">Name</div>
        <div class="div-td">Age</div>
        <div class="div-td">City</div>
    </div>
    <?PHP foreach($model->getUsers() as $user) { ?>
        <div class="div-tr">
            <div class="div-td"><?= $user->getName(); ?></div>
            <div class="div-td"><?= $user->getAge(); ?></div>
            <div class="div-td"><?= $user->getCityName(); ?></div>
        </div>
    <?PHP } ?>
</div>