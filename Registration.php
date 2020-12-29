<html>

<head>
    <link rel="stylesheet" type="text/css" href="reg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="search-box">
        <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
        <a href="proj.html"><img src="logo.PNG" class="logo" width="150" height="40"></a>
        
        <form action="" method="POST">
            <div class="container">

                <h1 style="text-align: center;">SIGN-UP</h1>
                <hr>
                <label><b> Firstname:</b> </label>
                <input type="text" name="first" placeholder="Firstname" id="first" onkeyup="validate();" />
                <!-- <input type=" text" name="first" id="first" onkeyup="validate();" /> -->
                <div id="errFirst"></div>

                <label><b> Middlename:</b> </label>
                <!-- <input type="text" name="middlename" placeholder="Middlename" size="15" required /> -->
                <input type="text" name="middle" id="middle" placeholder="Middlename" onkeyup="validate();" />
                <div id="errMiddle"></div>

                <label> <b>Lastname:</b> </label>
                <!-- <input type="text" name="lastname" placeholder="Lastname" size="15" required /> -->
                <input type="text" id="last" name="last" placeholder="Lastname" onkeyup="validate();" />
                <div id="errLast"></div>
                <div>
                    <label>
                        <b>Gender:</b>
                    </label><br>
                    <input type="radio" value="Male" name="gender" checked> Male
                    <input type="radio" value="Female" name="gender"> Female
                    <input type="radio" value="Other" name="gender"> Other
                    <!-- <input type="text" name="gender" id="gender" onkeyup="validate();" /> -->
                    <div id="errGender"></div>

                </div>
                <label>
                    Phone :
                </label>
                <!-- <input type="text" name="country code" placeholder="Country Code"  size="2" /> -->
                <!-- <input type="text" name="phone" placeholder="phone no." size="10" / required> -->
                <input type="text" name="phone" placeholder="phone no." onkeyup="validate();" />
                <div id="errPhone"></div>

                <b>Current Address:</b>
                <textarea cols="80" rows="5" placeholder="Current Address" value="address" type="text" id="address" name="address" onkeyup="validate();">
            </textarea>
                <!-- <input type="text" id="address" name="address" onkeyup="validate();" /> -->
                <div id="errAddress"></div>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" onkeyup="validate();">
                <!-- <input type="email" id="email" name="email" onkeyup="validate();" /> -->
                <div id="errEmail"></div>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" onkeyup="validate();">
                <!-- <input type="password" id="password" name="pass" onkeyup="validate();" /> -->
                <div id="errPassword"></div>

                <label for="psw-repeat"><b>Confirm Password</b></label>
                <input type="password" placeholder="Retype Password" name="psw-repeat" onkeyup="validate();">
                <button type="submit" id="submit" name="submit" class="registerbtn" id="confirm"><b>Register</b></button>
                <!-- <input type="password" id="confirm" onkeyup="validate();finalValidate();" /> -->
                <div id="errConfirm"></div>
        </form>


        <?php
        if (isset($_POST["submit"])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $first = $_POST['first'];
                $middle = $_POST['middle'];
                $last = $_POST['last'];
                $gender = $_POST['gender'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
                mysqli_select_db($con, 'miniproject') or die("cannot select DB");
                $query = mysqli_query($con, "SELECT * FROM register WHERE email='" . $email . "'");
                $numrows = mysqli_num_rows($query);
                if ($numrows == 0) {
                    $sql = "INSERT INTO register(email, pass, first,middle,last,gender,phone,address) VALUES('$email','$pass','$first','$middle','$last','$gender','$phone','$address')";
                    // if (!mysqli_query($con, $sql)) {
                    //     echo 'Not Inserted';
                    // } else {
                    //     echo 'inserted';
                    // }

                    // $email = mysqli_fetch_assoc$con,($query);
                    $result = mysqli_query($con, $sql);
                    if ($result) {

                        echo "Account Successfully Created";
                    } else {
                        echo "Failure!";
                    }
                } else {
                    echo "That username already exists! Please try again with another.";
                }
            } else {
                echo "All fields are required!";
            }
        }
        ?>

        <script type="text/javascript">
            var divs = new Array();
            divs[0] = "errFirst";
            divs[1] = "errLast";
            divs[2] = "errEmail";
            divs[3] = "errUid";
            divs[4] = "errPassword";
            divs[5] = "errConfirm";

            function validate() {
                var inputs = new Array();
                inputs[0] = document.getElementById('first').value;
                inputs[1] = document.getElementById('last').value;
                inputs[2] = document.getElementById('email').value;
                inputs[3] = document.getElementById('uid').value;
                inputs[4] = document.getElementById('password').value;
                inputs[5] = document.getElementById('confirm').value;
                var errors = new Array();
                errors[0] = "<span style='color:red'>Please enter your first name!</span>";
                errors[1] = "<span style='color:red'>Please enter your last name!</span>";
                errors[2] = "<span style='color:red'>Please enter your email!</span>";
                errors[3] = "<span style='color:red'>Please enter your user id!</span>";
                errors[4] = "<span style='color:red'>Please enter your password!</span>";
                errors[5] = "<span style='color:red'>Please confirm your password!</span>";
                for (i in inputs) {
                    var errMessage = errors[i];
                    var div = divs[i];
                    if (inputs[i] == "")
                        document.getElementById(div).innerHTML = errMessage;
                    else if (i == 2) {
                        var atpos = inputs[i].indexOf("@");
                        var dotpos = inputs[i].lastIndexOf(".");
                        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= inputs[i].length)
                            document.getElementById('errEmail').innerHTML = "<span style='color: red'>Enter a valid email address!</span>";
                        else
                            document.getElementById(div).innerHTML = "<span style='color: white'>OK!</span>";
                    } else if (i == 5) {
                        var first = document.getElementById('password').value;
                        var second = document.getElementById('confirm').value;
                        if (second != first)
                            document.getElementById('errConfirm').innerHTML = "<span style='color: red'>Your passwords don't match!</span>";
                        else
                            document.getElementById(div).innerHTML = "<span style='color: white'>OK!</span>";
                    } else
                        document.getElementById(div).innerHTML = "<span style='color: white'>OK!</span>";
                }
            }

            function finalValidate() {
                var count = 0;
                for (i = 0; i < 6; i++) {
                    var div = divs[i];
                    if (document.getElementById(div).innerHTML == "<span style='color: white'>OK!</span>");
                    count = count + 1;
                }
                if (count == 6)
                    document.getElementById("errFinal").innerHTML = "<span style='color: white'>All the data you entered is correct!!!</span>";
            }
        </script>
        <!-- Code injected by live-server -->
        <script type="text/javascript">
            // <![CDATA[  <-- For SVG support
            if ('WebSocket' in window) {
                (function() {
                    function refreshCSS() {
                        var sheets = [].slice.call(document.getElementsByTagName("link"));
                        var head = document.getElementsByTagName("head")[0];
                        for (var i = 0; i < sheets.length; ++i) {
                            var elem = sheets[i];
                            var parent = elem.parentElement || head;
                            parent.removeChild(elem);
                            var rel = elem.rel;
                            if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                                var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                                elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                            }
                            parent.appendChild(elem);
                        }
                    }
                    var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                    var address = protocol + window.location.host + window.location.pathname + '/ws';
                    var socket = new WebSocket(address);
                    socket.onmessage = function(msg) {
                        if (msg.data == 'reload') window.location.reload();
                        else if (msg.data == 'refreshcss') refreshCSS();
                    };
                    if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                        console.log('Live reload enabled.');
                        sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                    }
                })();
            } else {
                console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
            }
            // ]]>
        </script>
</body>

</html>