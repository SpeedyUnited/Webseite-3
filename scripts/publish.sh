#!/bin/bash
set -e
###############################################################################
# publish.sh – Image bauen & in die Registry pushen
#
# Konfiguration über Env-Variablen oder .env im Projektroot.
#   IMAGE  – vollständiger Image-Name  (default: aus .env)
#   TAG    – Tag                        (default: latest)
#
# Beispiel:
#   IMAGE=ghcr.io/user/mein-projekt TAG=v1.0.0 ./scripts/publish.sh
###############################################################################

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"
cd "$PROJECT_DIR"

# .env laden (falls vorhanden)
[ -f ".env" ] && set -a && . ".env" && set +a

IMAGE=${IMAGE:-"ghcr.io/speedyunited/grundseite"}
TAG=${TAG:-"latest"}
FULL="$IMAGE:$TAG"

echo "▶ Baue $FULL …"
docker build -t "$FULL" .

# Optional: auch :latest taggen wenn ein Version-Tag gesetzt ist
if [ "$TAG" != "latest" ]; then
  docker tag "$FULL" "$IMAGE:latest"
fi

echo "▶ Push $FULL …"
docker push "$FULL"
[ "$TAG" != "latest" ] && docker push "$IMAGE:latest"

echo "✅  $FULL erfolgreich gepusht."
