<?php


namespace Victorino\Leadlovers\Resources;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Victorino\Leadlovers\Models\CaptureForm;
use Victorino\Leadlovers\Models\Machine;

abstract class Resources
{

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var Machine
     */
    protected $machine;

    /**
     * @var CaptureForm
     */
    protected $captureForm;

    /**
     * @param Machine $machine
     * @return Resources
     */
    public function withMachine(Machine $machine): Resources
    {
        $this->machine = $machine;
        return $this;
    }

    /**
     * @param int $code
     * @return Resources
     */
    public function withMachineCode(int $code): Resources
    {
        $machine = new Machine;
        $machine->Code = $code;
        return $this->withMachine($machine);
    }

    /**
     * @param CaptureForm $captureForm
     * @return Resources
     */
    public function withCaptureForm(CaptureForm $captureForm): Resources
    {
        $this->captureForm = $captureForm;
        return $this;
    }

    /**
     * @param int $code
     * @return Resources
     */
    public function withCaptureFormCode(int $code): Resources
    {
        $captureForm = new CaptureForm;
        $captureForm->Code = $code;
        return $this->withCaptureForm($captureForm);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function post(string $path, array $data) {
        $response = $this->request('POST', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function put(string $path, array $data) {
        $response = $this->request('PUT', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function delete(string $path, array $data) {
        $response = $this->request('DELETE', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function patch(string $path, array $data) {
        $response = $this->request('PATCH', $path, $data);
        return $this->processBody($response);
    }

    /**
     * @param string $path
     * @return string
     */
    protected function sanitalizePath(string $path): string {
        return trim(trim($path),'/');
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
                'json'  => $data
            ]
        );
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    protected function processBody(ResponseInterface $response) {
        return json_decode($response->getBody()->getContents());
    }
}
