![SharpAPI GitHub cover](https://sharpapi.com/sharpapi-github-laravel-bg.jpg "SharpAPI PHP Client")

# Resume/CV Parser API for PHP 8

## 🎯 Extract structured data from resumes (PDF/DOC/DOCX/TXT/RTF) — powered by SharpAPI AI.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sharpapi/php-resume-parser.svg?style=flat-square)](https://packagist.org/packages/sharpapi/php-resume-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/sharpapi/php-resume-parser.svg?style=flat-square)](https://packagist.org/packages/sharpapi/php-resume-parser)

Check the full documentation on the [Resume/CV Parser API](https://sharpapi.com/en/catalog/ai/hr-tech/resume-parser) page.

---

## Requirements

- PHP >= 8.0

---

## Installation

### Step 1. Install the package via Composer:

```bash
composer require sharpapi/php-resume-parser
```

### Step 2. Visit [SharpAPI](https://sharpapi.com/) to get your API key.

---

## Laravel Integration

Building a Laravel application? Check the Laravel package version: https://github.com/sharpapi/laravel-resume-parser

---

## What it does

This package uploads a resume file to the SharpAPI AI endpoint and returns a status URL to poll for results. When the job completes, you can fetch a structured JSON containing parsed resume data (contact info, experience, education, skills, and more).

---

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use SharpAPI\ResumeParser\ResumeParserClient;
use GuzzleHttp\Exception\GuzzleException;

$resumePath = __DIR__ . '/resume.pdf'; // make sure this file exists
$language   = 'English';

$client = new ResumeParserClient(apiKey: 'your_api_key_here');

try {
    // submit parsing job
    $statusUrl = $client->parseResume(
        $resumePath,
        $language // optional – English is default
    );

    // Optional: adjust polling settings
    $client->setApiJobStatusPollingInterval(10); // seconds
    $client->setApiJobStatusPollingWait(180);    // seconds total wait

    // fetch results when ready
    $result = $client->fetchResults($statusUrl)->toArray();
    print_r($result);
} catch (GuzzleException $e) {
    // Handle SharpAPI or network errors
    echo $e->getMessage();
}
```

---

## Example Response (trimmed)

```json
{
  "data": {
    "type": "api_job_result",
    "id": "3b2c1d6f-9ac4-4c98-92b2-c4cb2d4edc11",
    "attributes": {
      "status": "success",
      "type": "hr_resume_parser",
      "result": {
        "contact": { "full_name": "Jane Doe", "email": "jane@example.com" },
        "experience": [],
        "education": [],
        "skills": []
      }
    }
  }
}
```

---

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

---

## Credits

- [A2Z WEB LTD](https://github.com/a2zwebltd)
- [Dawid Makowski](https://github.com/makowskid)
- Boost your [PHP AI](https://sharpapi.com/) capabilities!

---

## License

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE.md)

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---
## Social Media

🚀 For the latest news, tutorials, and case studies, don't forget to follow us on:
- [SharpAPI X (formerly Twitter)](https://x.com/SharpAPI)
- [SharpAPI YouTube](https://www.youtube.com/@SharpAPI)
- [SharpAPI Vimeo](https://vimeo.com/SharpAPI)
- [SharpAPI LinkedIn](https://www.linkedin.com/products/a2z-web-ltd-sharpapicom-automate-with-aipowered-api/)
- [SharpAPI Facebook](https://www.facebook.com/profile.php?id=61554115896974)
