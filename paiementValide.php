<html>
    <head>
        <meta charset="utf-8" />
        <script>
            function load() {
                document.frm1.submit()
            }
        </script>

        <style type="text/css">
            
            @font-face {
                font-family: 'Exo2.0-Black';
                src: url('font/Exo2.0-Black.otf');
            }

            body {
                background-color: rgb(80, 80, 80);
            }

            p {
                margin-top: 50px;
                font-family: 'Exo2.0-Black';
                font-weight: 100;
                text-align: center;
                color: #D4D4D4;
            }

            .spinner {
                width: 40px;
                height: 40px;
                position: relative;
                margin: 0 auto;
                margin-top: 200px;
            }

            .double-bounce1, .double-bounce2 {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                background-color: rgb(28, 194, 202);
                opacity: 0.6;
                position: absolute;
                top: 0;
                left: 0;
                -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
                animation: sk-bounce 2.0s infinite ease-in-out;
            }

            .double-bounce2 {
                -webkit-animation-delay: -1.0s;
                animation-delay: -1.0s;
            }

            @-webkit-keyframes sk-bounce {
                0%, 100% { -webkit-transform: scale(0.0) }
                50% { -webkit-transform: scale(1.0) }
            }

            @keyframes sk-bounce {
                0%, 100% { 
                    transform: scale(0.0);
                    -webkit-transform: scale(0.0);
                } 50% { 
                    transform: scale(1.0);
                    -webkit-transform: scale(1.0);
                }
            }

        </style>
    </head>

    <body onload="load()">
        <form action="index.php" id="frm1" name="frm1">
            <input type="hidden" name="paiement" value="valide" />
        </form>
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <p>Paiement validé, redirection...</p>
    </body>
</html> 