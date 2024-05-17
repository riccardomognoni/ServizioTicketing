$(document).ready(async function () {
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);

    let dateFrom = urlParams.get('dateFrom');
    let dateTo = urlParams.get('dateTo');
    let statusCall = urlParams.get('statusCall');
    
    data = {
        dateFrom: dateFrom,
        dateTo: dateTo,
        statusCall: statusCall
    };

    let response = await request("GET", "../../Ajax/getTicket.php", data);
    console.log(response);

});