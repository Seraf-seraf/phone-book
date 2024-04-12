<section class="contact">
    <div class="contact-info">
        <h1 class="contact-name">
            <?= htmlspecialchars($contact["name"]) ?>
        </h1>
        <p>
            <a href="tel:+<?= htmlspecialchars($contact["phone"]); ?>">
                <?= htmlspecialchars($contact["phone"]); ?>
            </a>
        </p>
    </div>
</section>
