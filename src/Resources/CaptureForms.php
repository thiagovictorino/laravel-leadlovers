<?php

namespace Victorino\Leadlovers\Resources;

use Psr\Http\Message\ResponseInterface;
use Victorino\Leadlovers\Models\Lead;

class CaptureForms extends Resources
{

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => 'http://paginas.rocks/',
            'headers' => [
                'Content-Type'   => 'application/x-www-form-urlencoded',
            ]
        ]);
    }

    public function send(Lead $lead) {
        $lead->mid = $this->machine->Code;
        $lead->fid = $this->captureForm->Code;
        return $this->post('capture', $lead->toArray());
    }

    /**
     * @param string $method
     * @param $path
     * @param $data
     * @return ResponseInterface
     */
    protected function request(string $method, $path, $data) {
        return $this->httpClient->request(
            $method,
            $this->sanitalizePath($path),
            [
                'form_params'  => $data
            ]
        );
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function processBody(ResponseInterface $response) {
            $response = json_decode($response->getBody()->getContents());
            if(!empty($response->errors)) {
                throw new \RuntimeException(json_encode($response->errors));
            }
          return $response;

    }
}
