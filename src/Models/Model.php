<?php


namespace Victorino\Leadlovers\Models;


abstract class Model
{
    public function toArray(): array {
        return get_object_vars ($this);
    }

    public function toLeadLoversArray(): array {
        $attributes = $this->toArray();
        $leadLoversArrayFormat = [];

        foreach ($attributes as $attribute => $value) {
            $leadLoversArrayFormat[ucfirst($attribute)] = $value;
        }
        return $leadLoversArrayFormat;
    }
}
