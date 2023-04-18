<?php
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title><%= htmlWebpackPlugin.options.title %></title>
</head>
<body>
<noscript>
    <strong>We're sorry but <%= htmlWebpackPlugin.options.title %> doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="app"></div>
<!-- built files will be auto injected -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</body>

</html>



<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #box {
        width: 30%;
        height: 300px;
        border: teal 3px ridge;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        flex-direction: column;
    }

    .message {
        width: 90%;
        text-align: start;
        border: rgba(96, 96, 95, 0.96) 1px solid;
        border-radius: 10%;
        margin: 2px;
    }
</style>