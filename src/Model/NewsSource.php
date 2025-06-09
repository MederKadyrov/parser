<?php

namespace Meder\ParserProject\Model;

class NewsSource implements DataSourceInterface
{
    public function fetch(): array
    {
        $url = 'https://lenta.ru/rss'; // Можно заменить на другой RSS

        $rss = @simplexml_load_file($url);

        if (!$rss) {
            return [];
        }

        $items = [];

        foreach ($rss->channel->item as $entry) {
            $items[] = [
                'title' => (string)$entry->title,
                'description' => (string)$entry->description,
            ];
        }

        return $items;
    }
}
