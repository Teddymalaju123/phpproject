<html>
    <head>
        <title>Rest API for calculate Gpax</title>
        <meta charset = "UTF-8">
    </head>
    <body>
        <form action="apiCallGPAX.php" method="POST">
            <h1>Rest API for calculate GPAX</h1>
            <h4>year 1</h4>
            Semester1:<input type="number" step="0.01" name="sub1" id="sub1" size="10" required><br><br>
            Semester2:<input type="number" step="0.01" name="sub2" id="sub2" size="10" required><br><br>
            <h4>year 2</h4>
            Semester3:<input type="number" step="0.01" name="sub3" id="sub3" size="10" required><br><br>
            Semester4:<input type="number" step="0.01" name="sub4" id="sub4" size="10" required><br><br>
            <h4>year 3</h4>
            Semester5:<input type="number" step="0.01" name="sub5" id="sub5" size="10" required><br><br>
            Semester6:<input type="number" step="0.01" name="sub6" id="sub6" size="10" required><br><br>
            <h4>year 4</h4>
            Semester7:<input type="number" step="0.01" name="sub7" id="sub7" size="10" required><br><br>
            Semester8:<input type="number" step="0.01" name="sub8" id="sub8" size="10" required><br><br>
            <button type="submit" name="submit">Cal Sub</button>
        </form>
    </body>
</html>