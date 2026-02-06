#!/bin/sh
set -e

# Usage:
#   IMAGE=ghcr.io/<user>/<repo> TAG=latest ./scripts/publish.sh
# Optional:
#   PHP_IMAGE=ghcr.io/<user>/<repo>-php (auto if Dockerfile.php exists)
# Defaults:
IMAGE=${IMAGE:-"ghcr.io/speedyunited/webseite-3"}
TAG=${TAG:-"latest"}

FULL_IMAGE="$IMAGE:$TAG"

echo "Building $FULL_IMAGE"
docker build -t "$FULL_IMAGE" .

echo "Pushing $FULL_IMAGE"
docker push "$FULL_IMAGE"

echo "Done."
