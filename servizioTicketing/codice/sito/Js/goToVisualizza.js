function visualizza() {
    let dateFrom = $("#dateFrom").val();
    let dateTo = $("#dateTo").val();
    let statusCall = $("#statusCall").val();

    let url = "./visualizza.php?";

    if (dateFrom !== "" && dateTo !== "" && dateFrom > dateTo) {
        alert("La data di inizio non può essere maggiore della data di fine");
        return;
    }

    url += "dateFrom=" + dateFrom + "&";
    url += "dateTo=" + dateTo + "&";
    url += "statusCall=" + statusCall;

    window.location.href = url;
}
