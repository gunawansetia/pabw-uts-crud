<script type="text/javascript">

function validation(){
  var validasiAngka = /^[0-9]+$/;
  var angka = document.getElementById("tahun");
  if (angka.value.match(validasiAngka)) {
      
  } else {
      alert("Format wajib angka!");
      angka.value="";
      angka.focus();
      return false;
  }
}
</script>