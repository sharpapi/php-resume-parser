![SharpAPI GitHub cover](https://sharpapi.com/sharpapi-github-laravel-bg.jpg "SharpAPI PHP Client")

# Resume/CV Parser for PHP 8

## 🎯 Extract structured data from resumes (PDF/DOC/DOCX/TXT/RTF) — powered by SharpAPI AI.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sharpapi/php-resume-parser.svg?style=flat-square)](https://packagist.org/packages/sharpapi/php-resume-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/sharpapi/php-resume-parser.svg?style=flat-square)](https://packagist.org/packages/sharpapi/php-resume-parser)

Check the full documentation on the [Resume/CV Parser API](https://sharpapi.com/en/catalog/ai/hr-tech/resume-cv-parsing) page.

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
    "id": "5a113c4d-38e9-43e5-80f4-ec3fdea3420e",
    "attributes": {
      "status": "success",
      "type": "hr_parse_resume",
      "result": {
        "positions": [
          {
            "skills": [
              "Acceptance testing",
              "Technical investigation",
              "Exploratory testing",
              "Agile",
              "Test environments",
              "Test management tools",
              "UAT knowledge",
              "Writing test reports",
              "Organising, conducting and supporting test activities",
              "Performance testing",
              "Integration testing",
              "Rapid response to equipment failures",
              "Implementing immediate repairs",
              "Participating in audits and reviews",
              "Monitoring and reporting repair trends",
              "Drawings and documentation updates",
              "Executing test cases",
              "Documenting results and defects",
              "Testing and fault finding finished systems",
              "Reporting issues to Test Manager",
              "Assisting in software installation",
              "Experience of testing Web, PC and mobile based software",
              "Understanding iterative software development lifecycle",
              "Manual testing methods and processes",
              "Technical knowledge of Test Systems hardware and software",
              "Planning and task management skills",
              "Microsoft operating systems",
              "Testing GUI based software"
            ],
            "country": "United Kingdom",
            "end_date": null,
            "start_date": "2008-06-01",
            "job_details": "Responsible for the whole test process from planning, through test plan development, execution & result reporting. Also involved in the development and improvement of the test functions, putting forward suggestions and implementing plans accordingly. Duties included organising, conducting and supporting test activities, performance testing, integration testing, rapid response to equipment failures, implementing immediate repairs, participating in audits and reviews, monitoring and reporting repair trends, updating drawings and documentation, executing test cases, documenting results and defects, testing and fault finding finished systems, reporting issues to Test Manager, and assisting in software installation.",
            "company_name": "IT & Telecoms Company",
            "position_name": "Test Engineer"
          }
        ],
        "candidate_name": "Linda Harris",
        "candidate_email": "linda.h@dayjob.co.uk",
        "candidate_phone": "02476 000 0000, 0887 222 9999",
        "candidate_address": "34 Made Up Road, Coventry, CV66 7RF",
        "candidate_language": "English",
        "education_qualifications": [
          {
            "country": "United Kingdom",
            "end_date": "2008-06-01",
            "start_date": "2005-09-01",
            "degree_type": "Bachelor’s Degree or equivalent",
            "school_name": "Nuneaton University",
            "school_type": "University or equivalent",
            "learning_mode": "In-person learning",
            "education_details": "",
            "faculty_department": "",
            "specialization_subjects": "Software Engineering"
          },
          {
            "country": "United Kingdom",
            "end_date": "2005-06-01",
            "start_date": "2000-09-01",
            "degree_type": "High School/Secondary School Diploma or equivalent",
            "school_name": "Coventry North School",
            "school_type": "High School/Secondary School or equivalent",
            "learning_mode": "In-person learning",
            "education_details": "A levels: Maths (A), English (B), Technology (B), Science (C)",
            "faculty_department": "",
            "specialization_subjects": ""
          }
        ],
        "candidate_spoken_languages": [
          "German"
        ],
        "candidate_honors_and_awards": [],
        "candidate_courses_and_certifications": [
          "ISEB certification"
        ]
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
