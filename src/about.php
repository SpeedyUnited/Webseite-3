<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Über uns - HolzWerk Meister</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
        $values = [
            [
                'title' => 'Ehrliches Handwerk',
                'text' => 'Wir arbeiten präzise, nachvollziehbar und mit klaren Abläufen – vom ersten Entwurf bis zur Montage.'
            ],
            [
                'title' => 'Nachhaltige Materialien',
                'text' => 'Wir bevorzugen zertifizierte Hölzer und langlebige Oberflächen, die lange Freude bereiten.'
            ],
            [
                'title' => 'Design mit Funktion',
                'text' => 'Unsere Lösungen verbinden Ästhetik mit cleverem Stauraum und durchdachten Details.'
            ]
        ];

        $milestones = [
            ['year' => '2006', 'text' => 'Gründung als kleine Familienwerkstatt in Musterstadt.'],
            ['year' => '2012', 'text' => 'Erweiterung um CNC-Fertigung und eigene Lackierkabine.'],
            ['year' => '2018', 'text' => 'Spezialisierung auf Innenausbau für Büros und Boutique-Hotels.'],
            ['year' => '2024', 'text' => 'Neuer Showroom mit Materialbibliothek und Musterküchen.']
        ];

        $team = [
            ['name' => 'Mara Hoffmann', 'role' => 'Projektleitung & Beratung', 'text' => 'Koordiniert Zeitpläne, Budgets und sorgt für klare Kommunikation.'],
            ['name' => 'Jonas Richter', 'role' => 'Meister im Möbelbau', 'text' => 'Spezialist für passgenaue Einbauten und hochwertige Oberflächen.'],
            ['name' => 'Elena Weber', 'role' => 'Innenarchitektur', 'text' => 'Entwirft Raumkonzepte, Lichtideen und Materialkombinationen.']
        ];
    ?>

    <section class="page-hero">
        <div class="container">
            <div class="page-hero-content">
                <h1>Über HolzWerk Meister</h1>
                <p>
                    Wir sind eine Werkstatt, die modernes Design mit traditioneller Handwerkskunst verbindet.
                    Unsere Projekte entstehen in enger Zusammenarbeit mit unseren Kundinnen und Kunden – mit
                    dem Ziel, Räume zu schaffen, die sich gut anfühlen und dauerhaft funktionieren.
                </p>
                <div class="page-hero-tags">
                    <span>Familienbetrieb</span>
                    <span>Showroom</span>
                    <span>Eigene Fertigung</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Unsere Werte</h2>
            <p class="section-subtitle">Was uns antreibt und weshalb unsere Projekte so langlebig sind.</p>
            <div class="row">
                <?php foreach ($values as $value): ?>
                    <div class="col-md-4">
                        <div class="info-card">
                            <h4><?php echo htmlspecialchars($value['title']); ?></h4>
                            <p><?php echo htmlspecialchars($value['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 section-glow">
        <div class="container">
            <h2 class="text-center mb-4">Unser Weg</h2>
            <p class="section-subtitle">Ein Blick auf die wichtigsten Schritte unserer Entwicklung.</p>
            <div class="timeline">
                <?php foreach ($milestones as $milestone): ?>
                    <div class="timeline-item">
                        <div class="timeline-year"><?php echo htmlspecialchars($milestone['year']); ?></div>
                        <div class="timeline-text"><?php echo htmlspecialchars($milestone['text']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Das Team</h2>
            <p class="section-subtitle">Erfahrene Fachkräfte, die Ihr Projekt von Anfang bis Ende begleiten.</p>
            <div class="row">
                <?php foreach ($team as $member): ?>
                    <div class="col-md-4">
                        <div class="card team-card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($member['name']); ?></h5>
                                <p class="team-role"><?php echo htmlspecialchars($member['role']); ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($member['text']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 section-dark">
        <div class="container">
            <h2 class="text-center mb-4">Werkstatt & Showroom</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>
                        In unserer Werkstatt verbinden wir digitale Präzision mit Handarbeit. Besucherinnen und
                        Besucher können im Showroom Materialien anfassen, Oberflächen vergleichen und Muster sehen.
                    </p>
                    <ul class="list-check">
                        <li>Materialbibliothek mit Holz-, Metall- und Textilmustern</li>
                        <li>Live-Einblick in Fertigung und Montage</li>
                        <li>Bemusterung von Griffen, Lacken und Beschlägen</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <h4>Besuch nach Termin</h4>
                        <p>
                            Vereinbaren Sie einen Termin für eine persönliche Beratung. Wir nehmen uns Zeit für Ihre
                            Ideen und zeigen passende Referenzen.
                        </p>
                        <a href="contact.php" class="btn btn-primary">Termin anfragen</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
