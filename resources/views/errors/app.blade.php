<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
  <link href='{{ url("assets/css/style-starter.css") }}' rel="stylesheet">
</head>
<body>
  <div id="content">
    @yield('content')
  </div>
  <script src='{{ url("assets/js/jquery-3.3.1.min.js") }}'></script>
  <script src='{{ url("assets/js/owl.carousel.js") }}'></script>
  <script src='{{ url("assets/js/bootstrap.min.js") }}'></script>
  <script src='{{ url("assets/js/script.js") }}'></script>
  <script language="JavaScript">
    window.onload = function() {
      document.addEventListener("contextmenu", function(e){
        e.preventDefault();
      }, false);
      document.addEventListener("keydown", function(e) {
        //document.onkeydown = function(e) {
        // "I" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
          disabledEvent(e);
        }
        // "J" key
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
          disabledEvent(e);
        }
        // "S" key + macOS
        if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
          disabledEvent(e);
        }
        // "U" key
        if (e.ctrlKey && e.keyCode == 85) {
          disabledEvent(e);
        }
        // "F12" key
        if (event.keyCode == 123) {
          disabledEvent(e);
        }
      }, false);
      function disabledEvent(e){
        if (e.stopPropagation){
          e.stopPropagation();
        } else if (window.event){
          window.event.cancelBubble = true;
        }
        e.preventDefault();
        return false;
      }
    };
  </script>
</body>
</html>