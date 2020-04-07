<?php 
 ?>
<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        
    </head>
    <body>
        <script src="https://meet.jit.si/external_api.js"></script>
        <script>
            var domain = "meet.jit.si";
            var options = {
                roomName: "<?php echo $room ?>",
                width: '100%',
                height: '100%',
                parentNode: undefined,
                
            }
            var api = new JitsiMeetExternalAPI(domain, options);
            api.executeCommands({
                displayName: [ '<?php echo $nama ?>' ],
            });
        </script>
    </body>
</html>