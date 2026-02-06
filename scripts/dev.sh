#!/bin/bash
set -e
###############################################################################
# dev.sh – Lokaler Entwicklungsserver mit Live-Reload
#
# Baut das Image und startet den Container mit gemounteten src/-Dateien.
# Dateien bearbeiten → Browser refreshen → Änderung sichtbar.
#
# URL:     http://localhost:8080
# Stoppen: docker compose down
###############################################################################

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
cd "$(dirname "$SCRIPT_DIR")"

echo "▶ Baue Image und starte Dev-Container …"
docker compose up --build -d

echo ""
echo "✅  Webseite erreichbar unter: http://localhost:8080"
echo "    Stoppen mit:  docker compose down"
echo "    Logs:         docker compose logs -f"
