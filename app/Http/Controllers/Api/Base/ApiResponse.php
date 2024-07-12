<?php

namespace App\Http\Controllers\Api\Base;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    private $httpCode;
    private $message;
    private $data;
    private $messageKey;

    public function __construct(mixed $data = null, string $message = 'OK')
    {
        $this->message = ApiError::message($message);
        $this->data    = $data;
        $this->httpCode = 200;

        $this->messageKey = $message;
    }

    public function toArray($request)
    {
        if($this->data == null) {
            return $this->message;
        }
        return $this->data;
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)
            ->setStatusCode($this->httpCode)
            ->setCharset('utf-8')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function setData(mixed $data, int $httpCode = 200)
    {
        $this->data        = $data;
        $this->httpCode    = $httpCode;

        $this->messageKey = 'OK';
    }

    public function setMessage(string $message, mixed $data = null, int $httpCode = 200)
    {
        $this->message     = $message;
        $this->data        = $data;
        $this->httpCode    = $httpCode;

        $this->messageKey = 'OK';
    }

    public function setErrorMessage(string $message, mixed $data = null, int $httpCode = 500)
    {
        $this->message     = $message;
        $this->data        = $data;
        $this->httpCode    = $httpCode;

        $this->messageKey = $message;
    }

    public function setError(string $key, int $httpCode = 500)
    {
        $this->message     = ApiError::message($key);
        $this->data        = null;
        $this->httpCode    = $httpCode;

        $this->messageKey = $key;
    }
}
