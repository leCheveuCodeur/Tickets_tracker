<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="public/css/normalize.css">
 <link rel="stylesheet" href="public/css/style.css">
 <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
 <title>Exo 2</title>
</head>

<body>
 <main>
  <h1>APP Ticket</h1>

  <form action="" method="POST" class="nav">
   <?php if (isset($_POST['viewTickets']) || isset($_POST['newTicket']) || isset($_POST['modifyDeleteTicket']) || isset($_POST['viewTicket'])) {
    echo '<input class ="template" type="submit" name="home" value="Home">';
   }
   if (!isset($_POST['viewTickets'])) {
    echo '<input class ="template" type="submit" name="viewTickets" value="View tickets">';
   }
   if (!isset($_POST['newTicket'])) {
    echo '<input class ="template" type="submit" name="newTicket" value="New ticket">';
   }
   if (!isset($_POST['modifyDeleteTicket']) && !isset($_POST['viewTicket']) && !isset($_POST['newTicket'])) {
    echo '<input class ="template" type="submit" name="modifyDeleteTicket" value="Modify / Delete">';
   }
   ?>
  </form>

  <table class="total" cellspacing="0">
   <tr>
    <td>Total of Month</td>
    <td>: <?php echo $total[0] . ' €'; ?></td>
   </tr>
   <tr>
    <td>Total of Year</td>
    <td>: <?php echo $total[1] . ' €'; ?></td>
   </tr>
  </table>

  <?php echo !empty($message)? '<div class="message">'.$message.'</div>' : ''?>

  <?php echo isset($content) ? $content : '' ?>
 </main>
</body>

</html>