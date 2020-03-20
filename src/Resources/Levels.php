<?php


namespace Victorino\Leadlovers\Resources;


class Levels extends ApiResources
{

    public function all() {
        $data['machineCode'] = $this->machine->Code;
        $data['sequenceCode'] = $this->emailSequence->Code;
        $response = $this->get('Levels', $data);
        return $response->Items;
    }
}
