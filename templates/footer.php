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