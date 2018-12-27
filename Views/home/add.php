<form method="post">
    <div>
        <span>Name</span>
        <input required type="text" name="name" value="<?= $model->name ?>" placeholder="1-100 digits">
    </div>
    <div>
        <span>age</span>
        <input required type="number" name="age"  value="<?= $model->age ?>" min="0" max="100" placeholder="1-100">
    </div>
    <div>
        <span>Choose city</span>
        <select required name="city">
            <option value="">...</option>
            <?PHP foreach($model->getAllCities() as $city_info) { ?>
                <?PHP
                // Выделим 3 переменные во благо эстетики!
                $cityName = \Helpers\Html::filter($city_info['city_name']);
                $cityId = \Helpers\Html::filter($city_info['city_id']);
                $cityStatus = $cityId === $model->city ? "selected" : null;
                ?>
                <option <?= $cityStatus ?> value="<?= $cityId ?>"><?= $cityName ?></option>
            <?PHP } ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit!">
    </div>
</form>