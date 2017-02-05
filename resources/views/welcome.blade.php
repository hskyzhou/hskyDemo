<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="core-js/client/shim.min.js"></script>

    <script src="zone.js/dist/zone.js"></script>
    <script src="systemjs/dist/system.src.js"></script>
    <script src="systemjs.config.js"></script>
 
 
    <script>
        System.import('main.js').then(null, console.error.bind(console));
    </script>
</head>
<body>
    <my-app>loading</my-app>
</body>
</html>