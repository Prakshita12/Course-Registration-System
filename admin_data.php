<?php
session_start();
?>
<!DOCTYPE html>

<head>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/linear-icon.css" rel="stylesheet">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/main.css">

      <script src="js/jquery-3.1.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/main.js"></script></body>

      <!-- This is the main page to get the entries -->
	<script>
		
		$(document).ready(function () {
            
			$("#hello").hide();
			$("#show").hide();

			 
// when uh click the choose option the dropdown would come down and you can choose the option you want
            $("#hello").click(function () {
				$("#show").hide();
				if($("#pos").val() != "None")
				{
				$("#hello").hide();
				}
				$(".ok").empty();
				get_data();

			
   

			});  
			// If the vale selected is not non then other things will take place we can add and update the data
            
			if($("#pos").val() != "None")
            {
				$("#hello").show();
                tear();
            }
			$("#pos").on("change", function () {
				

        		$("#hello").show();
        		tear();
			});
            
			$(document).on('click', '.yes', function () {
				$(".ok").empty();
				$("#nav").remove();
				if($("#pos").val() != "None")
                $("#hello").hide();
                var hole = $(this).closest('tr');
				var it = hole.attr('id');
				$.ajax({
					async: false,
					type: "GET",  //this will get the prime data from the data and prime columns will not be updated but they can be added
					url: "primary.php",
					data: { snow: $("#pos").val() },
					dataType: "json",
					success: function (r) {
						var un = r.length;
						if (un == 2) 
						{  
							//if the number of primary key is more than one then this will take place and the form will be filled by clicking on the data
							var wind = r[0]['Column_name'];
							var wind1 = r[1]['Column_name'];
							var yr = document.getElementById(it);
							var fate = yr.cells[0].innerHTML;
							var fate1 = yr.cells[1].innerHTML;
							$.ajax({
								async: false,
								type: "GET",  //if the number of primary key is more than one then this will take place and the form will be filled by clicking on the data
								url: "form_u.php",
								data: { snow: $("#pos").val(), look: fate, wind: wind, look1: fate1, wind1: wind1 },
								dataType: "json",
								success: function (r) 
								{
									get_data(); //the data which is already in the table will be displayed
									var n1 = $('<input type="hidden"/>');
									n1.attr('name', 'oye');
									n1.attr('value', fate); //whatever changes are made the data is appended
									$("#form1").append(n1);
									var n2 = $('<input type="hidden"/>');
									n2.attr('name', 'oye1');
									n2.attr('value', fate1);
									$("#form1").append(n2); //action will be that the data is updated
									$("#form1").attr('action', 'data_update.php');
									enter_data("#form1", r);
								},
								error: function (ts) {
									// otherwise an error will be shown that the data is not updated
									alert("There is a problem " + ts.responseText);
								}
							});
						}
						else if (un == 1) {
							var wind = r[0]['Column_name'];
							var yr = document.getElementById(it);
							var fate = yr.cells[0].innerHTML;
							$.ajax({
								async: false, //this will select the form and we can update
								type: "GET",
								url: "form_u.php",
								data: { snow: $("#pos").val(), look: fate, wind: wind },
								dataType: "json",
								success: function (r) {
							
									get_data();
									var n = $('<input type="hidden"/>');
									n.attr('name', 'oye');
									n.attr('value', fate);
									$("#form1").append(n);//action will be that the data is updated
									$("#form1").attr('action', 'data_update.php');
									enter_data("#form1", r);
								},
								error: function (f) {
										// otherwise an error will be shown that the data is not updated
									alert("There is an error"+f.responseText);
								}
							});
						}
					},
					error: function (f) {
						alert(f.responseText);
					}
				});
			});
			// we can delete the data as well by clicking the remove button
			$(document).on('click', '.rat', function () {
				$(".ok").empty();
				$("#nav").remove();
				$("#hello").show();
				var hole = $(this).closest('tr');
				var it = hole.attr('id');
				$.ajax({
					async: false,
					type: "GET",
					url: "primary.php",
					data: { snow: $("#pos").val() },
					dataType: "json",
					success: function (r) {
						var un = r.length;
						if (un == 2) {
							var wind = r[0]['Column_name'];
							var wind1 = r[1]['Column_name'];
							var yr = document.getElementById(it);
							var fate = yr.cells[0].innerHTML;
							var fate1 = yr.cells[1].innerHTML;
							yr.remove(yr.selectedIndex);
							$.ajax({
								async: false,
								type: "GET", //it will go to the page from where we can delete teh data
								url: "data_del.php",
								data: { snow: $("#pos").val(), look: fate, wind: wind, look1: fate1, fate1: fate1 },
								dataType: "text",
								success: function (r) {
									alert(r);
								},
								error: function (f) {
									alert("Error : " + f.responseText);
								}
							});
						}
						else if (un == 1) {
							var wind = r[0]['Column_name'];//it will go to the page from where we can delete the data
							var yr = document.getElementById(it);
							var fate = yr.cells[0].innerHTML;
							yr.remove(yr.selectedIndex);
							$.ajax({
								async: false,
								type: "GET",
								url: "data_del.php",
								data: { snow: $("#pos").val(), look: fate, wind: wind },
								dataType: "text",
								success: function (r) {
									alert(r);
								},
								error: function (f) {
									alert("Error : " + f.responseText);
								}
							});
						}
					},
					error: function (f) {
						alert(f.responseText);
					}
				});
			});
			function get_data() {
				$.ajax({
					async: false,
					type: "GET",
					url: "g_T_D.php",
					data: { snow: $("#pos").val() }, // this will get the details of tje table by sleecting various primary keys and data from the data
					dataType: "json",
					success: function (yuck) {
						var snow = $("#pos").val();
						//$("#demo").show();
						$form = $('<form class="form-group" id="form1" action="put_E.php" method="POST"></form>').appendTo('.ok');//as soon as the data is selected an ddata is entered the new data and updated data will be entered in the table 
						var n = $('<input type="hidden"/>');
						$form.append(n);
						n.attr('name', 'tablename');
						n.attr('value', snow);
						for (var i in yuck) {
							var colname = yuck[i];
							if (snow == "coll_data1" && yuck[i] == "DID") { //various tables are selected
								$.ajax({
									async: false, //data is appended at the end
									type: "GET",
									url: "control_data.php",
									data: { snow: "coll_data1", cc: "DID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "DID" + " : ");
										h.attr('name', 'DID');//data is selected from the department and instructor
										$form.append(h);
										for (var i in s) {
											var sel = s[i];
											var k = sel['instr_ID'];
											$(h).append('<option>' + sel['instr_ID'] + '</option>');
										}
										$form.append('</select></p>');
									}
								});
							}
							else if (snow == "coll_pno1" && yuck[i] == "Coll_name") {
								$.ajax({
									async: false,
									type: "GET",  // when the college table is slected from the dropdown
									url: "control_data.php",
									data: { snow: "coll_pno1", cc: "Coll_name" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">'); //and the data is entered
										$form.append("<p>" + "Coll_name" + " : ");
										$form.append(h);
										h.attr('name', "Coll_name");
										for (var i in s) {
											var sel = s[i];
											var k = sel['Coll_name'];
											$(h).append('<option>' + sel['Coll_name'] + '</option>');
										}
										$form.append('</select></p>');
										//data is appended in the form
									}
								});
							}
							else if (snow == "dept1" && yuck[i] == "dept_C_ID") {
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "dept1", cc: "dept_C_ID" },
									dataType: "json",
									success: function (s) {
										var h1 = $('<select class="form-control">');
										$form.append("<p>" + "dept_C_ID" + " : ");
										$form.append(h1);
										h1.attr('name', "dept_C_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['instr_ID'];
											if (sel['instr_ID']) {
												$(h1).append('<option>' + sel['instr_ID'] + '</option>');
											}
										}
										$form.append('</select class="form-control"></p>');
										var h = $('<select>');
										$form.append("<p>" + "Coll_name" + " : ");
										$form.append(h);
										h.attr('name', "Coll_name");
										for (var i in s) {
											var sel = s[i];
											var k = sel['Coll_name'];
											if (sel['Coll_name']) {
												$(h).append('<option>' + sel['Coll_name'] + '</option>');
											}
										}
										$form.append('</select></p>');
										
									}
								});
							}
							else if (snow == "subject1" && yuck[i] == "subject_De_Info") {
								//tabke selected is subject
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "subject1", cc: "subject_De_Info" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "subject_De_Info" + " : ");
										$form.append(h);
										h.attr('name', "subject_De_Info");
										for (var i in s) {
											var sel = s[i];
											var k = sel['dept_code'];
											$(h).append('<option>' + sel['dept_code'] + '</option>');
										}
										$form.append('</select></p>');
									
									}
								});
							}
							
							else if (snow == "d_pno1" && yuck[i] == "dept_code") {
									//tabke selected is subject
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "subject1", cc: "dept_code" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "dept_code" + " : ");
										$form.append(h);
										h.attr('name', "dept_code");
										for (var i in s) {
											var sel = s[i];
											var k = sel['dept_code'];
											$(h).append('<option>' + sel['dept_code'] + '</option>');
										}
										$form.append('</select></p>');
										
									}
								});
							}
							else if (snow == "instr_pno1" && yuck[i] == "instr_ID") {
								//tabke selected is instructor
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "instr_pno1", cc: "instr_ID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "instr_ID" + " : ");
										$form.append(h);
										h.attr('name', "instr_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['instr_ID'];
											$(h).append('<option>' + sel['instr_ID'] + '</option>');
										}
										$form.append('</select></p>');
									}
								});
							}
							else if (snow == "instr1" && yuck[i] == "dept_code") {
								//data selected is department
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "instr1", cc: "dept_code" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "dept_code" + " : ");
										$form.append(h);
										h.attr('name', "dept_code");
										for (var i in s) {
											var sel = s[i];
											var k = sel['dept_code'];
											$(h).append('<option>' + sel['dept_code'] + '</option>');
										}
										$form.append('</select></p>');
										//	 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}
							else if (snow == "sec1" && yuck[i] == "IID") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "sec1", cc: "subject_ID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "IID" + " : ");
										$form.append(h);
										h.attr('name', "IID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['instr_ID'];
											if (sel['instr_ID']) {
												$(h).append('<option>' + sel['instr_ID'] + '</option>');
											}
										}
										$form.append('</select></p>');
										var h1 = $('<select class="form-control">');
										$form.append("<p>" + "subject_ID" + " : ");
										$form.append(h1);
										h1.attr('name', "subject_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['subject_ID'];
											if (sel['subject_ID']) {
												$(h1).append('<option>' + sel['subject_ID'] + '</option>');
											}
										}
										$form.append('</select></p>');
									
									}
								});
							}
							else if (snow == "student1" && yuck[i] == "dept_code") {
								//table selected is department
								$.ajax({
									async: false, //data will be entered into the table
									type: "GET",
									url: "control_data.php",
									data: { snow: "student1", cc: "dept_code" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "dept_code" + " : ");
										$form.append(h);
										h.attr('name', "dept_code");
										for (var i in s) {
											var sel = s[i];
											var k = sel['dept_code'];
											$(h).append('<option>' + sel['dept_code'] + '</option>');
										}
										$form.append('</select></p>');
										
									}
								});
							}
							else if (snow == "stu_pno1" && yuck[i] == "Student_ID") {
								
								$.ajax({
									async: false,   //table selected will be student phone
									type: "GET",
									url: "control_data.php",
									data: { snow: "stu_pno1", cc: "Student_ID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "Student_ID" + " : ");
										$form.append(h);
										h.attr('name', "Student_ID");
										for (var i in s) {
											var sel = s[i]; // data is inserted into the table
											var k = sel['Student_ID'];
											$(h).append('<option>' + sel['Student_ID'] + '</option>');
										}
										$form.append('</select></p>');
										
									}
								});
							}
							else if (snow == "lend1" && yuck[i] == "secti_ID") {
								//table selected will be section  
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php", // student and section ID is selected
									data: { snow: "lend1", cc: "secti_ID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "Student_ID" + " : ");
										$form.append(h);
										h.attr('name', "Student_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['Student_ID'];
											if (sel['Student_ID']) {
												$(h).append('<option>' + sel['Student_ID'] + '</option>');
											}
										}
										$form.append('</select></p>');
										var h1 = $('<select class="form-control">');
										$form.append("<p>" + "secti_ID" + " : ");
										$form.append(h1);
										h1.attr('name', "secti_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['SecId'];
											if (sel['SecId']) {
												$(h1).append('<option>' + sel['SecId'] + '</option>');
											}
										}
										$form.append('</select></p>');
										//		 $form.append("<p>" + '<input type="submit" value ="Add Entry" />' +  "</p>");
									}
								});
							}  //table selected is login data 
							else if (snow == "login1" && yuck[i] == "type_u")
							{
							
								var h = $('<select class="form-control">');
										$form.append("<p>" + "User_type" + " : ");
										$form.append(h);
										h.attr('name', "type_u");
										$(h).append('<option>admin</option><option>user</option>')
										$form.append('</select></p>');
							}
							else if (snow == "login1" && yuck[i] == "Student_ID")
							{
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "login1", cc: "Student_ID" },
									dataType: "json",
									success: function (s) {
										var h = $('<select class="form-control">');
										$form.append("<p>" + "Student_ID" + " : ");
										$form.append(h);
										h.attr('name', "Student_ID");
										for (var i in s) {
											var sel = s[i];
											var k = sel['Student_ID'];
											if (sel['Student_ID']) {
												$(h).append('<option>' + sel['Student_ID'] + '</option>');
											}
										}
										$form.append('</select></p>');
									}
								});
							}
							else if (snow == "data_cart" && yuck[i] == "SecId") {
								//$(".test").html(colname);
								$.ajax({
									async: false,
									type: "GET",
									url: "control_data.php",
									data: { snow: "data_cart", cc: "SecId" },
									dataType: "json",
									success: function (s) {


										var h = $('<select class="form-control">');
										$form.append("<p>" + "Student_ID" + " : ");
										$form.append(h);

										h.attr('name', "Student_ID");

										for (var i in s) {
											var sel = s[i];

											var k = sel['Student_ID'];
											if (sel['Student_ID']) {
												$(h).append('<option>' + sel['Student_ID'] + '</option>');
											}


										}
										$form.append('</select></p>');


										var h1 = $('<select class="form-control">');
										$form.append("<p>" + "SecId" + " : ");
										$form.append(h1);

										h1.attr('name', "SecId");

										for (var i in s) {
											var sel = s[i];

											var k = sel['SecId'];
											if (sel['SecId']) {
												$(h1).append('<option>' + sel['SecId'] + '</option>');
											}


										}
										$form.append('</select></p>');

									}

								});
							}
							else if (yuck[i] == "Deleted") {
								//deleted column is selected and appended the data is put into the columns
								var h = $('<select class="form-control">');
								$form.append("<p>" + colname + " : ");
								$form.append(h);
								h.attr('name', colname);
								$(h).append('<option>' + "Y" + '</option>');
								$(h).append('<option selected>' + "N" + '</option>');
								$form.append('</select></p>');
								$form.append("<p>" + '<input class="btn btn-primary" type="submit" value ="Add Entry" />' + "</p>");
								$form.append("<p>" + '<a class="btn btn-primary" href="sess.php">Cancel</a>' + "</p>");
							}
							else if ((snow == "sec1" && yuck[i] == "subject_ID") || (snow == "lend1" && yuck[i] == "Student_ID") || (snow == "dept1" && yuck[i] == "Coll_name") ||  (snow == "data_cart" && yuck[i] == "Student_ID")) {
							}
							else {
								var pl = $('<input class="form-control" type="text"/>');
								$form.append("<p>" + colname + " : ");
								$form.append(pl);
								$form.append("</p>");
								pl.attr('name', colname);
							}
						}
					}
				});
			}
			function enter_data(frm, data) {
				$.each(data, function (key, v) {
					var $c = $('[name=' + key + ']', frm);
					if ($c.is('select')) {
						$("option", $c).each(function () {
							if (this.v == v) { this.selected = true; }
						});
					}
					else {
						switch ($c.attr("type")) {
							case "text":case "textarea": case "hidden":
								$c.val(v);
								break;
							case "radio": case "checkbox":
								$c.each(function () {
									if ($(this).attr('v') == v) { $(this).attr("checked", v); }
								});
								break;
						}
					}
				});
			}
			function tear() {
				$("#test #menu tr").remove();
				$("#test #menu th").remove();
				$(".ok").empty();
				var columnnames = [];
				$("#test tbody tr").remove();
				$("#test tbody td").remove();
				$("#nav").remove();
				$.ajax({
					async: false,
					type: "GET",
					url: "g_T_D.php",
					data: { snow: $("#pos").val() },
					dataType: "json",
					success: function (yuck) {
						$("#show").show();
						$("#test #menu").append("<tr>");
						for (var i in yuck) {
							var coe = yuck[i];
							columnnames[i] = yuck[i];
							$("#test #menu").append("<th>" + coe + "</th>");
						}
						$("#test #menu").append("<th>Delete</th>");
						$("#test #menu").append("</tr>");
					}
				});
				$.ajax({
					type: "GET",
					url: "get_T_I.php",
					data: { snow: $("#pos").val() },
					dataType: "json",
					success: function (yuck) {
						var together = 0;
						var req = document.getElementById("test");
						for (var i in yuck) {
							
							var coe = req.insertRow(-1);
							coe.id = "rowDelete" + i.toString();
							var yo = yuck[i];
							for (var j in columnnames) {
								var fan = coe.insertCell(-1);
								fan.innerHTML = yo[columnnames[j]];
								fan.className = "yes";
							}
							var fan1= coe.insertCell(-1);
							fan1.innerHTML = '<button class="rat btn btn-primary" style="background-color:black" value="Delete" >Delete</button>';
							fan1.className = "yes";

							
							//	$(".test").html(row.id);
						}
						var together = req.getElementsByTagName("tr").length;
							
						showTable(together, 6);
					}
					
				});

				

			}

//data will be shown in the table and the pagination will be shown
function showTable(together, rowshown){

	$("#test").after('<div id="nav"></div>');
		

				var torn = rowshown;
				var count = together;

				var req = document.getElementById("test");
				var rain = req.getElementsByTagName("tr");
				
				var count1 = count/torn;
				for(i = 0;i < count1;i++) {
					var count2 = i + 1;
					$('#nav').append('<a href="#" rel="'+i+'">'+count2+'</a> ');
				}
				$(rain).hide();
				$(rain).slice(0, torn).show();
				$('#nav a:first').addClass('active');
				$('#nav a').bind('click', function(){

					$('#nav a').removeClass('active');
					$(this).addClass('active');
					var bind = $(this).attr('rel');
					var startItem = bind * torn;
					var endItem = startItem + torn;
					$(rain).hide().slice(startItem, endItem).css('display','table-row').animate({opacity:1}, 300);
				});

}

		});
	</script>
	<style>
		
		
	 table,
        td,
        th {
            border: 3px solid #ddd;
            text-align: left;
            font-style: italic;
            border-color: lightblue;
            color:blue;
        }
        table {
            border-collapse: 3px;
            border-color: lightblue;
            width: 100%;
            font-style: italic;
            border-color: black;
        }
        th,
        td {
            padding: 15px;

        }
        tr:hover {
            background-color: lightblue;
            color: black;
        }
        td:hover {
            background-color: #ddda2393;
            color: black;
        }
        .crow {
            text-align: center;
            
        }
        .crow a{
            text-decoration: none;
          
        }
        .form-inline .form-group {
  margin-right:8px;
}

.btn {
  font: 20px sans-serif;
  text-decoration: none;
   font-style:italic;
  background-color:black;
  color: white;
  padding: 2px 14px 2px 14px;
  border-top: 1px solid lightgreen;
  border-right: 1px solid lightgreen;
  border-bottom: 1px solid lightgreen;
  border-left: 1px solid lightgreen;
}
.btn:hover {
  font: 20px sans-serif;
  text-decoration: none;
   font-style:italic;
  background-color:green;
  color: white;
  padding: 2px 14px 2px 14px;
border-top: 1px solid lightgreen;
  border-right: 1px solid lightgreen;
  border-bottom: 1px solid lightgreen;
  border-left: 1px solid lightgreen;
}


	</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: lightblue">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="images/o.jpg">
          <span class="heading" style="text-decoration-color: orange">PAGE FOR ADMIN</span>
        </a>
      </div>


      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="welcome.html" style="font-size:20px">HOME
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="about.html" style="font-size:20px">ABOUT</a>
          </li>
          <li>
            <a href="make.php" style="font-size:20px">REGISTER</a>
          </li>
          
          <li>
            <a href="login.php" style="font-size:20px">LOGIN</a>
          </li>
        </ul>
      </div>
   
    </div>
  </nav>

  <section id="home" class="section jumbotron-section bg--position-center no-repeat bg-cover md-display-table" >
  <div>
  
  
  
	  <p>
		  Table Name:
		  <select class="form-control" name="pos" id="pos" >
			  <option selected value="<?php echo (isset($_SESSION['coltod'])) ? htmlspecialchars($_SESSION['coltod']) : 'None'; ?>" label="Choose"></option>
			  <option>data_cart</option>
			  <option>coll_data1</option>
			  <option>coll_pno1</option>
			  <option>subject1</option>
			  <option>dept1</option>
			  <option>d_pno1</option>
			  <option>instr_pno1</option>
			  <option>instr1</option>
			  <option>login1</option>
			  <option>sec1</option>
			  <option>student1</option>
			  <option>stu_pno1</option>
			  <option>lend1</option>
		  </select>
  
	  </p>
  </div>
	  <div class="ok container"></div>
	  <div id="show">
		  <table id="test" class=".table-striped">
			  <thead id="menu">
			  </thead>
			  <tbody>
			  </tbody>
		  </table>
  
	  </div>
	  
	  
		  <button class="btn btn-primary" id="hello">ENTER NEW DATA</button>
	 
  </section>

<footer style="background-color: lightblue">
    <section class="bf">
      <div class="container">
        <hr class="df">
        <div class="row">
          <div class="col-md-5">
          </div>
          <div class="col-md-2">
            <a id="on-top" style="font-size:20px" href="" class="pull-right go">GO ABOVE
              <span class="bub">
              </span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </footer>

	</body>


</html>