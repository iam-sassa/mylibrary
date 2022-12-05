<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/_partials/head.php') ?>
</head>

<body>
	<main class="main">
		<?php $this->load->view('admin/_partials/side_nav.php') ?>

		<div class="content">
			<h1>List of Members</h1>

			<div class="toolbar">
				<a href="<?= site_url('admin/member/create') ?>" class="button button-primary" role="button">+ Add Member</a>
			</div>

			<table class="table">
				<thead>
					<tr>
                        <th style="width: 5%;" class="text-center">No</th>
                        <th style="width: 10%;" class="text-center">NIK</th>
                        <th style="width: 10%;" class="text-center">Full Name</th>
                        <th style="width: 10%;" class="text-center">Phone</th>
                        <th style="width: 10%;" class="text-center">Gender</th>
                        <th style="width: 10%;" class="text-center">Country</th>
                        <th style="width: 10%;" class="text-center">Nationality</th>
                        <th style="width: 10%;" class="text-center">Address</th>
                        <th style="width: 10%;" class="text-center">Status</th>
						<th style="width: 10%;" class="text-center">Created</th>
                        <th style="width: 10%;" class="text-center">Updated</th>
						<th style="width: 20%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($members as $member): ?>
					<tr>
                        <td>
							<?= $member->id ?>
						</td>
                        <td>
							<?= $member->nik ?>
						</td>
                        <td>
							<?= $member->full_name ?>
						</td>
                        <td>
							<?= $member->phone ?>
						</td>
                        <td>
							<?= $member->gender ?>
						</td>
                        <td>
							<?= $member->country ?>
						</td>
                        <td>
							<?= $member->nationality ?>
						</td>
                        <td>
							<?= $member->address ?>
						</td>
						<?php if($member->is_active == 1): ?>
							<td class="text-center text-green">active</td>
						<?php else: ?>
							<td class="text-center text-gray">inactived</td>
						<?php endif ?>
                        <td>
							<?= $member->created_at ?>
						</td>
                        <td>
							<?= $member->updated_at ?>
						</td>
						<td>
							<div class="action">
								<a href="<?= site_url('admin/member/edit/'.$member->id) ?>" class="button button-small button-warning" role="button">Edit</a>
								<a href="#" 
									data-delete-url="<?= site_url('admin/member/delete/'.$member->id) ?>" 
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