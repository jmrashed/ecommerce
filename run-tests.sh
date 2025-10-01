#!/bin/bash

# Test runner script for cross-platform compatibility

# Try different phpunit paths
if [ -f "vendor/bin/phpunit" ]; then
    vendor/bin/phpunit "$@"
elif [ -f "vendor/phpunit/phpunit/phpunit" ]; then
    php vendor/phpunit/phpunit/phpunit "$@"
else
    echo "PHPUnit not found"
    exit 1
fi