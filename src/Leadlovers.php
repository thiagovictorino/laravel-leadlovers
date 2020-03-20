<?php

namespace Victorino\Leadlovers;

use Victorino\Leadlovers\Resources\CaptureForms;
use Victorino\Leadlovers\Resources\EmailSequences;
use Victorino\Leadlovers\Resources\Leads;
use Victorino\Leadlovers\Resources\Levels;

class Leadlovers
{
    public function leads() {
        return new Leads();
    }

    public function levels() {
        return new Levels();
    }

    public function emailSequences() {
        return new EmailSequences();
    }

    public function captureForms() {
        return new CaptureForms();
    }
}
