<!DOCTYPE html>
<html>
<head>
	<title>Página web responsive</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: sans-serif;
}

header {
	background-color: #333;
	color: #fff;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 1rem;
}

.logo img {
	height: 40px;
}

nav ul {
	list-style: none;
	display: flex;
	align-items: center;
}

nav ul li {
	margin-left: 1rem;
}

nav ul li:first-child {
	margin-left: 0;
}

nav ul li a {
	color: #fff;
	text-decoration: none;
}

.search {
	display: flex;
	align-items: center;
}

.search input[type="text"] {
	padding: 0.5rem;
	border: none;
	border-bottom: 2px solid #fff;
	margin-right: 0.5rem;
}

.search button {
	padding: 0.5rem 1rem;
	background-color: #fff;
	color: #333;
	border: none;
	cursor: pointer;
}

/* .sidebar {
	position: fixed;
	top: 6rem;
	left: 0;
	bottom: 2rem;
	width: 100%;
	max-width: 300px;
	background-color: #f1f1f1;
	padding: 1rem;
	order: -1;
} */

.sidebar {
	position: fixed;
	top: 6rem;
	left: 0;
	bottom: 2rem;
	width: 20%;
	background-color: #f1f1f1;
	padding: 1rem;
}

.chat {
	margin-bottom: 1rem;
}

.posts {
	max-width: 800px;
	margin: 0 auto;
	padding: 1rem;
}

.posts h2 {
	margin-bottom: 1rem;
}
.posts article {
	margin-bottom: 2rem;
}

.posts article h3 {
	margin-bottom: 0.5rem;
}

main {
	margin-top: 6rem;
	margin-bottom: 2rem;
    margin-left: 5em;
}

footer {
	background-color: #333;
	color: #fff;
	padding: 1rem;
	text-align: center;
	bottom: 0;
	left: 0;
    position: relative;
    z-index: 500;
	width: 100%;
}



</style>
<body>
    <header>
		<div class="logo">
			<img src="logo.png" alt="Logo">
		</div>
		<div class="search">
			<input type="text" placeholder="Buscar">
			<button>Buscar</button>
		</div>
		<nav>
			<ul>
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Acerca de</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</nav>
	</header>
	<div class="sidebar">
		<div class="chat">
			<p>Este es el espacio para el chat</p>
		</div>
	</div>
	<main>
		<section class="posts">
			<h2>Posts recientes</h2>
			<article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
			<article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
			<article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>

            <article>
				<h3>Título del post</h3>
				<p>Contenido del post</p>
			</article>
		</section>
	</main>
	<footer>
		<p>Derechos reservados &copy; 2023</p>
	</footer>
</body>
</html>
