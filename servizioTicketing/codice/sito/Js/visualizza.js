$(document).ready(function () {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);

    let dateFrom = urlParams.get('dateFrom');
    let dateTo = urlParams.get('dateTo');
    let ticketNumber = urlParams.get('ticketNumber');
    let statusCall = urlParams.get('statusCall');
    
    data = {
        dateFrom: dateFrom,
        dateTo: dateTo,
        ticketNumber: ticketNumber,
        statusCall: statusCall
    };

    let response = request("GET", "../../Ajax/getTicket.php", data);

});