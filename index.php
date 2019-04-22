<?php
require_once 'logic.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Orbitron:400,700" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">

	<title>Jadwal Sholat</title>
</head>

<body>
	<div class="container">
		<!-- header -->
		<div class="row mt-2">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<header>
									<h2>Prayer Time</h2>
									<h6>Jadwal Sholat kota-kota di Indonesia</h6>
								</header>
							</div>
							<div class="col-md-4 mt-3">
								<form action="" method="post">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Cari lokasi..." aria-label="Search" aria-describedby="basic-addon2" name="lokasi" autocomplete="off">
										<div class="input-group-append">
											<button class="btn btn-secondary" type="submit" name="submit">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- jadwal -->
		<div class="row mt-2">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h4>Waktu Sholat di <?= $dataMonthly['results']['location']['city']; ?></h4>
						<small class="font-weight-bold">Bulan <?= strftime("%B %G", strtotime($dataMonthly['results']['datetime'][0]['date']['gregorian'])); ?></small>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th>Imsak</th>
									<th>Subuh</th>
									<th>Dzuhur</th>
									<th>Ashar</th>
									<th>Maghrib</th>
									<th>Isya</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dataMonthly['results']['datetime'] as $result) : ?>
									<?php if ($thisDate == $result['date']['gregorian']) : ?>
										<tr class="datenow">
											<td><?= strftime("%a %d %B", strtotime($result['date']['gregorian'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Imsak'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Fajr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Dhuhr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Asr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Maghrib'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Isha'])); ?></td>
										</tr>
									<?php else :  ?>
										<tr>
											<td><?= strftime("%a %d %B", strtotime($result['date']['gregorian'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Imsak'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Fajr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Dhuhr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Asr'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Maghrib'])); ?></td>
											<td><?= strftime("%H:%M", strtotime($result['times']['Isha'])); ?></td>
										</tr>
									<?php endif; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="jam text-center"></div>
					</div>
				</div>
				<div class="card mt-2">
					<div class="card-header">
						<h5>Waktu Sholat di <?= $dataMonthly['results']['location']['city']; ?></h5>
						<small class="font-weight-bold">Hari ini <?= strftime("%d %B %G", strtotime($dataDaily['results']['datetime'][0]['date']['gregorian'])); ?></small>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
								<td>Imsak</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Imsak'])); ?></td>
							</tr>
							<tr>
								<td>Subuh</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Fajr'])); ?></td>
							</tr>
							<tr>
								<td>Dzuhur</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Dhuhr'])); ?></td>
							</tr>
							<tr>
								<td>Ashar</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Asr'])); ?></td>
							</tr>
							<tr>
								<td>Maghrib</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Maghrib'])); ?></td>
							</tr>
							<tr>
								<td>Isya</td>
								<td><?= strftime("%H:%M", strtotime($dataDaily['results']['datetime'][0]['times']['Isha'])); ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<div class="row">
			<div class="col">
				<hr>
				<footer>
					<p class="text-center copy">Copyright &copy; 2019 Ihsan Nurul Habib</p>
				</footer>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Core plugin JavaScript-->
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom scripts for all pages-->
	<script src="assets/js/sb-admin-2.min.js"></script>
	<script>
		function jam() {
			const time = new Date(),
				hours = time.getHours(),
				minutes = time.getMinutes(),
				seconds = time.getSeconds();
			document.querySelector('.jam').innerHTML = addNol(hours) + ":" + addNol(minutes) + ":" + addNol(seconds);

			function addNol(e) {
				if (e < 10) {
					e = '0' + e
				}
				return e;
			}
		}
		setInterval(jam, 1000);
	</script>
</body>

</html>