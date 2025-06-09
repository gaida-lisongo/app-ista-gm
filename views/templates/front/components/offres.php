
    <!-- Services Section End -->
    <section class="services-section spad" id="formations">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Enseignement</span>
                        <h2>Découvrez Nos Filières</h2>
                    </div>
                </div>
            </div>
            <div class="row filieres-list">
                <!-- Les filières seront chargées ici dynamiquement -->
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <script>
        $(document).ready(function() {
            // Code pour charger les filières depuis l'API
            const apiUrl = '<?= API ?>';
            $.get(`${apiUrl}/home`)
                .done(function(response) {
                    const { status, message, data } = response;

                    console.log('Chargement des filières:', data);
                    if (status) {
                        let html = '';
                        $('.filieres-list').text(html);
                        data.rows.forEach(filiere => {
                            html += `
                                <div class="col-lg-4 col-sm-6">
                                    <div class="service-item">
                                        <i class="flaticon-036-parking"></i>
                                        <h4>${filiere.designation}</h4>
                                        <p>${filiere.description}</p>
                                    </div>
                                </div>`;
                        });
                        $('.filieres-list').html(html);
                    } else {
                        console.error('Erreur lors du chargement des filières:', message);
                    }
                })
                .fail(function() {
                    console.error('Erreur de connexion à l\'API');
                });
        });
        </script>