<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Personale</title>
    <script src="../Js/jquery-3.7.1.min.js"></script>
    <script src="../Cdn/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Cdn/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/find.css">
    <!--<link rel="stylesheet" href="../Cdn/fontawesome/all.min.css">-->

</head>

<body style="padding-top: 10%">
    <div class="container">

        <div class='divFind border border-black form'>
            <div class="row">
                <div class="col col-6">
                    <label for="dateFrom" class="form-label">Perido dal:</label>
                    <input type="date" class="form-control border-black input" id="dateFrom">
                </div>
                <div class="col col-6">
                    <label for="dateTo" class="form-label">Perido fino al:</label>
                    <input type="date" class="form-control border-black input" id="dateTo">
                </div>
            </div><br>

            <div class="row">
                <div class="col col-6">
                    <label for="ticketNumber" class="form-label">Numero ticket:</label>
                    <input type="number" class="form-control border-black input" id="ticketNumber" min="0">
                </div>
                <div class="col col-6">
                    <label for="statusCall" class="form-label">Stato chiamata:</label>
                    <select id="statusCall" class="form-control input">
                        <option value="" selected disabled>Seleziona lo stato</option>
                        <option value="open">Aperto</option>
                        <option value="close">Chiuso</option>
                        <option value="suspended">Sospeso</option>
                        <option value="cancelled">Annullato</option>
                    </select>
                </div>
            </div><br>

            <div class="row">
                <div class="col col-6">
                    <label for="group" class="form-label">Gruppo tecnico:</label>
                    <select id="group" class="form-control input">
                        <option value="" selected disabled>Seleziona il gruppo</option>
                        <option value="pcArea">Area PC e reti</option>
                        <option value="AS400">AS400</option>
                        <option value="java">Java</option>
                        <option value="accounting">Contabilità</option>
                        <option value="trainers">Formatori</option>
                        <option value="derma">Derma</option>
                        <option value="terzisti">Terzisti</option>
                        <option value="commercial">Commerciali</option>
                    </select>
                </div>
                <div class="col col-6">
                    <label for="internalPerson" class="form-label">Persona interna:</label>
                    <select id="internalPerson" class="form-control input">
                        <option value="" selected disabled>Seleziona il personale interno</option>
                        <option value="derma">Derma</option>
                    </select>
                </div>
            </div><br>

            <div class="row">
                <div class="col col-6">
                    <label for="client" class="form-label">Cliente:</label>
                    <input type="text" name="cliente" id="cliente" class="form-control border-black input">
                </div>
            </div>
        </div>
</body>

</html>