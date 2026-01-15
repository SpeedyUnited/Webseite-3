#!/bin/bash
# WireGuard-Setup
echo "Aktiviere WireGuard..."
sudo wg-quick up ./config/wireguard/local-server.conf
echo "Tunnel verbunden"