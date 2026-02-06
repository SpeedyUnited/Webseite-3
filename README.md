# Webseite-3

Aktuelle Version: v0.1.0

## Konzept

Ein **einzelnes Docker-Image** (Nginx + PHP-FPM im selben Container).
Kein Compose, kein separater PHP-Container – nur `docker run`.

## Starten

```bash
# Lokal (Port 8080)
docker run -d \
  --name webseite-3 \
  --restart unless-stopped \
  -p 127.0.0.1:8080:80 \
  --cpus 0.50 --memory 256m \
  --log-opt max-size=10m --log-opt max-file=3 \
  ghcr.io/speedyunited/webseite-3:v0.1.0
# Aufruf: http://127.0.0.1:8080

# Produktion via Deploy-Script (Port 8081)
./scripts/deploy.sh

# Oder mit angepasstem Port/Tag:
HOST_PORT=8082 TAG=v0.2.0 ./scripts/deploy.sh
```

Der Container ist **nur auf 127.0.0.1** erreichbar, niemals auf 0.0.0.0.

## Image bauen & pushen

```bash
IMAGE=ghcr.io/speedyunited/webseite-3 TAG=v0.1.0 ./scripts/publish.sh
```

Für andere Projekte einfach `IMAGE` und `TAG` anpassen.

## Routing-Konzept (WireGuard + Caddy)

Kein Container ist öffentlich erreichbar. Alles läuft über den Host.

### Architektur
- **WireGuard** läuft auf dem Host (kein Docker-Service)
- **Caddy** läuft auf dem Host (kein Docker-Service)
- **Website-Container** binden nur auf `127.0.0.1:<PORT>:80`

### Ablauf
1) Client → WireGuard → Host
2) Host-Caddy lauscht auf 80/443, terminiert TLS
3) Caddy routet auf `127.0.0.1:<PORT>` des jeweiligen Containers

### Caddy-Routing (Host-Caddyfile)
```
holzwerk-meister.example.com {
    reverse_proxy 127.0.0.1:8081
}
```

### Verbindliche Docker-Regeln
- Nur `docker run`, kein Compose für Single-Image-Projekte
- Ports nur mit `127.0.0.1` – niemals `0.0.0.0`
- Kein `--network host`, kein `--privileged`
- Ressourcenlimits (`--cpus`, `--memory`) und Log-Rotation
- Healthcheck für den Web-Service
- `--restart unless-stopped`
- Secrets nur über Env-Variablen / `.env`, nie hardcoded