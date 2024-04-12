<ul class="contacts">
    <?php foreach ($contacts as $contact => $value): ?>
    <li class="contacts_item">
        <div>
            <p class="contacts_name"><?= htmlspecialchars($value["name"]) ?></p>
            <a href="/pages/view.php?id=<?=$contact?>"><?= htmlspecialchars($value["phone"]) ?></a>
        </div>
        <a class="contacts_delete" href="/pages/contacts.php?delete=<?=$contact?>" title="Удалить контакт">×</a>
    </li>
    <?php endforeach; ?>
</ul>
