<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List of Books</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/book/create') ?>" class="button button-primary" role="button">+ Add Book</a>
			</div>

			<table class="table">
				<thead>
					<tr>
                        <th style="width: 5%;" class="text-center">No</th>
                        <th style="width: 5%;" class="text-center">ISBN</th>
                        <th style="width: 5%;" class="text-center">Book Title</th>
                        <th style="width: 25%;" class="text-center">Synopsis</th>
                        <th style="width: 5%;" class="text-center">Book Author</th>
                        <th style="width: 5%;" class="text-center">Publisher</th>
                        <th style="width: 5%;" class="text-center">Category</th>
                        <th style="width: 5%;" class="text-center">Language</th>
						<th style="width: 5%;" class="text-center">Created</th>
                        <th style="width: 5%;" class="text-center">Updated</th>
						<th style="width: 15%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($books as $book): ?>
					<tr>
                        <td>
							<?= $book->id ?>
						</td>
                        <td>
							<?= $book->isbn ?>
						</td>
                        <td>
							<?= $book->title ?>
						</td>
                        <td>
							<?= $book->synopsis ?>
						</td>
                        <td>
							<?= $book->author ?>
						</td>
                        <td>
							<?= $book->publisher ?>
						</td>
                        <td>
							<?= $book->category ?>
						</td>
                        <td>
							<?= $book->language ?>
						</td>
                        <td>
							<?= $book->created_at ?>
						</td>
                        <td>
							<?= $book->updated_at ?>
						</td>
						<td>
							<div class="action">
								<a href="<?= site_url('admin/book/edit/'.$book->id) ?>" class="button button-small button" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/book/delete/'.$book->id) ?>" 
									class="button button-small button-danger" 
									role="button"
									onclick="deleteConfirm(this)">Delete</a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>

			<?php $this->load->view('admin/_partials/footer.php') ?>
		</div>
	</main>

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event){
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Are you sure to delete the item?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if($this->session->flashdata('message')): ?>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>
</body>

</html>