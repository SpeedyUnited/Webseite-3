<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - HolzWerk Meister</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
        $projects = [
            [
                'title' => 'Wohnküche Eiche Natur',
                'text' => 'Offenes Raumkonzept mit Insel, verstecktem Stauraum und matter Öloberfläche.',
                'tags' => ['Küche', 'Eiche', 'Maßarbeit']
            ],
            [
                'title' => 'Home-Office mit Akustik',
                'text' => 'Schallreduzierende Wandpaneele und integrierte Kabelkanäle für klare Ordnung.',
                'tags' => ['Büro', 'Akustik', 'Innenausbau']
            ],
            [
                'title' => 'Boutique-Hotel Empfang',
                'text' => 'Empfangstresen aus Nussbaum mit indirekter Beleuchtung und Messingdetails.',
                'tags' => ['Gewerbe', 'Empfang', 'Design']
            ],
            [
                'title' => 'Wohnzimmerwand mit Medienmodul',
                'text' => 'Schwebende Elemente, versteckte Technikfächer und klare Linienführung.',
                'tags' => ['Wohnraum', 'Medien', 'Stauraum']
            ],
            [
                'title' => 'Restaurierte Gründerzeit-Kommode',
                'text' => 'Behutsame Aufarbeitung, neue Beschläge und konservierte Patina.',
                'tags' => ['Restaurierung', 'Vintage', 'Handarbeit']
            ],
            [
                'title' => 'Praxis-Einbauten',
                'text' => 'Pflegeleichte Oberflächen, robuste Kanten und angenehme Haptik.',
                'tags' => ['Gewerbe', 'Innenausbau', 'Hygiene']
            ]
        ];
    ?>

    <section class="py-5">
        <div class="container">
            <h1>Unser Portfolio</h1>
            <p class="section-subtitle">Ausgewählte Projekte, die unsere Bandbreite und Detailverliebtheit zeigen.</p>
            <div class="row">
                <?php foreach ($projects as $index => $project): ?>
                    <div class="col-md-4">
                        <div class="card portfolio-card">
                            <?php
                                $imageIndex = $projects ? ($index % 3) + 1 : 1;
                                $imagePath = "assets/gallery{$imageIndex}.svg";
                            ?>
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($project['title']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($project['text']); ?></p>
                                <div class="tag-list">
                                    <?php foreach ($project['tags'] as $tag): ?>
                                        <span><?php echo htmlspecialchars($tag); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-5 section-dark">
        <div class="container">
            <h2 class="text-center mb-4">Projektanfrage</h2>
            <p class="section-subtitle">Sie möchten etwas Ähnliches? Wir entwickeln eine Lösung, die perfekt zu Ihnen passt.</p>
            <div class="text-center">
                <a href="contact.php" class="btn btn-primary btn-lg">Projekt anfragen</a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
