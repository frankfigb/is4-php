<!DOCTYPE html>
<html>
<head>
    <title>Test Imagen Perfil</title>
</head>
<body style="background: #222; color: white; padding: 2rem;">
    <h1>Test de imagen de perfil</h1>
    <p>Ruta generada: {{ $imagen_perfil_url }}</p>
    <img src="{{ $imagen_perfil_url }}" alt="Imagen de perfil" style="max-width: 400px;">
</body>
</html>
