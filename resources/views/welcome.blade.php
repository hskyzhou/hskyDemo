<html>
<head>
    <meta charset="UTF-8">
    <meta property="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <base href="/">
    <script src="core-js/client/shim.min.js"></script>

    <script src="zone.js/dist/zone.js"></script>
    <script src="systemjs/dist/system.src.js"></script>
    <script src="systemjs.config.js"></script>
 
    <script>
        System.import('main.js').then(null, console.error.bind(console));
    </script>
</head>
<body>
    <my-app>loading2</my-app>
</body>
</html>