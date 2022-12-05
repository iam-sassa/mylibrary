<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Edit Books Data</h1>

            <form action="" method="POST">
                <label for="isbn">ISBN</label>
				<input type="text" name="isbn" value="<?= $books->isbn ?>"/>
				<label for="title">Book Title</label>
				<input type="text" name="title" value="<?= $books->title ?>"/>
                <label for="synopsis">Synopsis</label>
				<textarea name="synopsis" value="<?= $books->synopsis ?>"></textarea>
                <label for="author">Book Author</label>
				<input type="text" name="author" value="<?= $books->author ?>"/>
				<label for="publisher">Books Publisher</label>
				<input type="text" name="publisher" value="<?= $books->publisher ?>"/>
                <label for="category">Category</label>
				<input type="text" name="category" value="<?= $books->category ?>"/>
				<label for="language">Books language</label>
				<input type="text" name="language" value="<?= $books->language ?>"/>
                <label for="updated_at">Updated</label>
				<input type="datetime-local" name="updated_at" value="<?= $books->updated_at ?>"/>

				<div>
					<button type="submit" name="submit" class="button" value="submit">Save</button>
				</div>
			</form>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>
</body>

</html>