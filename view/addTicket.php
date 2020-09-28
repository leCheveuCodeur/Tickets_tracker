<?php ob_start(); ?>

<div class="newTicket">
 <h2>New Ticket</h2>
 <form action="" method="post">
  <label for="titled">Enter the purchased items and their quantities :</label></br>
  <textarea name="titled" cols="40" rows="10" required><?php echo $titled = isset($_POST['titled']) ? $_POST['titled'] : ''; ?></textarea></br>
  <label for="amount">Amount : €</label>
  <input type="number" name="amount" value="<?php echo $amount = isset($_POST['amount']) ? $_POST['amount'] : '' ?>" required></br>
  <input class="access" type="submit" value="Save" name="saveTicket">
 </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>