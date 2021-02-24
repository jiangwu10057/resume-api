<?php

declare(strict_types=1);

namespace App\Infrastructure\Packer;

use Hyperf\Contract\PackerInterface;

class SmartPHPSerializerPacker implements PackerInterface
{
    public function pack($data): string
    {
        if(is_array($data) || is_object($data)){
            return serialize($data);
        }else{
            return ''.$data;
        }
    }

    public function unpack(string $data)
    {
       $result = @unserialize($data);

       if($result !== false){
           return $result;
       }
       return $data;
    }
}