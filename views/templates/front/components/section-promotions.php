<div class="section-title">
    <span>Nos Programmes</span>
    <h2>Découvrez nos différents programmes</h2>
</div>

<div class="promotions-grid">
    <?php foreach ($data['promotions'] as $promotion) : ?>
        <a href="/section/promotion-<?= htmlspecialchars($promotion['id']) ?>" class="promotion-card">
            <div class="niveau"><?= htmlspecialchars($promotion['niveau']) ?></div>
            <div class="section"><?= htmlspecialchars($promotion['section']) ?></div>
            <div class="systeme"><?= htmlspecialchars($promotion['systeme']) ?></div>
            <?php if (isset($promotion['orientation']) && !empty($promotion['orientation'])) : ?>
                <div class="promotion-stats">
                    Orientation : <i class="fa fa-users"></i> <?= $promotion['orientation'] ?>
                </div>
            <?php endif; ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="section-stat text-center mt-4">
            <p><i class="fa fa-graduation-cap"></i> Total des programmes : <strong><?= count($data['promotions']) ?></strong></p>
        </div>
    </div>
</div>