<?php ob_start(); ?>

<table class="listTickets" cellspacing="0">
  <thead>
    <tr>
      <td>Date</td>
      <td>Titled</td>
      <td>Amount</td>
      <td></td>
    </tr>
  </thead>
  <tbody class="text-center">

    <?php
    while ($ticket = $tickets->fetch()) {
      if (strlen($ticket['titled']) > 20) {
        $titled = substr($ticket['titled'], 0, 30);
        $last_space = strrpos($titled, " ");
        $titled = substr($titled, 0, $last_space) . "...";
      } else {
        $titled = $ticket['titled'];
      }

      echo '<tr>
        <td>' . $ticket['dating'] . '</td>
        <td> ' . htmlspecialchars($titled) . '</td>
        <td>' . $ticket['amount'] . '€</td>
        <td><form action="" method="POST"><input type="hidden" name="date" value="' . $ticket['dating'] . '"><input class="access" type="submit" name="viewTicket" value="View Ticket"></form> </td>
        </tr>';
    }
    ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>