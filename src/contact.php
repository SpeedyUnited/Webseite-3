<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - HolzWerk Meister</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="py-5">
        <div class="container">
            <h1>Kontaktieren Sie uns</h1>
            <p class="section-subtitle">Erzählen Sie uns von Ihrem Projekt – wir melden uns in der Regel innerhalb von 48 Stunden zurück.</p>
            <div class="row">
                <div class="col-md-7">
                    <div class="form-card">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Max Mustermann" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="max@beispiel.de" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon (optional)</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="0123 456789">
                            </div>
                            <div class="mb-3">
                                <label for="service" class="form-label">Gewünschte Leistung</label>
                                <select class="form-select" id="service" name="service">
                                    <option>Möbelbau nach Maß</option>
                                    <option>Innenausbau & Akustik</option>
                                    <option>Restaurierung</option>
                                    <option>Beratung & Planung</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nachricht</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Beschreiben Sie kurz Ihr Projekt..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Senden</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-card">
                        <h4>HolzWerk Meister GmbH</h4>
                        <p>Musterstraße 1<br>12345 Musterstadt</p>
                        <p>Telefon: 0123 456789<br>E-Mail: info@holzwerkmeister.de</p>
                        <div class="contact-divider"></div>
                        <h5>Öffnungszeiten</h5>
                        <ul class="hours-list">
                            <li><span>Mo – Fr</span><span>08:00 – 18:00</span></li>
                            <li><span>Sa</span><span>09:00 – 13:00</span></li>
                            <li><span>So</span><span>geschlossen</span></li>
                        </ul>
                        <p class="contact-note">Showroom-Besuche bitte nach Terminvereinbarung.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-glow">
        <div class="container">
            <h2 class="text-center mb-4">So erreichen Sie uns</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Kurze Wege</h4>
                        <p>Parkplätze direkt vor dem Showroom und barrierefreier Zugang.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Digitale Beratung</h4>
                        <p>Auf Wunsch per Video-Call inkl. Material- und Farbberatung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-card">
                        <h4>Projekt-Checkliste</h4>
                        <p>Wir senden Ihnen vorab eine kurze Liste, damit wir direkt starten können.</p>
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
