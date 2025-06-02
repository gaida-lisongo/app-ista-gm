
        <div class="tag-share">
            <div class="tags">
            <?php
            foreach ($data['promotions'] as $promotion) {
            ?>
                <a href="/section/promotion-<?= htmlspecialchars($promotion['id']) ?>"><?= htmlspecialchars($promotion['niveau']) ?> <?= htmlspecialchars($promotion['section']) ?> - <?= htmlspecialchars($promotion['systeme']) ?></a>
            <?php
            }
            ?>
            </div>
            <div class="social-share">
                <span><i class="fa fa-users"></i> Promotions:</span>
                <span class="share-count"><?= count($data['promotions']) ?></span>
            </div>
        </div>