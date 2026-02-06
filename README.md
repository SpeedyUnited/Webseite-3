# Grundseite-Standard-Docker

Docker-Vorlage für PHP-Webseiten als **Single-Image** (Nginx + PHP-FPM in einem Container).  
Repo klonen → Dateien in `src/` anpassen → Image pushen → auf dem Server mit einem Befehl starten.

---

## Schnellstart

### 1. Vorlage nutzen

```bash
# Repo als Vorlage klonen (oder GitHub "Use this template")
git clone https://github.com/SpeedyUnited/Grundseite-Standard-Docker.git mein-projekt
cd mein-projekt
```

### 2. Lokal entwickeln

```bash
./scripts/dev.sh
# → http://localhost:8080
# Dateien in src/ bearbeiten → Browser refreshen → fertig
```

### 3. Image bauen & pushen

```bash
# Manuell
IMAGE=ghcr.io/dein-user/mein-projekt TAG=v1.0.0 ./scripts/publish.sh

# Oder automatisch: Git-Tag pushen → GitHub Actions baut & pusht
git tag v1.0.0 && git push --tags
```

### 4. Auf dem Server deployen

```bash
# Nur diesen einen Befehl braucht der Server:
docker run -d \
  --name mein-projekt \
  --restart unless-stopped \
  -p 127.0.0.1:8081:80 \
  --cpus 0.50 --memory 256m \
  --log-opt max-size=10m --log-opt max-file=3 \
  ghcr.io/dein-user/mein-projekt:v1.0.0

# Oder mit dem Deploy-Script:
IMAGE=ghcr.io/dein-user/mein-projekt TAG=v1.0.0 ./scripts/deploy.sh
```

**Das war's.** Ein Image, ein Container, alles läuft.

---

## Projektstruktur

```
├── Dockerfile              # Single-Image: Nginx + PHP-FPM (Alpine)
├── docker-compose.yml      # Nur für lokale Entwicklung (Live-Sync)
├── .github/workflows/      # CI/CD: Automatisch bauen & pushen
├── config/
│   ├── nginx.conf          # Nginx-Konfiguration (Gzip, Caching, Security)
│   ├── entrypoint.sh       # Startet PHP-FPM + Nginx
│   ├── Caddyfile           # Beispiel: Host-Caddy Reverse-Proxy
│   └── wireguard/          # Beispiel: WireGuard-Tunnel-Configs
├── scripts/
│   ├── dev.sh              # Lokaler Dev-Server starten
│   ├── publish.sh          # Image bauen & in Registry pushen
│   ├── deploy.sh           # Container auf Server starten
│   └── setup-wireguard.sh  # WireGuard-Tunnel aktivieren
├── src/                    # ← DEINE WEBSEITE
│   ├── index.php
│   ├── header.php / footer.php
│   ├── css/ js/ assets/
│   └── ...
└── tests/                  # Tests (optional)
```

## Für ein neues Projekt anpassen

1. **`src/`** – Eigene PHP/HTML/CSS/JS-Dateien einfügen
2. **`.env`** erstellen (optional):
   ```env
   IMAGE=ghcr.io/dein-user/mein-projekt
   TAG=latest
   HOST_PORT=8081
   NAME=mein-projekt
   ```
3. **`config/Caddyfile`** – Domain & Port anpassen
4. Fertig – Image bauen & deployen

## Features im Image

- **Nginx + PHP 8.3 FPM** in einem Alpine-Container (~30 MB)
- **OPcache** aktiviert für schnelle PHP-Ausführung
- **Gzip-Komprimierung** für CSS/JS/SVG/JSON
- **Security-Header** (X-Content-Type-Options, X-Frame-Options, XSS-Protection)
- **Static-Asset-Caching** (30 Tage für Bilder/CSS/JS)
- **Healthcheck** eingebaut
- **Graceful Shutdown** (PHP-FPM wird sauber beendet)
- **Ressourcenlimits** (CPU/RAM) im Deploy-Script
- **Log-Rotation** (max 3 × 10 MB)

## Routing-Konzept (Produktion)

```
Client → WireGuard → Host → Caddy (TLS) → 127.0.0.1:PORT → Container
```

- Container binden **nur auf 127.0.0.1** – nie öffentlich
- **Caddy** auf dem Host terminiert TLS und routet auf den Container-Port
- **WireGuard** verbindet lokalen Rechner mit dem Server

## Docker-Regeln

- Nur `docker run`, kein Compose in Produktion
- Ports nur `127.0.0.1:PORT:80` – nie `0.0.0.0`
- Kein `--network host`, kein `--privileged`
- Immer `--restart unless-stopped`
- Immer `--cpus` + `--memory` Limits
- Immer Log-Rotation