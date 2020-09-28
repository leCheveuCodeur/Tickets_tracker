<?php ob_start(); ?>

<h2>Modify / Delete Ticket</h2>
<form class="modifDel" action="" method="post">
 <?php echo $label = !empty($affectedTicket) ? '' : '<label for="date">Enter the date of the ticket to be modified or delete :</label></br>' ?>
 <input type="date" name="date" value="<?php echo $date = !empty($affectedTicket) ? $affectedTicket['dating'] : '' ?>" required>
 <input class="access" type="submit" value="View" name="viewTicket"></br>

 <?php
 if (!empty($affectedTicket)) {
 ?>
  <div class="ticket">
   <label for="titled">Ticket contents</label></br>
   <textarea name="titled" cols="40" rows="10"><?php echo $titled = htmlspecialchars($affectedTicket['titled']); ?></textarea></br>
   <label for="amount">Amount : €</label>
   <input type="number" name="amount" value="<?php echo $amount = htmlspecialchars($affectedTicket['amount']); ?>"></br>
   <input class="access" type="submit" value="Modify" name="modifyTicket">
   <input class="access" type="submit" value="Delete" name="deleteTicket">
  </div>
 <?php
 }
 ?>

</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>