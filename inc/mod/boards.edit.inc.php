<?php
if (!defined("IN_MOD"))
{
	die("Nah, I won't serve that file to you.");
}
$mitsuba->admin->reqPermission(3);
		if ($mitsuba->common->isBoard($_GET['board']))
		{
			$data = $mitsuba->common->getBoardData($_GET['board']);
			?>
<?php $mitsuba->admin->ui->startSection(sprintf($lang['mod/edit_board'], $_GET['board'])); ?>

<form action="?/boards/update&board=<?php echo $_GET['board']; ?>" method="POST">
<?php echo $lang['mod/board_directory']; ?>: <input disabled type="text" name="short" maxlength=10 value="<?php echo $data['short']; ?>" /><br />
<?php echo $lang['mod/board_name']; ?>: <input type="text" name="name" maxlength=40 value="<?php echo $data['name']; ?>" /><br />
<?php echo $lang['mod/board_short']; ?>: <input type="text" name="des" maxlength=100 value="<?php echo $data['des']; ?>" /><br />
<?php echo $lang['mod/board_msg']; ?>: <br /><textarea cols=70 rows=7 name="msg"><?php echo $data['message']; ?></textarea><br />
<?php echo $lang['mod/board_limit']; ?>: <input type="text" name="limit" maxlength=9 value="<?php echo $data['bumplimit']; ?>" /><br />
<?php echo $lang['mod/board_pages']; ?>: <input type="text" name="pages" maxlength=4 value="<?php echo $data['pages']; ?>" /><br />
<?php echo $lang['mod/board_time_between_posts']; ?>: <input type="text" name="time_between_posts" maxlength=20 value="<?php echo $data['time_between_posts']; ?>" /><br />
<?php echo $lang['mod/board_time_between_threads']; ?>: <input type="text" name="time_between_threads" maxlength=20 value="<?php echo $data['time_between_threads']; ?>" /><br />
<?php echo $lang['mod/board_time_to_delete']; ?>: <input type="text" name="time_to_delete" maxlength=20 value="<?php echo $data['time_to_delete']; ?>" /><br />
<?php echo $lang['mod/board_filesize']; ?>: <input type="text" name="filesize" maxlength=20 value="<?php echo $data['filesize']; ?>" /><br />
<?php echo $lang['mod/board_maxchars']; ?>: <input type="text" name="maxchars" maxlength=8 value="<?php echo $data['maxchars']; ?>" /><br />
<?php echo $lang['mod/board_default_name']; ?>: <input type="text" name="anonymous" maxlength=60 value="<?php echo $data['anonymous']; ?>" /><br />
<?php echo $lang['mod/board_options']; ?>:
<input type="checkbox" name="spoilers" value="1" <?php if ($data['spoilers'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_spoilers']; ?><br />
<input type="checkbox" name="noname" value="1" <?php if ($data['noname'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_no_name']; ?><br />
<input type="checkbox" name="ids" value="1" <?php if ($data['ids'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_ids']; ?><br /><br />
<input type="checkbox" name="embeds" value="1" <?php if ($data['embeds'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_embeds']; ?><br />
<input type="checkbox" name="bbcode" value="1" <?php if ($data['bbcode'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_bbcode']; ?><br />
<input type="checkbox" name="hidden" value="1" <?php if ($data['hidden'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_hidden']; ?><br />
<input type="checkbox" name="nodup" value="1" <?php if ($data['nodup'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_nodup']; ?><br />
<input type="checkbox" name="catalog" value="1" <?php if ($data['catalog'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_catalog']; ?><br />
<input type="checkbox" name="captcha" value="1" <?php if ($data['captcha'] == 1) { echo "checked "; } ?> /><?php echo $lang['mod/board_captcha']; ?> <br />
<input type="submit" value="<?php echo $lang['mod/submit']; ?>" />
</form>
<?php $mitsuba->admin->ui->endSection(); ?><br />
<?php $mitsuba->admin->ui->startSection(sprintf($lang['mod/move_board'], $_GET['board'])); ?>
<form action="?/boards/move&board=<?php echo $_GET['board']; ?>" method="POST">
<?php echo $lang['mod/board_new_dir']; ?>: <input type="text" name="new" maxlength=10 /><br />
<input type="submit" value="<?php echo $lang['mod/submit']; ?>" />
</form>
<?php $mitsuba->admin->ui->endSection(); ?>
<?php
		} else {
		?>
<?php $mitsuba->admin->ui->startSection($lang['mod/board_not_found']); ?>
<a href="?/boards"><?php echo $lang['mod/back']; ?></a>
<?php $mitsuba->admin->ui->endSection(); ?>
				<?php
		}
?>