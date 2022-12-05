<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Edit Subscriptions Data</h1>

            <form action="" method="POST">
				<label for="title">Title</label>
				<input type="text" name="title" value="<?= $subscriptions->title ?>"/>
                <label for="month">Month</label>
				<input type="text" name="month" value="<?= $subscriptions->month ?>"/>
				<label for="price">subscriptions Price</label>
				<input type="text" name="price" value="<?= $subscriptions->price ?>"/>
                <label for="is_active">Status</label>
				<input type="text" name="is_active" value="<?= $subscriptions->is_active ?>"/>
                <label for="updated_at">Updated</label>
				<input type="datetime-local" name="updated_at" value="<?= $subscriptions->updated_at ?>"/>

				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>