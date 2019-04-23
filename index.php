<?php
require_once 'curl.php';

$thisMonth = date('Y-m');
$thisDate = date('Y-m-d');

if (isset($_POST['submit'])) {
	setlocale(LC_ALL, 'id_ID');
	$lokasi = $_POST['lokasi'];
	$dataMonthly = json_decode(getCurl('https://api.pray.zone/v2/times/this_month.json?city=' . $lokasi . '&month=' . $thisMonth . '&school=10'), true);
} else {
	$dataMonthly = json_decode(getCurl('https://api.pray.zone/v2/times/this_month.json?city=bogor&month=' . $thisMonth .  '&school=10'), true);
}

require_once 'templates/header.php';

?>

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
					<small class="font-weight-bold">Hari ini <?= date('d M Y') ?></small>
				</div>
				<div class="card-body">
					<table class="table">
						<?php foreach ($dataMonthly['results']['datetime'] as $result) : ?>
							<?php if ($thisDate == $result['date']['gregorian']) : ?>
								<tr>
									<td>Imsak</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Imsak'])); ?></td>
								</tr>
								<tr>
									<td>Subuh</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Fajr'])); ?></td>
								</tr>
								<tr>
									<td>Dzuhur</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Dhuhr'])); ?></td>
								</tr>
								<tr>
									<td>Ashar</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Asr'])); ?></td>
								</tr>
								<tr>
									<td>Maghrib</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Maghrib'])); ?></td>
								</tr>
								<tr>
									<td>Isya</td>
									<td><?= strftime("%H:%M", strtotime($result['times']['Isha'])); ?></td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<?php require_once 'templates/footer.php'; ?>