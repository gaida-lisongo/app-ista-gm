<?php
$section = $data['section'];
$bureau = array(
    'chef' => [
        "nom" => $section['chef_section'],
        "phone" => $section['chef-phone'],
        "image" => $path . "/ista-profile.png",
        "titre" => "Chef de Section"
    ],
    'secretaire' => [
        "nom" => $section['sec_section'],
        "phone" => $section['sec-phone'],
        "image" => $path . "/ista-profile.png",
        "titre" => "Secrétaire"
    ]
);
?>

<div class="section-title">
    <span>Bureau de Section</span>
    <h2>Notre équipe administrative</h2>
</div>

<div class="row justify-content-center mb-5">
    <?php foreach ($bureau as $role => $membre) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow">
                <!-- Image de profil avec bordure et overlay -->
                <div class="position-relative">
                    <div class="rounded-circle overflow-hidden mx-auto mt-4" style="width: 150px; height: 150px; border: 3px solid #dfa974;">
                        <img src="<?= htmlspecialchars($membre['image']) ?>" 
                             class="card-img-top img-fluid" 
                             alt="<?= htmlspecialchars($membre['titre']) ?>"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>
                
                <!-- Corps de la carte -->
                <div class="card-body text-center">
                    <h5 class="card-title mb-0" style="color: #19191a;">
                        <?= htmlspecialchars($membre['nom']) ?>
                    </h5>
                    <p class="text-muted mb-2" style="color: #dfa974 !important;">
                        <?= htmlspecialchars($membre['titre']) ?>
                    </p>
                    
                    <!-- Information de contact -->
                    <?php if (!empty($membre['phone'])) : ?>
                        <p class="mb-3">
                            <i class="fa fa-phone text-primary"></i>
                            <a href="tel:<?= htmlspecialchars($membre['phone']) ?>" 
                               class="text-muted text-decoration-none">
                                <?= htmlspecialchars($membre['phone']) ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <!-- Boutons d'action -->
                    <div class="d-flex justify-content-center gap-2">
                        <?php if (!empty($membre['phone'])) : ?>
                            <a href="tel:<?= htmlspecialchars($membre['phone']) ?>" 
                               class="btn btn-sm" 
                               style="background-color: #dfa974; color: white;">
                                <i class="fa fa-phone"></i> Appeler
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
</style>