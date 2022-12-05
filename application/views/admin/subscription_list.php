<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List of Subscriptions</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/subscription/create') ?>" class="button button-primary" role="button">+ Add Subscription</a>
			</div>

			<table class="table">
				<thead>
					<tr>
                        <th style="width: 5%;" class="text-center">No</th>
                        <th style="width: 15%;" class="text-center">Title</th>
                        <th style="width: 5%;" class="text-center">Month</th>
                        <th style="width: 10%;" class="text-center">Price</th>
                        <th style="width: 10%;" class="text-center">Status</th>
						<th style="width: 15%;" class="text-center">Created</th>
                        <th style="width: 15%;" class="text-center">Updated</th>
						<th style="width: 15%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($subscriptions as $subscription): ?>
					<tr>
                        <td>
							<?= $subscription->id ?>
						</td>
                        <td>
							<?= $subscription->title ?>
						</td>
                        <td>
							<?= $subscription->month ?>
						</td>
                        <td>
							<?= $subscription->price ?>
						</td>
						<?php if($subscription->is_active == 1): ?>
							<td class="text-center text-green">active</td>
						<?php else: ?>
							<td class="text-center text-gray">inactived</td>
						<?php endif ?>
                        <td>
							<?= $subscription->created_at ?>
						</td>
                        <td>
							<?= $subscription->updated_at ?>
						</td>
						<td>
							<div class="action">
								<a href="<?= site_url('admin/subscription/edit/'.$subscription->id) ?>" class="button button-small button" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/subscription/delete/'.$subscription->id) ?>" 
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