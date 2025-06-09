<?php
    $email = $data['section']['email'] ?? '';
?>
    <div class="leave-comment">
        <h4>Vous avez une préoccupation ?</h4>
        <form action="#" class="comment-form">
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" class="name-contact" placeholder="Nom complet" required>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="email-contact" placeholder="Votre email" value="<?= htmlspecialchars($email) ?>" required>
                </div>
                <div class="col-lg-12 text-center">
                    <input type="text" class="objet-contact" placeholder="Object" required>
                    <textarea class="contenu-contact" placeholder="Messages" required></textarea>
                    <button type="submit" class="site-btn">Envoyer le message</button>
                </div>
                <div class="col-lg-12">
                    <p class="text-center mt-3 message-response"></p>
                </div>
            </div>
        </form>
    </div>
    <br />
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('.comment-form').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Collect form data
                var formData = {
                    nom: $(this).find('.name-contact').val(),
                    email: $(this).find('.email-contact').val(),
                    objet: $(this).find('.objet-contact').val(),
                    contenu: $(this).find('.contenu-contact').val(),
                    sectionId: '<?= $data['section']['id'] ?>' // Assuming you have the section ID available
                };

                const urlBase = '<?= API ?>'; // Base URL for your API
                // Send the data to the server (you need to implement the server-side logic)
                $.ajax({
                    url: urlBase + '/home/message-section', // Change this URL to your server endpoint
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);

                        if(response.status == 200) {
                            $('.message-response').text('Nous vous répondrons dans les plus brefs délais.').css('color', 'green');
                        } else {
                            $('.message-response').text('Error: ' + response.message).css('color', 'red');
                        }
                        $('.comment-form')[0].reset(); // Reset the form
                    },
                    error: function() {
                        $('.message-response').text('There was an error sending your message. Please try again later.').css('color', 'red');
                    }
                });
            });
        });
    </script>
