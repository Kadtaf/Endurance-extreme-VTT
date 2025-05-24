<?php
header('Content-Type: application/xml; charset=utf-8');

// Configuration
$baseUrl = 'http://endurance-extrem-vtt.local/';
$rootDir = realpath(__DIR__ . '/../'); // Racine du projet
$pages   = [];
$today   = date('Y-m-d');

// Fichiers statiques à scanner
$allowedExtensions = ['html', 'php'];
$exclude = ['csrf.php', 'sitemap.php', 'form.php', 'message.php'];

// Parcours des fichiers HTML/PHP dans le projet
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootDir),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($iterator as $file) {
    if ($file->isFile()) {
        $ext = strtolower($file->getExtension());
        if (in_array($ext, $allowedExtensions)) {
            $relativePath = str_replace($rootDir, '', $file->getRealPath());
            $relativePath = ltrim(str_replace('\\', '/', $relativePath), '/');

            if (!in_array(basename($relativePath), $exclude)) {
                // Si index.html ou index.php, simplifier l’URL
                if (preg_match('/index\.(html|php)$/', $relativePath)) {
                    $url = $baseUrl;
                } else {
                    $url = $baseUrl . $relativePath;
                }

                $pages[] = [
                    'loc' => $url,
                    'lastmod' => $today,
                    'changefreq' => 'weekly',
                    'priority' => ($url === $baseUrl) ? '1.0' : '0.8'
                ];
            }
        }
    }
}

// Sections à ajouter manuellement (ancres internes dans index.html)
$anchors = ['#produit', '#temoignages', '#apropos', '#contact'];
foreach ($anchors as $anchor) {
    $pages[] = [
        'loc' => $baseUrl . $anchor,
        'lastmod' => $today,
        'changefreq' => 'weekly',
        'priority' => '0.7'
    ];
}

// Génération du XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($pages as $page) {
    echo "  <url>\n";
    echo "    <loc>{$page['loc']}</loc>\n";
    echo "    <lastmod>{$page['lastmod']}</lastmod>\n";
    echo "    <changefreq>{$page['changefreq']}</changefreq>\n";
    echo "    <priority>{$page['priority']}</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
