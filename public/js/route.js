
//connection  à la base de donnée avec ajax
$(document).ready(function () {
    $("#resultat").hide(1);
    $("#submit").click(function (e) {
        e.preventDefault();
        $.post(
            'http://localhost/mini-projetDB/src/controller/indexController.php', // Un script PHP que l'on va créer juste après
            {
                login: $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password: $("#password").val()
            },
            function (data) {
                if ($("#login").val() ==="")    {
                    $("#login-error").html("Veuillez saisir votre  nom d'utilisateur !")
                        .fadeIn().delay(2000).fadeOut();
                }
                else  if ($("#password").val() ==="")    {
                    $("#password-error").html("Veuillez saisir votre  mot de passe !")
                        .fadeIn().delay(2000).fadeOut();
                }
                else {
                    if (data === 'joueur') {
                        $("#resultat").show().html("CONNEXION REUSSIE CHARGEMENT ...");
                        setTimeout(function () {
                            window.location.href = "src/template/joueur/joueur.php";
                        }, 2000);
                    } else if (data === 'admin') {
                        $("#resultat").show().html("CONNEXION ...");
                        setTimeout(function () {
                            window.location.href = "src/template/admin/admin.php";
                        }, 2000);
                    } else if (data === 'password not found') {
                        //lors ce que le mot de passe ne correspond pas a celle du login
                        $("#password-error").html("mot de passe incorrecte")
                            .fadeIn().delay(2000).fadeOut();
                    } else if (data === 'not found') {
                        //lors ce quele login ne ce trouve pas dans notre base de donnée
                        $("#login-error").html("Cet utilisateur n'a pas de compte? inscrivez-vous pour se connecter")
                            .fadeIn().delay(2000).fadeOut();
                    }
                }

            },
            'text'
        );
    });
});
//inscription et mise a jour de la base de  donnée
$(document).ready(function () {
    $("#resultat").hide(1);
    $("#submitIns").click(function (e) {
        e.preventDefault();
        $.post(
            'http://localhost/mini-projetDB/src/controller/inscriptionController.php', // Un script PHP que l'on va créer juste après
            {
                login: $("#login").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                nom: $("#nom").val(),
                prenom: $("#prenom").val(),
                password: $("#password").val(),
                cPassword: $("#cPassword").val(),
                file: document.getElementById("file").value,
            },
            function (data) {
                if ($("#login").val() === "") {
                    $("#login-error").html("Veuillez saisir votre  nom d'utilisateur !")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);

                } else if ($("#nom").val() === "") {
                    $("#nom-error").html("Veuillez saisir votre  nom  !")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);

                } else if ($("#prenom").val() === "") {
                    $("#prenom-error").html("Veuillez saisir votre  prénom  !")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);

                } else if ($("#password").val() === "") {
                    $("#password-error").html("Veuillez saisir votre  mot de passe  !")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);
                } else if ($("#cPassword").val() !== $("#password").val()) {
                    $("#cPassword-error").html("mot de passe non identique!")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);

                } else if (document.getElementById("file").value ==="") {
                    $("#file-error").html("Choisisez une photo!")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);

                } else {
                    if (data === 'login existe') {
                        $("#login-error").html("ce login existe")
                            .fadeIn().delay(2000).fadeOut();
                        console.log(data);
                    } else {
                        $("#resultat").show().html("inscription réussie connectez-vous à votre compte ...");
                        setTimeout(function () {
                            window.location.href = "../../../index.php";
                        }, 2000);
                        console.log(data);
                    }
                }

            },
            'text'
        );
    });
});