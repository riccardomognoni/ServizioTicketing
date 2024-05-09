$(document).ready(function () {
    $("#username").keyup(function () {
        $(this).val($(this).val().toLowerCase());
    });

    $("#nome, #cognome").keyup(function () {
        // mi salvo al posizione del cursore
        let start = this.selectionStart;
        $(this).val($(this).val().toLowerCase());
        let valore = $(this).val();

        if (valore.includes(" ")) {
            let array = valore.split(" ");
            let stringa = "";

            array.forEach(parola => {
                stringa += parola.charAt(0).toUpperCase() + parola.slice(1) + " ";
            });

            // rimuovo lo spazio finale soltanto se ha inserito una sola parola
            if (array.length == 1) {
                stringa = stringa.trim();
            }

            $(this).val(stringa);
        } else {
            $(this).val(valore.charAt(0).toUpperCase() + valore.slice(1));
        }

        // riposiziono il cursore
        this.selectionStart = start;
        this.selectionEnd = start;
    });

    $("#email").keyup(function () {
        let valore = $(this).val();
        $(this).val(valore.toLowerCase());
        $(this).val(valore.replace(/[^a-zA-Z0-9@._-]/g, ""));
    });

    $("form").submit(async function (e) {
        e.preventDefault();

        let nome = $("#nome").val();
        let cognome = $("#cognome").val();
        let username = $("#username").val();
        let ruolo = $("#ruolo").val();
        if (!username.includes("_") && (ruolo === null || ruolo === undefined)) {
            $("#error").html("L'username deve contenere il carattere _");
            return false;
        }
        let password = calc($("#password").val());
        let confermaPassword = calc($("#confermaPassword").val());
        if (password != confermaPassword) {
            $("#error").html("Le password non coincidono");
            return false;
        }
        let email = $("#email").val();
        if (!validateEmail(email)) {
            $("#error").html("Email non valida");
            return false;
        }

        let data = {};
        if (ruolo !== null && ruolo !== undefined) {
            data = {
                nome: nome,
                cognome: cognome,
                username: username,
                password: password,
                email: email,
                ruolo: ruolo
            };
        }
        else {
            data = {
                nome: nome,
                cognome: cognome,
                username: username,
                password: password,
                email: email
            };
        }

        let response = await request($("form").attr("method"),
            (!ruolo) ? "../Ajax/checkRegistration.php" : "../../Ajax/checkRegistration.php",
            data);

        response = JSON.parse(response);
        let message = response.message;

        if (response.status == "success") {
            let data = {
                email: email,
                subject: "Registrazione avvenuta con successo",
                message: message
            };
            let response = await request($("form").attr("method"), "../Ajax/sendEmail.php", data);
            let array = response.split("<br>");

            response = JSON.parse(array[array.length - 1].trim());

            if (response.status == "success") {
                window.location.href = "./login.php";
            } else {
                $("#error").html("Errore nell'invio dell'email di conferma");
            }

        } else {
            $("#error").html(response.message);
        }

        return false;
    });

});

function validateEmail(email) {
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}
