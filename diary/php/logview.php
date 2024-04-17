<?php
$logs = $_GET['logs'];
$root = $_SERVER['DOCUMENT_ROOT'];

include ("php/enc-set.php");

include ("loaders/isowner.php");
if ($isowner === "true") {} else {
header('Location: ?');
}
?>
<title>Logs</title>
    <script src="jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update content
            function updateContent() {
                $.ajax({
                    url: "loaders/logecho.php?logs=<?php  echo $logs; ?>",
                    type: "GET",
                    success: function(data) {
                        $("#content").html(data);
                    }
                });
            }

            // Update content on page load
            updateContent();

            setInterval(updateContent, 5000);
        });
    </script>
</head>
<body>
<div class="text">
<?php
if ($logs == "full") {
$logfile = file_get_contents($logfile);
$decrypted = openssl_decrypt($logfile, $ciphering,
                             $key, $options, $encryption_iv);
echo "<code>$decrypted</code>";

} else {
echo '<code id="content"></code>';
}
?>
</div>
</body>
</html>
