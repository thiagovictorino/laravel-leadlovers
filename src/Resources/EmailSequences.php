<?php


namespace Victorino\Leadlovers\Resources;


class EmailSequences extends ApiResources
{
    public function all() {
        $data['machineCode'] = $this->machine->Code;
        $response = $this->get('EmailSequences', $data);
        return $response->Items;
    }
}
