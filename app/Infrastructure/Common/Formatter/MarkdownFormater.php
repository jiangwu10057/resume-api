<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Formatter;

class MarkdownFormater implements FormatterInterface
{
    private $jsonkeys = array('except', 'education_experiences', 'personal', 'skills',
         'work_experiences', 'works');

    private $secondLevelJsonKeys = array('education_experiences', 'skills', 'work_experiences');

    public function format($data)
    {
        unset($data['created_time'], $data['uid'], $data['updated_time']);
        
        foreach ($this->jsonkeys as $key){
            $data[$key] = json_decode($data[$key], true);
        }

        foreach ($this->secondLevelJsonKeys as $key){
            $data[$key] = $this->jsonDecodeArray($data[$key]);
        }

        $workExperiences = array();
        foreach ($data['work_experiences'] as $key => $value){
            $value['projects'] = $this->jsonDecodeArray($value['projects']);
            $workExperiences[] = $value;
        }
        $data['work_experiences'] = $workExperiences;

        $data['works'] = [
            'articles' => $this->jsonDecodeArray($data['works']['articles']),
            'opensources' => $this->jsonDecodeArray($data['works']['opensources']),
            'speeches' => $this->jsonDecodeArray($data['works']['speeches']),
        ];

        return $data;
    }

    private function jsonDecodeArray($data)
    {
        $values = [];
        foreach ($data as $value){
            $values[] = json_decode($value, true);
        }

        return $values;
    }
}