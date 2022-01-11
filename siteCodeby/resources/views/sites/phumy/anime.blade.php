<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/gsap/dist/gsap.min.js"></script>
    <script src="https://unpkg.com/scrollxp/dist/scrollxp.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            align-items: center;
            height: 200vh;
        }

        section {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        section>div {
            width: 300px;
            height: 300px;
            border: 10px solid #000;
        }
    </style>
</head>
<body>
<section data-scene data-scene-duration="100%" data-scene-indicator="scene">
    <div data-animate data-animate-to-rotation="360"></div>
</section>
<script>
    new ScrollXP({
        container: document.body,
    });
</script>
</body>
</html>