#!/bin/bash
set -e
# Deployment-Script – Single-Image Container (docker run)
# PORT und TAG über Env konfigurierbar.

HOST_PORT=${HOST_PORT:-8081}
TAG=${TAG:-v0.1.0}
IMAGE=${IMAGE:-ghcr.io/speedyunited/webseite-3}
NAME=${NAME:-webseite-3}

# Alten Container stoppen/entfernen, falls vorhanden
docker rm -f "$NAME" 2>/dev/null || true

echo "Starte $NAME auf 127.0.0.1:${HOST_PORT} (Tag: ${TAG})..."

docker run -d \
  --name "$NAME" \
  --restart unless-stopped \
  --publish 127.0.0.1:${HOST_PORT}:80 \
  --dns 1.1.1.1 \
  --dns 8.8.8.8 \
  --cpus 0.50 \
  --memory 256m \
  --health-cmd 'wget -q -O- http://127.0.0.1/ || exit 1' \
  --health-interval 30s \
  --health-timeout 5s \
  --health-start-period 10s \
  --health-retries 3 \
  --log-driver json-file \
  --log-opt max-size=10m \
  --log-opt max-file=3 \
  "$IMAGE:$TAG"

echo "Website erreichbar unter 127.0.0.1:${HOST_PORT} (Host-Caddy routet darauf)"