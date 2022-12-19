<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .fade-in-item {
            opacity: 0;
            animation: fade-in 1s;
            animation-delay: 0.5s;
            animation-fill-mode: forwards;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<ul>
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
</ul>
<script>
    $(document).ready(function() {
        $('li').each(function() {
            $(this).addClass('fade-in-item');
        });
    });
</script>
</body>
</html>