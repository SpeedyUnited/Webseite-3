#!/bin/sh
set -e

# Usage:
#   IMAGE=ghcr.io/<user>/<repo> TAG=latest ./scripts/publish.sh
# Optional:
#   PHP_IMAGE=ghcr.io/<user>/<repo>-php (auto if Dockerfile.php exists)
# Defaults:
IMAGE=${IMAGE:-"ghcr.io/speedyunited/webseite-2"}
TAG=${TAG:-"latest"}
PHP_IMAGE=${PHP_IMAGE:-"${IMAGE}-php"}

FULL_IMAGE="$IMAGE:$TAG"

echo "Building $FULL_IMAGE"
docker build -t "$FULL_IMAGE" .

echo "Pushing $FULL_IMAGE"
docker push "$FULL_IMAGE"

if [ -f "Dockerfile.php" ]; then
	PHP_FULL_IMAGE="$PHP_IMAGE:$TAG"
	echo "Building $PHP_FULL_IMAGE"
	docker build -f Dockerfile.php -t "$PHP_FULL_IMAGE" .
	echo "Pushing $PHP_FULL_IMAGE"
	docker push "$PHP_FULL_IMAGE"
fi

echo "Done."
