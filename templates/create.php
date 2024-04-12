<section>
    <form class="form contact" action="../pages/create.php" method="post" enctype="multipart/form-data">
        <div class="form-field field">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" placeholder="Имя" value="<?= $_POST['name'] ?? '' ?>">
            <?php if (isset($errors['name'])): ?>
                <p class="field-error">
                    <?= $errors['name'] ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-field field">
            <label for="phone">Телефон</label>
            <input type="tel" name="phone" id="phone" placeholder="Номер телефона" value="<?= $_POST['phone'] ?? '' ?>">
            <?php if (isset($errors['phone'])): ?>
                <p class="field-error">
                    <?= $errors['phone'] ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="form-field field">
            <input class="button" type="submit" value="Сохранить">
        </div>
    </form>
</section>
