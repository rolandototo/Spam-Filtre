# Spam-Filtre
Este plugin filtra comentarios de spam basado en tres criterios: 
- Dirección IP, dirección de correo electrónico y contenido del comentario.
- Las direcciones IP y direcciones de correo electrónico específicas se bloquean con la ayuda de dos matrices: 
- $blocked_ips y $blocked_emails. 
- El contenido de los comentarios se filtra utilizando la matriz $blocked_content, que contiene palabras comunes utilizadas en el spam. 
La función stripos() busca estas palabras dentro del contenido del comentario. Si se encuentra una coincidencia, el comentario se marcará como spam.
