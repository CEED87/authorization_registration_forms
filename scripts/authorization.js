$("document").ready(function() {

    $("#aut").on("click", function() {
        let dataForm = $("#authorization").serialize()
        
        $.ajax({
            url: '/requestAuthoriz.php',
            method: 'post',
            dataType: 'json',
            data: dataForm,
            success: function(data) {
                if (data.user) {
                    $("#mess").removeClass("userY").addClass("userN")
                    $("#mess").html('No user found with this username or password!')
                    $('form[id="authorization"]').trigger('reset');
                } 
                else if (data.login == '' || data.password == '') {
                    $("#mess").removeClass("userY").addClass("userN")
                    $("#mess").html('All fields must be filled!') 
                }
                else
                window.location.href = 'userAccount.php'   
            }
        })
    })
})
