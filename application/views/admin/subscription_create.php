<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Add New Subscription</h1>

			<form action="" method="POST">
				<label for="title">Title</label>
				<input type="text" name="title" placeholder="eg. Member 1" required title="required"/>
                <label for="month">Month</label>
				<input type="text" name="month" placeholder="eg. 4" required title="required"/>
                <label for="price">Price</label>
				<input type="text" name="price" placeholder="eg. 10000" required title="required"/>
                <label for="is_active">Status</label>
				<input type="text" name="is_active" placeholder="eg. 1" required title="required"/>
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