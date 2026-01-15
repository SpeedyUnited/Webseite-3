<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HolzWerk Meister - Präzise Holzverarbeitung</title>
    <meta name="description" content="Ihr Partner für hochwertige Holzverarbeitung: Möbel, Innenausbau und mehr.">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
        $serviceCards = [
            [
                'title' => 'Möbelbau nach Maß',
                'text' => 'Individuelle Einbauten, Tische und Schränke, passgenau für Ihre Räume geplant und gefertigt.',
                'link' => 'services.php'
            ],
            [
                'title' => 'Innenausbau & Raumkonzepte',
                'text' => 'Ganzheitliche Raumlösungen für Wohnen und Gewerbe – von Akustik bis Stauraum.',
                'link' => 'services.php'
            ],
            [
                'title' => 'Restaurierung & Pflege',
                'text' => 'Traditionelles Handwerk trifft moderne Techniken, um Werte zu erhalten und zu veredeln.',
                'link' => 'services.php'
            ]
        ];

        $stats = [
            ['value' => '18+', 'label' => 'Jahre Erfahrung'],
            ['value' => '420', 'label' => 'abgeschlossene Projekte'],
            ['value' => '6', 'label' => 'Wochen Ø Projektlaufzeit'],
            ['value' => '98%', 'label' => 'Weiterempfehlung']
        ];

        $processSteps = [
            [
                'title' => 'Beratung & Aufmaß',
                'text' => 'Wir hören zu, messen präzise und entwickeln gemeinsam die optimale Lösung.'
            ],
            [
                'title' => 'Design & Planung',
                'text' => '3D-Visualisierung, Materialauswahl und ein klarer Projektplan schaffen Sicherheit.'
            ],
            [
                'title' => 'Fertigung in der Werkstatt',
                'text' => 'Moderne Maschinen und Handarbeit sorgen für saubere Kanten und perfekte Passungen.'
            ],
            [
                'title' => 'Montage & Feinschliff',
                'text' => 'Zügiger Einbau, Schutz Ihrer Räume und finale Qualitätskontrolle.'
            ]
        ];

        $materials = [
            'Eiche, Nussbaum und Esche aus zertifizierter Forstwirtschaft',
            'Matte Öle für natürliche Haptik und langlebigen Schutz',
            'Kratzfeste Lacke für stark beanspruchte Oberflächen',
            'Intelligente Beschläge mit Soft-Close und Push-to-Open'
        ];

        $faqs = [
            [
                'question' => 'Wie lange dauert ein typisches Projekt?',
                'answer' => 'Im Schnitt 4–8 Wochen, abhängig von Umfang, Materialverfügbarkeit und Montagezeit.'
            ],
            [
                'question' => 'Bietet ihr Vor-Ort-Beratung an?',
                'answer' => 'Ja, die Erstberatung und das Aufmaß erfolgen direkt bei Ihnen vor Ort.'
            ],
            [
                'question' => 'Wie läuft die Preisgestaltung ab?',
                'answer' => 'Sie erhalten ein transparentes Angebot mit klaren Positionen und verbindlichen Terminen.'
            ]
        ];
    ?>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">Handwerk & Design aus einer Hand</div>
                <h1>HolzWerk Meister – Präzision, die man sieht und fühlt</h1>
                <p>
                    Wir gestalten einzigartige Möbel und Innenräume, die funktional sind und gleichzeitig Wärme ausstrahlen.
                    Von der ersten Skizze bis zur letzten Schraube entstehen Stücke, die Generationen begleiten.
                </p>
                <div class="hero-actions">
                    <a href="contact.php" class="btn btn-primary btn-lg">Projekt starten</a>
                    <a href="portfolio.php" class="btn btn-outline-light btn-lg">Portfolio ansehen</a>
                </div>
                <div class="hero-highlights">
                    <span class="hero-chip">Individuelle Planung</span>
                    <span class="hero-chip">Nachhaltige Materialien</span>
                    <span class="hero-chip">Saubere Montage</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Unsere Dienstleistungen</h2>
            <p class="section-subtitle">Ob Einzelstück oder Komplettausbau – wir verbinden Ästhetik, Funktion und langlebige Qualität.</p>
            <div class="row">
                <?php foreach ($serviceCards as $card): ?>
                    <div class="col-md-4">
                        <div class="card service-card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($card['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($card['text']); ?></p>
                                <a href="<?php echo htmlspecialchars($card['link']); ?>" class="btn btn-primary">Mehr erfahren</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 section-glow">
        <div class="container">
            <h2 class="text-center mb-4">Vertrauen in Zahlen</h2>
            <p class="section-subtitle">Zuverlässigkeit, die messbar ist – von der Planung bis zur Übergabe.</p>
            <div class="row">
                <?php foreach ($stats as $stat): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card">
                            <div class="stat-value"><?php echo htmlspecialchars($stat['value']); ?></div>
                            <div class="stat-label"><?php echo htmlspecialchars($stat['label']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Warum HolzWerk Meister?</h2>
            <p class="section-subtitle">Ihr Projekt ist bei uns in erfahrenen Händen – präzise, sauber und termintreu.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-card">
                        <h4>Qualität & Präzision</h4>
                        <p>
                            Wir fertigen mit klaren Toleranzen, hochwertigen Beschlägen und einem Blick fürs Detail.
                            Das Ergebnis: Möbel, die perfekt passen – und lange halten.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <h4>Nachhaltigkeit</h4>
                        <p>
                            Wir setzen auf zertifizierte Hölzer, kurze Lieferwege und eine ressourcenschonende Verarbeitung.
                            So entsteht Qualität mit gutem Gewissen.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-dark">
        <div class="container">
            <h2 class="text-center mb-4">So läuft Ihr Projekt ab</h2>
            <p class="section-subtitle">Ein klarer Prozess sorgt für Transparenz und Planungssicherheit.</p>
            <div class="row">
                <?php foreach ($processSteps as $index => $step): ?>
                    <div class="col-md-3">
                        <div class="step-card">
                            <div class="step-number">0<?php echo $index + 1; ?></div>
                            <h5><?php echo htmlspecialchars($step['title']); ?></h5>
                            <p><?php echo htmlspecialchars($step['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Materialien & Oberflächen</h2>
            <p class="section-subtitle">Sinnvolle Materialwahl sorgt für Optik, Haptik und Langlebigkeit.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="material-card">
                        <h4>Unsere Empfehlungen</h4>
                        <ul class="material-list">
                            <?php foreach ($materials as $material): ?>
                                <li><?php echo htmlspecialchars($material); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="material-card material-card-highlight">
                        <h4>Fiktive Projektidee</h4>
                        <p>
                            Ein offenes Loft mit maßgeschneidertem Regalraum, versteckter Technik und einer
                            warmen Eichenküche. Das Lichtkonzept unterstreicht die Maserung und schafft
                            eine ruhige, edle Atmosphäre.
                        </p>
                        <div class="material-badges">
                            <span>Matte Ölung</span>
                            <span>Soft-Close</span>
                            <span>Akustiklamellen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Kundenstimmen</h2>
            <p class="section-subtitle">Echte Worte, echte Begeisterung – aus fiktiven, aber realistischen Projekten.</p>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Perfekte Arbeit! Unsere Küche sieht fantastisch aus."</p>
                        <footer class="blockquote-footer">Anna M., München</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Schnell, zuverlässig und kreativ. Empfehlenswert!"</p>
                        <footer class="blockquote-footer">Thomas K., Berlin</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Restaurierung hat unser altes Möbelstück wiederbelebt."</p>
                        <footer class="blockquote-footer">Lisa S., Hamburg</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-faq">
        <div class="container">
            <h2 class="text-center mb-4">Häufige Fragen</h2>
            <p class="section-subtitle">Schnelle Antworten auf die wichtigsten Themen.</p>
            <div class="row">
                <?php foreach ($faqs as $faq): ?>
                    <div class="col-md-4">
                        <div class="faq-card">
                            <h5><?php echo htmlspecialchars($faq['question']); ?></h5>
                            <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2>Bereit für Ihr Projekt?</h2>
            <p>
                Teilen Sie uns Ihre Idee mit – wir erstellen ein klares Konzept, einen transparenten Zeitplan
                und ein Angebot, das zu Ihrem Budget passt.
            </p>
            <a href="contact.php" class="btn btn-light btn-lg">Kostenlos beraten lassen</a>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
