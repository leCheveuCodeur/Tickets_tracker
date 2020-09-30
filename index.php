<?php
require('controller/frontend.php');


if (isset($_POST['viewTickets'])) {
    allTickets();
} elseif (isset($_POST['newTicket']) || isset($_POST['saveTicket'])) {
    newTicket();
} elseif (isset($_POST['modifyDeleteTicket']) || isset($_POST['viewTicket']) || isset($_POST['modifyTicket']) || isset($_POST['deleteTicket'])) {
    modifyDeleteTicket();
} elseif (isset($_POST['home'])) {
    $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];
    require('view/template.php');
} else {
    $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];
    require('view/template.php');
}
