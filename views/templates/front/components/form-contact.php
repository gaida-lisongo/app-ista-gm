<form action="#" class="contact-form">
    <div class="row">
        <div class="col-lg-6">
            <input type="text" class="auth-name" placeholder="Votre nom" required>
        </div>
        <div class="col-lg-6">
            <input type="text" class="auth-email" placeholder="Votre email" required>
        </div>
        <div class="col-lg-12">
            <input type="text" class="auth-subject" placeholder="Concerne" required>
        </div>
        <div class="col-lg-12">
            <textarea class="auth-message" placeholder="Votre message" required></textarea>
            <div class="loading-spinner" style="display: none;">
                <div class="spinner"></div>
                <span>Envoi en cours...</span>
            </div>
            <div class="message-status" style="display: none;">
                <i class="fa fa-check-circle"></i>
                <span></span>
            </div>
            <button type="submit" class="submit-btn">Envoyer maintenant</button>
        </div>
    </div>
</form>

<style>
.loading-spinner {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    flex-direction: column;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #dfa974;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 10px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.message-status {
    text-align: center;
    margin: 20px 0;
    padding: 15px;
    border-radius: 5px;
    display: none;
}

.message-status.success {
    background-color: rgba(223, 169, 116, 0.1);
    color: #dfa974;
}

.message-status.error {
    background-color: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

.message-status i {
    font-size: 24px;
    margin-right: 10px;
}

.form-disabled {
    opacity: 0.7;
    pointer-events: none;
}
</style>

<script>
$(document).ready(function() {
    const form = $('.contact-form');
    const submitBtn = $('.submit-btn');
    const loadingSpinner = $('.loading-spinner');
    const messageStatus = $('.message-status');

    form.on('submit', function(e) {
        e.preventDefault();
        
        // Désactiver le formulaire et afficher le loader
        form.addClass('form-disabled');
        submitBtn.prop('disabled', true);
        loadingSpinner.fadeIn();
        messageStatus.hide();

        const payload = {
            nom: $('.auth-name').val(),
            email: $('.auth-email').val(),
            objet: $('.auth-subject').val(),
            contenu: $('.auth-message').val()
        };

        $.ajax({
            url: '<?= API ?>/home/contact',
            type: 'POST',
            data: JSON.stringify(payload),
            contentType: 'application/json',
            success: function(response) {
                const { success, message } = response;
                
                // Cacher le loader
                loadingSpinner.fadeOut();

                if (success) {
                    // Afficher le message de succès
                    messageStatus
                        .removeClass('error')
                        .addClass('success')
                        .html('<i class="fa fa-check-circle"></i><span>Message envoyé avec succès !</span>')
                        .fadeIn();
                    
                    // Réinitialiser le formulaire
                    form[0].reset();
                    
                    // Réactiver le formulaire après 3 secondes
                    setTimeout(() => {
                        form.removeClass('form-disabled');
                        submitBtn.prop('disabled', false);
                        messageStatus.fadeOut();
                    }, 3000);
                } else {
                    // Afficher le message d'erreur
                    messageStatus
                        .removeClass('success')
                        .addClass('error')
                        .html(`<i class="fa fa-times-circle"></i><span>${message}</span>`)
                        .fadeIn();
                    
                    // Réactiver le formulaire
                    form.removeClass('form-disabled');
                    submitBtn.prop('disabled', false);
                }
            },
            error: function() {
                // Gérer l'erreur
                loadingSpinner.fadeOut();
                messageStatus
                    .removeClass('success')
                    .addClass('error')
                    .html('<i class="fa fa-times-circle"></i><span>Erreur de connexion. Veuillez réessayer.</span>')
                    .fadeIn();
                
                form.removeClass('form-disabled');
                submitBtn.prop('disabled', false);
            }
        });
    });
});
</script>