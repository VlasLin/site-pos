<?php

$get_arg ??= '';


$current_url = 'https://huokras.garage' . htmlspecialchars($get_arg, ENT_QUOTES, 'UTF-8');


$breadcrumbs = [
    ['title' => 'Головна', 'url' => '/'],
    // Додати інші розділи за потребою, наприклад:
    // ['title' => 'Каталог', 'url' => '/catalog'],
    // ['title' => 'Контакти', 'url' => '/contacts'],
];


$breadcrumbs[] = ['title' => 'Поточна сторінка', 'url' => $get_arg];

?>

<!-- Вивід OpenGraph URL -->
<meta property="og:url" content="<?= $current_url ?>" />

<!-- HTML для хлібних крихт -->
<nav class="breadcrumb" aria-label="Breadcrumb">
    <ul>
        <?php foreach ($breadcrumbs as $index => $crumb): ?>
            <li>
                <?php if ($index !== array_key_last($breadcrumbs)): ?>
                    <a href="<?= htmlspecialchars($crumb['url'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($crumb['title']) ?>
                    </a>
                    &raquo;
                <?php else: ?>
                    <span><?= htmlspecialchars($crumb['title']) ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
