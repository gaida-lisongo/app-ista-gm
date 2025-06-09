

<style>
.metric-item {
    text-align: center;
    padding: 30px 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.metric-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(223, 169, 116, 0.2);
}

.metric-item i {
    font-size: 40px;
    color: #dfa974;
    margin-bottom: 15px;
}

.metric-item h2 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 10px;
    color: #19191a;
}

.metric-item p {
    font-size: 16px;
    color: #707079;
    margin: 0;
}

@media (max-width: 768px) {
    .metric-item {
        margin-bottom: 20px;
    }
}
</style>

<section class="services-section spad" id="metrics">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="metric-item">
                    <i class="fa fa-building"></i>
                    <h2 class="counter sections-count">0</h2>
                    <p>Sections</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-item">
                    <i class="fa fa-graduation-cap"></i>
                    <h2 class="counter filieres-count">0</h2>
                    <p>Filières</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-item">
                    <i class="fa fa-users"></i>
                    <h2 class="counter etudiants-count">0</h2>
                    <p>Étudiants</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-item">
                    <i class="fa fa-users"></i>
                    <h2 class="counter agents-count">0</h2>
                    <p>Agents</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<script>
$(document).ready(function() {
    const apiUrl = '<?= API ?>';

    $.get(`${apiUrl}/home/metrics`)
    .done(function(response) {
        const {success, message, data} = response;
        
        if(success){
            const { sections, filieres, etudiants, agents } = data;

            $('.sections-count').text(sections);
            $('.filieres-count').text(filieres);
            $('.etudiants-count').text(etudiants);
            $('.agents-count').text(agents);

            $('.counter').each(function() {
                var $this = $(this);
                var countTo = $this.text();

                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        }
    })
    .fail(function() {
        console.error('Error fetching metrics data');
    });
});
</script>