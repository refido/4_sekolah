$(document).ready(function() {

	window.onload = LoadBeranda();
	$(".dashboard2").click(function(){
		LoadBeranda();
	});
	$("li.kelas").click(function(){
		kelas();
	});
});

function LoadBeranda() {
	$(".ambil").load("dashboard.php");
};
function kelas() {
	$(".ambil").load("../kelas.php");
};