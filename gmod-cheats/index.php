<style>
{
	свойство: значение;
}
body {
	font-family: Georgia1, sans-serif;
	padding: 0;
	margin: 0;
	color: #222222;
}
.clearfix:after {
	content: '';
	display: table;
	width: 100%;
	clear: both;
}
div {
	box-sizing: border-box;
}
.navedenie {
	a {
    color: #FFF; /* Цвет обычной ссылки */ 
    text-decoration: none; /* Убираем подчеркивание у ссылок */
    transition: 0.1s linear; /* Время изменения */
   }
   a:hover {
    color: #C90; /* Цвет ссылки при наведении на нее курсора мыши */  
    text-decoration: none; /* Добавляем подчеркивание */
   }
}
.container {
	width: 1200px;
	!border: 3px solid red;
	margin: 0 auto;
}
::-webkit-scrollbar {
  width: 7px; /* Длина скролбара */
}

::-webkit-scrollbar-track {
  background: #f1f1f1; /* Цвет места где нету скролбара */
}

::-webkit-scrollbar-thumb {
  background: #dec400; /* Цвет до наведения */
}

::-webkit-scrollbar-thumb:hover {
  background: #C90; /* Цвет при наведении */
}

nav {
	float: right;
	margin-top: 50px;
}
.menu {
	padding: 0;
	margin: 0;
	display: block;
}
.menu li {
	float: left;
	display: block;
	margin-right: 28px;
}
.menu a {
	color: black;
	text-decoration: none;
	text-transform: uppercase;
	font-size: 20px
}
h1 {
	font-size: 75px;
	color: black;
	text-transform: uppercase;
	text-align: center;
	margin-top: 50;
	margin: 10;
}
.topline {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  height: 5px;
  margin-top: 0px;
  background-color: #dec400;
  background-image: linear-gradient(90deg, #f5d140, #d9b00f, #f5d140);
  box-shadow: 0 20px 300px 3px hsla(10.481927710843378, 100.00%, 67.45%, 1.00);
}
.block1 { 
float: left; 
position: relative; 
top: 10px; 
left: 50.5%; 
}
.block2 { 
float: right; 
position: relative; 
top: 10px; 
left: -50.5%; 
}
</style>
<meta property="og:title" content="Exec" />
<meta property="og:description" content="prosta exec" />


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Exec</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
   a {
    color: #FFF; /* Цвет обычной ссылки */ 
    text-decoration: none; /* Убираем подчеркивание у ссылок */
    transition: 0.1s linear; /* Время изменения */
   }
   a::selection {
    color: #000; /* Цвет текста */
    background: #dec400; /* Цвет фона */
	}
   a:hover {
    color: #C90; /* Цвет ссылки при наведении на нее курсора мыши */  
    text-decoration: none; /* Добавляем подчеркивание */
   }
  </style>
</head>
<body>
	<header>
		<div class="topline"></div>
		<div class="container">
			<div class="heading clearfix">
		</div>
	</header>
	<section>
	<div class="block1">
<div class="card" style="width: 500; height: 210;"><br>


<a href="antihack"><img src="antihack/image.png" width="475" height="130"></a>
<h3>Shit Antihack</h3>
</div><br><div class="card" style="width: 500; height: 210;"><br>

<a href="obfuscator"><img src="obfuscator/image.png" width="475" height="130"></a>
<h3>Obfuscator</h3>
</div><br><div class="card" style="width: 500; height: 210;"><br>


</div><br>
</div>
<div class="block2">
<div class="card" style="width: 500; height: 210;"><br>

<a href="cheats/aoshax"><img src="cheats/aoshax/image.png" width="475" height="130"></a>
<h3>AOSHax</h3>
</div><br><div class="card" style="width: 500; height: 210;"><br>

<a href="chitmod"><img src="chitmod/gaymode.png" width="475" height="130"></a>
<h3>Chitmod - Garry's mod menu modification</h3>
</div><br><div class="card" style="width: 500; height: 210;"><br>


</div>
<br>
	</section>
	<section>
		<div class="topline-copy"></div>
	</section>
</body>
</html>

