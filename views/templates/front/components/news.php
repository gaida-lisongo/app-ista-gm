<!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row news-list">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="./blog-details.html">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="./blog-details.html">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="./blog-details.html">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-4.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Trivago</span>
                            <h4><a href="./blog-details.html">A Time Travel Postcard</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 22th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-5.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="./blog-details.html">A Time Travel Postcard</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 25th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-6.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="./blog-details.html">Virginia Travel For Kids</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 28th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-7.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="./blog-details.html">Bryce Canyon A Stunning</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 29th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-8.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event & Travel</span>
                            <h4><a href="./blog-details.html">Motorhome Or Trailer</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="<?= $path ?>img/blog/blog-9.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="./blog-details.html">Lost In Lagos Portugal</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    <script>
        const formatDate = (dateString) => {
            //dateString ex. 2025-06-09T07:54:20.000Z
            // Convert the date string to a Date object and format it
            const date = new Date(dateString);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('fr-FR', options);
        };

        $(document).ready(function() {
            // get all news from the API
            const apiUrl = '<?= API ?>';
            $.getJSON(`${apiUrl}/home/communiques`, function(resp) {
                console.log('Chargement des communiqués:', resp);
                const { data, success, message } = resp;

                if (!success) {
                    console.error('Erreur lors du chargement des communiqués:', message);
                    return;
                }

                // Clear existing items
                $('.news-list').empty();
                
                // Loop through the news items and display them
                let newsItem = '';
                $.each(data, function(index, item) {
                    // Générer une image aléatoire entre 1 et 9
                    const randomImg = Math.floor(Math.random() * 9) + 1;
                    newsItem += `
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item set-bg" data-setbg="/config/ista-assets/images/ista-profile.png">
                                <div class="bi-text">
                                    <span class="b-tag">${item.service}</span>
                                    <h4><a href="/communique-${item.id}">${item.titre}</a></h4>
                                    <div class="b-time"><i class="icon_clock_alt"></i> ${formatDate(item.date_created)}</div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                // Ajouter les éléments au DOM
                $('.news-list').html(newsItem);
                
                // Réappliquer set-bg aux nouveaux éléments
                $('.blog-item').each(function() {
                    $(this).css('background-image', 'url(' + $(this).data('setbg') + ')');
                });
            });
        });
    </script>
    <style>
        .blog-item {
    height: 470px;
    background-size: cover;
    background-position: center;
    margin-bottom: 30px;
}
    </style>
