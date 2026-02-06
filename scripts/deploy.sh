#!/bin/bash
set -e
###############################################################################
# deploy.sh – Single-Image Container auf dem Server starten
#
# Konfiguration über Env-Variablen oder .env-Datei im Projektroot.
#   HOST_PORT  – Host-Port  (default: 8081)
#   TAG        – Image-Tag  (default: latest)
#   IMAGE      – Image-Name (default: aus .env oder ghcr.io/user/repo)
#   NAME       – Containername (default: Basename von IMAGE)
###############################################################################

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

# .env laden (falls vorhanden)
[ -f "$PROJECT_DIR/.env" ] && set -a && . "$PROJECT_DIR/.env" && set +a

HOST_PORT=${HOST_PORT:-8081}
TAG=${TAG:-latest}
IMAGE=${IMAGE:-ghcr.io/speedyunited/grundseite}
NAME=${NAME:-$(basename "$IMAGE")}

# Alten Container stoppen/entfernen
docker rm -f "$NAME" 2>/dev/null || true

echo "▶ Starte $NAME auf 127.0.0.1:${HOST_PORT} (Tag: ${TAG}) …"

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

echo "✅  Läuft auf 127.0.0.1:${HOST_PORT} (Caddy routet darauf)"