<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dienstleistungen - HolzWerk Meister</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
        $services = [
            [
                'title' => 'Möbelbau nach Maß',
                'text' => 'Individuelle Möbel für Küche, Wohnraum und Büro – passgenau geplant und gefertigt.',
                'features' => ['Einbauschränke', 'Esstische & Bänke', 'Sideboards & Regalsysteme']
            ],
            [
                'title' => 'Innenausbau & Akustik',
                'text' => 'Durchdachte Raumkonzepte mit funktionalen Oberflächen und angenehmer Akustik.',
                'features' => ['Wandverkleidungen', 'Akustikpaneele', 'Raumteiler & Türen']
            ],
            [
                'title' => 'Restaurierung',
                'text' => 'Wir bewahren den Charakter historischer Stücke und verbessern behutsam die Stabilität.',
                'features' => ['Oberflächenaufarbeitung', 'Stabilisierung', 'Reparatur von Beschlägen']
            ]
        ];

        $packages = [
            [
                'title' => 'Startpaket',
                'price' => 'ab 1.200 €',
                'text' => 'Ideal für Einzelstücke wie Regale oder kleine Einbauten.'
            ],
            [
                'title' => 'Raumkonzept',
                'price' => 'ab 4.800 €',
                'text' => 'Komplettlösung inklusive Planung, Fertigung und Montage.'
            ],
            [
                'title' => 'Business-Ausbau',
                'price' => 'auf Anfrage',
                'text' => 'Skalierbare Konzepte für Büros, Praxen und Showrooms.'
            ]
        ];

        $faqs = [
            [
                'question' => 'Kann ich eigene Ideen oder Skizzen mitbringen?',
                'answer' => 'Ja, wir freuen uns über Inspirationen und entwickeln daraus ein professionelles Konzept.'
            ],
            [
                'question' => 'Arbeitet ihr auch mit Architekturbüros zusammen?',
                'answer' => 'Gern. Wir liefern präzise Werkpläne und setzen Entwürfe zuverlässig um.'
            ],
            [
                'question' => 'Wie läuft die Montage ab?',
                'answer' => 'Unser Team arbeitet sauber, schützt Ihre Räume und führt eine finale Qualitätskontrolle durch.'
            ]
        ];
    ?>

    <section class="py-5">
        <div class="container">
            <h1>Unsere Dienstleistungen</h1>
            <p class="section-subtitle">Klar strukturierte Leistungen – transparent geplant und handwerklich umgesetzt.</p>
            <div class="row">
                <?php foreach ($services as $service): ?>
                    <div class="col-md-4">
                        <div class="card service-card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($service['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($service['text']); ?></p>
                                <ul class="service-list">
                                    <?php foreach ($service['features'] as $feature): ?>
                                        <li><?php echo htmlspecialchars($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="contact.php" class="btn btn-primary">Projekt besprechen</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 section-dark">
        <div class="container">
            <h2 class="text-center mb-4">Unsere Pakete</h2>
            <p class="section-subtitle">Für jede Größenordnung eine passende Lösung – flexibel anpassbar.</p>
            <div class="row">
                <?php foreach ($packages as $package): ?>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <div class="stat-value"><?php echo htmlspecialchars($package['price']); ?></div>
                            <div class="stat-label"><?php echo htmlspecialchars($package['title']); ?></div>
                            <p class="mt-3"><?php echo htmlspecialchars($package['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Ablauf & Planung</h2>
            <p class="section-subtitle">Wir begleiten Sie Schritt für Schritt – vom Aufmaß bis zur Übergabe.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-card">
                        <h4>Transparente Planung</h4>
                        <p>
                            Jeder Auftrag startet mit einer detaillierten Bedarfsermittlung. Danach erhalten Sie eine
                            klare Kostenaufstellung und einen Terminplan.
                        </p>
                        <ul class="list-check">
                            <li>Verbindliches Angebot</li>
                            <li>Material- und Farbbemusterung</li>
                            <li>3D-Visualisierung auf Wunsch</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <h4>Saubere Umsetzung</h4>
                        <p>
                            Wir koordinieren Lieferung, Montage und Endabnahme – damit Sie sich zurücklehnen können.
                        </p>
                        <ul class="list-check">
                            <li>Feste Ansprechpartner</li>
                            <li>Staubarme Montage</li>
                            <li>Endkontrolle & Pflegehinweise</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-faq">
        <div class="container">
            <h2 class="text-center mb-4">Häufige Fragen</h2>
            <p class="section-subtitle">Die wichtigsten Antworten rund um unsere Leistungen.</p>
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

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
