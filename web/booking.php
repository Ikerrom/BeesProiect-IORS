<html>

<?php 
session_start();
?>					
			<head>  
				<meta charset="utf-8">
 				<meta name="viewport" content="width=device-width, initial-scale=1">
  				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<link rel="stylesheet" href="css.css">
				<title>ERLETE</title>
				<link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

		<style>
			button{
				  background-color: #ffbb00;
				  border:none;
				  color:#595959; 
				  width: 6vw;
				  height: 6vh;
				  text-decoration: none;
				  font-size: 2vh;
				  font-weight: bold;
				  margin:0px;
				}
			
		</style>

	<script>
            var selectInnerText = '<option selected="selected" value="ez">Please select</option><option>Your own</option>';
            var selecteddate = "";
            let monthnames = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]

            function checkEnable(attr, obj) {
                if (attr in obj && obj[attr] === true) {
                    document.querySelector('#' + attr).style.display = '';
                } else {
                    document.querySelector('#' + attr).style.display = 'none';
                }
            }

            function parseinfo(obj) {
                var attrs = ['ezinda', 'ezinduzu', 'eginda', 'ezlata','berandu'];
                for (var i = 0; i < attrs.length; ++i) {
                    checkEnable(attrs[i], obj);
                }
                if ('lataid' in obj) {
                    const sele = document.querySelector('#lataid');
                    sele.innerHTML = selectInnerText;
                    for (var i = 0; i < obj.lataid.length; ++i) {
                        sele.insertAdjacentHTML('beforeend',
                                '<option value="' + obj.lataid[i] + '">' + obj.lataid[i] + '</option>');
                    }
                }
            }

            function getinfo() {
                this.date = selecteddate;
                this.lataid = parseInt(document.querySelector('#lataid').value);
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    parseinfo(JSON.parse(this.responseText));
                    xhttpcalendar.open("GET", "calendarsend.php", true);
                    xhttpcalendar.send();
                }
            };

            function date(year,month){
            	this.year=year;
            	this.month=month;
            }

            var xhttpdel = new XMLHttpRequest();
            xhttpdel.onreadystatechange = function () {
            };


            function setdate(date,obj){
                try {
                    document.getElementById(selecteddate).style.background = "";
                    ret4= "";
                    document.querySelector('#deldiv').innerHTML = ret4;
                    var attrs = ['ezinda', 'ezinduzu', 'eginda', 'ezlata','deleted','berandu'];
                    for (var i = 0; i < attrs.length; ++i) {
                    	document.getElementById(attrs[i]).style.display = "none";
                	}
				} catch (error) {}
	                selecteddate = date;
	                document.getElementById(date).style.background = "darkgrey";
	                for (var i = obj.length - 1 ; i >= 0; i--) {
	                    if (obj[i] == selecteddate) {
	                    	ret4= '<button onclick="deldate(\''+ date +'\')"> Delete Book </button>';
	                    	document.querySelector('#deldiv').innerHTML = ret4;
	                    }
	                }
                }

		    var xhttpcalendar = new XMLHttpRequest();
            xhttpcalendar.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    parseinfocalendar(JSON.parse(this.responseText));

                }
            };

            function changedate(year,month){
            	const sentinfo = JSON.stringify(new date(year,month));
			    xhttpcalendar.open("GET", "calendarsend.php?x=" + sentinfo, true);
			    xhttpcalendar.send();
            }

            function deldate(date){
            	const sentinfo = date;
			    xhttpdel.open("GET", "book/bookdel.php?x=" + sentinfo, true);
			    xhttpdel.send();
			    xhttpcalendar.open("GET", "calendarsend.php", true);
                xhttpcalendar.send();
                document.getElementById('deleted').style.display = '';

            }

             function parseinfocalendar(obj) {
             	var month = obj.month;
             	var year = obj.year;
             	var i = obj.diainicio;
             	var diacounter = 1;
             	var done = false;
             	var d = new Date();
             	var Nyear = d.getFullYear();
             	var Nmonth =1 +  parseInt(d.getMonth());
             	var NDate = d.getFullYear() + "-" + String(d.getMonth()+1).padStart(2,'0')+ "-" + String(d.getDate()).padStart(2,'0');
             	var ret = "";
             	var ret2 ="";
             	ret += "<div>";
             	ret2 += '<button onclick="changedate('+ parseInt(year) + "," + (parseInt(month) - 2) +')"> < </button>';
             	ret2 += '<button>' + monthnames[month-1] + '</button>';
             	ret2 += '<button onclick="changedate('+ parseInt(year) + "," + (parseInt(month)) +')"> > </button>';
		        ret2 += '<div class="spacer"></div>';
		        ret2 += '<button onclick="changedate('+ (parseInt(year) - 1) + "," + (parseInt(month) - 1) +')"> < </button>';
             	ret2 += '<button>' + year + '</button>';
             	ret2 += '<button onclick="changedate('+ (parseInt(year) + 1) + "," + (parseInt(month) - 1) +')"> > </button>';

		             for (var j = 0; j < i; ++j) {
		             	ret += '<div class="spacer"></div>';
		             }
		        var attr = "day";
             	while (!done) {
             			if (!(diacounter === 1)) {
             				ret += "<div>";
             			}

             		for (; i < 7 && !done; i++) {
		                if ((year < Nyear) || ((year == Nyear) && (month < Nmonth)) || ((year == Nyear) && (month == Nmonth) && (diacounter <= obj[attr]))) {
		                    ret += '<button disabled class="calendardisabled" id="' + year + "-" + String(month).padStart(2,'0') + "-" + String(diacounter).padStart(2,'0') +'" onclick="setdate(\''+ year + "-" + String(month).padStart(2,'0') + "-" + String(diacounter).padStart(2,'0') + '\',[\'' + obj.bookedMe.join(['\',\'']) +'\'])">' + diacounter + '</button>';
		                
             		  	diacounter += 1;
		                }else{
             		  	ret += '<button id="' + year + "-" + String(month).padStart(2,'0') + "-" + String(diacounter).padStart(2,'0') +'" onclick="setdate(\''+ year + "-" + String(month).padStart(2,'0') + "-" + String(diacounter).padStart(2,'0') + '\',[\'' + obj.bookedMe.join(['\',\'']) +'\'])">' + diacounter + '</button>';
             		  	diacounter += 1;
             		  }

             		  	if (diacounter > obj.dias){
                            done = true;
                        }

             		}

             		i = 0;
             		ret += "</div>";      	
             	}

             	document.querySelector('#content').innerHTML = ret;
             	document.querySelector('#yearmonth').innerHTML = ret2;
                
                if (attr in obj) {
                    document.getElementById(year + "-" + String(month).padStart(2,'0') + "-" + obj[attr]).style.color = "blue";
                }

                for (var i = obj.booked.length - 1 ; i >= 0; i--) {
                    document.getElementById(obj.booked[i]).style.color = "red";
                    document.getElementById(obj.booked[i]).disabled = "true";
                }

                for (var i = obj.bookedMe.length - 1 ; i >= 0; i--) {
                    document.getElementById(obj.bookedMe[i]).style.color = "green";
                }

                for (var i = obj.bookedMe.length - 1; i >= 0; i--) {
					if (obj.bookedMe[i] ==  NDate) {
						ret5 = '<button onclick="finishbook()"> Finish Booking </button>';
						document.querySelector('#finishdiv').innerHTML = ret5;
                	}                
                }


             }
		</script>

			</head>
			<body>
				<div class="title">
					
					    <?php
					    if (isset($_SESSION['erablitzailea_a_g'])) {
					    include("test_connect_db.php");
						$dni = $_SESSION['erablitzailea_a_g'];
						$link =  ConnectDataBase();
						$result=mysqli_query($link, "select nombre,Foto from Personas where dni = '$dni'"); 
						$imprimir = mysqli_fetch_array($result);
							?>
								<div class="perfil">
									<img class="perfilimage" src="<?php echo $imprimir['Foto'];?>">
									<div class="perfiltext">
											<p>User: <?php echo $imprimir['nombre'];?></p>
											<p>DNI: <?php echo $dni;?></p>
									</div>
								</div>
							<?php
							}
							?>

						<p class="titletext">ERLETE</p>
				</div>
				
				<div class="topbar">
					    <?php
							if (isset($_SESSION['erablitzailea_a_g'])) 
							{
						?>

						<form action="index.php">
								<input class="buttonT" type="submit" value="HOME"/>
						</form>

						<form action="account.php">
							<input class="buttonT" type="submit" value="YOUR ACCOUNT"/>
						</form>

						<form action="about.php">
							<input class="buttonT" type="submit" value="ABOUT US"/>
						</form>

						<?php
							}else{
							?>
							<form action="login.php">
								<input class="buttonT" type="submit" value="LOG IN"/>
							</form>
							<?php
							}
						?>

					
						<form action="singout.php">
							<input class="buttonT" type="submit" value="LOG OUT"/>
						</form>
				</div>

				
			<div class="totalcalendar">	
					<div id="yearmonth">
					</div>
					<div class="weeknames">
						<button>Mon</button>
						<button>Tus</button>
						<button>Wed</button>
						<button>Thu</button>
						<button>Fri</button>
						<button>Sat</button>
						<button>Sun</button>
					</div>
				<div id="content">
				</div>

					<div class="textstyle">
							 <h3 id="ezbete" style="display: none;">
					            Please fill all blanks.
					        </h3>
					         <h3 id="deleted" style="display: none;">
					            Deleted Sucsesfully.
					        </h3>
					        <h3 id="berandu" style="display: none;">
					            The date has already passed or is today.
					        </h3>
					        <h3 id="ezlata" style="display: none;">
					            Sorry, the bin was already booked.
					        </h3>
					        <h3 id="ezinda" style="display: none;">
					            Cannot book that day.
					        </h3>
					        <h3 id="ezinduzu" style="display: none;">
					            You are not signed in.
					        </h3>
					        <h3 id="eginda" style="display: none;">
					            Booked successfully.
					        </h3>
					        <p>Enter the bin id</p>
					</div>

					       <div class="submitdiv">
					    		<select class="calendaroption" name="latai" id="lataid">
						            <option selected="selected" value="ez">Please select</option>
						            <option>Your own</option>
					        	</select>
					        	<button id="submit">Submit</button>

					       </div>
						        <div id="deldiv">
						       	</div>
						    <div id="finishdiv">
						    </div>

			</div>
			        <script>
			            xhttp.open("GET", "book/book.php", true);
			            xhttp.send();

			            document.querySelector('#submit').onclick = function () {
			                if (document.querySelector('#lataid').value === 'ez') {
			                    document.querySelector('#ezbete').style.display = '';
			                    return;
			                }
			                document.querySelector('#ezbete').style.display = 'none';
			                xhttp.open("GET", "book/book.php?x=" + JSON.stringify(new getinfo()), true);
			                xhttp.send();
			            };
			            xhttpcalendar.open("GET", "calendarsend.php", true);
			            xhttpcalendar.send();

			        </script>