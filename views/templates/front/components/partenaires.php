<!-- Section Activités Académiques -->
<section class="activities-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Calendrier</span>
                    <h2>Activités académiques</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="activitesCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Les items seront ajoutés ici dynamiquement -->
                    </div>
                    <a class="carousel-control-prev" href="#activitesCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#activitesCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.activities-section {
    padding: 80px 0;
    background: #f9f9f9;
}

.activity-card {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    margin: 10px;
    text-align: center;
}

.activity-card h4 {
    color: #dfa974;
    margin-bottom: 15px;
}

.activity-card p {
    color: #707079;
    margin-bottom: 15px;
    line-height: 1.6;
}

.activity-date {
    color: #19191a;
    font-weight: 500;
}

.carousel-control-prev,
.carousel-control-next {
    background: rgba(223, 169, 116, 0.8);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}

.carousel-item {
    padding: 20px;
}
</style>

<script>
$(document).ready(function() {
    const apiUrl = '<?= API ?>';
    
    // Fonction pour formater la date
    function formatDate(dateStr) {
        const date = new Date(dateStr);
        const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                       'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        return `${date.getDate()}/${months[date.getMonth()]}/${date.getFullYear()}`;
    }
    
    $.get(`${apiUrl}/home/calendrier`)
        .done(function(response) {
            if (response.success && response.data.length > 0) {
                const carouselInner = $('.carousel-inner');
                
                response.data.forEach((item, index) => {
                    const itemHtml = `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                            <div class="activity-card">
                                <img src="/config/ista-assets/images/logo.png" alt="ISTA Logo" class="activity-logo">
                                <h4>${item.moi}</h4>
                                <p>${item.description}</p>
                                <div class="activity-date">
                                    <i class="fa fa-calendar"></i> ${item.semestre} - 
                                    <i class="fa fa-clock"></i> ${formatDate(item.date)}
                                </div>
                            </div>
                        </div>
                    `;
                    carouselInner.append(itemHtml);
                });

                // Initialiser le carousel
                $('#activitesCarousel').carousel({
                    interval: 5000, // 5 secondes par slide
                    wrap: true,
                    keyboard: true
                });
            } else {
                $('#activitesCarousel').html(`
                    <div class="activity-card">
                        <p>Aucune activité académique pour le moment.</p>
                    </div>
                `);
            }
        })
        .fail(function(error) {
            console.error('Erreur:', error);
            $('#activitesCarousel').html(`
                <div class="activity-card">
                    <p>Impossible de charger les activités.</p>
                </div>
            `);
        });
});
</script>