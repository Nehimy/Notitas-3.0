Cookies
- Llave temporal
- No dejar visible los datos sensibles del usuario
- Llave unica
- Debe poder relacionarse con el usuario
- sha256 o cambiar la base de datos
- aes
- 17 de mayo 12:05 El usuario dueño, es el unico que puede ver la nota,editarla y eliminarla.
- El admin tiene que ir al panel

- 23 de mayo 11:35
- Cuando le click a la lista de obcciones tiene que cargar ej. todas las notas dentro del mismo panel y lo mismo con los usuarios


- Usuarios con avatar ✔️
- buscador shearch ✔️
- opcion de eliminar usuarios ✔️
- opcion de eliminar notas ✔️
- Editar user ✔️
- botón y/o radio button que ponga las notas de forma ascendente o descendente

- ver usuario de forma individual
- ver nota de forma individual ✔️
- efecto de carga lenta
- Panel que cargue las ultimas notas.

- 23 de junio 10:13
- Verificar el correo ✔️
La solución en :https://www.php.net/manual/es/filter.examples.validation.php

Correo de prueba:
 -henit46971@serosin.com
 Grvatar:

 https://en.gravatar.com/emails

Cosas por hacer en Notitas

- Que el cargar notas del admin este en notas.php  ✔️
- Css para la página de : el correo no es válido. ✔️
- Intentar modificar la libreria de kj para no escribir muchas linas ✔️ hecho por kj✔️ lo hiso kj
- Al eliminar usuario que elimine todas sus notas✔️
- Cargar el avatarpara el admin ✔️
- Arreglar el panel del admin ✔️
- Arreglar la lupa del buscador ✔️
- página de precentación de el programa notitas pop-its
- Poner paginación (botón de next)
- Revisar /cotrolers/user.php y /middelwares/user.php por si puedo acortar las lineas de código

- Reacer el view con la libreria actualizada de kj
-/controllers/user.php
    - panelAdmin✔️
    - panelUsers✔️
    - editUserForm✔️
    - viewUser✔️
-/controllers/notitas.php
    - newNoteForm
    - viewNote
    - allNotes
    - loadNotesAdmin
    - editNote
    - searchNotes

- El buscador también tiene que buscar usuarios
- el usuario tambien tendrá un buscador
- Panel_begin y panel_users tienen que quedar en un solo archivo ✔️
  - Encontrar la forma de que al optener todas las notas llame a una sola función paginación().✔️
- Al cargar el panel de admin quizas tiene que llamar a paginación ✔️
- Fórmula para cargar notas según la página.✔️
- Crear un botón de atrás.
  - Hacer un metodo inverso al de adminNotes
- Eliminar panel_begin.php✔️
- que carguen las notas de a 8 pero que pregunte antes si es admin en pagination().✔️
- Si no hay más notitas que next deje de cargar otra página.✔️
- https://godm0de.github.io/calculator-pwa/ 2 themes dark and light.

* how to solve back button dilemma
  2. El botón de atrás puede empezar en la última pagina y termina en la primera.
  3. El botón de back detecta la página done esta y carga una página anterior
  4. Si el button is begin ya no puede avanzar
  5. Back tiene como limites la pagina 1 y la última pagina que carga las notas.
- Los botones desaparecen cuando llegan a su limite.
