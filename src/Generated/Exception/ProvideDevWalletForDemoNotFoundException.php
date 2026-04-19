<?php

namespace Plaidly\Generated\Exception;

class ProvideDevWalletForDemoNotFoundException extends NotFoundException
{
    /**
     * @var \Plaidly\Generated\Model\Error
     */
    private $error;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Plaidly\Generated\Model\Error $error, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Session not found');
        $this->error = $error;
        $this->response = $response;
    }
    public function getError(): \Plaidly\Generated\Model\Error
    {
        return $this->error;
    }
    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}