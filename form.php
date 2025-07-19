<script src="https://www.google.com/recaptcha/api.js?render=6LepWIgrAAAAAOG9p1ejVma3SDhqKDULaftvmB8f" defer></script>

<div class="inquiry-form">
    <form id="contact-form" action="./send.php" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="form-inner mb-35">
                    <label>Full Name *</label>
                    <input type="text" name="name" id="nameInput" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-35">
                    <label>Email*</label>
                    <input type="email" name="email" id="emailInput" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-inner mb-35">
                    <label>Phone *</label>
                    <input type="text" name="phone" id="telInput" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-inner">
                    <label>Interested in</label>
                    <select class="nice-select" name="product">
                        <option>Ecommerce development</option>
                        <option>Product design</option>
                        <option>Web Development</option>
                        <option>UI/UX Design</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-inner">
                    <label>what about your baget</label>
                    <select name="budget" class="nice-select">
                        <option value="0-10000">₹0 to ₹10,000</option>
                        <option value="10000-20000">₹10,000 to ₹20,000</option>
                        <option value="20000-30000">₹20,000 to ₹30,000</option>
                        <option value="30000-40000">₹30,000 to ₹40,000</option>
                        <option value="40000-50000">₹40,000 to ₹50,000</option>
                        <option value="50000-60000">₹50,000 to ₹60,000</option>
                        <option value="60000-70000">₹60,000 to ₹70,000</option>
                        <option value="70000-80000">₹70,000 to ₹80,000</option>
                        <option value="80000-90000">₹80,000 to ₹90,000</option>
                        <option value="90000-100000">₹90,000 to ₹1,00,000</option>

                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-inner mb-40">
                    <label>Message *</label>
                    <textarea id="messageInput"></textarea>
                </div>
            </div>
        </div>
        <div class="form-inner">
            <!-- <a class="primary-btn-three" type="submit" name="contact-form" data-text="Submit" href="error.html">
                    <span>Submit</span>
                  </a> -->

            <button type="submit" class="primary-btn-three">Submit</button>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script defer>
    document.addEventListener('DOMContentLoaded', function() {
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            const $form = $(this);

            // Run custom validation (your own function)
            const isValid = validateForm();

            if (isValid) {
                grecaptcha.ready(function() {
                    grecaptcha.execute('6LepWIgrAAAAAOG9p1ejVma3SDhqKDULaftvmB8f', {
                        action: 'submit_form'
                    }).then(function(token) {
                        // Append token to the form as hidden input
                        if ($form.find('input[name="token"]').length === 0) {
                            $form.append('<input type="hidden" name="token" value="' + token + '">');
                        } else {
                            $form.find('input[name="token"]').val(token);
                        }

                        const action = $form.attr('action');
                        const method = $form.attr('method');

                        $.ajax({
                            type: method,
                            url: action,
                            data: $form.serialize(),
                            success: function(response) {
                                
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Form Submitted!',
                                    text: 'Thank you for contacting us.',
                                });

                                $form[0].reset();
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Submission Failed!',
                                    text: 'Please try again later.',
                                });
                            }
                        });
                    });
                });
            }
        });


        function validateForm() {
            $('.error').remove();
            var isValid = true;

            var nameReg = /^[A-Za-z\s]+$/;
            var numberReg = /^[0-9]+$/;
            var emailReg = /^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/;

            var name = $('#nameInput').val().trim();
            var email = $('#emailInput').val().trim();
            var phone = $('#telInput').val().trim();
            var message = $('#messageInput').val().trim();

            if (name === '') {
                $('#nameInput').before('<span class="error" style="color:red;">Please enter your name</span>');
                isValid = false;
            } else if (!nameReg.test(name)) {
                $('#nameInput').before('<span class="error" style="color:red;">Letters and spaces only</span>');
                isValid = false;
            }

            if (email === '') {
                $('#emailInput').before('<span class="error" style="color:red;">Please enter your email</span>');
                isValid = false;
            } else if (!emailReg.test(email)) {
                $('#emailInput').before('<span class="error" style="color:red;">Enter a valid email</span>');
                isValid = false;
            }

            if (phone === '') {
                $('#telInput').before('<span class="error" style="color:red;">Please enter your phone</span>');
                isValid = false;
            } else if (!numberReg.test(phone)) {
                $('#telInput').before('<span class="error" style="color:red;">Numbers only</span>');
                isValid = false;
            }

            if (message === '') {
                $('#messageInput').before('<span class="error" style="color:red;">Please enter your message</span>');
                isValid = false;
            }
            return isValid;
        }
    });
</script>