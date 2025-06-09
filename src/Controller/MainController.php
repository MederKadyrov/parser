<?php

namespace Meder\ParserProject\Controller;

use Meder\ParserProject\Model\NewsSource;
use Meder\ParserProject\Model\WeatherSource;

class MainController
{
    public function handle(): void
    {
        $content = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $source = $_POST['source'] ?? '';

            if ($source === 'news') {
                $provider = new NewsSource();
            } elseif ($source === 'weather') {
                $provider = new WeatherSource();
            }

            if (isset($provider)) {
                $allItems = $provider->fetch();

                // --- ПАГИНАЦИЯ ---
                $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
                $perPage = 10;
                $total = count($allItems);
                $totalPages = ceil($total / $perPage);
                $offset = ($page - 1) * $perPage;
                $items = array_slice($allItems, $offset, $perPage);
                // Now $items, $page, $totalPages are defined and will be available in include



                ob_start();
                include __DIR__ . '/../View/dataList.php';
                $content = ob_get_clean();
            }


        }

        include __DIR__ . '/../View/layout.php';
    }
}
