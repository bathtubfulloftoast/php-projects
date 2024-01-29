<a class="back" href="loaders/download.php?file=<?php echo "$dir$file"; ?>" ><span class="material-symbols-outlined">download</span></a>
<a class="back" href="<?php echo $dir.$file; ?>" target="blank"><span class="material-symbols-outlined">open_in_new</span></a>
<a class="back" id="copyFileLink" href="#"><span class="material-symbols-outlined">share</span></a>

<script>
  function toClipboard(text) {
    if ("clipboard" in navigator && typeof navigator.clipboard.writeText === "function") {
      // Chrome
      return navigator.clipboard.writeText(text)
        .then(() => true)
        .catch(() => false);
    } else {
      // Firefox
      const input = document.createElement("input");
      input.value = text;
      input.style.position = "fixed";
      input.style.top = "-2000px";
      document.body.appendChild(input);
      input.select();
      try {
        return Promise.resolve(document.execCommand("copy"))
          .then(res => {
            document.body.removeChild(input);
            return res;
          });
      } catch (err) {
        return Promise.resolve(false);
      }
    }
  }

  document.querySelector("#copyFileLink").addEventListener("click", function (e) {
    e.preventDefault();
    toClipboard("<?php
/*$uri = $_SERVER['REQUEST_URI'];
echo $uri; // Outputs: URI*/

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url; // Outputs: Full URL

/*$query = $_SERVER['QUERY_STRING'];
echo $query; // Outputs: Query String*/
?>")
      .then(res => console.log("copied", res));
  });
</script>
