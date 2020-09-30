<?php

/**
 * @return PDO
 */
function dbConnect()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=app_ticket;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
}

/**
 * @return PDOStatement|false
 */
function viewTickets()
{
    $db = dbConnect();
    $req = $db->query('SELECT * FROM tickets');

    return $req;
}

/**
 * @param mixed $date
 * @return mixed
 * @throws PDOException
 */
function viewTicket($date)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT dating, titled, amount FROM tickets WHERE dating = ?');
    $req->execute(array($date));
    $affectedTicket = $req->fetch();

    return $affectedTicket;
}

/**
 * @param mixed $titled
 * @param mixed $amount
 * @return bool
 * @throws PDOException
 */
function addTicket($titled, $amount)
{
    $db = dbConnect();
    $addTicket = $db->prepare('INSERT INTO tickets(dating, titled, amount) VALUES (NOW(), ?, ?)');
    $newTicket = $addTicket->execute(array(trim($titled), $amount));

    return $newTicket;
}

/**
 * @param mixed $date
 * @param mixed $titled
 * @param mixed $amount
 * @return bool
 * @throws PDOException
 */
function modifyTicket($date, $titled, $amount)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE tickets SET titled = ?, amount=? WHERE dating= ?');
    $modifyTicket = $req->execute(array(trim($titled), $amount, $date));

    return $modifyTicket;
}

/**
 * @param mixed $date
 * @return bool
 * @throws PDOException
 */
function deleteTicket($date)
{
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM tickets WHERE dating = ? ');
    $deleteTicket = $req->execute(array($date));

    return $deleteTicket;
}

/**
 * @param mixed $date
 * @return mixed
 * @throws PDOException
 */
function totalMonth($date)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT SUM(amount) AS sum_month FROM tickets WHERE MONTH(dating)=MONTH(?) AND YEAR(dating)=YEAR(?)');
    $req->execute(array($date, $date));
    $totalMonth = $req->fetchColumn(0);

    return $totalMonth;
}

/**
 * @param mixed $date
 * @return mixed
 * @throws PDOException
 */
function totalYear($date)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT SUM(amount) AS sum_year FROM tickets WHERE YEAR(dating)=YEAR(?)');
    $req->execute(array($date));
    $totalYear = $req->fetchColumn(0);

    return $totalYear;
}
