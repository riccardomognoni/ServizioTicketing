function visualizza() {
    var dateFrom = document.getElementById("dateFrom").value;
    var dateTo = document.getElementById("dateTo").value;
    var ticketNumber = document.getElementById("ticketNumber").value;
    var statusCall = document.getElementById("statusCall").value;

    if (dateFrom === "" || dateTo === "" || ticketNumber === "" || statusCall === "") {
        var url = "./visualizza.php?";
        if (dateFrom !== "") {
            url += "dateFrom=" + dateFrom + "&";
        }
        if (dateTo !== "") {
            url += "dateTo=" + dateTo + "&";
        }
        if (ticketNumber !== "") {
            url += "ticketNumber=" + ticketNumber + "&";
        }
        if (statusCall !== "") {
            url += "statusCall=" + statusCall;
        }
        window.location.href = url;
    }
    
}
