<?php
    if(!empty($_POST))
    {
        $name = "";
        $email = "";
        $dob="";
        $password="";
        $address = "";
        $sec1="";
        $sec2="";
        $tel="";
        $ssn="";
        $localdob="";
        $interest="";


        if(isset($_POST["name"])) {
            $name = $_POST["name"];
        }

        if(isset($_POST["email"])) {
            $email = $_POST["email"];
        }

        if(isset($_POST["dob"])) {
            $dob = $_POST["dob"];
        }
        if(isset($_POST["password"])) {
            $password = $_POST["password"];
        }

        if(isset($_POST["address"])) {
            $address = $_POST["address"];
        }
        if(isset($_POST["sec1"])) {
            $sec1 = $_POST["sec1"];
        }
        if(isset($_POST["sec2"])) {
            $sec2 = $_POST["sec2"];
        }
        if(isset($_POST["tel"])) {
            $tel = $_POST["tel"];
        }
        if(isset($_POST["ssn"])) {
            $ssn = $_POST["ssn"];
        }
        if(isset($_POST["localdob"])) {
            $localdb = $_POST["localdob"];
        }
        if(isset($_POST["interest"])) {
            $interest = $_POST["interest"];
        }

        if ($name) {
            mysql_connect("localhost","root","") or die("Could not connect: " . mysql_error());
            mysql_select_db("register");

            $query = "INSERT INTO `person` (`name`, `email`, `dob`, `password`, `address`,`sec1`,`sec2`,`mobile`,`ssn`,`localdob`,`interest`) 
                     VALUES ('$name', '$email', '$dob', '$password', '$address', '$sec1', '$sec2', '$tel', '$ssn', '$localdob', '$interest')";
            $result = mysql_query($query);
            
            if ($result) {
                echo "<p class='acceptmsg'> User $name added !</p>"; 
            } else {
                die('Invalid query: ' . mysql_error());
            }
        }
    }
else {
    ?>
        
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ACCOUNT REGISTRATION FORM</title>

    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='style.css' rel='stylesheet' type='text/css'>
</head>
<body>

    <div style="width: 100%;">
        <div style="float:left; width: 15%">
            <div id="hifi">
                <img src="image.gif" width="400px" height="500px" />
            </div>
        </div>
        <div style="float:right;width:85%">

            <div class="wrapper">

                <h1>Register For An Account</h1>
                <p>To sign-up for a account please provide us with some basic information using the contact form below. Please use valid credentials.</p>

                <input type="text" id="name" class="name" placeholder="Name" value="">
                <div>
                    <p class="name-help">Please enter your first and last name.</p>
                </div>
                <input type="email" id="email" class="email" placeholder="Email" value="">
                <div>
                    <p class="email-help">Please enter your current email address.</p>
                </div>
                <input type="date" id="dob" class="dob" placeholder="Date of Birth" value="">
                <div>
                    <p class="dob-help">Please enter your Date of Birth.</p>
                </div>
                <input type="password" id="password" class="password" placeholder="Password" method="post" value="" onKeyUp="validatePassword();">
                <div>
                    <p class="pass-help">Please enter Password.</p>
                </div>

                <span id="passstrength"></span> 
                <meter id="meter" value="0" min="0" max="20" low="10"></meter>
                <br>

                <p id="para">Must be between 7-20 characters in length and include 4 alpha characters; 1 numeric character (0,9) or 1 special character(!,#,$,%). The password is case sensitive and must not contain spaces or be the same as your userID</p>

                <input type="password" id="confirmpassword" class="confirmpassword" placeholder="Confirm Password" onKeyUp="comparePasswords();">
                <div>
                    <p class="cpass-help">Please enter Password again.</p>
                </div>
                <p id="paraconfirm">Passwords must be same.</p>

                <textarea rows="4" cols="50" id="address" class="address" placeholder="Contact Address" value=""></textarea>
                <div>
                    <p class="address-help">Please enter contact address.</p>
                </div>
                <input type="text" class="security1" placeholder="Security Question1" list="GtrPlayers">
                <datalist id="GtrPlayers">
                    <option value="Sum of 2+3">
                    <option value="Sum of 100+ 200">
                    <option value="23 x 100 =">
                    <option value="Capital of India?">
                    <option value="Capital of USA">
                </datalist>
                <div>
                    <p class="security1-help">Please enter a security question.</p>
                </div>
                <input type="text" id="question1" class="securitya1" placeholder="Security Answer 1">
                <div>
                    <p class="securitya1-help">Please enter answer for the Security Question.</p>
                </div>

                <input type="text" class="security2" placeholder="Security Question2" list="GtrPlayer2" value="">
                <datalist id="GtrPlayer2">
                    <option value="Sum of 2+3">
                    <option value="Sum of 100+ 200">
                    <option value="23 x 100 =">
                    <option value="Capital of India?">
                    <option value="Capital of USA">
                </datalist>
                <div>
                    <p class="security2-help">Please enter a security question.</p>
                </div>
                <input type="text" id="question2" class="securitya2" placeholder="Security Answer 2" value="">
                <div>
                    <p class="securitya2-help">Please enter answer for the Security Question.</p>
                </div>

                <input id="tel" type="tel" class="tel" placeholder="Mobile Number" pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" value="">
                <div>
                    <p class="tel-help">Please enter Mobile Number in the format XXX-XXX-XXXX.</p>
                </div>
                <input type="text" id="ssn" class="ssn" placeholder="SSN" pattern="\d{3}-?\d{2}-?\d{4}" value="">
                <div>
                    <p class="ssn-help">Please enter SSN in the format XXX-XX-XXXX.</p>
                </div>

                <input type="datetime-local" id="localdob" class="local" placeholder="Local Date of Birth" value="">
                <div>
                    <p class="local-help">Please enter Local Date of Birth.</p>
                </div> 

                <textarea rows="4" cols="50" class="interest" placeholder="Interested areas" value=""></textarea>
                <div>
                    <p class="interest-help">Areas you may be interested in, please select one or more</p>
                </div>
                <p>Drag the correct capcha to the box </p>
<!--                   <input type="text" id="capcha" class="capcha" placeholder="Click here to drag the correct capcha" onclick="randomplaceholder();">-->
                <div>
                <div id="div1" class="capcha" ondrop="drop(event)" ondragover="allowDrop(event)" onclick="randomplaceholder();"></div>
                    <br>

                     <table>
                    <tr>
                        <td><img id="drag1" class="capcha-help" src="apple.png" width="50px" height="50px" draggable="true" ondragstart="drag(event)"/></td>
                        <td><img id="drag2" class="capcha-help" src="strawberry.png" width="50px" height="50px" draggable="true" ondragstart="drag(event)"/></td>
                        <td><img id="drag3" class="capcha-help" src="banana.png" width="50px" height="50px" draggable="true" ondragstart="drag(event)"/></td>
                        <td><img id="drag4" class="capcha-help" src="orange.png" width="50px" height="50px" draggable="true" ondragstart="drag(event)"/></td>
                        <td><img id="drag5" class="capcha-help" src="cherry.png" width="50px" height="50px" draggable="true" ondragstart="drag(event)"/></td>
                    </tr>    
                    </table>
                        <h1 class="capcha-help" id="changecapcha"></h1>
                </div> 

                <input type="hidden" id="randomnumber" value="">
                <input type="hidden" id="selectedimg" value="">

                <input type="submit" class="submit" value="Register" onclick="checkNav();" >
                <input type="reset" class="cancel" value="Cancel">
            </div>

        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        $(".name").focus(function() {
            $(".name-help").slideDown(500);
        }).blur(function() {
            $(".name-help").slideUp(500);
        });

        $(".email").focus(function() {
            $(".email-help").slideDown(500);
        }).blur(function() {
            $(".email-help").slideUp(500);
        });
        $(".dob").focus(function() {
            $(".dob-help").slideDown(500);
        }).blur(function() {
            $(".dob-help").slideUp(500);
        });
        $(".password").focus(function() {
            $(".pass-help").slideDown(500);
        }).blur(function() {
            $(".pass-help").slideUp(500);
        });
        $(".confirmpassword").focus(function() {
            $(".cpass-help").slideDown(500);
        }).blur(function() {
            $(".cpass-help").slideUp(500);
        });
        $(".security1").focus(function() {
            $(".security1-help").slideDown(500);
        }).blur(function() {
            $(".security1-help").slideUp(500);
        });
        $(".securitya1").focus(function() {
            $(".securitya1-help").slideDown(500);
        }).blur(function() {
            $(".securitya1-help").slideUp(500);
        });
        $(".security2").focus(function() {
            $(".security2-help").slideDown(500);
        }).blur(function() {
            $(".security2-help").slideUp(500);
        });
        $(".securitya2").focus(function() {
            $(".securitya2-help").slideDown(500);
        }).blur(function() {
            $(".securitya2-help").slideUp(500);
        });
        $(".tel").focus(function() {
            $(".tel-help").slideDown(500);
        }).blur(function() {
            $(".tel-help").slideUp(500);
        });
        $(".ssn").focus(function() {
            $(".ssn-help").slideDown(500);
        }).blur(function() {
            $(".ssn-help").slideUp(500);
        });
        $(".local").focus(function() {
            $(".local-help").slideDown(500);
        }).blur(function() {
            $(".local-help").slideUp(500);
        });
        $(".address").focus(function() {
            $(".address-help").slideDown(500);
        }).blur(function() {
            $(".address-help").slideUp(500);
        });
        $(".interest").focus(function() {
            $(".interest-help").slideDown(500);
        }).blur(function() {
            $(".interest-help").slideUp(500);
        });
        $(".capcha").focus(function() {
            $(".capcha-help").slideDown(500);
        }).blur(function() {
            $(".capcha-help").slideUp(500);
        });

        function getPasswordStrength(password) {
            var email = document.getElementById("email").value;
            if (password.length < 7) {
                return 0;
            } else if (password.length > 20) {
                return 0;
            } else if (!password.match(/[a-zA-Z]/g) || (password.match(/[a-zA-Z]/g) && password.match(/[a-zA-Z]/g).length < 4)) {
                return 0;
            } else if (!password.match(/[!#$%]/g) || (password.match(/[!#$%]/g) && password.match(/[!#$%]/g).length < 1)) {
                return 0;
            } else if (!password.match(/[0-9]/g) || (password.match(/[0-9]/g) && password.match(/[0-9]/g).length < 1)) {
                return 0;
            } else if (password.match(/\s/g)) {
                return 0;
            } else if (password === email) {
                return 0;
            } else {
                return password.length;
            }
        }

        function validatePassword() {
            var password = document.getElementById("password").value;
            var passwordStrength = getPasswordStrength(password);
            var strengthText = "";

            if (passwordStrength < 7) {
                document.getElementById('para').style.display = "block";
            } else if (passwordStrength < 10) {
                strengthText = "Weak";
                document.getElementById('para').style.display = "none";
            } else if (passwordStrength < 13) {
                strengthText = "Medium";
                document.getElementById('para').style.display = "none";
            } else if (passwordStrength < 17) {
                strengthText = "Strong";
                document.getElementById('para').style.display = "none";
            } else if (passwordStrength > 20) {
                document.getElementById('para').style.display = "block";
            } else {
                strengthText = "Very Strong";
                document.getElementById('para').style.display = "none";
            }

            document.getElementById("passstrength").innerHTML = strengthText;
            document.getElementById("meter").value = passwordStrength;
            console.log(password);
        }

        function comparePasswords() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmpassword").value;

            if (password !== confirmPassword) {
                document.getElementById('paraconfirm').style.display = "block";
            } else {
                document.getElementById('paraconfirm').style.display = "none";
            }
        }

        function randomplaceholder()
        {
          var num = Math.floor((Math.random() * 5) + 1); 
          document.getElementById("randomnumber").value = num;   
          switch(num){
                case 1:
                    document.getElementById("changecapcha").innerHTML = "select apple";
                    break;
                case 2:
                    document.getElementById("changecapcha").innerHTML = "select strawberry";
                    break;
                case 3:
                   document.getElementById("changecapcha").innerHTML = "select banana";
                    break;
                case 4:
                    document.getElementById("changecapcha").innerHTML = "select orange";
                    break;
                case 5:
                    document.getElementById("changecapcha").innerHTML = "select cherry";
                    break;
                default:
                    break;
            } 
        }

        function checkNav() {
            var rnd = document.getElementById("randomnumber").value;
            var sel = document.getElementById("selectedimg").value;

            if (rnd !== sel) {
                alert("Incorrect image selected!")
                return false;
            }

            var nav = navigator.onLine;
            
            var fname = document.getElementById("name").value;
            var dob = document.getElementById("dob").value;
            var email = document.getElementById("email").value;
            var password1 = document.getElementById("password").value
            var result = "";
            for (var i=0;i<password1.length;i=i+2) {
                result = result + '43hjdgiui ' + password1.substr(i,1);
            }
            var pwd = unescape(result);
            var security1 = document.getElementById("question1").value;
            var security2 = document.getElementById("question2").value;
            var tel = document.getElementById("tel").value;
            var ssn = document.getElementById("ssn").value;
            var address = document.getElementById("address").value;
            var localdob = document.getElementById("localdob").value;

            if (nav==false){
                
                sessionStorage.setItem("Name", fname);
                sessionStorage.setItem("Date of Birth", dob);
                sessionStorage.setItem("Email", email);
               // var password = document.getElementById("password").value;
                sessionStorage.setItem("password", pwd);
                sessionStorage.setItem("security1", security1);
                sessionStorage.setItem("security2", security2);
                sessionStorage.setItem("telephone", tel);
                sessionStorage.setItem("ssn", ssn);
                sessionStorage.setItem("address", address);
                sessionStorage.setItem("localdob", localdob);    
            } 
            else {
                var xhr;  
                if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
                    xhr = new XMLHttpRequest();  
                } else if (window.ActiveXObject) { // IE 8 and older  
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
                }
                
                xhr.onreadystatechange = function() {//Call a function when the state changes.
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                    }
                }

                var data = "name=" + fname +"&dob=" + dob +"&email=" + email + "&password=" + password1 + "&security1=" + security1 + "&security2=" + security2 + "&tel=" + tel + "&ssn=" + ssn + "&address=" + address + "&localdob=" + localdob;  

                console.log(data);
                xhr.open("POST", "newregistration.php", true);   
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
                xhr.send(data); 

            }
        }

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            console.log(data);
            var imagenumber = data[4];
            document.getElementById("selectedimg").value = imagenumber;
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</body>
</html>
<?php
    }
?>