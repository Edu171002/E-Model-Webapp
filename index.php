<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora PHP del modelo E</title>
        <style>
            header{             
                top: 0;
                left: 0;
                text-align: center;
                align-items: center;
                justify-content: center;
                padding: 10px 20px;
                background-color: #555;
            }
            
            h1,h3{
                width: 100%;
                text-align: center;
            }

            body{
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                text-align: center;
                align-items: center;
                justify-content: center;
            }

            #footer{
                text-align: center;
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .e-model{
                width: 900px;
                height: auto;
            }

            .container{
                display: flex;
                flex-direction: row;
                text-align: center;
                align-items: center;
                justify-content: center;
            }

            .calculator{
                display: relative;
            }

            .form-container{
                width: 560px;
                background-color: #BBB;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                padding: 20px;
                text-align: left;
            }

            .form-item{
                display: flex;
                width: 200px;
            }

            input, select{
                width: 100px;
                box-sizing: border-box;
                text-align: center;
                align-items: center;
                justify-content: center;
                padding: 10px;
            }



            .result-container{
                
                width: 560px;
                text-align: center;
                background-color: #777;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .button{
                padding: 15px 200px;
            }

            @media (max-width: 1500px) {
                .container{
                    flex-direction: column;
                }
                .result-container, .form-container{
                    width: 600px;
                    gap: 20px;
                }
            }

        </style>
    </head>
    <header>
        <h1 style="color: white">Calculadora PHP del modelo E</h1>
    </header>
    <body>
        <br>
        <p style="text-align: justify; margin: 20px">
            El modelo E es un método objetivo no intrusivo de evaluación de calidad de servicio que opera en base a
            la variación de diversos parámetros de transmisión en una conversación telefónica. Es un modelo computacional ropuesto por ITU-T 
            en la Recomendación G.107. Tiene en cuenta la degradación derivada de los retardos asociados a la bidireccionaliad de la comunicación. 
            El resultado es un valor escalar, R, el factor de determinación de índices de transmisión, cuyo rango de utilidad va del 0
            al 100, correspondiendo cualquier valor igual o superior a 90 a la satisfacción de los usuarios máxima; y cualquiera igual o inferior
            a 50 a la mínima. La expresión del factor de determinación de índices de transmisión es <b>R = Ro – Is – Id – Ie-eff + A</b>, donde Ro es una
            relación señal a ruido básica, <b>Is</b> el factor de deterioro simultáneo; <b>Id</b> el factor de deterioro de retardo; <b>Ie-eff</b> el
            factor de deterioro de equipo efectivo dependiente de la pérdida de paquetes; y <b>A</b> el factor de mejora.
        </p>
        <div class="container">
        <img class="e-model" src="E.png">
            <div class="calculator">
                <div class="result-container" style="padding: 5px 20px; border-top-left-radius: 5px; border-top-right-radius: 5px">
                    <?php
                        //Inicialización
                        $SLR = 8;
                        $RLR = 2;
                        $STMR = 15;
                        $LSTR = 18;
                        $Ds = 3;
                        $Dr = 3;
                        $TELR = 65;
                        $WEPL = 110;
                        $T = 0;
                        $Tr = 0;
                        $Ta = 0;
                        $qdu = 1;
                        $Ie = 0;
                        $Bpl = 1;
                        $Ppl = 0;
                        $BurstR = 1;
                        $Nc = -70;
                        $Ps = 35;
                        $Pr = 35;
                        $A = 0;
                        $DelaySensivity = 1;
                        $Nfor = -64; //Fija
                        $D = $LSTR - $STMR; //Relación nota 2

                        if(isset($_POST['calculate'])){
                            
                            $SLR = (strlen($_POST['SLR']) > 0) ? intval($_POST['SLR']) : 8; //Si el campo del formulario está vacío, carga el valor por defecto. Si no lo está, carga el valor numérico del contenido
                            $RLR = (strlen($_POST['RLR']) > 0) ? intval($_POST['RLR']) : 2;
                            $STMR = (strlen($_POST['STMR']) > 0) ? intval($_POST['STMR']) : 15;
                            $LSTR = (strlen($_POST['LSTR']) > 0) ? intval($_POST['LSTR']) : 18;
                            $Ds = (strlen($_POST['Ds']) > 0) ? intval($_POST['Ds']) : 3;
                            $Dr = (strlen($_POST['Dr']) > 0) ? intval($_POST['Dr']) : 3;
                            $TELR = (strlen($_POST['TELR']) > 0) ? intval($_POST['TELR']) : 65;
                            
                            $WEPL =(strlen($_POST['WEPL']) > 0) ? intval($_POST['WEPL']) : 110;
                            $T =(strlen($_POST['T']) > 0) ? intval($_POST['T']) : 0;
                            $Tr =(strlen($_POST['Tr']) > 0) ? intval($_POST['Tr']) : 0;
                            $Ta =(strlen($_POST['Ta']) > 0) ? intval($_POST['Ta']) : 0;
                            $qdu =(strlen($_POST['qdu']) > 0) ? intval($_POST['qdu']) : 1;
                            $Ie =(strlen($_POST['Ie']) > 0) ? intval($_POST['Ie']) : 0;
                            $Bpl =(strlen($_POST['Bpl']) > 0) ? intval($_POST['Bpl']) : 1;

                            $Ppl =(strlen($_POST['Ppl']) > 0) ? intval($_POST['Ppl']) : 0;
                            $BurstR =(strlen($_POST['BurstR']) > 0) ? intval($_POST['BurstR']) : 1;
                            $Nc =(strlen($_POST['Nc']) > 0) ? intval($_POST['Nc']) : -70;
                            $Ps =(strlen($_POST['Ps']) > 0) ? intval($_POST['Ps']) : 35;
                            $Pr =(strlen($_POST['Pr']) > 0) ? intval($_POST['Pr']) : 35;
                            $A =(strlen($_POST['A']) > 0) ? intval($_POST['A']) : 0;
                            $DelaySensivity = intval($_POST['DelaySensivity']);
                            
                        }

                        $OLR = $SLR + $RLR;

                        //Cálculo de Ro
                        $Nfo = $Nfor + $RLR;
                        $Pre = $Pr + 10*log(1 + 10**((10-18)/10));
                        $Nor = $RLR - 121 + $Pre + 0.008*(($Pre - 35)**2);
                        $Nos = $Ps - $SLR - $Ds - 100 + 0.004*(($Ps - $OLR - $Ds - 14)**2);
                        $No = 10*log10(10**($Nc/10) + 10**($Nos/10) + 10**($Nor/10) + 10**($Nfo/10));
                        $Ro = 15 - 1.5*($SLR + $No);
                        
                        //Cálculo de Is
                        $Q = 37 - 15*log10($qdu);
                        $G = 1.07 + 0.258*$Q + 0.0602*$Q**2;
                        $Z = (46/30) - ($G/40);
                        $Y = (($Ro - 100)/15) + (46/8.4) - ($G/9);
                        $Iq = 15*log10(1 + 10**$Y + 10**$Z);
                        $STMRo = -10*log10(10**(-$STMR/10) + 2.7183**(-$T/4)*10**(-$TELR/10));
                        $Ist = 12*(1 + (($STMRo - 13)/6)**8)**(1/8) - 28*(1 + (($STMRo + 1)/19.4)**35)**(1/35) - 13*(1 + (($STMRo - 3)/33)**13)**(1/13) + 29;
                        $Xolr = $OLR + 0.2*(64 + $No - $RLR);
                        $Iolr = 20*((1 + ($Xolr/8)**8)**(1/8) - ($Xolr/8));
                        $Is = $Iolr + $Ist + $Iq;

                        //Cálculo de Id
                        switch ($DelaySensivity) {
                            case 1: //Default sensivity
                                $sT = 1;
                                $mT = 100;
                                break;
                            case 2: 
                                $sT = 0.55;
                                $mT = 120;
                                break;
                            case 3:
                                $sT = 0.4;
                                $mT = 150;
                                break;
                            default:
                                $sT = 1;
                                $mT = 100;
                        }
                        //Idd
                        $X = (log10($Ta/($mT))/log10(2));
                        if($Ta > $mT) $Idd = 25*((1+$X**(6*$sT))**(1/(6*$sT)) - 3*(1 + ($X/3)**(6*$sT))**(1/(6*$sT)) + 2);
                        else $Idd = 0;
                        //Idle
                        $Rle = 10.5*($WEPL + 7)*($Tr + 1)**(-0.25);
                        $Idle = (($Ro - $Rle)/2) + (sqrt((($Ro - $Rle)**2/4) + 169));
                        //Idte
                        if($STMR < 9){
                            $TERV = $TELR - 40*log10((1 + ($T/10))/(1 + ($T/150)) + 6*2.7183**(-0.3*$T**2));
                            $TERVs = $TERV + ($Ist/2);
                            $Re = 80 + 2.5*($TERVs - 14);
                            $Roe = (-1.5)*($No - $RLR);
                            $Idte = ((($Roe - $Re)/2) + sqrt(((($Roe - $Re)**2)/4)+100) - 1)*(1 - 2.7183**(-$T));
                            $Id = $Idte + $Idle + $Idd;
                        } elseif($STMR >= 9 && $STMR <= 20){
                            $TERV = $TELR - 40*log10((1 + ($T/10))/(1 + ($T/150)) + 6*2.7183**(-0.3*$T**2));
                            $Re = 80 + 2.5*($TERV - 14);
                            $Roe = (-1.5)*($No - $RLR);
                            $Idte = ((($Roe - $Re)/2) + sqrt(((($Roe - $Re)**2)/4)+100) - 1)*(1 - 2.7183**(-$T));
                            $Id = $Idte + $Idle + $Idd;
                        } elseif($STMR > 20){
                            $Idtes = sqrt($Idte**2 + $Ist**2);
                            $Id = $Idtes + $Idle + $Idd;
                        }

                        //Cálculo de Ie-Eff
                        $Ieff = $Ie + (95 - $Ie)*($Ppl/(($Ppl/$BurstR) + $Bpl));

                        //Calculo final de R
                        $R = $Ro -$Is -$Id - $Ieff + $A;

                        if($R < 50) $Val = "Todos los usuarios insatisfechos";
                        elseif($R > 50 && $R < 60) $Val = "La mayoría de usuarios insatisfechos";
                        elseif($R > 60 && $R < 70) $Val = "Muchos usuarios insatisfechos";
                        elseif($R > 70 && $R < 80) $Val = "Algunos usuarios insatisfechos";
                        elseif($R > 80 && $R < 90) $Val = "Todos los usuarios satisfechos";
                        elseif($R > 90) $Val = "Usuarios muy satisfechos";

                        echo '<h2 style="color: white">R='.$R.'</h2>';
                        echo '<h3 style="color: white">'.$Val.'.</h2>';
                    ?> 
                </div>

                <form action="" method="post">
                    <div class="form-container">
                        <div class="form">

                            <label for="SLR">SLR (de 0 a 18dB):</label>
                            <div class="form-item">
                                <input type="number" id="SLR" name="SLR" placeholder="8" min="0" max="18">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                            
                            <label for="RLR">RLR (de -5 a 14dB):</label>
                            <div class="form-item">
                                <input type="number" id="RLR" name="RLR" placeholder="2" min="-5" max="14">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                            <label for="STMR">STMR (de 10 a 20dB):</label>
                            <div class="form-item">
                                <input type="number" id="STMR" name="STMR" placeholder="15" min="10" max="20">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                            <label for="LSTR">LSTR (de 13 a 23dB):</label>
                            <div class="form-item">
                                <input type="number" id="LSTR" name="LSTR" placeholder="18" min="13" max="23">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                            <label for="Ds">Ds (de -3 a 3):</label>
                            <div class="form-item">
                                <input type="number" id="Ds" name="Ds" placeholder="3" min="-3" max="3">
                                <p style="opacity: 0">.</p> <!-- chapuza para mantener todo alineado -->
                            </div>
                            <br>

                            <label for="Dr">Dr (de -3 a 3):</label>
                            <div class="form-item">
                                <input type="number" id="Dr" name="Dr" placeholder="3" min="-3" max="3">
                                <p style="opacity: 0">.</p>
                            </div>
                            <br>
                            
                            <label for="TELR">TELR (de 5 a 65dB):</label>
                            <div class="form-item">
                                <input type="number" id="TELR" name="TELR" placeholder="65" min="5" max="65">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                        </div>

                        <div class="form">

                            <label for="WEPL">WEPL (de 5 a 110dB):</label>
                            <div class="form-item">
                                <input type="number" id="WEPL" name="WEPL" placeholder="110" min="5" max="110">
                                <p style="padding-left: 10px">dB</p>
                            </div>
                            <br>

                            <label for="T">T (de 0 a 500ms):</label>
                            <div class="form-item">
                                <input type="number" id="T" name="T" placeholder="0" min="0" max="500">
                                <p style="padding-left: 10px">ms</p>
                            </div>
                            <br>

                            <label for="Tr">Tr (de 0 a 1000ms):</label>
                            <div class="form-item">
                                <input type="number" id="Tr" name="Tr" placeholder="0" min="0" max="1000">
                                <p style="padding-left: 10px">ms</p>
                            </div>
                            <br>

                            <label for="Ta">Ta (de 0 a 500ms):</label>
                            <div class="form-item">
                                <input type="number" id="Ta" name="Ta" placeholder="0" min="0" max="500">
                                <p style="padding-left: 10px">ms</p>
                            </div>
                            <br>

                            <label for="qdu">qdu (de 1 a 14):</label>
                            <div class="form-item">
                                <input type="number" id="qdu" name="qdu" placeholder="1" min="1" max="14">
                                <p style="opacity: 0">.</p>
                            </div>
                            <br>

                            <label for="Ie">Ie (de 0 a 40):</label>
                            <div class="form-item">
                                <input type="number" id="Ie" name="Ie" placeholder="0" min="0" max="40">
                                <p style="padding-left: 10px">ms</p>
                            </div>
                            <br>

                            <label for="Bpl">Bpl (de 1 a 40):</label>
                            <div class="form-item">
                                <input type="number" id="Bpl" name="Bpl" placeholder="1" min="1" max="40">
                                <p style="opacity: 0">.</p>
                            </div>
                            <br>
                            
                        </div>

                        <div class="form">

                            <label for="Ppl">Ppl (de 0 a 20%):</label>
                            <div class="form-item">
                                <input type="number" id="Ppl" name="Ppl" placeholder="0" min="0" max="20">
                                <p style="padding-left: 10px">%</p>
                            </div>
                            <br>

                            <label for="BurstR">BurstR (de 1 a 2):</label>
                            <div class="form-item">
                                <input type="number" id="BurstR" name="BurstR" placeholder="1" min="1" max="2">
                                <p style="opacity: 0">.</p>
                            </div>
                            <br>

                            <label for="Nc">Nc (de -80 a -40dBm0p):</label>
                            <div class="form-item">
                                <input type="number" id="Nc" name="Nc" placeholder="-70" min="-80" max="-40">
                                <p style="padding-left: 10px">dBm0p</p>
                            </div>
                            <br>

                            <label for="Ps">Ps (de 35 a 85dB(A)):</label>
                            <div class="form-item">
                                <input type="number" id="Ps" name="Ps" placeholder="35" min="35" max="85">
                                <p style="padding-left: 10px">dB(A)</p>
                            </div>
                            <br>

                            <label for="Pr">Pr (de 35 a 85dB(A)):</label>
                            <div class="form-item">
                                <input type="number" id="Pr" name="Pr" placeholder="35" min="35" max="85">
                                <p style="padding-left: 10px">dB(A)</p>
                            </div>
                            <br>

                            <label for="A">A (de 0 a 20):</label>
                            <div class="form-item">
                                <input type="number" id="A" name="A" placeholder="0" min="0" max="20">
                                <p style="opacity: 0">.</p>
                            </div>
                            <br>

                            <label for="DelaySensivity">Delay sensivity:</label>
                            <div class="form-item">
                                <select id="DelaySensivity" name="DelaySensivity">
                                    <option value="1">Default</option>
                                    <option value="2">Low</option>
                                    <option value="3">Very low</option>
                                </select>
                                <p style="opacity: 0">.</p>
                            </div>
                        </div>
                    </div>
                    <div style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px" class="result-container">
                        <input type="submit" id="calculate" name="calculate" class="button">
                    </div>
                </form>
            </div>
        </div>  <!-- container -->
        <footer id="footer">
        <p>Desarrollado para el Caso Práctido IV de RCA con los conocimientos de PHP de TAW con la Recomendación G.107 delante. 
            &copy; Eduardo Martínez Juárez, CC BY-NC-SA 4.0 License</p>
    </footer>
    </body>
    
    <script> //Script para el correcto funcionamiento del footer
    window.addEventListener("DOMContentLoaded", function() {
        const footer = document.getElementById("footer");

        function adjustFooterPosition() {
            const isContentFull = document.body.offsetHeight <= window.innerHeight;
            if (isContentFull) {
            footer.style.position = "fixed";
            footer.style.bottom = "0";
            } else {
            footer.style.position = "relative";
            }
        }

        window.addEventListener("resize", adjustFooterPosition);
        adjustFooterPosition();
    });   
    </script>
</html>