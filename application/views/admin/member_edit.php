<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Edit Member Data</h1>

            <form action="" method="POST">
                <label for="nik">NIK</label>
				<input type="text" name="nik" value="<?= $members->nik ?>" />
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" value="<?= $members->full_name ?>"/>
                <label for="phone">Phone Number</label>
				<input type="text" name="phone" value="<?= $members->phone ?>"/>
                <label for="address">Address</label>
				<input type="text" name="address" value="<?= $members->address ?>"/>
                <label for="born_place">Born Place</label>
				<input type="text" name="born_place" value="<?= $members->born_place ?>"/>
                <label for="born_date">Born Date</label>
				<input type="date" name="born_date" value="<?= $members->born_date ?>"/>
                <label for="gender">Gender</label>
                <select name="gender" id="">
                    <option value="L">Male</option>
                    <option value="P">Female</option>
                    <option value=" ">Unmentioned</option>
                </select>
                <br>
                <label for="country">Country</label>
				<input type="text" name="country" value="<?= $members->country ?>" />
				<label for="nationality">Nationality</label>
				<select name="nationality" id="">
                    <option value="WNI">Indonesian</option>
                    <option value="WNA">Not Indonesian</option>
                </select><br>
                <label for="is_active">Status</label>
				<input type="text" name="is_active" value="<?= $members->is_active ?>"/>
                <label for="updated_at">Updated</label>
				<input type="datetime-local" name="updated_at" value="<?= $members->updated_at ?>"/>

				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>