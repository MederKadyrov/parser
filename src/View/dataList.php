<?php if (!empty($items)): ?>
    <ul>
        <?php foreach ($items as $item): ?>
            <li>
                <strong><?= htmlspecialchars($item['title']) ?></strong><br>
                <?= htmlspecialchars($item['description']) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php
    // Показывать пагинацию только если больше 1 страницы
    if ($totalPages > 1):
        ?>
        <div>
            <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                <a href="?source=<?= urlencode($_GET['source']) ?>&page=<?= $p ?>">
                    <?= $p ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

<?php else: ?>
    <p>No results.</p>
<?php endif; ?>
