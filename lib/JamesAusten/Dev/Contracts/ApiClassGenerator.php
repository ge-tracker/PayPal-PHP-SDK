<?php

namespace JamesAusten\Dev\Contracts;

use JamesAusten\Dev\ApiStub;

interface ApiClassGenerator
{
    /**
     * Generate the main class
     *
     * @param \JamesAusten\Dev\ApiStub $apiStub
     *
     * @return string
     */
    public function generate(ApiStub $apiStub): string;

    /**
     * @return false|string
     */
    public function getStub();

    /**
     * @return string
     */
    public function getContent(): string;
}
