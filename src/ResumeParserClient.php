<?php

declare(strict_types=1);

namespace SharpAPI\ResumeParser;

use GuzzleHttp\Exception\GuzzleException;
use SharpAPI\Core\Client\SharpApiClient;

class ResumeParserClient extends SharpApiClient
{
    public function __construct(
        string $apiKey,
        ?string $apiBaseUrl = 'https://sharpapi.com/api/v1',
        ?string $userAgent = 'SharpAPIPHResumeParser/1.0.0'
    ) {
        parent::__construct($apiKey, $apiBaseUrl, $userAgent);
    }

    /**
     * Parse a resume (CV) file and return the async status URL.
     *
     * Supported formats: PDF/DOC/DOCX/TXT/RTF.
     * Language is optional (defaults to 'English').
     *
     * @api
     * @throws GuzzleException
     */
    public function parseResume(
        string $cvFilePath,
        string $language = 'English'
    ): string {
        $response = $this->makeRequest(
            'POST',
            '/hr/parse_resume',
            [
                'language' => $language,
            ],
            $cvFilePath
        );

        return $this->parseStatusUrl($response);
    }
}
