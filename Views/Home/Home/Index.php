<!DOCTYPE html>

<meta name="viewport"  content= "width=device-width, initial-scale=1.0">
<title> Lista de productos - Universidad Veracruzana </title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapá5.3.3/dist/css/bootstrap.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="mt-4">

<header>

<a href="https://ww.uv.mx/" class="text-bg-success position-absolute top-0 end-0 btn btn-link btn-sm px-3 py-0 rounded-0
text-decoration-none" title="Abrir el sitio web de la Universidad Veracruzana">Universidad Veracruzana</a>

</header>
<div class="container">
<h1 class="display-6 text-center">Tienda de libros</h1>
<ha> Lista de libros </ha>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 mt-3">
     {% for item in model %}
     {{ include ('Home/_partial.Card.html') }}
     {% endfor %}
</div>
</div>

<footer class="border-top footer text-muted mt-5">
<div class="container text-end">
Proyecto de clase MC &copy; 2024
</div>
</footer>
</body>

</html>