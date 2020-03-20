<?php


namespace Victorino\Leadlovers\Resources;


use Victorino\Leadlovers\Models\EmailSequence;
use Victorino\Leadlovers\Models\Lead;
use Victorino\Leadlovers\Models\Level;
use Victorino\Leadlovers\Models\Machine;

class Leads extends ApiResources
{



    public function create(Lead $lead) {
        $data = $lead->toArray();
        $data['MachineCode'] = $this->machine->Code;
        $data['EmailSequenceCode'] = $this->emailSequence->Code;
        $data['SequenceLevelCode'] = $this->level->Code;
        $this->post('Lead',$data);
        return true;
    }
}
