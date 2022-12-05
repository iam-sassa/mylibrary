<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>Add new book</h1>

			<form action="" method="POST">
                <label for="isbn">ISBN</label>
				<input type="text" name="isbn" placeholder="eg. 000111122223334"/>
				<label for="title">Book Title</label>
				<input type="text" name="title" placeholder="eg. Girl Inside Your House" required title="required"/>
                <label for="synopsis">Synopsis</label>
				<textarea id="" name="synopsis" rows="4" cols="50" placeholder="eg. Girls and House will never ..."></textarea>
                <label for="author">Book Author</label>
				<input type="text" name="author" placeholder="eg. bukantokohutama" required title="required"/>
                <label for="publisher">Publisher</label>
				<input type="text" name="publisher" placeholder="eg. Tiga Serangkai" required title="required"/>
                <label for="category">Book Category</label>
				<input type="text" name="category" placeholder="eg. Fantasy" required title="required"/>
                <label for="language">Book Language</label>
				<input type="text" name="language" required placeholder="eg. Dutch" title="required"/>
                
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