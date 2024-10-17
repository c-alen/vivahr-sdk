# VIVAHR PHP SDK

PHP SDK for the VIVAHR API

## Installation

To install the VIVAHR PHP SDK, ensure you have Composer installed. Then, run the following command:

```bash
composer require vivahr/api-sdk

Make sure you have PHP version 7.0 or higher.

Usage

Here’s how to initialize the SDK and perform various operations:

<?php

require 'vendor/autoload.php';

use VIVAHR\VivahrClient;

// Initialize the client with your credentials
VivahrClient::init('your_client_id', 'your_client_secret');

// Working with candidates
$candidates = VivahrClient::candidates();
$candidateData = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    // Add other required fields
];

// Create a new candidate
try {
    $newCandidate = $candidates->create($candidateData);
    echo "Candidate created with ID: " . $newCandidate['id'];
} catch (\VIVHAR\Exceptions\ApiException $e) {
    echo "Error creating candidate: " . $e->getMessage();
}

Available Endpoints

Candidates

	•	create(array $data): Create a new candidate.
	•	Parameters: An associative array containing candidate details (e.g., name, email).
	•	update($id, array $data): Update an existing candidate by ID.
	•	Parameters: The candidate ID and an associative array of updated details.
	•	get($id): Retrieve a candidate by ID.
	•	list(array $data): List all candidates with optional filters.
	•	delete($id): Delete a candidate by ID.

Jobs

	•	create(array $data): Create a new job.
	•	get($id): Retrieve a job by ID.
	•	list(array $data): List all jobs with optional filters.
	•	close($id): Close a job posting.
	•	delete($id): Delete a job by ID.

Error Handling

This SDK provides a custom ApiException class for handling API-related errors. You can catch this exception to handle errors gracefully:

try {
    // Your API call here
} catch (\VIVHAR\Exceptions\ApiException $e) {
    echo "Error: " . $e->getMessage();
}

Contributing

Contributions are welcome! Please submit a pull request or open an issue for any enhancements, bug fixes, or suggestions. Make sure to follow the coding standards and include tests for new features.

License

This project is licensed under the MIT License. See the LICENSE file for details.