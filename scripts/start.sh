#!/usr/bin/env zsh
set -euo pipefail

cd "$(dirname "$0")/.."
docker compose up -d --build
echo "Gjewelry esta levantado en http://localhost:${APP_PORT:-8000}"
