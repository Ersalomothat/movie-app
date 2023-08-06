<?php

return [
    'xendit_auth' => 'Basic '.base64_encode(env('XENDIT_API_KEY') . ':'),
    'invoice_url' => env('XENDIT_URL_INVOICES')
];
