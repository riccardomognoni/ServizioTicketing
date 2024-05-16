let customerNav =  `
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="./areaPersonale.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./createTicket.php">Crea Ticket</a>
        </li>
    </ul>
</div>
<button class="btn btn-danger" onclick="window.location.href='../logout.php'" style='margin-right:2%;'>Logout</button>
`;

let adminNav = `
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="./admin_home.php">Home</a>
        </li>
    </ul>
</div>
<button class="btn btn-danger" onclick="window.location.href='../logout.php'" style='margin-right:2%;'>Logout</button>
`;

let employeeNav = `
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="./areaEmployee.php">Home</a>
        </li>
    </ul>
</div>
<button class="btn btn-danger" onclick="window.location.href='../logout.php'" style='margin-right:2%;'>Logout</button>
`;

function generateNavBar(userType) {
    let navBar = "";
    $("nav").attr("class", "navbar navbar-expand-lg navbar-light bg-light");
    switch (userType) {
        case "customer":
            navBar = customerNav;
            break;
        case "admin":
            navBar = adminNav;
            break;
        case "employee":
            navBar = employeeNav;
            break;
        default:
            navBar = "";
            break;
    }
    $("nav").html(navBar);
}