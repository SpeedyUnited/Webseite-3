#!/bin/bash
# Deployment-Script
echo "Starte Docker-Container..."
docker-compose -f config/docker-compose.yml up --build -d
echo "Website läuft auf Port 8080"