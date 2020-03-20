<?php


namespace Victorino\Leadlovers\Resources;


use GuzzleHttp\Client;
use Victorino\Leadlovers\Models\EmailSequence;
use Victorino\Leadlovers\Models\Level;

abstract class ApiResources extends Resources
{

    protected $token;

    /**
     * @var EmailSequence
     */
    protected $emailSequence;

    /**
     * @var Level
     */
    protected $level;

    public function __construct()
    {
        $this->token = config('leadlovers.token');

        $this->httpClient = new Client([
            'base_uri' => 'http://llapi.leadlovers.com/webapi/',
            'headers' => [
                'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIl0sImlzcyI6Imh0dHA6Ly93ZWJhcGlsbC5henVyZXdlYnNpdGVzLm5ldCIsImF1ZCI6IjFhOTE4YzA3NmE1YjQwN2Q5MmJkMjQ0YTUyYjZmYjc0IiwiZXhwIjoxNjA1NDQxMzM4LCJuYmYiOjE0NzU4NDEzMzh9.YIIpOycEAVr_xrJPLlEgZ4628pLt8hvWTCtjqPTaWMs',
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json'
            ],
            'query' => ['token' => $this->token],
        ]);
    }

    public function withEmailSequence(EmailSequence $emailSequence): Resources
    {
        $this->emailSequence = $emailSequence;
        return $this;
    }

    /**
     * Use this method when you just need to
     * use the Email Sequence Code
     * @param int $code
     * @return Resources
     */
    public function withEmailSequenceCode(int $code): Resources
    {
        $emailSequence = new EmailSequence;
        $emailSequence->Code = $code;
        return $this->withEmailSequence($emailSequence);
    }

    /**
     * @param Level $level
     * @return Resources
     */
    public function withLevel(Level $level): Resources
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @param int $code
     * @return Resources
     */
    public function withLevelCode(int $code): Resources
    {
        $level = new Level;
        $level->Code = $code;
        return $this->withLevel($level);
    }

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    protected function get(string $path, array $data) {
        $data = array_merge($data, [
            'token' => $this->token
        ]);
        $response = $this->httpClient->get(
            $this->sanitalizePath($path),
            [
                'query' => $data
            ]
        );
        return $this->processBody($response);
    }
}
