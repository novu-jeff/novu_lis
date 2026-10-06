#!/bin/bash
# Run from project root. Fixes EACCES when public/build is owned by root/www-data.
set -e
cd "$(dirname "$0")/.."
echo "Removing old build..."
sudo rm -rf public/build
echo "Building..."
npm run build
echo "Setting ownership for web server..."
sudo chown -R www-data:www-data public/build
echo "Done."
