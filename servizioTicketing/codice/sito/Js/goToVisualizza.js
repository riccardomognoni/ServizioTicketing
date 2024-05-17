function visualizza() {
    let dateFrom = $("#dateFrom").val();
    let dateTo = $("#dateTo").val();
    let ticketNumber = $("#ticketNumber").val();
    let statusCall = $("#statusCall").val();

    if (dateFrom !== "" && dateTo !== "" && ticketNumber !== "" && statusCall !== ""
        && dateFrom <= dateTo && ticketNumber > 0
    ) {
        let url = "./visualizza.php?";
        if (dateFrom !== "") {
            url += "dateFrom=" + dateFrom + "&";
        }
        if (dateTo !== "") {
            url += "dateTo=" + dateTo + "&";
        }
        if (ticketNumber !== "") {
            url += "ticketNumber=" + ticketNumber.toString() + "&";
        }
        if (statusCall !== "") {
            url += "statusCall=" + statusCall;
        }
        window.location.href = url;
    }
    else {
        alert("Inserire tutti i campi correttamente");
    }
    
}
