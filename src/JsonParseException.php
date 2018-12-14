<?php

declare(strict_types=1);

namespace Crell\ApiProblem;

use Throwable;

class JsonParseException extends AbstractJsonException
{
    /**
     * @var string
     */
    protected $json;

    public function __construct(string $message = '', int $code = 0, Throwable $previous = null, string $json = '')
    {
        parent::__construct($message, $code, $previous);
        $this->setJson($json);
    }

    public function setJson(string $json) : self
    {
        $this->json = $json;
        return $this;
    }

    public function getJson() : string
    {
        return $this->json;
    }

    public static function fromJsonError(int $jsonError, string $json): self
    {
        return new self(static::getExceptionMessage($jsonError), $jsonError, null, $json);
    }
}
