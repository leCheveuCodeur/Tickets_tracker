<?php
require('model/frontend.php');

/**
 * @return void
 * @throws PDOException
 */
function allTickets()
{
    $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];

    $tickets = viewTickets();
    require('view/listTickets.php');
}

/**
 * @return void
 * @throws PDOException
 */
function newTicket()
{
    $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];

    if (viewTicket(date('Y-m-d')) == true) {
        $affectedTicket = viewTicket(date('Y-m-d'));
        $message = 'A ticket already exists to this day, you can modify or delete it.';
        require('view/modifyDeleteTicket.php');
    } elseif (isset($_POST['saveTicket'])) {
        $ticket = addTicket($_POST['titled'], $_POST['amount']);
        $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];
        $message = 'Ticket saved !';
        require('view/template.php');
    } else {
        require('view/addTicket.php');
    }
}

/**
 * @return void
 * @throws PDOException
 */
function modifyDeleteTicket()
{
    $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];

    if (isset($_POST['modifyTicket'])) {
        $affectedTicket = modifyTicket($_POST['date'], $_POST['titled'], $_POST['amount']);
        $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];
        $message = 'Ticket modified !';
        require('view/template.php');
    } elseif (isset($_POST['deleteTicket'])) {
        $affectedTicket = deleteTicket($_POST['date']);
        $total = [totalMonth(date('Y-m-d')), totalYear(date('Y-m-d'))];
        $message = 'Ticket deleted !';
        require('view/template.php');
    } elseif (isset($_POST['viewTicket'])) {
        $affectedTicket = viewTicket($_POST['date']);
        if ($affectedTicket === false) {
            $message = 'Ticket not found';
            require('view/modifyDeleteTicket.php');
        } else {
            require('view/modifyDeleteTicket.php');
        }
    } else {
        require('view/modifyDeleteTicket.php');
    }
}
