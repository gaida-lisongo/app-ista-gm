<section class="timeline-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Notre Histoire</span>
                    <h2>L'évolution de l'ISTA/GM à travers le temps</h2>
                </div>
            </div>
        </div>
        <div class="timeline">
            <div class="timeline-item left">
                <div class="content">
                    <div class="date">1904</div>
                    <h3>Fondation de la Mission Catholique</h3>
                    <p>Création de la mission catholique de Gombe Matadi par les Frères des écoles chrétiennes et les Missionnaires protestants.</p>
                </div>
            </div>
            <div class="timeline-item right">
                <div class="content">
                    <div class="date">1950</div>
                    <h3>Écoles Techniques</h3>
                    <p>Création des écoles techniques et professionnelles par les colonisateurs belges à Gombe Matadi.</p>
                </div>
            </div>
            <div class="timeline-item left">
                <div class="content">
                    <div class="date">1993</div>
                    <h3>Création de l'ISTA/GM</h3>
                    <p>Création officielle de l'Institut Supérieur de Techniques Appliquées de Gombe Matadi dans le cadre de la politique d'essaimage.</p>
                </div>
            </div>
            <div class="timeline-item right">
                <div class="content">
                    <div class="date">2008</div>
                    <h3>Début des Activités</h3>
                    <p>Début officiel des activités académiques suite à l'arrêté ministériel N° MINESURS/CABMIN/028/2008.</p>
                </div>
            </div>
            <div class="timeline-item left">
                <div class="content">
                    <div class="date">2014</div>
                    <h3>Cadre Légal</h3>
                    <p>Adaptation à la loi-cadre N° 14/004 de l'enseignement national.</p>
                </div>
            </div>
            <div class="timeline-item right">
                <div class="content">
                    <div class="date">2020</div>
                    <h3>Expansion</h3>
                    <p>Acquisition d'un terrain de 2 hectares à Kikeba pour l'extension des infrastructures.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 40px auto;
}

.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #dfa974;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}

.timeline-item {
    padding: 10px 40px;
    position: relative;
    width: 50%;
    box-sizing: border-box;
}

.left {
    left: 0;
}

.right {
    left: 50%;
}

.content {
    padding: 20px 30px;
    background-color: white;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    position: relative;
}

.content::after {
    content: '';
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: white;
    border: 4px solid #dfa974;
    border-radius: 50%;
    top: 20px;
}

.left .content::after {
    right: -67px;
}

.right .content::after {
    left: -67px;
}

.date {
    color: #dfa974;
    font-weight: bold;
    margin-bottom: 10px;
    font-size: 18px;
}

.content h3 {
    color: #19191a;
    margin-bottom: 10px;
    font-size: 20px;
}

.content p {
    color: #707079;
    line-height: 1.6;
}

@media screen and (max-width: 768px) {
    .timeline::after {
        left: 31px;
    }
    
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
    }
    
    .right {
        left: 0;
    }
    
    .content::after {
        left: -41px !important;
    }
}
</style>