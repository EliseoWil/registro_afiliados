<script>
    $(function() {
        $.validator.setDefaults({

            submitHandler: function() {
                RegUsuario()
            }
        })
        $(document).ready(function() {
            $("#FormRegUsuario").validate({
                rules: {
                    login: {
                        required: true,
                        minlength: 5
                    },
                    usuario: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    rolUsuario: "required"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback'),
                    element.closest('.form-group').append(error)
                },

                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid')
                    /* .is-invalid */
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid')
                }
            })
        })
    })
</script>