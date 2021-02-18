<script>
function creaWord(){
  var html = document.documentElement.outerHTML;
  var blob = new Blob(['\ufeff', html], {
    type: 'application/msword'
  });
  var href = URL.createObjectURL(blob);
  var a = document.createElement('a');
  a.href = href;
  a.download = "documento.doc";
  document.body.appendChild(a);
  if (navigator.msSaveOrOpenBlob) {
    navigator.msSaveOrOpenBlob(blob, 'documento.doc');
  } else {
    a.click();
  }
  document.body.removeChild(a);
}

window.onload = function() {
  creaWord();
}
</script>