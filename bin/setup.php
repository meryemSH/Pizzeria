<?php

// Define ANSI color codes
define('COLOR_GREEN', "\033[32m");
define('COLOR_RED', "\033[31m");
define('COLOR_RESET', "\033[0m");

// Function to execute a command and check for errors
function executeCommand($command, string|null $msg = null) {
    echo COLOR_GREEN . ($msg ?? "Executing: $command") . COLOR_RESET . "\n";
    exec($command, $output, $returnStatus);
    if ($returnStatus !== 0) {
        echo COLOR_RED . "🚨🚨🚨 Error occurred while executing: $command" . COLOR_RESET . "\n";
        exit(1);
    }
    return $output;
}

// Check if composer.json exists
if (!file_exists('composer.json')) {
    echo COLOR_RED . "🚨🚨🚨 Please make sure to run this script from the root directory of this repo." . COLOR_RESET . "\n";
    exit(1);
}

// Run composer install
executeCommand('composer install', '⚗️ Running composer install...');

// Copy .env.example to .env
echo COLOR_GREEN . "📰 Copying .env.example to .env..." . COLOR_RESET . "\n";
copy('.env.example', '.env');

// Generate application key
executeCommand('php artisan key:generate', '🔑 Generating application key...');

// Link storage
executeCommand('php artisan storage:link', '🔗 Linking storage...');

// clear cache
executeCommand('php artisan optimize:clear', '🧹 Clearing cache...');

// Install npm packages
executeCommand('npm install', '⚗️ Installing npm packages...');

// Run npm build
executeCommand('npm run build', '🏗️ Running npm build...');

// Run migrations
executeCommand('php artisan migrate', '🗄️ Running migrations...');

// Seed database
executeCommand('php artisan db:seed', '🌱 Seeding database...');

echo COLOR_GREEN . "🥳 All tasks completed successfully." . COLOR_RESET . "\n";
