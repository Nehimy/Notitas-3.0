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
- Panel que cargue las ultimas notas.✔️

- 23 de junio 10:13
- Verificar el correo ✔️
La solución en :https://www.php.net/manual/es/filter.examples.validation.php

Correo de prueba:
 -henit46971@serosin.com
 Grvatar:

 https://en.gravatar.com/emails

** Cosas por hacer en Notitas **

- Que el cargar notas del admin este en notas.php  ✔️
- Css para la página de : el correo no es válido. ✔️
- Intentar modificar la libreria de kj para no escribir muchas linas ✔️ hecho por kj✔️ lo hiso kj
- Al eliminar usuario que elimine todas sus notas✔️
- Cargar el avatarpara el admin ✔️
- Arreglar el panel del admin ✔️
- Arreglar la lupa del buscador ✔️
- página de precentación de el programa notitas pop-its
- Poner paginación (botón de next) ✔️
- Revisar /cotrolers/user.php y /middelwares/user.php por si puedo acortar las lineas de código ✔️

- Reacer el view con la libreria actualizada de kj
-/controllers/user.php
    - panelAdmin✔️
    - panelUsers✔️
    - editUserForm✔️
    - viewUser✔️
-/controllers/notitas.php
    - newNoteForm ✔️
    - viewNote ✔️
    - allNotes ✔️
    - loadNotesAdmin ✔️
    - editNote ✔️
    - searchNotes ✔️

** Cosas por hacer en Notitas **

- El buscador también tiene que buscar usuarios, del lado Admin. ✔️
- Alinear el buscador para panel-user y panel-notas. ✔️

- El usuario también tendrá un buscador.
- El usuario támbien tiene que tener botones de Back y Next.✔️
- Que al expandirce el botón que el contenedor no se mueva.
- Si el admin busca una nota, que cargue el panelAdmin✔️
- Hacer que panel-users cargue nuevamente.✔️
- ¿Cambiar panel admin por selec?
- Mantener las busqueda con la paginación.✔️
  - Si ya no quedan elementos de la busqueda detener la paginación
  - 2 errores
     -cuando esta en la pag. 2 el buscador no busca.✔️
    - Cuando busco algo y hay muchas coincidencias, en la siguiente pag.✔️
      no hay continuidad y pasa a la pag. 2 en lugar de seguir cargando las conicidencias.

- El botón no tiene que tener una etiqueta <a> dentro.✔️
- El mouse over se pude hacer con CSS.




- Un usuario normal no tiene que tener panel.
- Un usuario normal solo puede ver sus notas.

- Panel_begin y panel_users tienen que quedar en un solo archivo ✔️
  - Encontrar la forma de que al optener todas las notas llame a una sola función paginación().✔️
- Al cargar el panel de admin quizas tiene que llamar a paginación ✔️
- Fórmula para cargar notas según la página.✔️
- Crear un botón de atrás.✔️
  - Hacer un metodo inverso al de adminNotes ✔️
- Eliminar panel_begin.php✔️
- que carguen las notas de a 8 pero que pregunte antes si es admin en pagination().✔️
- Si no hay más notitas que next deje de cargar otra página.✔️
- https://godm0de.github.io/calculator-pwa/ 2 themes dark and light.


- Los botones desaparecen cuando llegan a su limite. ✔️
- posicionar bien los botones de back y next ✔️
-



** Analizando en que casos back ya no tiene que estar **

- El botón back no es incluido en la página 1.
- Si estamos en la pag. 1 back no es cargado.
- Si estamos en la pag. 1 carga el botón back.
- Si la pag. es mayor que 1 carga back.


** Analizando en que casos next ya no tiene que estar **

- ¿En que casos no carga next?

- Next no carga cuando estoy en la últma pag.
- Nota  1 = true y 0 = false

** Analizando en que casos carga todas las notas**
