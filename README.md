# Webseite-3

Aktuelle Version: 0.0.3

## Lokales Starten (Nginx + PHP-FPM)

Für lokale Tests bitte immer beide Container starten, da Nginx den Upstream `php` erwartet:

1) `docker compose up -d`
2) Aufruf: http://localhost:8080

Hinweis: Das Root-Compose erstellt ein internes Netzwerk automatisch.

## Prod-Stack (Caddy + externes Docker-Netzwerk)

Voraussetzung: Externes Netzwerk einmalig anlegen (z. B. `docker network create web`).
Dann den Website-Stack starten:

1) `docker compose -f config/docker-compose.yml up -d`
2) Caddy läuft separat und routet auf den Service-Namen im Netzwerk.

## Updates & Image-Push (universell)

Standard-Workflow für Updates:
1) Code ändern
2) Commit & Push
3) Image bauen + pushen mit:
`IMAGE=ghcr.io/speedyunited/webseite-3 TAG=0.0.3 ./scripts/publish.sh`

Für andere Projekte einfach `IMAGE` und `TAG` anpassen.

Wenn eine `Dockerfile.php` existiert, wird zusätzlich automatisch das PHP-Image
`<IMAGE>-php:<TAG>` gebaut und gepusht.

## Routing-Konzept (WireGuard + Caddy)

Ziel: Jeder Website-Container läuft **intern** im Docker-Netzwerk, extern erreichbar ist nur der Host.
WireGuard endet auf dem Debian-Host, Caddy nimmt HTTPS an und leitet an den richtigen Container weiter.

### Ablauf
1) Client verbindet sich per WireGuard zum Host
2) Caddy lauscht auf 80/443 und terminiert TLS
3) Caddy routet anhand der Domain zum richtigen Service im Docker-Netzwerk

### Netzwerk
Ein gemeinsames, externes Docker-Netzwerk (z. B. `web`) wird einmalig erstellt und von allen Stacks genutzt.
Jeder Website-Stack hängt in diesem Netzwerk und hat einen eindeutigen Service-Namen.

### Caddy-Routing
Beispiele (Caddyfile):
- `kunde1.example.com -> reverse_proxy web_kunde1:80`
- `kunde2.example.com -> reverse_proxy web_kunde2:80`

### Wichtige Punkte
- Website-Container brauchen **keine öffentlichen Ports**
- Caddy und die Website-Container müssen im **gleichen Docker-Netzwerk** sein
- Neue Website = neuer Stack + neue Route im Caddyfile