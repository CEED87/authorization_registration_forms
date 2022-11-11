$("document").ready(function () {

    let messArr = [
        'User with this login already exists!',
        'Registration completed successfully!',
        'User with this email address already exists!',
        'All fields must be filled!'
    ]

    $("#reg").on("click", function (e) {
        let dataForm = $("#register").serialize()
        $.ajax({
            url: '/requestRegister.php',
            method: 'post',
            dataType: 'json',
            data: dataForm,
            success: function (data) {
// console.log(data)
                if (data.user) {
                    $("#mess").html(messArr[0])
                    $("#mess").removeClass("userY").addClass("userN");
                }
                if (data.status) {
                    $('#mess').html(messArr[1])
                    $("#mess").removeClass("userN").addClass("userY");
                    $('form[id="register"]').trigger('reset');
                }
                if (data.Email) {
                    $('#mess').html(messArr[2])
                    $("#mess").removeClass("userY").addClass("userN");
                }
                if (data.empty) {
                    $('#mess').html(messArr[3])
                    $("#mess").removeClass("userY").addClass("userN");
                }
            }
        })
    })
})