<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="theme-color" content="#1e5bd6">
		<title><?php echo $title; ?></title>
		<meta name="description" content="Login sistem Before PO PT Your_company untuk mengelola data inquiry dan request customer.">
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_login.css?v=<?php echo filemtime(FCPATH . 'assets/css/style_login.css'); ?>">
	</head>
	<body>
<?php $this->load->view('loader'); ?>
		<main class="login-wrap">
			<section class="login-brand">
				<img src="<?php echo base_url(); ?>images/testindo_logo.png" alt="PT Your_company" class="login-logo">
				<h1>Before Purchasing Order</h1>
				<p>Kelola inquiry, quotation, dan progres PO pelanggan dalam satu tempat.</p>
			</section>

			<section class="login-card">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked>
				<div class="tabs">
					<label for="tab-1" class="tab">Login</label>
				</div>

				<div class="sign-in-htm">
					<form action="<?php echo base_url() . 'login/masuk'; ?>" method="post">
						<?php if (isset($_POST['subm'])) { ?>
							<div class="alert"><?php echo $salah; ?></div>
						<?php } ?>
						<div class="group">
							<label for="username" class="label">Username</label>
							<input name="username" id="username" type="text" class="input" placeholder="Isi dengan nama depan saja" autocomplete="username" required>
						</div>
						<div class="group">
							<label for="password" class="label">Password</label>
							<input name="password" id="password" type="password" class="input" autocomplete="current-password" required>
						</div>
						<label class="check">
							<input name="check" id="check" type="checkbox" checked> Tetap masuk
						</label>
						<input name="subm" id="subm" type="submit" class="button" value="Masuk">
					</form>
				</div>

				<?php /* Registrasi dinonaktifkan sementara
				<div class="sign-up-htm">
					<form action="<?php echo base_url() . 'login/tambah'; ?>" method="post">
						<div class="group">
							<label for="username-2" class="label">Username</label>
							<input name="username-2" id="username-2" type="text" class="input" placeholder="Isi dengan nama depan saja" autocomplete="username" required>
						</div>
						<div class="group">
							<label for="password-2" class="label">Password</label>
							<input name="password-2" id="password-2" type="password" class="input" autocomplete="new-password" required>
						</div>
						<input name="subm-2" id="subm-2" type="submit" class="button" value="Daftar">
						<p class="foot-lnk">Sudah punya akun? <label for="tab-1">Masuk</label></p>
					</form>
				</div>
				*/ ?>
			</section>
		</main>
	</body>
</html>
