<div class="header-flex">
    <h1><?= $datas['title'] ?></h1>

    <div class="btn-right">
        <?php foreach ($datas['buttons'] as $button): ?>
            <?php if (isset($button['type']) && $button['type'] === 'submit'): ?>
                <button type="submit"
                    form="<?= $button['form_id'] ?>"
                    class="<?= $button['class'] ?>"
                    title="<?= $button['title'] ?>"
                    data-bs-toggle="tooltip">
                    <?= $button['text'] ?>
                </button>
            <?php else: ?>
                <a href="<?= $button['href'] ?>"
                    class="<?= $button['class'] ?>"
                    title="<?= $button['title'] ?>"
                    data-bs-toggle="tooltip">
                    <?= $button['text'] ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>