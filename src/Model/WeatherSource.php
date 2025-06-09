<?php

namespace Meder\ParserProject\Model;

class WeatherSource implements DataSourceInterface
{
    public function fetch(): array
    {
        // Пример: прогноз в Бишкеке (широта, долгота)
        $url = 'https://api.open-meteo.com/v1/forecast?latitude=42.87&longitude=74.59&daily=temperature_2m_max,temperature_2m_min&timezone=auto';

        $json = @file_get_contents($url);
        if (!$json) {
            return [];
        }

        $data = json_decode($json, true);
        if (!isset($data['daily']['time'])) {
            return [];
        }

        $results = [];
        foreach ($data['daily']['time'] as $i => $date) {
            $results[] = [
                'title' => "Forecast for {$date}",
                'description' => "Min: " . $data['daily']['temperature_2m_min'][$i] . "°C, Max: " . $data['daily']['temperature_2m_max'][$i] . "°C"
            ];
        }

        return $results;
    }
}
