<?php
if (!defined("IN_MOD"))
{
	die("Nah, I won't serve that file to you.");
}
if ((!empty($_POST['to'])) && (!empty($_POST['title'])) && (!empty($_POST['text'])))
		{
			$result = $conn->query("SELECT * FROM users WHERE username='".$conn->real_escape_string($_POST['to'])."'");
			if ($result->num_rows == 1)
			{
				$row = $result->fetch_assoc();
				$text = processEntry($conn, $_POST['text']);
				$title = $conn->real_escape_string($_POST['title']);
				$conn->query("INSERT INTO pm (created, from_user, to_user, title, text, read_msg, resto) VALUES (".time().", ".$_SESSION['id'].", ".$row['id'].", '".$title."', '".$text."', 0, 0)");
			?>
<?php $mitsuba->admin->ui->startSection($lang['mod/msg_sent']); ?>
<a href="?/inbox/new"><?php echo $lang['mod/back']; ?></a>
<?php $mitsuba->admin->ui->endSection(); ?>
			<?php
			} else {
			?>
<?php $mitsuba->admin->ui->startSection($lang['mod/user_not_found']); ?>
<a href="?/inbox/new"><?php echo $lang['mod/back']; ?></a>
<?php $mitsuba->admin->ui->endSection(); ?>
			<?php
			}
		} else {
		$username = "";
		$title = "";
		if ((!empty($_GET['id'])) && (is_numeric($_GET['id'])))
		{
			$result = $conn->query("SELECT users.username, pm.* FROM pm LEFT JOIN users ON pm.from_user=users.id WHERE pm.to_user=".$_SESSION['id']." AND pm.id=".$_GET['id']);
			if ($result->num_rows == 1)
			{
				$row = $result->fetch_assoc();
				$username = $row['username'];
				$title = "Re: ".$row['title'];
			}
		}
		?>
<?php $mitsuba->admin->ui->startSection($lang['mod/send_message']); ?>

<form action="?/inbox/new" method="POST">
<?php echo $lang['mod/to']; ?>: <input type="text" name="to" value="<?php echo $username; ?>" /><br />
<?php echo $lang['mod/title']; ?>: <input type="text" name="title" value="<?php echo $title; ?>" /><br />
<?php echo $lang['mod/text']; ?>:<br />
<textarea name="text" cols=40 rows=9></textarea><br />
<input type="submit" value="<?php echo $lang['mod/submit']; ?>" />
</form>
<?php $mitsuba->admin->ui->endSection(); ?>
		<?php
		}
?>