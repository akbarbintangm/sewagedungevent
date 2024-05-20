<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'csrftoken': '{{ csrf_token() }}'
			}
		});
		const token = '{{ Session::token() }}';
	});

	const token = '{{ Session::token() }}';
	const headers = {
		'Authorization': token,
		'Content-Type': 'multipart/form-data',
	};

	function checkFileCount(input) {
		var files = input.files;
		if (files.length > 10) {
			alertNotification('Gambar Terlalu Banyak!', 'Gambar yang diupload maksimal adalah 10 gambar!', 'warning')
			input.value = '';
		}
	}

	function checkFileFormat(input) {
		var files = input.files;
		var invalidFiles = false;
		for (var i = 0; i < files.length; i++) {
			var ext = files[i].name.split('.').pop().toLowerCase();
			if (ext !== 'jpg' && ext !== 'png') {
				invalidFiles = true;
				break;
			}
		}
		if (invalidFiles) {
			alertNotification('Format Gambar Salah!', 'Hanya dapat mengunggah file dengan format JPG atau PNG!', 'warning')
			input.value = '';
		}
	}

	function checkAspectRatio(input) {
		var files = input.files;
		for (let i = 0; i < files.length; i++) {
			const file = files[i];
			const reader = new FileReader();
			reader.onload = function(e) {
				const img = new Image();
				img.src = e.target.result;
				img.onload = function() {
					const width = this.width;
					const height = this.height;
					const aspectRatio = width / height;
					if (aspectRatio !== (16 / 9)) {
						alertNotification('Resolusi Gambar Salah!', 'Hanya dapat mengunggah file dengan resolusi 16:9!', 'warning')
						input.value = '';
					}
				};
			};
			reader.readAsDataURL(file);
		}
		return true;
	}

	function checkMinResolution(input, minWidth, minHeight) {
		var files = input.files;
		for (let i = 0; i < files.length; i++) {
			const file = files[i];
			const reader = new FileReader();
			reader.onload = function(e) {
				const img = new Image();
				img.src = e.target.result;
				img.onload = function() {
					const width = this.width;
					const height = this.height;
					if (width < minWidth || height < minHeight) {
						alertNotification('Resolusi Gambar Salah!', 'Hanya dapat mengunggah file dengan minimal 1280x720', 'warning')
						input.value = '';
					}
				};
			};
			reader.readAsDataURL(file);
		}
		return true;
	}

	async function alertNotification(title, text, icon) {
		return Swal.fire({
			title: title,
			text: text,
			icon: icon,
			confirmButtonText: 'Oke',
		});
	}

	async function showNotification(title, text, icon) {
		return Swal.fire({
			title: title,
			text: text,
			icon: icon,
			confirmButtonText: 'Oke',
			showCancelButton: true,
			cancelButtonText: 'Batal',
		});
	}

	async function submitNotification(form, title, text, icon, url) {
		return new Promise((resolve, reject) => {
			Swal.fire({
				title: title,
				text: text,
				icon: icon,
				showCancelButton: true,
				confirmButtonText: 'Kirim',
				cancelButtonText: 'Batal',
				showLoaderOnConfirm: true,
				preConfirm: () => {
					if (form) {
						form.submit();
						return;
					}
					if (!url) {
						reject('URL tidak valid');
						return;
					}
					return fetch(url)
						.then(response => {
							if (!response.ok) {
								alertNotification('Gagal', 'Gagal memuat data dari server!', 'warning');
								reject('Gagal memuat data dari server');
								return;
							}
							return response.json();
						})
						.then(data => {
							if (data.status === 200) {
								alertNotification('Berhasil', data.detail_message, 'success');
								resolve(true);
							} else {
								alertNotification('Gagal', data.detail_message, 'info');
								resolve(false);
							}
						})
						.catch(error => {
							alertNotification('Gagal', error, 'error');
							reject(error);
						});
				}
			});
		});
	}

	function showLoadingNotification() {
		return Swal.fire({
			title: 'Please wait...',
			allowEscapeKey: false,
			allowOutsideClick: false,
			didOpen: () => {
				Swal.showLoading()
			}
		});
	}

	function hideLoadingNotification() {
		try {
			Swal.close();
		} catch (e) {
			//
		}
	}

	function showLoadingToast() {
		return Swal.fire({
			title: 'Please wait...',
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			didOpen: () => {
				Swal.showLoading()
			}
		});
	}

	function hideLoadingToast() {
		try {
			Swal.close();
		} catch (e) {
			//
		}
	}

	function showAlertToast(title, text, icon) {
		return Swal.fire({
			icon: icon,
			title: title,
			text: text,
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 5000
		});
	}
</script>
