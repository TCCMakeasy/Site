<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/estiloPadrão.css">
    <title>Document</title>

    <style>
        
        #tabela {
            display: flex;
            width: 100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
            border-collapse: collapse;
        }

        td{

            background-color: #343888;
            color: white;
            border: 2px solid black;
        }


            @media (max-width: 768px){
    
               main{
               margin-top: 5rem;
            }
        }

    /*#container{
    display: flex;
    width: 97%;
    height: 87%;
    background-color: var(--corSecundaria);
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
    color: white;
    display: flex;
    align-items: center;
    flex-direction: column;
    overflow-y: scroll;
    }*/


    </style>

</head>

<body>
    <?php include_once "./includes/menuAdm.php"; ?>

    <section>

    <main>

    <div id="container">

        <table id="tabela">

            <tr>

                <td>Horários</td>
                <td>Segunda</td>
                <td>Terça</td>
                <td>Quarta</td>
                <td>Quinta</td>
                <td>Sexta</td>
                <td>Sábado</td>
                <td>Domingo</td>

            </tr>

            <tr>

                <td>10:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>11:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>12:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>13:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>14:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>15:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>16:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>17:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>18:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>19:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

            <tr>

                <td>20:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>

    </div>

        </table>
    </main>

</section>

</body>

<script src="./js/menuOpenClose.js"></script>

</html>