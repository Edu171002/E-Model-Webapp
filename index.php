<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora PHP del modelo E</title>
        <style>
            header{
                display: flex;
                top: 0;
                left: 0;
                width: 100%;
                text-align: center;
                color: #CFCDCA;
                padding: 10px 20px;
            }
            
            h1,h3{
                width: 100%;
                text-align: center;
            }

            body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                max-width: 100%;
            }

            .container{
                display: flex;
                padding: 40px; 
                align-items: center;
                justify-content: center;
                margin: 10px;
            }

            .form-container{
                width: 765px;
                background-color: #000;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
                padding: 20px;
            }

            input{
                padding: 5px;
            }
            select{
                width: 180px;
                padding: 5px
            }

            .result-container{
                position: absolute;
                top: 600px;
                left: 710px;
                text-align: center;
                background-color: #333;
                padding: 10px;
            }

            .button{
                padding: 30px;
            }

        </style>
    </head>
    <header>
        <h1>Calculadora PHP del modelo E</h1>
    </header>
    <body>
        <div class="container">
            <form action="" method="post">
                <div class="form-container">
                    <div class="form" id="Ruidos">
                        <h3>Ruidos</h3>

                        <label for="SLR">SLR (-5dB):</label>
                        <input type="number" id="SLR" name="SLR" placeholder="dB">

                        <br><br>

                        <label for="RLR">RLR (de -5 a 14dB):</label>
                        <input type="number" id="RLR" name="RLR" placeholder="dB">

                        <br><br>

                        <label for="STMR">STMR (de 10 a 20dB):</label>
                        <input type="number" id="STMR" name="STMR" placeholder="dB">

                        <br><br>

                        <label for="LSTR">LSTR (de 13 a 23dB):</label>
                        <input type="number" id="LSTR" name="LSTR" placeholder="dB">

                        <br><br>

                        <label for="TELR">TELR (de 5 a 65dB):</label>
                        <input type="number" id="TELR" name="TELR" placeholder="dB">

                        <br><br>

                        <label for="Nc">Nc (de -80 a -40dBm0p):</label>
                        <input type="number" id="Nc" name="Nc" placeholder="dBm0p">

                        <br><br>

                        <label for="Ps">Ps (de 35 a 85dB(A)):</label>
                        <input type="number" id="Ps" name="Ps" placeholder="dB(A)">

                        <br><br>

                        <label for="Pr">Pr (de 35 a 85dB(A)):</label>
                        <input type="number" id="Pr" name="Pr" placeholder="dB(A)">
                    </div>

                    <div class="form" id="Pérdidas">
                        <h3>Pérdidas</h3>

                        <label for="WEPL">WEPL (de 5 a 110dB):</label>
                        <input type="number" id="WEPL" name="WEPL" placeholder="dB">

                        <br><br>

                        <label for="qdu">qdu (de 1 a 14):</label>
                        <input type="number" id="qdu" name="qdu" placeholder="Adimensional">
                        
                        <br><br>

                        <label for="Bpl">Bpl (de 1 a 40):</label>
                        <input type="number" id="Bpl" name="Bpl" placeholder="Adimensional">

                        <br><br>

                        <label for="Ppl">Ppl (de 0 a 20%):</label>
                        <input type="number" id="Ppl" name="Ppl" placeholder="%">

                        <br><br>

                        <label for="BurstR">BurstR (de 1 a 2):</label>
                        <input type="number" id="BurstR" name="BurstR" placeholder="Adimensional">
                    </div>

                    <div class="form" id="Retardos">
                        <h3>Retardos</h3>

                        <label for="T">T (de 0 a 500ms):</label>
                        <input type="number" id="T" name="T" placeholder="ms">

                        <br><br>

                        <label for="Tr">Tr (de 0 a 1000ms):</label>
                        <input type="text" id="Tr" name="Tr" placeholder="ms">

                        <br><br>

                        <label for="Ta">Ta (de 0 a 500ms):</label>
                        <input type="number" id="Ta" name="Ta" placeholder="ms">

                        <br><br>

                        <label for="DelaySensivity">Delay sensivity:</label>
                        <select id="DelaySensivity" name="DelaySensivity">
                            <option value="1">Default</option>
                            <option value="2">Low</option>
                            <option value="3">Very low</option>
                        </select>
                    </div>
                    
                    
                    <div class="form" id="Participantes">
                        <h3>Participantes</h3>

                        <label for="Ie">Ie (de 0 a 40):</label>
                        <input type="number" id="Ie" name="Ie" placeholder="Adimensional">

                        <br><br>

                        <label for="Ds">Ds (de -3 a 3):</label>
                        <input type="number" id="Ds" name="Ds" placeholder="Adimensional">

                        <br><br>

                        <label for="Dr">Dr (de -3 a 3):</label>
                        <input type="number" id="Dr" name="Dr" placeholder="Adimensional">

                        <br><br>

                        <label for="A">A (de 0 a 20):</label>
                        <input type="number" id="A" name="A" placeholder="Adimensional">

                        <br>
                </div>
                <div class="result-container">
                    <div><input type="submit" id="search" name="search" class="button"></div>
                    <div>
                        <?php
                        $R = 99;
                        echo '<h2>R='.$R.'</h2>';
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>