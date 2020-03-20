<?php

namespace Victorino\Leadlovers\Tests;

use Victorino\Leadlovers\Models\Lead;

class LeadloversTest extends TestCase
{

    /**
     * @test
     */
    public function it_lists_email_sequences() {

        $sequences = \Leadlovers::emailSequences()
            ->withMachineCode(374973)
            ->all();


    }

    /**
     * @test
     */
    public function it_lists_levels() {

        $levels = \Leadlovers::levels()
            ->withMachineCode(374973)
            ->withEmailSequenceCode(848194)
            ->all();


    }
    /**
     * @test
     */
    public function it_adds_a_lead()
    {
        $lead = new Lead();
        $lead->Email = 'thiago@gmail.com';
        $lead->Name = 'Thiago Victorino @';
        $lead->Company = 'Victorino S/A';
        $lead->Phone = '47992772000';
        $lead->Score = 0;
        $lead->Source = 'SITE';

        $leadService = \Leadlovers::leads()
                        ->withMachineCode(374973)
                        ->withLevelCode(4)
                        ->withEmailSequenceCode(848194)
                        ->create($lead);
    }

    /**
     * @test
     */
    public function it_creates_a_capture_form_entry()
    {
        $lead = new Lead();
        $lead->llfield40139 = 'Corretor de Imóveis';
        $lead->llfield40150 = 'thiago444@gmail.com';
        $lead->llfield40138 = 'Agua Verdeeee';
        $lead->llfield40142 = 'Ooops';
        $lead->llfield40141 = 'Angariação';
        $lead->llfield40147 = 'Rua X';
        $lead->llfield40146 = 'Prédio X';

        $leadService = \Leadlovers::captureForms()
            ->withMachineCode(374973)
            ->withCaptureFormCode(19655)
            ->send($lead);
    }
}
