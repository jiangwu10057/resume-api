<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Formatter;

class MarkdownFormater implements FormatterInterface
{
    private $jsonkeys = array('except', 'education', 'personal', 'skills',
         'work', 'works', 'projects');

    private $secondLevelJsonKeys = array('education', 'skills', 'work', 'works', 'projects');

    public function format($data)
    {
        foreach ($this->jsonkeys as $key){
            $data[$key] = json_decode($data[$key], true);
        }

        foreach ($this->secondLevelJsonKeys as $key){
            $data[$key] = $this->jsonDecodeArray($data[$key]);
        }

        unset($data['created_time'], $data['uid'], $data['updated_time']);

        return $data;
    }

    private function jsonDecodeArray($data)
    {
        if (empty($data)){
            return [];
        }
        $values = [];
        foreach ($data as $value){
            $values[] = json_decode($value, true);
        }

        return $values;
    }
}