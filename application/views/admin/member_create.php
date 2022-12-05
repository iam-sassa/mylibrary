<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Add new member data</h1>

			<form action="" method="POST">
                <label for="nik">NIK</label>
				<input type="text" name="nik" placeholder="eg. 000111122223334"/>
				<label for="full_name">Full Name</label>
				<input type="text" name="full_name" placeholder="eg. John Smith" required title="required"/>
                <label for="phone">Phone Number</label>
				<input type="text" name="phone" placeholder="eg. +628xxxxxxxx" required title="required"/>
                <label for="address">Address</label>
				<input type="text" name="address" placeholder="eg. Chamaeleon Street No.17, Islington" required title="required"/>
                <label for="born_place">Born Place</label>
				<input type="text" name="born_place" placeholder="eg. Wolverhampton" required title="required"/>
                <label for="born_date">Born Date</label>
				<input type="date" name="born_date" required title="required"/>
                <label for="gender">Gender</label>
                <select name="gender" id="">
                    <option value="L">Male</option>
                    <option value="P">Female</option>
                    <option value=" ">Unmentioned</option>
                </select><br>
                <label for="country">Country</label>
				<input type="text" name="country" placeholder="eg. Netherlands"/>
                <label for="nationality">Nationality</label>
                <select name="nationality" id="">
                    <option value="WNA">Indonesian</option>
                    <option value="WNI">Not Indonesian</option>
                </select> <br>
                <label for="is_active">Status</label>
                <select name="is_active" id="">
                    <option value="0">inactived</option>
                    <option value="1">Actived</option>
                </select><br>
                <label for="created_at">Created</label>
				<input type="datetime-local" name="created_at" required title="required"/>



				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>